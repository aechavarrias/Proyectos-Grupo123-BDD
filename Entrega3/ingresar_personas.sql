CREATE OR REPLACE FUNCTION
ingresar_persona ()
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
	

	FOR tupla2 IN SELECT personal_nav.penombre, personal_nav.edad, personal_nav.genero, personal_nav.numero_pasaporte, personal_nav.nacionalidad, MD5(random()::text) FROM personal_nav, Buques WHERE personal_nav.peid = buques.capitan LOOP
		INSERT INTO usuarios VALUES (id_mas_alto, tupla2.penombre, tupla2.edad, tupla2.genero, tupla2.numero_pasaporte, tupla2.nacionalidad, tupla2.md5);
		id_mas_alto = id_mas_alto + 1;
	END LOOP;
END
$$ language plpgsql

