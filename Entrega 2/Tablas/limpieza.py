instalaciones_lista = []
with open("CSV/INSTALACIONES_CLEAN.csv", "r", encoding='UTF-8') as archivo:
    for linea in archivo:
        id = linea.strip().split(",")[0]
        condicion = True
        for insta in instalaciones_lista:
            if insta == id:
                condicion = False
        if condicion:
            instalaciones_lista.append(id)
            with open("CSV/INSTALACIONES_CLEAN_2.csv", "a", encoding='UTF-8') as file:
                file.write(linea[0:-3] + '\n')
