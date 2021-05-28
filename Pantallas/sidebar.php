<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
  
        <!--Css  -->
        <link rel="stylesheet" href="css/sidebar.css">
    </head>
    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <div class="sidenav">
            <a href="miCuenta.php">Mi cuenta</a>
            <!-- Rol 0 es escuela, 1 es estudiante  -->
            <?php if($rol == 0){?>
                <a href="cursosEscuela.php">Mis cursos(Escuela)</a>
                <a href="crearCurso.php">Agregar Curso</a>
            <?php }else{?>
            <a href="cursosAlumno.php">Mis cursos(Alumno)</a>
            <?php }?>
            <a href="Chat.php">Mensajes</a>
            
        </div>
    </body>
</html>
