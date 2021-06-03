<?php

// Con este se trae la lista de usuarios con los que tienes mensajes
session_start();
error_reporting(E_ERROR | E_PARSE);

require("../Connection_db/classConecction.php");

$conn = new ConnectionMySQL();
$conn->CreateConnection();

$userId = $_SESSION['idUser'];
$idCurso = $_POST['id_curso'];

$query = "Call sp_ventas(4, null,  null, $idCurso, null, null);";
$result = $conn->ExecuteQuery($query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// no trae nada la consulta
if ($result == NULL || count($rows) <= 0) {
    echo "";
    $conn->CloseConnection();
    exit();
}

// si trae registros creamos elemento por valor
foreach ($rows as $key => $value) {

    if ($value['titulo'] == null) {
        echo "<div class='cabeceraListaAlumnos text-center'><h4 id='tituloCurso'>No se han generado ventas</h4></div>";
        $conn->CloseConnection();
        exit();
    } else {
        echo "  <div class='cabeceraListaAlumnos'><h4 id='tituloCurso'>$value[titulo]</h4>
                <h5 id='alumnosCurso'>$value[alumnos] alumnos inscritos</h5>
                <small id='gananciasCurso'>GANANCIAS TOTALES: $ $value[totalVentas].00MX</small></div>";
    }
}
?>