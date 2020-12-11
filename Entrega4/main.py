from flask import Flask, request, json, Response, jsonify
from pymongo import MongoClient, DESCENDING
import json

# app = Flask("Navieras")
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

#hola

@app.route("/")
def home():
    '''
    Pagina de inicio
    '''
    return("<h1>pagina culiaaaaa</h1>")

def forbiddenFilter(keywords, message):     # Funcion para eliminar Forbiddens en busquedas vacías
    try:
        for word in keywords:
            if word in message["message"]:
                return False
        return True
    except KeyError:
        return False

@app.route('/text-search', methods=['GET'])
def textSearch():
    payload = {'desired': [], 'required': [], 'forbidden': [], 'userId': -1}
    try:    
        for key in request.json:
            payload[key] = request.json[key]
    except KeyError:
        allMsgs = list(dbMessages.find({}, {"_id": 0}))
        return jsonify(allMsgs)
    except TypeError:                                       # Error de formato de algun contenido
        allMsgs = list(dbMessages.find({}, {"_id": 0}))
        return jsonify(allMsgs)

    # Si alguno no es del tipo adecuado
    if not (type(payload["desired"]) is list and type(payload["required"]) is list and type(payload["forbidden"]) is list and type(payload["userId"]) is int):
        return Response("", status = 400)

    textQuery = ""
    for q in payload["desired"]:
        textQuery += q + " "
    for r in payload["required"]:
        textQuery +="\""+ r + "\" "
    for f in payload["forbidden"]:
        textQuery +="-" + f + " "

    # Si hay solo forbidden
    if len(payload["desired"] + payload["required"]) == 0:
        user_searched = payload["userId"]
        if user_searched > -1:
            allMsgs = list(dbMessages.find({"sender": user_searched}, {"_id": 0}))
        else:
            allMsgs = list(dbMessages.find({}, {"_id": 0}))
        filtered = list(filter(lambda x: forbiddenFilter(payload["forbidden"], x), allMsgs))
        return jsonify(filtered)

    
    user_searched = payload["userId"]
    if user_searched > -1:                              # Si hay user
        dbMessages.create_index([("message", "text")])
        queryResult = list(dbMessages.find({"$text": {"$search": textQuery}, "sender": user_searched}, {"_id": 0}))

    else:                                               # Si no hay user
        dbMessages.create_index([("message", "text")])
        queryResult = list(dbMessages.find({"$text": {"$search": textQuery}}, {"_id": 0}))

    return jsonify(queryResult)


@app.route('/messages', methods=['GET', 'POST'])
def messages():

    if request.method == 'POST':
        payload = {
                        "message" : ""
                    ,   "sender": -1
                    ,   "receptant": -1
                    ,   "lat": -1000
                    ,   "long": -1000
                    ,   "date": ""
                    }
        for key in MESSAGE_KEYS:
            try:
                payload[key] = request.json[key]
            except KeyError:
                return jsonify([f"Falta el Atributo \"{key}\" en el payload"]), 400

        # Si el payload tiene los tipos adecuados
        if type(payload["message"]) is str and type(payload["sender"]) is int and type(payload["receptant"]) is int and type(payload["lat"]) is float and type(payload["long"]) is float and type(payload["date"]) is str:
                newId = 1 + max(list(x["mid"] for x in list(dbMessages.find({}, {"_id": 0, "mid":1}))))
                payload["mid"] = newId
                dbMessages.insert_one(payload.copy())
                return jsonify(payload), 201

        # Si no tiene los tipos adecuados
        return Response("", status=400)


    if request.method == "GET":
        if len(request.args) > 0:   # Si hay args
            try:
                print(len(request.args))
                usr1 = int(request.args["id1"])
                usr2 = int(request.args["id2"])
                to1 = list(dbMessages.find({"sender":usr2, "receptant":usr1}, {"_id": 0}))
                from1 = list(dbMessages.find({"sender":usr1, "receptant":usr2}, {"_id": 0}))
                return jsonify(to1+from1)
            except KeyError:        # Si hay args pero falta alguno
                return Response("Faltan argumentos.", status = 400)
            except ValueError:      # Si hay args pero no estan correctos
                return Response("Los argumentos no son numéricos", status = 400)

        # Si no hay args
        return jsonify(list(dbMessages.find({}, {"_id": 0})))

@app.route('/messages/<int:id>', methods=['GET'])
def messages_id(id):
    if request.method == 'GET':             # Entrega el mensaje de ese ID
        msgs = list(dbMessages.find({"mid":id}, {"_id": 0}))
        return jsonify(msgs)

    if request.method == "DELETE":          # Este endpoint no es parte de la entrega
        dbMessages.delete_one({"mid":id})
        return jsonify([]), 200

@app.route('/message/<int:id>', methods=['DELETE'])
def message_id(id):
    if request.method == "DELETE":          # Borra mensaje correspondiente
        dbMessages.delete_one({"mid":id})
        return jsonify([]), 200

@app.route('/users', methods=['GET'])
def users():                                # Todos los usuarios
    users = list(dbUsuarios.find({}, {"_id": 0}))
    return jsonify(users)

@app.route('/users/<int:id>', methods=['GET'])
def users_id(id):                           # Usuario del id pedido
    users = list(dbUsuarios.find({"uid":id}, {"_id": 0}))
    return jsonify(users)

if __name__ == "__main__":
    app.run(threaded=True, port=5000)
    # app.run(debug=True)


# cambio random