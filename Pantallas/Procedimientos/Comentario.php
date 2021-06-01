<?php 
// Mandar mensajes a un usuario
error_reporting(E_ERROR | E_PARSE);
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection(); 

$comentario = $_POST["comentario"];
$id_Usuario = $_POST["id_usuario"];
$id_Curso = $_POST["id_curso"];
$voto = $_POST["CheckLikes"];
$votoresult;
if($voto == true){
    $votoresult = "1";
}else{
    $votoresult = "0";
}


if($comentario == NULL){
    echo "Ingrese un comentario";
}else{
    // Mensajes carga
    // $query2 = "CALL sp_comentarios (1, null,$id_Usuario, $id_Curso, '$comentario', 1, 0);";
    $query2 = "CALL sp_comentarios (1, null,$id_Usuario, $id_Curso, '$comentario ', $votoresult, 0);";
    $result2 = $newConn->ExecuteQuery($query2);
    if($result2){
        echo "¡Comentario añadido con éxito!";
    }else{
        echo "Algo salió mal, intentalo más tarde.";
    }
}

 $newConn->CloseConnection();
?>