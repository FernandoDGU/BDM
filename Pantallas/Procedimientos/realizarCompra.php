<?php

session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

// tituloCurso, descripcionCorta, Precio, descripcionLarga,idusario
$id_curso = $_POST["idCurso"];
$precio = $_POST["totalPago"];
$idUsuario = $_POST["idUsuario"];

// $query = "CALL sp_cursos (1, 'null', '$idUsuario', '$tituloCurso', '$precio',
//  '$imgContent', '$descLarga', '$desCorta', 0, 1);";
$query = "CALL sp_ventas(1,null, '$idUsuario', '$id_curso',null,'$precio');";
$result = $newConn->ExecuteQuery($query);
if ($result) {
    echo "Compra realizada con éxito";
} else {
    echo "Algo salió mal, intentalo más tarde.";
}
 $newConn->CloseConnection();
?> 