<?php 

// Con este se trae la lista de usuarios con los que tienes mensajes
session_start();
error_reporting(E_ERROR | E_PARSE);
require("./Connection_db/classConecction.php");
$newConn2 = new ConnectionMySQL();
$newConn2->CreateConnection(); 
$userId = $_SESSION['idUser'];
// Obtener el id del usuario registrado que obviamente es el emisor, es decir el que manda mensajes
// $id_emisor = $_SESSION['idUser'];

// Lista de usuarios
$query = "CALL sp_cursos(6, null, $userId,  null, null, null, null, null, null, null);";
$result = $newConn2->ExecuteQuery($query);
//echo $userId;
$rowCursosC = mysqli_fetch_all($result, MYSQLI_ASSOC);






$newConn2->CloseConnection();
?>