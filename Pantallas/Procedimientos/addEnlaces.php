<?php 
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();


$id_capitulo = $_POST["idNivel"];
$url = $_POST["Url"];
$titulo = $_POST["Titulo"];

echo $id_capitulo; 
echo $url; 
echo $titulo; 

$query = "CALL sp_multimedia (1, null, $id_capitulo , '$titulo', 'link', 'https', '$url');";
$result = $newConn->ExecuteQuery($query);

if($result){
    echo "Enlace guardado con exito";
}

?>