<?php

session_start();
error_reporting(E_ERROR | E_PARSE);
require("../Connection_db/classConecction.php");
//require("../Procedimientos/login.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$nombre = $_POST["miCuentaNombre"];
$username1 = $_POST["miCuentaUser"];
$correo1 = $_SESSION['correo'];
$idUpdate = $_SESSION["idUser"];
$fotoActual =  $_SESSION["foto"];
$image = $_FILES['imagenUpdate']['tmp_name'];

if ($image == null) {    
    $query = "CALL spUsuarios (10, $idUpdate, '$nombre', '$username1', '$correo1', null, null, 1, '2021-03-26');";
    $result = $newConn->ExecuteQuery($query);
} else {
    $imgContent = addslashes(file_get_contents($image));
    $query = "CALL spUsuarios (2, $idUpdate, '$nombre', '$username1', '$correo1', null, '$imgContent', 1, '2021-03-26');";
    $result = $newConn->ExecuteQuery($query);
    $query2 = "CALL spUsuarios (9, $idUpdate, null, null, null, null, null, null, null);";
    $result2 = $newConn->ExecuteQuery($query2);
    $row2 = mysqli_fetch_row($result2);
    $_SESSION["foto"] = $row2[0];
}

if ($result) {
    $_SESSION["nombrecomp"] = $nombre;
    $_SESSION["username"] = $username1;
} else {
    echo "No se han podido actualizar los datos";
}
?>