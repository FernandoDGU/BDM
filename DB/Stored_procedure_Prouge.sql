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
    
     IF pOpc = 9 THEN #Traer imagen de perfil
		SELECT Imagen
        FROM Usuarios
        WHERE id_usuario = pIdUser;
    END IF;
      IF pOpc = 10 THEN 
		-- REPLACE Usuarios sin imagen VALUES(pIdUser, pUsername, pCorreo, pPass, pImg, pROL, pFecha);
        UPDATE Usuarios
        SET nombrecomp = pNombreCom,
			username = pUsername, 
            rol = pRol,
            fecha = Now()
		WHERE id_usuario = pIdUser and correo = pCorreo;
	END IF;
    
END //

DELIMITER ; 
-- CALL spUsuarios (6, null, 3, null,' ', ' ', null, null, null);
-- CALL spUsuarios (7, 2, null, null,null,'Villa1234567(', null, null, null);
-- CALL spUsuarios (4, 2, null, null,null,null, null, null, null);
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
        SELECT LAST_INSERT_ID() as idCategoria;
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
    
	IF pOpc = 4 THEN #TRAER UNA CATEGORIA
		SELECT nombre
        FROM Categorias;
    END IF;
	
    IF pOpc = 5 THEN #TRAER UNA CATEGORIA
		SELECT id_categoria
        FROM Categorias
        WHERE nombre = pNom;
    END IF;
  
END //
DELIMITER ; 
-- Select * from categorias;
-- CALL sp_categorias (1,null ,"Itzel","Una crack");
-- CALL sp_categorias (2,null ,null,null);
-- CALL sp_categorias (3,2 ,null,null);
-- CALL sp_categorias (4,null ,null,null);
-- CALL sp_categorias (5,null ,null,'A');

-- SP CURSOS -- 
-- call sp_cursos(6, null, 3,  null, null, null, null, null, null, null);
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
			SELECT LAST_INSERT_ID() as idCurso;
       END IF;
        
        IF pOpc = 2 THEN #TRAER TODOS LOS CURSOS
			SELECT id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo
            FROM Cursos;
        END IF; 
        
        IF pOpc = 3 THEN #Traer un curso
			SELECT id_curso, cursos.id_usuario, titulo, costo, cursos.imagen, descripcion, descripcion_corta, fecha_mod, curso_activo, usuario.nombrecomp
            FROM Cursos as cursos
            INNER JOIN usuarios as usuario
            ON cursos.id_usuario = usuario.id_usuario
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
        
        IF pOpc = 5 THEN #Last id
			SELECT id_curso 
            FROM Cursos
            WHERE id_curso =  (SELECT LAST_INSERT_ID());
        END IF; 
        
        IF pOpc = 6 THEN #Cursos comprados
			SELECT cursoComprado.id_curso, usuario.id_usuario, titulo, cursoComprado.imagen, curso_activo, usuario.nombrecomp
            FROM usuarios as usuario
            INNER JOIN ventas as venta
            ON usuario.id_usuario = venta.id_usuario
            INNER JOIN cursos as cursoComprado
            ON venta.id_curso = cursoComprado.id_curso
            WHERE usuario.id_usuario =  pId_user;
        END IF; 
        
END //

DELIMITER ;
-- Select id_curso from Cursos where id_curso = (SELECT LAST_INSERT_ID());
-- SELECT * FROM Cursos;
 -- CALL sp_cursos(3, 9, null,  null, null, null, null, null, null, null);


-- call sp_curso_categoria(5, null, 2, null);
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
    
      IF pOpc = 5 THEN #TRAER TODAS LAS CATEGORIAS DE UN CURSO
		SELECT cursoCategoria.id_categoria, categoria.nombre
        FROM Curso_Categoria as cursoCategoria
        INNER JOIN categorias as categoria
        ON cursoCategoria.id_categoria = categoria.id_categoria
        WHERE id_curso =  pId_curso;
	END IF;
END //
DELIMITER ;
-- select * from Curso_Categoria;

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
        WHERE emisor = pEmisor
        AND receptor = pReceptor;
    END IF;
    
    IF pOpc = 3 THEN #Traeme todos los usuarios a los que mande mensaje y los que me mandaron mensaje
		 SELECT  DISTINCT id_usuario, username, imagen
    FROM (
		
		-- SELECT u.id_usuario, u.username, u.imagen
        -- FROM Usuarios u
        -- INNER JOIN Mensajes m
        -- WHERE m.receptor = u.id_usuario
        -- AND m.emisor = pEmisor
        
        -- UNION ALL 
		
        SELECT u.id_usuario, u.username, u.imagen
        FROM Usuarios u
        INNER JOIN Mensajes m
        WHERE m.receptor = pEmisor
		AND m.emisor = u.id_usuario
        )Usuarios order by id_usuario;
    END IF;
    
    IF pOpc = 4 THEN  #Traeme todos los mensajes entre estos usuarios y ordenalos por tiempo 
    
    SELECT id_mensaje, emisor, receptor, mensaje, fecha_mensaje
    FROM (
    
		SELECT id_mensaje, emisor, receptor, mensaje, fecha_mensaje
        FROM Mensajes
        WHERE emisor = pEmisor
        AND receptor = pReceptor
        
        UNION ALL
        
        SELECT id_mensaje, emisor, receptor, mensaje, fecha_mensaje
        FROM Mensajes
        WHERE emisor = pReceptor
        AND receptor = pEmisor
        )Mensajes order by fecha_mensaje;
    END IF;
    
END //
DELIMITER ;
-- Emisor Receptor
-- CALL sp_mensajes(1, null, 24, 22, 'Ya te conteste', null);
-- CALL sp_mensajes(1, null, 20, 22, 'Hola como estas', null);
-- CALL sp_mensajes(2, null, 22, 20, null, null);
-- CALL sp_mensajes(2, null, 22, 24, null, null);


-- CALL sp_mensajes(3, null, 3, null, null, null);
-- CALL sp_categorias (2, null, null, null);
-- CALL sp_mensajes(4, null, 22, 20, null, null);
-- CALL sp_mensajes(4, null, 2, 3, null, null);


DROP VIEW IF EXISTS vMensajes;

CREATE VIEW vMensajes AS
SELECT  u.username, u.id_usuario
FROM 	Usuarios u
INNER JOIN Mensajes m
WHERE u.id_usuario = m.receptor
group by u.id_usuario;

-- SELECT * FROM vMensajes
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
		SELECT co.id_comentario, co.id_usuario, co.id_curso , u.username, u.imagen, co.comentario, co.calificacion, co.fecha_com
		FROM Comentarios co
        INNER JOIN Usuarios u
        WHERE id_curso = pid_curso
        AND u.id_usuario = co.id_usuario;
    END IF;
    
    IF pOpc = 3 THEN #Traer la suma de todos los likes
		SELECT co.id_curso, count(co.calificacion) as likes, co.fecha_com 
		FROM Comentarios co
        WHERE co.id_curso = pid_curso
        AND co.calificacion = 1;
    END IF;
    
    IF pOpc = 4 THEN #Traer la suma de todos los dislikes
		SELECT co.id_curso, count(co.calificacion) as dislikes, co.fecha_com 
		FROM Comentarios co
        WHERE co.id_curso = pid_curso
        AND co.calificacion = 0;
    END IF;
    
END //

DELIMITER ; 
-- select  * from Comentarios;
-- CALL sp_comentarios (1, null,3, 1, 'Que bue curso', 1, 0);
-- CALL sp_comentarios (2, null,null, 1, null, 0, 0);
-- CALL sp_comentarios (3, null,null, 9, null, 0, 0);
-- CALL sp_comentarios (4, null,null, 1, null, 0, 0);


-- select * from Multimedia;
-- Sp Multimedia -- 
DROP PROCEDURE IF EXISTS sp_multimedia;

DELIMITER //
CREATE PROCEDURE sp_multimedia(
	pOpc INT, 
    pid_multimedia 	INT, 
    pid_curso_nivel INT,
    pnombre_archivo	VARCHAR(100),
    ptipo_archivo	VARCHAR(30),
    pextencion		VARCHAR(25),
    pdireccion_archivo VARCHAR(200)
)
BEGIN 
	
    IF pOpc = 1 THEN #INSERTAR DATOS
		INSERT INTO Multimedia(id_curso_nivel, nombre_archivo, tipo_archivo, extension , direccion_archivo)
        VALUES (pid_curso_nivel, pnombre_archivo, ptipo_archivo, pextencion, pdireccion_archivo);
	END IF;
    
    IF pOpc = 2 THEN #TRAER TODA LA MULTIMEDIA POR CURSO
		SELECT id_multimedia, id_curso_nivel, nombre_archivo, tipo_archivo, extension, direccion_archivo
        FROM Multimedia
        WHERE id_multimedia = pid_multimedia
        AND id_curso_nivel = pid_curso_nivel;
    END IF; 
    
     IF pOpc = 3 THEN #TRAER TODOS LOS DATOS DE UN ARCHIVO
		SELECT id_multimedia, id_curso_nivel, nombre_archivo, tipo_archivo, extension, direccion_archivo
        FROM Multimedia
        WHERE id_multimedia = pid_multimedia;
    END IF; 
    
END //
DELIMITER ;
-- SELECT * FROM Cursos;
-- SELECT * FROM Curso_Niveles;
-- SELECT * FROM Multimedia;
-- CALL sp_multimedia (1, null, 1, 'nombrearchivo', 'tipoarchivo', 'extension', 'direccionarchivo');
-- CALL sp_multimedia (3, 6, null, 'nombrearchivo', 'tipoarchivo', 'extension', 'direccionarchivo');

-- Sp Curso_Niveles -- 
DROP PROCEDURE IF EXISTS sp_curso_niveles;

DELIMITER //
CREATE PROCEDURE sp_curso_niveles(
	pOpc 			INT,
    pid_curso_nivel INT,
    pid_curso		INT,
    pno_nivel 		INT,
    pcosto			FLOAT, -- 1 costo , 0 gratis 
    ptitulo			VARCHAR(100),
    pdescripcion	VARCHAR(250),
    pvideo			VARCHAR(250)
)
BEGIN
	 IF pOpc = 1 THEN #INSERTAR DATOS
		INSERT INTO Curso_Niveles (id_curso, no_nivel, costo, titulo, descripcion, video)
        VALUES (pid_curso,pno_nivel,pcosto, ptitulo, pdescripcion, pvideo );
		SELECT LAST_INSERT_ID() as id_curso_nivel;
	END IF;
    
    IF pOpc = 2 THEN #TRAER TODOS LOS NIVELES POR CURSO
		SELECT id_curso_nivel, id_curso, no_nivel, costo, titulo, descripcion, video
        FROM Curso_Niveles
        WHERE  id_curso = pid_curso
        order by id_curso;
    END IF;
    
    IF pOpc = 3 THEN #TRAER EL VIDEO Y TODA LA MULTIMEDIA POR NIVEL
		SELECT cn.id_curso_nivel, cn.id_curso,m.id_multimedia , cn.video, m.nombre_archivo, m.tipo_archivo, m.extension, m.direccion_archivo
        FROM Curso_Niveles cn
        INNER JOIN Multimedia m
        WHERE cn.id_curso_nivel = pid_curso_nivel
        AND  m.id_curso_nivel = pid_curso_nivel;
    END IF;
    
END //
DELIMITER ;
-- select * from  multimedia;
-- select * from  Curso_Niveles;
-- Call sp_curso_niveles(1, null, 1, 0, 300, 'Hola', 'desc', 'video/Hola/Hi');
-- Call sp_curso_niveles(2, null, 9, null, null, null, null, null);
-- Call sp_curso_niveles(3, 37, null, null, null, null, null, null);

-- SELECT * FROM Cursos;
-- SELECT * FROM Ventas;


-- call sp_ventas(1, null, 3,2,null, 13);
-- select * from ventas;
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
-- CALL sp_ventas(1, null, 2, 3, 0,  getCosto(3))
-- SELECT * FROM vCursos_best_vendidos;

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

-- SELECT * FROM view_prueba;

-- [Vista traer calificacion] -- HOME
DROP VIEW IF EXISTS vCursos_promedio; 
CREATE VIEW vCursos_promedio AS 
SELECT  c.id_curso, c.id_usuario, c.titulo, costo, c.imagen, c.descripcion, c.descripcion_corta, c.fecha_mod, c.curso_activo, AVG(co.calificacion * 10) as calificacion
FROM Cursos c
INNER JOIN Comentarios co
ON c.id_curso = co.id_curso
group by c.id_curso;




-- select * FROM vCursos_promedio;
-- Select * from Cursos;
-- Select * from Comentarios;
-- [Vista cursos mejor calificados] -- HOME Cambios para que se cuenten los likes 
DROP VIEW IF EXISTS vCursos_best;
CREATE VIEW vCursos_best AS
SELECT id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo, calificacion
FROM vCursos_promedio
order by calificacion LIMIT 10;
-- WHERE calificacion >= 7;
-- SELECT * FROM vCursos_best;

-- Vista Cursos Categorias -- 

-- [Vista cursos mas actuales] --  HOME
DROP VIEW IF EXISTS vCursos_Actuales;
CREATE VIEW vCursos_Actuales AS
SELECT  id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo
FROM Cursos
ORDER BY fecha_mod DESC LIMIT 10;

-- SELECT * FROM vCursos_Actuales;

-- [Vista traer cursos activos] --  HOME
DROP VIEW IF EXISTS vCursos_activos;

CREATE VIEW vCursos_activos AS
SELECT  id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo
FROM 	Cursos
WHERE 	curso_activo = 1; 

-- SELECT * FROM vCursos_activos;

-- [Vista Ventas curso] id del ultimo usuario que compro el curso HOME
DROP VIEW IF EXISTS vCursos_vendidos;

CREATE VIEW vCursos_vendidos AS
SELECT  c.id_curso, c.id_usuario, c.titulo, c.costo, c.imagen, c.descripcion, c.descripcion_corta, c.fecha_mod, c.curso_activo, SUM(v.total_ventas) as Total
FROM 	Cursos c
INNER JOIN Ventas v
WHERE c.id_curso = v.id_curso
group by c.id_curso;

-- SELECT * FROM Cursos;
-- SELECT * FROM vCursos_vendidos;

-- [Vista Cursos Mas Vendidos] HOME
DROP VIEW IF EXISTS vCursos_best_vendidos;

CREATE VIEW vCursos_best_vendidos AS
SELECT id_curso, id_usuario, titulo, costo, imagen, descripcion, descripcion_corta, fecha_mod, curso_activo, Total
FROM vCursos_vendidos
WHERE Total >= 500; 

-- SELECT * FROM vCursos_best_vendidos;

-- INTENTO DE FUNCIONES -- -- Total de cursos que tiene puede ser una -- 

-- [Funcion para obtener nombre y foto del usuario]
DROP FUNCTION IF EXISTS getData;
DELIMITER //
CREATE FUNCTION getData(
	pId INT
)
RETURNS VARCHAR(30) 
READS SQL DATA
BEGIN 
	declare nameAlumno VARCHAR(30);
    
    SELECT username INTO nameAlumno
    FROM Usuarios u
    WHERE u.id_usuario = pId;
    
    return nameAlumno;
END //

DELIMITER ; 
-- select getData(3);



-- SELECT getID('Itzel009');

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
-- SELECT getVentasCursos(1);

-- Funcion para traer id del curso mediante el nombre? --

-- Función para traer si existe un usuario con el mismo correo 
DROP FUNCTION IF EXISTS getCorreoRepetido;
DELIMITER //
CREATE FUNCTION getCorreoRepetido(
	pCorreoUsuario	VARCHAR(30)
)
RETURNS BOOL
READS SQL DATA
BEGIN 
	DECLARE CorreoRepit BOOL;
    SELECT 	correo INTO CorreoRepit
    FROM 	Usuarios u
    WHERE 	u.correo = pCorreoUsuario;
    
    return CorreoRepit;
END //

DELIMITER ;

-- SELECT 1 FROM Usuarios WHERE correo = 'fer_2delunaghotmail.com'
-- SELECT getCorreoRepetido('prueba@gmail.com');


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