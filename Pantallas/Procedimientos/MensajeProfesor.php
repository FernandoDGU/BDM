<?php
// Esto te trae los mensajes del usuario receptor, osea el otro
// Se supone que esto te debe de traer los mensajes del usuario receptor osea tu

// Este ya no es necesario 
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();
$id_profesor = $_POST['IdProfesor'];
$id_alumno = $_POST['IdAlumno'];
$name_curso = $_POST['nombreCurso'];

// Saber si tiene mensajes contigo
// $query2 = "CALL sp_mensajes(4, null, $id_profesor , $id_alumno, null, null);";
// $result2 = $newConn->ExecuteQuery($query2);
// $rowusermessage = mysqli_fetch_all($result2, MYSQLI_ASSOC);

// if ($rowusermessage) {
      // Mensajes carga
      $query = "CALL sp_mensajes(1, null, $id_profesor, $id_alumno, 'Hola! Se Bienvenido al curso,
      Deseo que este curso sea todo lo que esperas y mucho más.', null);";
      $result = $newConn->ExecuteQuery($query);

      echo $result;
// }else{
    // echo $rowusermessage;
// }






?>