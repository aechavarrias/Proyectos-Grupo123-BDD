from flask import Flask, request, json
from pymongo import MongoClient, DESCENDING
import json

app = Flask(__name__)

MESSAGE_KEYS = ["message", "sender", "receptant", "lat", "long", "date"]
SEARCH_KEYS = ["desired", "required", "forbidden", "userId"]

USER = "grupo123"
PASS = "grupo123"
DATABASE = "grupo123"
URL = f"mongodb://{USER}:{PASS}@gray.ing.puc.cl/{DATABASE}?authSource=admin"

client = MongoClient(URL)

db = client["grupo123"]

dbUsuarios = db.usuarios
dbMessages = db.mensajes

@app.route('/text-search/', methods=['GET'])
def root():                                                                                         #  TODO
    payload = {key: request.json[key] for key in SEARCH_KEYS}
    textQuery = ""
    for q in payload["desired"]:
        textQuery += q + " "
    for r in payload["required"]:
        textQuery +="\""+ r + "\" "
    for f in payload["forbidden"]:
        textQuery +="-" + f + " "
    print(textQuery)
    # queryResult = list(
    #     db.command("$text"
    #         , value="mensajes"
    #         , search = textQuery
    #         , project = {"_id":0}
    #         )
    # )
    dbMessages.create_index([("message", DESCENDING)])
    queryResult = list(dbMessages.find(
        {"$text": {"$search": textQuery
                , "$caseSensitive" : False}}
        , {"_id": 0}))
    return str(queryResult)

@app.route('/messages/', methods=['GET', 'POST'])
def messages():

    if request.method == 'POST':
        payload = {key: request.json[key] for key in MESSAGE_KEYS}                                  #  TODO verificación
        newId = 1 + max(list(x["mid"] for x in list(dbMessages.find({}, {"_id": 0, "mid":1}))))
        payload["mid"] = newId
        dbMessages.insert_one(payload)
        return str(payload)

    if request.method == "GET":
        try:
            usr1 = int(request.args["id1"])
            usr2 = int(request.args["id2"])
            to1 = list(dbMessages.find({"sender":usr2, "receptant":usr1}, {"_id": 0}))
            from1 = list(dbMessages.find({"sender":usr1, "receptant":usr2}, {"_id": 0}))
            return str(to1+from1)
        except KeyError:
            to1 = list(dbMessages.find({}, {"_id": 0}))
            return str(to1)

@app.route('/messages/<int:id>/', methods=['GET', 'DELETE'])
def messages_id(id):
    if request.method == 'GET':
        msgs = list(dbMessages.find({"mid":id}, {"_id": 0}))
        return str(msgs)

    if request.method == "DELETE":
        dbMessages.delete_one({"mid":id})
        return f"Mensaje Borrado: {id}"

@app.route('/users/', methods=['GET'])
def users():
    users = list(dbUsuarios.find({}, {"_id": 0}))
    return str(users)

@app.route('/users/<int:id>/', methods=['GET'])
def users_id(id):
    users = list(dbUsuarios.find({"uid":id}, {"_id": 0}))
    return str(users)

if __name__ == "__main__":
    app.run(debug=True)
