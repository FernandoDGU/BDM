<?php 
session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

// $categoria = $_POST["categoria"]; 
$categoriaNom = $_POST["categoriaNombre"];
$categoriaDesc = $_POST["categoriaDesc"];

echo "<li class='itemCategoria'>
    <a class='EliminarCategoria' onclick = 'EliminarCategoria(this)'> x </a> 
    <h6>" .$categoriaNom . "</h6>
    </li>";
$query = "CALL sp_categorias (1, null, '$categoriaDesc' ,'$categoriaNom');";
$result = $newConn->ExecuteQuery($query);



?>