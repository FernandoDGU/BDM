<?php
error_reporting(E_ERROR | E_PARSE);
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$id_profesor = $_POST['IdProfesor'];
$id_alumno = $_POST['IdAlumno'];
$name_curso = $_POST['nombreCurso'];

// Saber si tiene mensajes contigo
$query2 = "CALL sp_mensajes(4, null, $id_profesor , $id_alumno, null, null);";
$result2 = $newConn->ExecuteQuery($query2);
$row = mysqli_fetch_array($result2,MYSQLI_ASSOC);

// $rowusermessage = mysqli_fetch_all($result2, MYSQLI_ASSOC);  

if($row == null){
    $newConn2 = new ConnectionMySQL();
    $newConn2->CreateConnection();
    $query = "CALL sp_mensajes(1, null, $id_profesor, $id_alumno, 'Hola! Se Bienvenido al curso,
    Deseo que este curso sea todo lo que esperas y mucho más.', null);";
    $result = $newConn2->ExecuteQuery($query);

    // echo $result;
}else{
    echo "Redireccionando";
}
?>