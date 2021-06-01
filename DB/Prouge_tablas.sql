-- CREATE DATABASE Prouge;

USE Prouge;

DROP TABLE IF EXISTS Progreso_usuario_curso;
DROP TABLE IF EXISTS Ventas;
DROP TABLE IF EXISTS Curso_Niveles;
DROP TABLE IF EXISTS Multimedia;
DROP TABLE IF EXISTS Comentarios;
DROP TABLE IF EXISTS Mensajes;
DROP TABLE IF EXISTS Curso_Categoria;
DROP TABLE IF EXISTS Cursos;
DROP TABLE IF EXISTS Categorias;
DROP TABLE IF EXISTS Usuarios;

-- DESCRIBE Usuarios;

-- select * from Mensajes;
-- select * from Usuarios;
-- select * from Comentarios;
-- select * from ;
CREATE TABLE IF NOT EXISTS Usuarios
(
	id_usuario 		INT 			AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador del usuario', 
    nombrecomp		VARCHAR(100)	NOT NULL COMMENT 'Nombre del usuario',
    username		VARCHAR(30)		NOT NULL COMMENT 'Nickname del usuario',
    correo			VARCHAR(30)		NOT NULL COMMENT 'Correo del usuario',
    pass			VARCHAR(25)		NOT NULL COMMENT 'Contraseña del usuario',	
	imagen			MEDIUMBLOB		NULL COMMENT 'Imagen de perfil',
    rol				BIT 			NOT NULL COMMENT 'Rol 0.Escuela, 1. Alumno',
    fecha			DATE		NULL COMMENT 'Fecha en la que se registro o actualizo datos'
);

CREATE TABLE IF NOT EXISTS Cursos
(
	id_curso			INT 		 	AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador para los cursos',
    id_usuario			INT 		 	NOT NULL COMMENT 'Identificador usuario tipo escuela',
    titulo				VARCHAR(100)  	NOT NULL COMMENT 'Titulo del curso',
    costo				FLOAT 		 	NULL COMMENT 'Costo del curso',
    imagen				MEDIUMBLOB	 	NULL COMMENT 'Imagen del curso',
    descripcion 		VARCHAR(250) 	NULL COMMENT 'Descripción del curso',
    descripcion_corta	VARCHAR(60) 	NULL COMMENT 'Descripción corta del curso',
    fecha_mod			DATE			NULL COMMENT 'Fecha en la que se dio de alta o se actualizo ',
	curso_activo		BIT COMMENT 'Curso activo 0. no esta activo, 1. esta activo',

     FOREIGN KEY 	(id_usuario) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS Categorias
(
	id_categoria		INT AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador de la categoria',
    descripcion			VARCHAR(250) NULL COMMENT 'Descripción categoria',
    nombre 				VARCHAR(80) NULL COMMENT 'Nombre de categoria'
);

CREATE TABLE IF NOT EXISTS Curso_Categoria
(
	id_curso_catg		INT 	AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador del curso categoria',
    id_curso			INT 	NOT NULL COMMENT 'Identificador del curso',
    id_categoria		INT 	NOT NULL COMMENT 'Identificador de la categoria',
    
    FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso),
    FOREIGN KEY (id_categoria) REFERENCES Categorias(id_categoria)
);

CREATE TABLE IF NOT EXISTS Mensajes
(
	id_mensaje		INT 		AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador del mensaje',
    emisor			INT 		NOT NULL COMMENT 'Identificador del usuario emisor',
    receptor		INT 		NOT NULL COMMENT 'Identificador del usuaruo receptor', 
    mensaje			VARCHAR(250) NOT NULL COMMENT 'Contenido del mensaje',
    fecha_mensaje	DATETIME	NULL COMMENT 'Fecha en la que se mando el mensaje', 
    
    FOREIGN KEY (emisor) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY (receptor) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS Comentarios
(
	id_comentario 	INT 		AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador del comentario',
    id_usuario 		INT 		NOT NULL COMMENT 'Usuario que hizo el comentario', 
    id_curso		INT 		NOT NULL COMMENT 'Curso en donde se hizo el comentario',
    comentario		VARCHAR(200) NULL COMMENT 'Contenido del comentario',
    calificacion	FLOAT		NOT NULL COMMENT 'Califiacion del curso 0-Negativo , 1-Positivo',
    fecha_com		DATETIME 	NULL COMMENT 'Fecha en la que se publico el comentario',

	 FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
     FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE IF NOT EXISTS Multimedia
(
	id_multimedia		INT 			AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador multimedia',
    id_curso_nivel		INT 			NOT NULL COMMENT 'Curso al que pertenece la multimedia', -- Cambiar por nivel/curso
    nombre_archivo		VARCHAR(100)	NOT NULL COMMENT 'Nombre del archivo',
    tipo_archivo		VARCHAR(30) 	NOT NULL COMMENT 'Tipo de archivo (imagen, pdf)',
    extension			VARCHAR(25)		NOT NULL COMMENT 'Extension del archivo',
    direccion_archivo	VARCHAR(200) 	NOT NULL COMMENT 'Ruta en donde se encuentra el archivo', -- ruta
    
     FOREIGN KEY (id_curso_nivel) REFERENCES Curso_Niveles(id_curso_nivel)
);

CREATE TABLE IF NOT EXISTS Curso_Niveles 
(
	id_curso_nivel	INT				AUTO_INCREMENT	PRIMARY KEY NOT NULL COMMENT 'Identificador curso nivel',
    id_curso		INT 			NOT NULL COMMENT 'Identificador del curso',
    no_nivel		INT 			NOT NULL COMMENT 'Numero de nivel del curso',
    costo			FLOAT 			NOT NULL COMMENT 'Costo del nivel',
    titulo			VARCHAR(100) 	NULL COMMENT 'Titulo del nivel',
    descripcion		VARCHAR(250) 	NULL COMMENT 'Descripción del nivel',
    video			VARCHAR(250)	NULL COMMENT 'Ruta del video', -- Tal vez quitar y dejarlo en multimedia
    
	FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE IF NOT EXISTS Ventas 
(
	id_venta 		INT 		AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador de la venta',
    id_usuario		INT 		NOT NULL COMMENT 'Identificador del usuario que hizo la compra',
    id_curso		INT 		NOT NULL COMMENT 'Identificador curso que se vendio ',
    fecha_compra	DATETIME 	NOT NULL COMMENT 'Fecha de compra',
    total_ventas	FLOAT		NULL COMMENT 'Ganancia de la venta',
    
	FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
	FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE IF NOT EXISTS Progreso_usuario_curso
(
	id_progreso			INT 	AUTO_INCREMENT PRIMARY KEY NOT NULL COMMENT 'Identificador del progreso',
    id_usuario			INT 	NOT NULL COMMENT 'Identificador del usuario',
    id_curso_nivel 		INT 	NOT NULL COMMENT 'Identificador del curso nivel', 
    fecha_visto			DATETIME NULL COMMENT 'Fecha en la que vio el capitulo o nivel',
    
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario) , 
    FOREIGN KEY (id_curso_nivel) REFERENCES Curso_Niveles(id_curso_nivel)
);


-- DATA DICTIONARY --
USE Prouge;
SELECT t.table_name, c.column_name, c.column_type, c.column_default, c.column_key, c.is_nullable, c.column_comment
FROM information_schema.tables as t
INNER JOIN information_schema.columns as c
ON t.table_name = c.table_name
AND t.table_schema = c.table_schema
WHERE t.table_type IN ('BASE TABLE')
AND t.table_schema = 'Prouge'
ORDER BY t.table_name, c.column_name, c.ordinal_position;


