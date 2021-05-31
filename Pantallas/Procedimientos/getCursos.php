<?php 

// Traer los cursos actuales
session_start();
error_reporting(E_ERROR | E_PARSE);
require("./Connection_db/classConecction.php");
$newConn2 = new ConnectionMySQL();
$newConn2->CreateConnection(); 
$userId = $_SESSION['idUser'];

// Lista de usuarios
$query = "select * from vCursos_Actuales;";
$result = $newConn2->ExecuteQuery($query);
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
$newConn2->CloseConnection();
?>