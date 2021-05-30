<?php 
// Se supone que esto te debe de traer los mensajes del usuario emisor osea tu
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection(); 

$mensaje = $_POST["textMensaje"];
$id_emisor = $_POST["idEmisor"];
$id_receptor = $_POST["idReceptor"];
// Mensajes carga
$query2 = "CALL sp_mensajes(1, null, $id_emisor, $id_receptor, '$mensaje', null);";
$result2 = $newConn->ExecuteQuery($query2);

echo $mensaje ;


?>