<?php 
session_start();
// require("../Connection_db/classConecction.php");

// $newConn = new ConnectionMySQL();
// $newConn->CreateConnection();
$categoriaNomSelect = $_POST["Seleccionado"];
echo "<li class='itemCategoria'>
    <a class='EliminarCategoria' onclick = 'EliminarCategoria(this)'> x </a> 
    <h6>" .$categoriaNomSelect . "</h6>
    </li>";
//Validacion que no se repita el mismo nombre
?>