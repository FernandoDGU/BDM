<?php 

// Traer la lista de comentarios de este curso
session_start();
error_reporting(E_ERROR | E_PARSE);
require("./Connection_db/classConecction.php");
$newConn2 = new ConnectionMySQL();
$newConn2->CreateConnection(); 
// $userId = $_SESSION['idUser'];

// Lista de comentarios
$query = " CALL sp_comentarios (2, null,null, 1, null, 0, 0);";
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