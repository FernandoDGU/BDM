<?php 
session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

// tituloCurso, descripcionCorta, Precio, descripcionLarga,idusario
$tituloCurso = $_POST["tituloCurso"];
$desCorta = $_POST["descripcionCorta"];
$descLarga = $_POST["descripcionLarga"];
$precio = $_POST["Precio"];
$idUsuario = $_POST["idusario"];
$image = $_FILES['fileupload']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));

$query = "CALL sp_cursos (1, 'null', '$idUsuario', '$tituloCurso', '$precio',
 '$imagen', '$imgContent', '$descLarga', '$desCorta', 0, 1);";
$result = $newConn->ExecuteQuery($query);



?> 