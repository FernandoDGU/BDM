<?php 
session_start();
error_reporting(E_ERROR | E_PARSE);
require("./Connection_db/classConecction.php");
$newConn2 = new ConnectionMySQL();
$newConn2->CreateConnection(); 
$userId = $_SESSION['idUser'];
// Obtener el id del usuario registrado que obviamente es el emisor, es decir el que manda mensajes
// $id_emisor = $_SESSION['idUser'];

// Lista de usuarios
$query = "CALL sp_mensajes(3, null, '$userId', null, null, null);";
$result = $newConn2->ExecuteQuery($query);
//echo $userId;
$rowuser = mysqli_fetch_all($result, MYSQLI_ASSOC);
if($rowuser == NULL){
}else{
    
    if(count($rowuser) != 0){
        foreach($rowuser as $key => $value){
            $listaUsuarios[] = $value;
             //echo $listaUsuarios;
        }
    }
    
}

?>