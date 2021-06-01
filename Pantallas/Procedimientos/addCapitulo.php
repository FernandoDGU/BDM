<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    require("../Connection_db/classConecction.php");

    $newConn = new ConnectionMySQL();
    $newConn->CreateConnection();

    $id_curso = $_SESSION["idCurso"];
    $costo = $_POST["cbPrecioCapitulo"];
    $titulo = $_POST["tituloCapitulo"];
    $descripcion = $_POST["descripcionCapitulo"];
    // $video = $_POST["customFileLang1"];

    $file = $_FILES['customFileLang1'];

        $nombre_video = $file['name'];
        $rutaTemporal = $file['tmp_name'];
        $tipo = $file['type'];
        $extension = pathinfo($nombre_video, PATHINFO_EXTENSION);

    $path = dirname(__FILE__, 2) . '\\archivos';
    // . '\c' . $id_curso . '\n' . $titulo;

    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    $filePath = $path . "\\" . $id_curso . '_' . $titulo . '_' . $nombre_video;
    $filePath2 = str_replace("\\" , "\\\\" , $filePath);
    $filePath3 = str_replace(" " , "" , $filePath2);
   

    $costovar;

    if(isset($_POST["cbPrecioCapitulo"])){
        $costovar = 0;
    }else{
        $costovar = 1;
    }
    $query = "Call sp_curso_niveles(1, null, $id_curso , 0, $costovar , '$titulo', '$descripcion', '$filePath3');";
    $result = $newConn->ExecuteQuery($query);

    if($result){
        if (!move_uploaded_file($rutaTemporal, $filePath)) {
            return false;
        }
    }
    if ($result) {
        mysqli_data_seek($result, 0);
        $row = mysqli_fetch_row($result);
        echo $row[0];

    } else {
    echo "Nada esta bien :(";
    }




    
?>