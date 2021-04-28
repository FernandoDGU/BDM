<?php
session_start();
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
    //Para traer los datos, creo no esta bien realizado pero jala
    $query2 = "CALL spUsuarios (6, null, null, null,'$correo', '$pass', null, null, null);";    
    $result2 = $newConn->ExecuteQuery($query2);
    $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    if($row == NULL){
        echo "No hay registros";
    }else{
        if(count($row) != 0){
            foreach ($row as $key => $value) {
                $arreglo[] = $value;
                // echo "$value<br />";
                // echo "$key=$value<br />";
               }
        }
    
        $_SESSION['idUser'] = $arreglo[0];
        $_SESSION['nombrecomp'] = $arreglo[1];
        $_SESSION['username'] = $arreglo[2];
        $_SESSION['correo'] = $arreglo[3];
    }
    header("Location: ../index.php");

}









?>