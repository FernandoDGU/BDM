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
$newConn2->CreateConnection(); 
$query2 = "select * from vCursos_best;";
$result2 = $newConn2->ExecuteQuery($query2);
$rowCurBest = mysqli_fetch_all($result2, MYSQLI_ASSOC);
$newConn2->CreateConnection(); 
$query3 = "select * from vCursos_best_vendidos;";
$result3 = $newConn2->ExecuteQuery($query3);
$rowCurVend = mysqli_fetch_all($result3, MYSQLI_ASSOC);
$newConn2->CloseConnection();
?>