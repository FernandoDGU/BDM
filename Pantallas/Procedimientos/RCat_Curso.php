<?php

// Registrar las categorias al curso
session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$data = json_decode(stripslashes($_POST['data']));
$idCurso = $_POST["idCurso"];
$arrayLargo = $_POST["arrayLargo"];

foreach ($data as $key => $value) {
    $sql = "CALL sp_curso_categoria (1, null, '$idCurso', '$data[$key]');";
    $result = $newConn->ExecuteQuery($sql);
    echo $data[$key];
}
echo $idCurso;


/* echo $data[0];
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
  } */
?>