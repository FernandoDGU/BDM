<?php

// Con este se trae la lista de usuarios con los que tienes mensajes
session_start();
error_reporting(E_ERROR | E_PARSE);
require("../Connection_db/classConecction.php");
$newConn2 = new ConnectionMySQL();
$newConn2->CreateConnection();
$userId = $_SESSION['idUser'];
$idCurso = $_POST['id_curso'];

$queryC = "CALL sp_ventas(3, null,  null, $idCurso, null, null);";
$resultC = $newConn2->ExecuteQuery($queryC);
//$rowInfoCurso = mysqli_fetch_all($resultC, MYSQLI_ASSOC);
if ($resultC) {
    $i = 0;
    while ($rowInfoCurso = mysqli_fetch_assoc($resultC)) {
        $arrayDatosc[] = $rowInfoCurso;
        $i = 2;
    }
    $tituloCurso = $arrayDatosc[0]['titulo'];
    echo $i;
    /* if ($rowInfoCurso == NULL) {
      echo $rowInfoCurso;
      } else {
      foreach ($rowInfoCurso as $key => $value) {
      /* echo "<h4 id='tituloCurso'>$value[titulo]</h4>
      <h5 id='alumnosCurso'>$value[alumnos] alumnos inscritos</h5>
      <small id='gananciasCurso'>GANANCIAS TOTALES: $ $value[totalVentas].00MX</small>";
      echo $value['titulo'];
      }
      } */
} else {
    echo "no jalo :C";
}

//echo $userId;
/* if ($result) {
  while ($rowInfoCurso = mysqli_fetch_assoc($result)) {
  $arrayDatosc[] = $rowCursos;
  }
  } */


$newConn2->CloseConnection();
?>