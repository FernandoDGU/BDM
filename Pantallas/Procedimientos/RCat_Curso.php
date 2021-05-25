<?php 
// Registrar las categorias al curso
session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$data = json_decode(stripslashes($_POST['data']));

//$lastid = "Select id_curso from Cursos where id_curso = (SELECT LAST_INSERT_ID())";
$lastid = "SELECT LAST_INSERT_ID(), titulo FROM Cursos;";
$resultLast = $newConn->ExecuteQuery($lastid);
$row = mysqli_fetch_row($resultLast);

    if($row == NULL){
        echo "No hay registros";
    }else{
        if(count($row) != 0){
            foreach ($row as $key => $value) {
                //$arreglo[] = $value;
                echo $value;
                //echo "$key=$value<br />";
               }
        }
    }


foreach($data as $d){
    //echo $d;
    //$idcateg = "CALL sp_categorias (5, null, null ,'$d');";
    //$resultidcateg = $newConn->ExecuteQuery($idcateg);

    //$query = "CALL sp_curso_categoria (1, null, '$resultLast' ,'$resultidcateg');";
    //$result = $newConn->ExecuteQuery($query);;
    //echo "<h1>" + $d + "</h1>";
}
?>