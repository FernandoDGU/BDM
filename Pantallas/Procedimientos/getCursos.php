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
$rowCurRec = mysqli_fetch_all($result, MYSQLI_ASSOC);
if($rowCurRec == NULL){
}else{
    if(count($rowCurRec) != 0){
        foreach($rowCurRec as $key => $value){
            $listaUsuarios[] = $value;
             //echo $listaUsuarios;
        }
    }
    
}
$newConn2->CloseConnection();
?>