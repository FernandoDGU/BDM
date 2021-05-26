<?php

session_start();
require("../Connection_db/classConecction.php");

$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

// tituloCurso, descripcionCorta, Precio, descripcionLarga,idusario
$tituloCurso = $_POST["tituloCurso"];
$desCorta = $_POST["descripcionCorta"];
$descLarga = $_POST["descripcionLarga"];
$precio = $_POST["Precio"];
$idUsuario = $_POST["idusario"];
$image = $_FILES['fileupload']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));

// $query = "CALL sp_cursos (1, 'null', '$idUsuario', '$tituloCurso', '$precio',
//  '$imgContent', '$descLarga', '$desCorta', 0, 1);";
$query = "CALL sp_cursos (1, null, '$idUsuario', '$tituloCurso', '$precio', '$imgContent', '$descLarga', '$desCorta', 0, 1);";
$result = $newConn->ExecuteQuery($query);
if ($result) {
    
        mysqli_data_seek($result, 0);
        $row = mysqli_fetch_row($result);
        echo $row[0];
  
} else {
    echo "Nada esta bien :(";
}
?> 