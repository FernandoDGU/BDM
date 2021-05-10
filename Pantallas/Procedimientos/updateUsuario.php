<?php 
session_start();

require("../Connection_db/classConecction.php");
//require("../Procedimientos/login.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$nombre = $_POST["miCuentaNombre"];
$username1 = $_POST["miCuentaUser"];
$correo1 = $_SESSION['correo'];
$idUpdate = $_SESSION["idUser"];
// $correo; 

$query = "CALL spUsuarios (2, $idUpdate, '$nombre', '$username1', '$correo1', null, null, 1, '2021-03-26');";
$result = $newConn->ExecuteQuery($query);

if(!$result){
    echo "No se han podido actualizar los datos";
}else{
    //echo "Datos actualizados";
    $_SESSION["nombrecomp"] = $nombre;
    $_SESSION['username'] = $username1;
    header("Location: ../miCuenta.php");
}




?>