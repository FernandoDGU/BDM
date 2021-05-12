<?php
    require("./Connection_db/classConecction.php");
    $newConn = new ConnectionMySQL();
    $newConn->CreateConnection();

$query = "CALL sp_categorias (2, null, null, null);";
$result = $newConn->ExecuteQuery($query);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}

