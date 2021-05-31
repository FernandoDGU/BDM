<?php 
session_start();
error_reporting(E_ERROR | E_PARSE);
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$correo = $_POST["miCuentaCorreo"];
$password = $_POST["pswdActual"];
$newpassword = $_POST["pwdNueva"];
$idUser = $_SESSION["idUser"];

$query = "CALL spUsuarios (6, null, null, null,'$correo', '$password', null, null, null);";
$result = $newConn->ExecuteQuery($query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

// Rows es por renglones 8 son
if($row == NULL){
    echo "1";
    // Si la contraseña actual no es correcta
}else{
    // If para las contraseñas iguales
    if($newpassword == $password){
        echo "2";
    }else{
        // Cambio de contraseña
        $newConn2 = new ConnectionMySQL();
        $newConn2->CreateConnection();
        $query2 = "CALL spUsuarios (7, $idUser, null, null,null,'$newpassword', null, null, null);";
        $result = $newConn2->ExecuteQuery($query2);
        if($result){
            echo "Contraseña cambiada con exito";
        }
        

    }
}

?>