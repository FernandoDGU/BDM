<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

require("../Connection_db/classConecction.php");

$conn = new ConnectionMySQL();
$conn->CreateConnection();

$userId = $_SESSION['idUser'];
$idCurso = $_POST['id_curso'];

$queryAlumnos = "Call sp_ventas(3, null,  null, $idCurso, null, null);";
$resultAlumnos = $conn->ExecuteQuery($queryAlumnos);
$rowsAlumnos = mysqli_fetch_all($resultAlumnos, MYSQLI_ASSOC);
foreach ($rowsAlumnos as $key => $value) {    
    $conn->CreateConnection();
    $queryP = "SELECT getProgreso($value[id_usuario], $idCurso);";
    $resultP = $conn->ExecuteQuery($queryP);
    $progreso = mysqli_fetch_row($resultP);
    echo "<li class='alumnosItem'><h6>$value[username]</h6><h5 class='d-none'>$value[id_usuario]</h5><div class='boxProgreso'>
                                                    <label class='progresoLabel'>$progreso[0]% Completado</label>
                                                </div></li>";
}


?>