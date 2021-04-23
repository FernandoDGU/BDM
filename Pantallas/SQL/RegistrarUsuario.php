<?php

require("classConnection.php");

$newConn = new ConnectionMySQL();

$newConn->CreateConnection();

// username, correo, pass, imagen, rol, fecha
$username = $_POST['uNombreCompleto'];
$correo = $_POST['correo'];
$pass = $_POST['contrasena'];
$imagen = $_POST['fileupload'];
// $rol = $_POST[];

$query = "CALL spUsuarios (1, null,'$username' ,'$correo', '$pass', '$imagen', 1, '1998-06-15');";
$result = $newConn->ExecuteQuery($query);

if(!$result){
    echo "No se ha podido realizar la consulta";
}else{
    header("Location: ../index.php ");
}
//
$newConn->CloseConnection();
?>