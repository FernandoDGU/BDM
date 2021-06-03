<?php 
session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$categoriaNom = $_POST["categoriaNombre"];
$categoriaDesc = $_POST["categoriaDesc"];

$query = "CALL sp_categorias (1, null, '$categoriaDesc' ,'$categoriaNom');";
$result = $newConn->ExecuteQuery($query);

if ($result) {    
        $row = mysqli_fetch_row($result);   
} else {
    echo "Nada esta bien :(";
}

echo "<li id = ".$row[0]." class='itemCategoria'><h4 class='d-none invisible'>$row[0]</h4><a class='EliminarCategoria' onclick = 'EliminarCategoria(this)'> x </a> <h6>" .$categoriaNom . "</h6></li>";

?>