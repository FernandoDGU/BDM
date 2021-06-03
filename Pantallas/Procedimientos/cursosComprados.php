<?php 
session_start();
error_reporting(E_ERROR | E_PARSE);
require("./Connection_db/classConecction.php");
$newConn2 = new ConnectionMySQL();
$newConn2->CreateConnection(); 
$userId = $_SESSION['idUser'];


$query = "CALL sp_cursos(6, null, $userId,  null, null, null, null, null, null, null);";
$result = $newConn2->ExecuteQuery($query);

$rowCursosC = mysqli_fetch_all($result, MYSQLI_ASSOC);
$newConn2->CloseConnection();
?>