Para ejecutar el programa se debe correr el archivo main.py

Una vez ejecutado el programa se puede utilizar un buscador o alguna aplicacion como postman 
para visualizar el contenido de la base de datos asi como las funciones del archivo main.py


La ruta a utilizar será la siguiente: http://127.0.0.1:5000/

Funciones:

GET: 

Para buscar los todos usuarios: http://127.0.0.1:5000/users/ 
Para buscar un usuario especifico: http://127.0.0.1:5000/users/id_usuario
Para buscar todos los mensajes: http://127.0.0.1:5000/messages/
Para buscar un mensaje especifico: http://127.0.0.1:5000/messages/id_mensaje
Para buscar mensajes intercambiados entre dos usuarios: http://127.0.0.1:5000/messages?id1=id_primer_usuario&id2=id_segundo_usuario
Para buscar mensajes que contengan (o no contengan) texto especifico se debe utilizar: http://127.0.0.1:5000/text-search/
Este ultimo debe contener un body de la forma:
{
    "desired": [],
    "required": [],
    "forbidden": [],
    "userId": 
}
Donde en cada lista vacia de deben agregar las palabras que se desean buscar y en userId se debe agregar el id del usuario

POST:

Crea un mensaje: http://127.0.0.1:5000/messages/

Se debe especificar en el body de la forma:



DELETE:

Elimina un mensaje dado un id especifico: http://127.0.0.1:5000/messages/id_mensaje
