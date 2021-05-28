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
$image = $_FILES['imagenUpdate']['tmp_name'];

// $correo; 
if($image == null){
    $query = "CALL spUsuarios (2, $idUpdate, '$nombre', '$username1', '$correo1', null, '$foto', 1, '2021-03-26');";
    $result = $newConn->ExecuteQuery($query);
}else{
    $imgContent = addslashes(file_get_contents($image));
    $query = "CALL spUsuarios (2, $idUpdate, '$nombre', '$username1', '$correo1', null, '$imgContent', 1, '2021-03-26');";
    $result = $newConn->ExecuteQuery($query);
}


if(!$result){
    echo "No se han podido actualizar los datos";
}else{
    //echo "Datos actualizados";
    $_SESSION["nombrecomp"] = $nombre;
    $_SESSION['username'] = $username1;
    $_SESSION['foto'] = $imgContent;
    header("Location: ../miCuenta.php");
}




?>