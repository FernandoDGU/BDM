<?php
require("classConnection.php");

$newConn = new ConnectionMySQL();

$newConn->CreateConnection();

// username, correo, pass, imagen, rol, fecha
$pcorreo = $_POST['correo'];
$ppass = $_POST['contrasena'];
// $rol = $_POST[];

$query = "CALL spUsuarios (6, null, '$pcorreo', null, '$ppass', null, null, null);";
$result = $newConn->ExecuteQuery($query);

if(!$result){
    echo "No se ha podido realizar la consulta";
}else{
    // if($result == " "){
    //     header("Location: ../Registro.php ");    
    // }else{
    //     header("Location: ../index.php ");
    // }
    echo "$result";
}

$newConn->CloseConnection();

?>