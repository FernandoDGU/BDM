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
$query = "CALL sp_cursos(7, null, $userId,  null, null, null, null, null, null, null);";
$result = $newConn2->ExecuteQuery($query);
//echo $userId;
$rowCursosCreados = mysqli_fetch_all($result, MYSQLI_ASSOC);

$newConn2->CreateConnection(); 
$query2 = "CALL sp_cursos(9, null, $userId,  null, null, null, null, null, null, null);";
$result2 = $newConn2->ExecuteQuery($query2);
//echo $userId;
//$conteoCursos = mysqli_fetch_all($result2, MYSQLI_ASSOC);

while ($conteoCursos = mysqli_fetch_assoc($result2)) {
            $arrayDatosc[] = $conteoCursos;
        }
$conteo = $arrayDatosc[0]['conteo'];

$newConn2->CreateConnection(); 
$query3 = "CALL sp_cursos(8, null, $userId,  null, null, null, null, null, null, null);";
$result3 = $newConn2->ExecuteQuery($query3);
//echo $userId;
$rowCursosTotal = mysqli_fetch_all($result3, MYSQLI_ASSOC);
$newConn2->CloseConnection();
?>