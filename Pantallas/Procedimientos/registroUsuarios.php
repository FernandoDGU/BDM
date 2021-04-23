<?php

require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();

$newConn->CreateConnection();

$nombreCom = $_POST["nombreRegistro"];
$username = $_POST["usernameRegistro"];
$correo = $_POST["correoRegistro"];
$pass = $_POST["passwordRegistro"];
$imagen = $_POST["imagenRegistro"];

$query = "CALL spUsuarios (1, null,'$nombreCom' ,'$username', '$correo', '$pass', '$imagen', 1,'1998-06-15');";
$result = $newConn->ExecuteQuery($query);

if(!$result){
    echo "No se ha podido realizar la consulta";
}else{
    header("Location: ../index.php");
}

?>