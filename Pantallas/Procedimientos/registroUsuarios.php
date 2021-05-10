<?php
session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();

$newConn->CreateConnection();

$nombreCom = $_POST["nombreRegistro"];
$username = $_POST["usernameRegistro"];
$correo = $_POST["correoRegistro"];
$pass = $_POST["passwordRegistro"];


//Imagenes 
$imagen = $_POST["imagenRegistro"];
// $imagen = $_FILES["imagenRegistro"]["tmp_name"];
// $nombreFoto = $_FILES["imagenRegistro"]["name"];
if(isset($_POST['btn'])){
    //$imagen = addslashes(file_get_contents($_FILES['imagenRegistro']['tmp_name']));
    // $imagen = $_FILES["imagenRegistro"]["tmp_name"];
    // $nombreFoto = $_FILES["imagenRegistro"]["name"];

    // $imagen = $_FILES["imagenRegistro"]["tmp_name"];
   
    echo 'Files: ';
    print_r($_FILES);
    echo 'End Files';
}
$typeUser = $_POST["optradio"];
$type; 


if($typeUser == "Profesor"){
    $type = 0;
}else{
    $type = 1;
}

$query = "CALL spUsuarios (1, null, '$nombreCom' ,'$username', '$correo', '$pass', '$imagen', '$type','1998-06-15');";
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
                //echo "$value<br />";
                //echo "$key=$value<br />";
               }
        }
    
        $_SESSION['idUser'] = $arreglo[0];
        $_SESSION['nombrecomp'] = $arreglo[1];
        $_SESSION['username'] = $arreglo[2];
        $_SESSION['correo'] = $arreglo[3];
        $_SESSION['fecha'] = $arreglo[7];
        $_SESSION['rol'] = $arreglo[6];
        $_SESSION['foto'] = $arreglo[5];
    }
    header("Location: ../index.php");

}









?>