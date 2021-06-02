<?php 
session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$id_capitulo = $_POST["idNivel"];

$file = $_FILES['archivo'];

    $nombre_archivo = $file['name'];
    $rutaTemporal = $file['tmp_name'];
    $tipo = $file['type'];
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

$path = dirname(__FILE__, 2) . '\\archivos';
// . '\c' . $id_curso . '\n' . $titulo;

if (!is_dir($path)) {
    mkdir($path, 0777, true);
}

$nombre_archivo = str_replace(" " , "" , $nombre_archivo);
$nombre_archivo = $id_capitulo .'_archivo_' . $nombre_archivo;
$filePath = $path . "\\" . $nombre_archivo;
$filePath2 = str_replace("\\" , "\\\\" , $filePath);
$filePath3 = str_replace(" " , "" , $filePath2);

// echo $id_capitulo; echo $nombre_archivo; echo $tipo; echo $extension; echo $extension; echo $filePath3;

$query = "CALL sp_multimedia (1, null, $id_capitulo , '$nombre_archivo', '$tipo', '$extension', '$filePath3');";
$result = $newConn->ExecuteQuery($query);
// $result = true;

if($result){
    if (!move_uploaded_file($rutaTemporal, $filePath)) {
        return false;
    }
}

// if($result){
//     echo "Si jala";
// }else{
//     echo "No jala";
// }

?>