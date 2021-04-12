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

CREATE TABLE IF NOT EXISTS Usuarios
(
	id_usuario 		INT 			AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username		VARCHAR(30)		NOT NULL,
    correo			VARCHAR(30)		NOT NULL,
    pass			VARCHAR(25)		NOT NULL,	
	imagen			MEDIUMBLOB		NULL,
    rol				BIT 			NOT NULL,
    fecha			DATETIME		NULL
);

CREATE TABLE IF NOT EXISTS Cursos
(
	id_curso			INT 		 	AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_usuario			INT 		 	NOT NULL,
    titulo				VARCHAR(100)  	NOT NULL,
    costo				FLOAT 		 	NULL,
    imagen				MEDIUMBLOB	 	NULL,
    descripcion 		VARCHAR(250) 	NULL,
    descripcion_corta	VARCHAR(60) 	NULL,
    fecha_mod			DATETIME		NULL,
	curso_activo		BIT,

     FOREIGN KEY 	(id_usuario) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS Categorias
(
	id_categoria		INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    descripcion			VARCHAR(250) NULL,
    nombre 				VARCHAR(80) NULL
);

CREATE TABLE IF NOT EXISTS Curso_Categoria
(
	id_curso_catg		INT 	AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_curso			INT 	NOT NULL,
    id_categoria		INT 	NOT NULL,
    
    FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso),
    FOREIGN KEY (id_categoria) REFERENCES Categorias(id_categoria)
);

CREATE TABLE IF NOT EXISTS Mensajes
(
	id_mensaje		INT 		AUTO_INCREMENT PRIMARY KEY NOT NULL,
    emisor			INT 		NOT NULL,
    receptor		INT 		NOT NULL, 
    mensaje			VARCHAR(250) NOT NULL,
    fecha_mensaje	DATETIME	NULL, 
    
    FOREIGN KEY (emisor) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY (receptor) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS Comentarios
(
	id_comentario 	INT 		AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_usuario 		INT 		NOT NULL, 
    id_curso		INT 		NOT NULL,
    comentario		VARCHAR(200) NULL,
    calificacion	FLOAT		NOT NULL,
    fecha_com		DATETIME 	NULL,

	 FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
     FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE IF NOT EXISTS Multimedia
(
	id_multimedia		INT 			AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_curso			INT 			NOT NULL,
    nombre_archivo		VARCHAR(100)	NOT NULL,
    tipo_archivo		VARCHAR(30) 	NOT NULL,
    direccion_archivo	VARCHAR(200) 	NOT NULL,
    
     FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE IF NOT EXISTS Curso_Niveles 
(
	id_curso_nivel	INT				AUTO_INCREMENT	PRIMARY KEY NOT NULL,
    id_curso		INT 			NOT NULL,
    no_nivel		INT 			NOT NULL,
    costo			FLOAT 			NOT NULL,
    titulo			VARCHAR(100) 	NULL,
    descripcion		VARCHAR(250) 	NULL,
    video			VARCHAR(250)	NULL,
    
	FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE IF NOT EXISTS Ventas 
(
	id_venta 		INT 		AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_usuario		INT 		NOT NULL,
    id_curso		INT 		NOT NULL,
    fecha_compra	DATETIME 	NOT NULL,
    total_ventas	FLOAT		NULL,
    
	FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
	FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE IF NOT EXISTS Progreso_usuario_curso
(
	id_progreso			INT 	AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_usuario			INT 	NOT NULL,
    id_curso_nivel 		INT 	NOT NULL, 
    fecha_visto			DATETIME NULL,
    
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario), 
    FOREIGN KEY (id_curso_nivel) REFERENCES Curso_Niveles(id_curso_nivel)
);


