USE prouge;

DROP PROCEDURE IF EXISTS spUsuarios;

DELIMITER //
CREATE PROCEDURE spUsuarios 
(
	pOpc		INT,
    pIdUser		INT,
    pUsername	VARCHAR(30),
    pCorreo		VARCHAR(30),
    pPass		VARCHAR(25),
    pImg		VARCHAR(250),
    pRol		INT,
    pFecha		DATETIME
)
BEGIN
	DECLARE i INT; 
    DECLARE PassRepetida BIT DEFAULT 0;
    SET i = 0;
    
    IF pOpc = 1 THEN #INSERTAR 
		INSERT Usuarios VALUES (pIdUser, pUsername, pCorreo, pPass, pImg, pROL, pFecha);
	END IF;
    
    IF pOpc = 2 THEN #MODIFICAR NO CONTRASEÑA
		-- REPLACE Usuarios VALUES(pIdUser, pUsername, pCorreo, pPass, pImg, pROL, pFecha);
        UPDATE Usuarios
        SET username = pUsername, 
			correo = pCorreo,
            imagen = pImg,
            rol = pRol,
            fecha = pFecha
		WHERE id_usuario = pIdUser;
	END IF;
    
    IF pOpc = 3 THEN #ELIMINAR
		DELETE FROM Usuarios
        WHERE id_usuario = pIdUser;
	END IF;
    
    IF pOpc = 4 THEN #TRAER UN USUARIO -- SE NECESITA CONTRASEÑA? 
		SELECT Id_usuario, Username,Correo, Pass, Imagen, Rol, Fecha
        FROM Usuarios
        WHERE id_usuario = pIdUser;
    END IF;
    
    IF pOpc = 5 THEN #TRAER TODOS LOS USUARIOS 
		SELECT Id_usuario, Username,Correo, Pass, Imagen, Rol, Fecha -- DEBEN DE SER LOS NOMBRES COMO LOS TIENES EN LAS TABLAS 
        FROM Usuarios
        ORDER BY id_usuario;
	END IF;
    
    IF pOpc = 6 THEN #LOGIN 
		SELECT Id_usuario, Username,Correo, Pass, Imagen, Rol, Fecha
        FROM Usuarios
        WHERE username = pUsername 
        AND pass = pPass;
	END IF;
    
    IF pOpc = 7 THEN #CAMBIAR CONTRASEÑA
			UPDATE Usuarios 
			SET pass = pPass
			WHERE id_usuario = pIdUser
            AND pass != pPass;    
	END IF;
    
    IF pOpc = 8 THEN #NOTIFICAR CONTRASEÑA REPETIDA 1 PARA MISMA CONTRASEÑA 0 PARA DIFERENTE
		SET PassRepetida = (SELECT EXISTS(SELECT Id_usuario FROM Usuarios WHERE id_usuario = pIdUser AND pass = pPass));
        
        SELECT PassRepetida AS Result;
            
    END IF;
END //

DELIMITER ; 

SELECT Id_usuario, Username,Correo, Pass, Imagen, Rol, Fecha FROM Usuarios WHERE id_usuario = 2 AND pass != 'lalsdlasd'; 

-- INSERTAR
CALL spUsuarios (1, null,'LALA' ,'prueba@gmail', 'hola', 'hola.jpg', 1, '2021-03-26');
CALL spUsuarios (1, null,'LALO' ,'pruebA@gmail', 'HI', 'HI.jpg', 1, '2021-03-26');
CALL spUsuarios (1, null,'LELE' ,'prueBA@gmail', 'HR', 'HR.jpg', 0, '2021-03-26');
CALL spUsuarios (1, null,'LOLO' ,'pruEBA@gmail', 'LOLOSUPERCUL', 'LOLO.jpg', 1, '2021-03-26');
CALL spUsuarios (1, null,'LILI' ,'pRUEBA@gmail', 'LILIS', 'LILI.jpg', 1, '2021-03-26');

-- MODIFICAR UN USUARIO MENOS LA CONTRASEÑA
CALL spUsuarios(2, 5, 'Lili', 'lili@gmail.com', null, 'LILIS.jpg', 1, '2021-03-26');

-- ELIMINAR
CALL spUsuarios (3, 3, null, null, null, null, null, null); -- SE ELIMINA A LELE 

-- TRAER UN USUARIO
CALL spUsuarios (4, 1, null, null, null, null, null, null); -- SE TRAE A LOLA QUE ANTERIORMENTE ERA LALA

-- TRAER TODOS LOS USUARIOS
CALL spUsuarios (5, null, null, null, null, null, null, null);

-- LOGIN
CALL spUsuarios (6, null, 'LALO', null, 'HI', null, null, null); -- LOGIN CON LALO

-- CAMBIAR SOLO CONTRASEÑA 
CALL spUsuarios (7, 4, null, null, 'LOLOSUPERDUPERCUL', null, null, null); -- CAMBIAR CONTRASEÑA DE LOLO PERO NO SE MUESTRA 

CALL spUsuarios (7, 2,NULL ,NULL, 'HI', NULL, NULL, NULL); -- MISMA CONTRASEÑA PARA VER QUE NO PASE NADA 
CALL spUsuarios (8, 2,NULL ,NULL, 'HO', NULL, NULL, NULL); -- DEVUELVE 1 SI LA CONTRASEÑA ES LA MISMA Y UN CERO SI NO ES LA MISMA

SELECT * FROM Usuarios;



