<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
$id_curso = isset($_GET["id_curso"]) ? $_GET["id_curso"] : 0;
$Nombre = isset($_GET["Nombre"]) ? $_GET["Nombre"] : 0;
if ($id_curso <= 0) {
    // header("Location: /index.php");
    exit();
} else {
    error_reporting(E_ERROR | E_PARSE);
    require("./Connection_db/classConecction.php");
    $newConn2 = new ConnectionMySQL();
    $newConn2->CreateConnection();

    // id curso
    $query = " CALL sp_certificado(2, $id_curso, null)";
    $result = $newConn2->ExecuteQuery($query);
    if($result){
        while ($rowCursos = mysqli_fetch_assoc($result)) {
            $arrayDatosc[] = $rowCursos;
        }
        $NombreMaestro = $arrayDatosc[0]['nombrecomp'];
        $NombreCurso = $arrayDatosc[0]['titulo'];
    }

    // Nombre del alumno
    $newConn2->CreateConnection();
    $queryAlumno = "CALL sp_certificado(1, null, $Nombre);";
    $resultAlumno = $newConn2->ExecuteQuery($queryAlumno);
    $rowAlumno = mysqli_fetch_all($resultAlumno, MYSQLI_ASSOC);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Playball&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Jost:wght@300;600&family=Playball&display=swap" rel="stylesheet">
        <style>
            html{
                height: 100vh!important;
                width: 100vw!important;
            }
            body{
                margin:0;
            }
            .imagen{
                height: 100vh!important;
                width: 100vw!important;
                position: absolute;
                z-index: -9999;
                top:0;
            }
            .certificado{
                font-family: 'Archivo Black', sans-serif;
                font-size: 4rem;   
                color: #1f1f1f;
            }
            .texto{
                font-family: 'Jost', sans-serif;
                font-size: 2rem;  
                color: #1f1f1f;
            }
            .nombre{
                font-family: 'Playball', cursive;
                font-size: 3rem;
                color: #1f1f1f;
            }
            .texto-bold{
                font-family: 'Jost', sans-serif;
                font-size: 2rem;
                font-weight: bold;   
                color: #c94635;
            }
            .texto-chiquito{
                 font-size: 1rem!important;
                 color: #1f1f1f;
            }
            .text-center{
                text-align: center;
            }
            hr{
                width: 50%;
                border-color: black;
            }
            .margin-gde{
                margin-top: 6rem;
            }
            .margin-mediano{
                margin-top:3rem; 
                margin-bottom: 0;
            }
            .margin-chiquito{
                margin-bottom: 0.001rem;
                margin-top:0;
            }
            .logo{
                width: 15%;
                height: 15%;
            }
        </style>
    </head>
    <body>
        <img class="imagen" src="images/certificadoProuge_p1_PLANTILLA.png">
        <div class="text-center margin-gde">            
            <p class="certificado margin-chiquito">CERTIFICADO</p>
            <p class="texto margin-chiquito">Este documento certifica que</p>

            <?php if($rowAlumno == NULL){ ?>
            <?php } else {?>
                <?php foreach ($rowAlumno as $key => $value) {?>

                <h1 class="nombre margin-chiquito"> <?php echo $value['nombrecomp'];?> </h1>
                <?php }?>
            <?php }?>
            <?php ?>
            <p class="texto margin-chiquito">ha concluido exitosamente el curso de</p>
            <p class="texto-bold margin-chiquito"> <?php echo $NombreCurso;?> </p>
            <p class="texto margin-chiquito">el día <?php echo date("d/m/Y") ?>.</p>
            <p class="texto margin-mediano"> <?php echo $NombreMaestro;?> </p>
            <hr>
            <p class="texto texto-chiquito margin-chiquito">Instructor encargado</p>
            <p class="texto margin-chiquito">&</p>
            <img class="logo" src="images/logo4.png">
        </div>
    </body>
</html>
