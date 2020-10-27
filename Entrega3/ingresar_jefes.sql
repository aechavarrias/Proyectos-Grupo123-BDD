CREATE OR REPLACE FUNCTION
ingresar_jefes ()
RETURNS void AS $$
DECLARE
	tupla RECORD;
	tupla2 RECORD;
	id_mas_alto INTEGER;
BEGIN
	id_mas_alto = 0;
	FOR tupla IN SELECT * FROM usuarios LOOP
		IF id_mas_alto <= tupla.id THEN
			id_mas_alto = tupla.id + 1;
		END IF;
	END LOOP;
	

	FOR tupla2 IN SELECT personal.nombre, personal.edad, personal.sexo, personal.rut, MD5(random()::text) FROM personal, instalaciones WHERE personal.rut = instalaciones.rut_jefe LOOP
		INSERT INTO usuarios VALUES (id_mas_alto, tupla2.nombre, tupla2.edad, tupla2.sexo, tupla2.rut, 'CHILENA', tupla2.md5);
		id_mas_alto = id_mas_alto + 1;
	END LOOP;
END
$$ language plpgsql
