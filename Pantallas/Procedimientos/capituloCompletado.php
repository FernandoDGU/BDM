<?php 
// Insertar los capitulos que ya vistes
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$id_usuario = $_POST['idAlumno'];
$id_curso_nivel = $_POST['idCapitulo'];
$id_curso = $_POST['idCurso'];


$query2 = "CALL sp_progreso_usuario(1, null,$id_usuario, $id_curso_nivel, $id_curso, null);";
$result2 = $newConn->ExecuteQuery($query2);

if($result2){
    echo "Capitulo visto";
}else{
    echo "No jala";
}
?>