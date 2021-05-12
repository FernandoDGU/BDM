USE prouge;

DROP PROCEDURE IF EXISTS spUsuarios;

DELIMITER //
CREATE PROCEDURE spUsuarios 
(
	pOpc		INT,
    pIdUser		INT,
    pNombreCom 	VARCHAR(100),
    pUsername	VARCHAR(30),
    pCorreo		VARCHAR(30),
    pPass		VARCHAR(25),
    pImg		MEDIUMBLOB,
    pRol		INT,
    pFecha		DATE
)
BEGIN
	DECLARE i INT; 
    DECLARE PassRepetida BIT DEFAULT 0;
    SET i = 0;
    
    IF pOpc = 1 THEN 
		INSERT Usuarios VALUES (pIdUser, pNombreCom,pUsername, pCorreo, pPass, pImg, pROL, NOW());
	END IF;
    
    IF pOpc = 2 THEN 
		-- REPLACE Usuarios VALUES(pIdUser, pUsername, pCorreo, pPass, pImg, pROL, pFecha);
        UPDATE Usuarios
        SET nombrecomp = pNombreCom,
			username = pUsername, 
            imagen = pImg,
            rol = pRol,
            fecha = Now()
		WHERE id_usuario = pIdUser and correo = pCorreo;
	END IF;
    
    IF pOpc = 3 THEN 
		DELETE FROM Usuarios
        WHERE id_usuario = pIdUser;
	END IF;
    
    IF pOpc = 4 THEN #Traer un usuario
		SELECT Id_usuario, Nombrecomp, Username, Correo, Pass, Imagen, Rol, Fecha
        FROM Usuarios
        WHERE id_usuario = pIdUser;
    END IF;
    
    IF pOpc = 5 THEN
		SELECT Id_usuario, Nombrecomp, Username,Correo, Pass, Imagen, Rol, Fecha -- DEBEN DE SER LOS NOMBRES COMO LOS TIENES EN LAS TABLAS 
        FROM Usuarios
        ORDER BY id_usuario;
	END IF;
    
    IF pOpc = 6 THEN 
		SELECT Id_usuario,Nombrecomp,Username,Correo, Pass, Imagen, Rol, Fecha
        FROM Usuarios
        WHERE correo = pCorreo 
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

-- SP CATEGORIAS --
DROP PROCEDURE IF EXISTS sp_categorias;

DELIMITER //
CREATE PROCEDURE sp_categorias (
		pOpc	INT, 
        pIdCat	INT, 
        pDesc	VARCHAR(250), 
        pNom	VARCHAR(80)
)
BEGIN 
	IF pOpc = 1 THEN #Insertar categoria
		INSERT INTO Categorias(descripcion, nombre)
		VALUES (pDesc, pNom);
	END IF;
    
    IF pOpc = 2 THEN #Traer todas las categorias
		SELECT id_categoria, descripcion, nombre
        FROM Categorias;
	END IF;
    
    IF pOpc = 3 THEN #TRAER UNA CATEGORIA
		SELECT id_categoria, descripcion, nombre
        FROM Categorias
        WHERE id_categoria = pIdCat;
    END IF;
END //
DELIMITER ; 

CALL sp_categorias (1,null ,"Nueva categoria","Prueba");
CALL sp_categorias (2,null ,null,null);
CALL sp_categorias (3,2 ,null,null);

-- SP CURSOS -- 

DROP PROCEDURE IF EXISTS sp_cursos;
DELIMITER // 
CREATE PROCEDURE sp_cursos (
	pOpc		INT, 
    pIdCurso 	INT, 
    pId_user	INT, 
	pTitulo		VARCHAR(100),
    pCosto		FLOAT,
    pImagen		mediumblob,
    pDesc		VARCHAR(250),
    pDesc_c		VARCHAR(60),
    pfecha_mod 	DATE,
    pcurso_a	BIT
    
)
BEGIN
		IF pOpc = 1 THEN #INSERTAR CURSO
			INSERT INTO Cursos(id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo)
            VALUES (pId_user, pTitulo, pCosto, pImagen, pDesc,pDesc_c, now(), pcurso_a);
        END IF;
        
        IF pOpc = 2 THEN #TRAER TODOS LOS CURSOS
			SELECT id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo
            FROM Cursos;
        END IF; 
        
        IF pOpc = 3 THEN #Traer un curso
			SELECT id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo
            FROM Cursos
            WHERE id_curso = pIdCurso;
        END IF; 
        
        IF pOpc = 4 THEN #Actualizar curso
			UPDATE Cursos 
            SET 
				titulo = pTitulo,
                costo = pCosto,
                imagen = pImagen,
                descripcion = pDesc,
                descripcion_corta = pDesc_c,
                fecha_mod = NOW(),
                curso_activo = pcurso_a
			WHERE id_curso = pIdCurso;
            
        END IF; 
        
END //

DELIMITER ;

-- SELECT * FROM Cursos;
CALL sp_cursos (1, null, 2, 'Hola todos3', '500', null, 'ola', 'olax2', 0, 1);

-- SP CURSO CATEGORIA --
DROP PROCEDURE IF EXISTS sp_curso_categoria;

DELIMITER // 
CREATE PROCEDURE sp_curso_categoria (
	pOpc 			INT, 
    pId_curso_ca 	INT,
    pId_curso 		INT,
    pId_categoria 	INT
)
BEGIN

	IF pOpc = 1 THEN #Insertar curso_caegoria
		INSERT INTO Curso_Categoria(id_curso,id_categoria)
		VALUES(pId_curso, pId_categoria);
    END IF; 
    
    IF pOpc = 2 THEN #Traer todos curso_categoria
		SELECT id_curso_catg, id_curso, id_categoria
		FROM Curso_Categoria;
    END IF;
    
    IF pOpc = 3 THEN #Traer un curso_categoria 
		SELECT id_curso_catg, id_curso, id_categoria
		FROM Curso_Categoria
		WHERE id_curso_catg = pId_curso_ca;
    END IF;
    
    IF pOpc = 4 THEN #TRAER TODOS LOS CURSOS DE UNA CATEGORIA PROBARLO
		SELECT id_curso_catg, id_curso, id_categoria
        FROM Curso_Categoria
        WHERE id_categoria = pId_categoria;
	END IF;
END //
DELIMITER ;

-- SP Mensajes --
DROP PROCEDURE IF EXISTS sp_mensajes;

DELIMITER // 
CREATE PROCEDURE sp_mensajes (
	pOpc 			INT, 
    pIdmensaje		INT,
    pEmisor	 		INT,
    pReceptor 		INT,
    pMensaje 		VARCHAR(250), 
    pfecha_mensaje 	DATETIME
)
BEGIN
	
	IF pOpc = 1 THEN #Insertar mensaje
		INSERT INTO Mensajes(emisor,receptor, mensaje, fecha_mensaje)
		VALUES(pEmisor, pReceptor, pMensaje, NOW());
    END IF; 
    
    IF pOpc = 2 THEN #Traer todos los mensajes por usuarios
		SELECT id_mensaje, emisor, receptor, mensaje, fecha_mensaje
		FROM Mensajes
        WHERE id_mensaje = pIdmensaje
        AND emisor = pEmisor 
        AND receptor = pReceptor;
    END IF;
    
END //
DELIMITER ;

-- SP Comentarios --

DROP PROCEDURE IF EXISTS sp_comentarios;

DELIMITER //
CREATE PROCEDURE sp_comentarios
(
 pOpc 			INT, 
 pid_comentario INT, 
 pid_usuario 	INT,
 pid_curso		INT,
 pcomentario	VARCHAR(200),
 pcalificacion 	FLOAT,
 pfecha_com		DATETIME
)
BEGIN 
	IF pOpc = 1 THEN #Insertar comentario
		INSERT INTO Comentarios(id_usuario,id_curso, comentario, calificacion, fecha_com)
		VALUES(pid_usuario, pid_curso, pcomentario, pcalificacion,NOW());
    END IF; 
    
    IF pOpc = 2 THEN #Traer todos los comentarios de un curso
		SELECT id_comentario,id_usuario,id_curso, comentario, calificacion, fecha_com
		FROM Comentarios
        WHERE id_curso = pid_curso;
    END IF;
END //

DELIMITER ; 

CALL sp_comentarios (1, null,1, 4, 'Que buen curso', 100, 0);
CALL sp_comentarios (2, null,1, 4, 'Que buen curso', 100, 0);



-- Sp Multimedia -- 
DROP PROCEDURE IF EXISTS sp_multimedia;

DELIMITER //
CREATE PROCEDURE sp_multimedia(
	pOpc INT, 
    pid_multimedia 	INT, 
    pid_curso 		INT,
    pnombre_archivo	VARCHAR(100),
    ptipo_archivo	VARCHAR(30),
    pdireccion_archivo VARCHAR(200)
)
BEGIN 
	
    IF pOpc = 1 THEN #INSERTAR DATOS
		INSERT INTO Multimedia(id_curso, nombre_archivo, tipo_archivo, direccion_archivo)
        VALUES (pid_curso, pnombre_archivo, ptipo_archivo, pdireccion_archivo);
	END IF;
    
    IF pOpc = 2 THEN #TRAER TODA LA MULTIMEDIA POR CURSO
		SELECT id_multimedia, id_curso, nombre_archivo, tipo_archivo, direccion_archivo
        FROM Multimedia
        WHERE id_multimedia = pid_multimedia
        AND id_curso = pid_curso;
        
    END IF; 
END //
DELIMITER ;

-- Sp Curso_Niveles -- 
DROP PROCEDURE IF EXISTS sp_curso_niveles;

DELIMITER //
CREATE PROCEDURE sp_curso_niveles(
	pOpc 			INT,
    pid_curso_nivel INT,
    pid_curso		INT,
    pno_nivel 		INT,
    pcosto			FLOAT,
    ptitulo			VARCHAR(100),
    pdescripcion	VARCHAR(250),
    pvideo			VARCHAR(250)
)
BEGIN
	 IF pOpc = 1 THEN #INSERTAR DATOS
		INSERT INTO Curso_Niveles (id_curso, no_nivel, costo, titulo, descripcion, video)
        VALUES (pid_curso,pno_nivel,pcosto, ptitulo, pdescripcion, pvideo );
	END IF;
    
    IF pOpc = 2 THEN #TRAER TODOS LOS NIVELES POR CURSO
		SELECT id_curso_nivel, id_curso, no_nivel, costo, titulo, descripcion, video
        FROM Curso_Niveles
        WHERE id_curso_nivel = pid_curso_nivel
        AND id_curso = pid_curso;
    END IF;
END //
DELIMITER ;

-- SP Ventas --
DROP PROCEDURE IF EXISTS sp_ventas;

DELIMITER // 
CREATE PROCEDURE sp_ventas(
	pOpc 			INT, 
    pid_venta 		INT,
    pid_usuario 	INT,
    pid_curso 		INT,
    pfecha_compra	DATETIME,
    ptotal_ventas	FLOAT
)
BEGIN

	IF pOpc = 1 THEN #Insertar datos
		INSERT INTO Ventas(id_usuario,id_curso, fecha_compra, total_ventas)
        VALUES(pid_usuario,pid_curso, NOW(), ptotal_ventas);
    END IF;
    
    #COMPRAS POR USUARIO 
    IF pOpc = 2 THEN 
		SELECT id_venta, id_usuario, id_curso, fecha_compra, total_ventas
        FROM Ventas
        WHERE id_venta = pid_venta
        AND id_usuario = pid_usuario;
	END IF;
    
    #VENTAS POR CURSO
    IF pOpc = 3 THEN 
		SELECT id_venta, id_usuario, id_curso, fecha_compra, total_ventas
        FROM Ventas
        WHERE id_venta = pid_venta
        AND	id_curso = pid_curso;
    END IF;
    
END//
DELIMITER ;

-- SELECT * FROM Cursos;
-- SELECT * FROM Ventas;
CALL sp_ventas(1, null, 3, 5, 0,  getCosto(5))

-- SP PROGRESO USUARIO -- 
DROP PROCEDURE IF EXISTS sp_progreso_usuario

DELIMITER // 
CREATE PROCEDURE sp_progreso_usuario(
	pOpc 			INT, 
    pid_progreso 	INT,
    pid_usuario		INT,
    pid_curso_nivel INT,
    pfecha_visto	DATETIME
)
BEGIN 
	IF pOpc = 1 THEN #Insertar datos
		INSERT INTO Progreso_usuario_curso(id_usuario, id_curso_nivel, fecha_visto)
        VALUES(pid_usuario, pid_curso_nivel, NOW());
    END IF;
    
    #Progreso de un usuario 
	IF pOpc = 2 THEN 
		SELECT id_progreso, id_usuario, id_curso_nivel, fecha_visto
        FROM Progreso_usuario_curso
        WHERE id_progreso = pid_progreso
        AND	id_usuario = pid_usuario;
    END IF;
    #Progreso por curso_nivel ?
END//

DELIMITER ;


-- INTENTO DE VISTAS -- -- EN ESTAS SE PUEDEN HACER LOS JOINS PARA TRAER LOS DATOS De los cursos mejores calificados, recientes y eso-- 

-- [Vista para traer todos los datos de los usuarios] 
DROP VIEW IF exists view_prueba;
CREATE VIEW view_prueba AS 
SELECT Id_usuario, Nombrecomp, Username, Correo, Pass, Imagen, Rol, Fecha
FROM Usuarios;

SELECT * FROM view_prueba;

-- [Vista traer calificacion] -- HOME
DROP VIEW IF EXISTS vCursos_promedio; 
CREATE VIEW vCursos_promedio AS 
SELECT  c.id_curso, c.id_usuario, c.titulo, costo, c.imagen, c.descripcion, c.descripcion_corta, c.fecha_mod, c.curso_activo, AVG(co.calificacion) as calificacion
FROM Cursos c
INNER JOIN Comentarios co
ON c.id_curso = co.id_curso
group by c.id_curso;

select * FROM vCursos_promedio;

-- [Vista cursos mejor calificados] -- HOME
DROP VIEW IF EXISTS vCursos_best;
CREATE VIEW vCursos_best AS
SELECT id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo, calificacion
FROM vCursos_promedio
WHERE calificacion >= 60;

-- Vista Cursos Categorias -- 

-- [Vista cursos mas actuales] --  HOME
DROP VIEW IF EXISTS vCursos_Actuales;
CREATE VIEW vCursos_Actuales AS
SELECT  id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo
FROM Cursos
WHERE fecha_mod = date(now());

SELECT * FROM vCursos_Actuales;

-- [Vista traer cursos activos] --  HOME
DROP VIEW IF EXISTS vCursos_activos;

CREATE VIEW vCursos_activos AS
SELECT  id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo
FROM 	Cursos
WHERE 	curso_activo = 1; 

SELECT * FROM vCursos_activos;

-- [Vista Ventas curso] id del ultimo usuario que compro el curso HOME
DROP VIEW IF EXISTS vCursos_vendidos;

CREATE VIEW vCursos_vendidos AS
SELECT  c.id_curso, c.id_usuario, c.titulo, c.costo, c.imagen, c.descripcion, c.descripcion_corta, c.fecha_mod, c.curso_activo, SUM(v.total_ventas) as Total
FROM 	Cursos c
INNER JOIN Ventas v
WHERE c.id_curso = v.id_curso
group by c.id_curso;

SELECT * FROM Cursos;
-- SELECT * FROM vCursos_vendidos;

-- [Vista Cursos Mas Vendidos] HOME
DROP VIEW IF EXISTS vCursos_best_vendidos;

CREATE VIEW vCursos_best_vendidos AS
SELECT id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo, Total
FROM vCursos_vendidos
WHERE Total >= 500; 

-- SELECT * FROM vCursos_best_vendidos;

-- INTENTO DE FUNCIONES -- -- Total de cursos que tiene puede ser una -- 

-- [Funcion para obtener id usuario]
DROP FUNCTION IF EXISTS getID;
DELIMITER //
CREATE FUNCTION getID(
	pNombre VARCHAR(30)
)
RETURNS INT 
READS SQL DATA
BEGIN 
	declare TotalAlumnos int;
    
    SELECT Id_usuario INTO TotalAlumnos
    FROM Usuarios u
    WHERE u.Username = pNombre;
    
    return TotalAlumnos;
END //

DELIMITER ; 

SELECT getID('Itzel009');

-- [Funcion para obtener costo de curso] 
DROP FUNCTION IF EXISTS getCosto; 
DELIMITER // 
CREATE FUNCTION getCosto(
	pId_curso 	INT
)
RETURNS FLOAT
READS SQL DATA
BEGIN 
	DECLARE RCosto	FLOAT; 
    
    SELECT costo INTO RCosto
    FROM Cursos c
    WHERE c.id_curso = pId_curso;
    
    return RCosto;

END //

DELIMITER ; 

-- SELECT getCosto(3);

-- [Funcion total de ventas de todos mis cursos] -- 
DROP FUNCTION IF EXISTS getVentasCursos;

DELIMITER //
CREATE FUNCTION getVentasCursos(
	pId_usuario INT
)
RETURNS FLOAT 
READS SQL DATA
BEGIN 
	DECLARE TotalVentas FLOAT; 
    SELECT SUM(v.total_ventas) INTO TotalVentas
    FROM Ventas v 
    INNER JOIN Cursos c
    WHERE v.id_curso = c.id_curso
    AND   c.id_usuario = pId_usuario;
    
    return TotalVentas;
END //
DELIMITER ; 
-- SELECT * FROM Cursos;
-- SELECT * FROM Ventas;
-- SELECT getVentasCursos(2);


-- Funcion para traer id del curso mediante el nombre? --





-- Triggers Es como validacion que despues de ejecutar algo--

-- Para cuando completo un curso 
-- Para saber si un correo ya existe ? 
-- Mas vendidos 


-- INSERTS USUARIOS------------
SELECT Id_usuario, Username,Correo, Pass, Imagen, Rol, Fecha FROM Usuarios WHERE id_usuario = 2 AND pass != 'lalsdlasd'; 

-- select * from Usuarios;
-- INSERTAR
CALL spUsuarios(1, null, 'Fernando De Luna', 'Fercho001', 'prueba@gmail.com', 'Fer1234%', null, 1,NULL );
CALL spUsuarios(1, null, 'Itzel Yaressi', 'Itzel007', 'Itzel@gmail.com', 'Itzel1234%', null, 1,'2021-03-26' );
CALL spUsuarios(1, null, 'Itzel Yaressi', 'Itzel009', 'Itzel@gm.com', 'Itzel1234%', null, 1,'2021-03-26' );

-- LOGIN
CALL spUsuarios (6, null, null, null, 'prueba@gmail.com', 'Fer1234%', null, null, null);

-- Update datos
CALL spUsuarios (2, 2, 'Itzel Tiznao', 'Itzel008', 'Itzel@gmail.com', null, null, 1, '2021-03-26');

-- Pruebas varias
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
CALL spUsuarios (5, null,null, null, null, null, null, null, null);

-- CAMBIAR SOLO CONTRASEÑA 
CALL spUsuarios (7, 4, null, null, 'LOLOSUPERDUPERCUL', null, null, null); -- CAMBIAR CONTRASEÑA DE LOLO PERO NO SE MUESTRA 

CALL spUsuarios (7, 2,NULL ,NULL, 'HI', NULL, NULL, NULL); -- MISMA CONTRASEÑA PARA VER QUE NO PASE NADA 
CALL spUsuarios (8, 2,NULL ,NULL, 'HO', NULL, NULL, NULL); -- DEVUELVE 1 SI LA CONTRASEÑA ES LA MISMA Y UN CERO SI NO ES LA MISMA

SELECT * FROM Usuarios;


