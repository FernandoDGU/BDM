<?php
    session_start();
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

    $path = dirname(__FILE__, 2) . '\archivos' . '\c_' . $id_curso . '\n_' . $titulo;

    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    $filePath = $path . "\\" . $nombre_video;
    echo $filePath;

    // $costovar;

    // if($costo){
    //     $costovar = 0;
    // }else{
    //     $costovar = 1;
    // }

    // $query = " Call sp_curso_niveles(1, null, $id_curso , 0, $costovar , '$titulo', '$descripcion', '$filePath');";
    // $result = $newConn->ExecuteQuery($query);

    // if($result){
    //     if (!move_uploaded_file($rutaTemporal, $filePath)) {
    //         return false;
    //     }
    // }


    
?>