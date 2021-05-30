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
            <a id="aMiCuenta" href="miCuenta.php">Mi cuenta</a>
            <a id="aMensajes" href="Chat.php">Mensajes</a>
            <!-- Rol 0 es escuela, 1 es estudiante  -->
            <?php if($rol == 0){?>
                <a id="aCursosE" href="cursosEscuela.php">Mis cursos</a>
                <a id="aCrearCurso" href="crearCurso.php">Crear curso</a>
            <?php }else{?>
            <a id="aCursosA" href="cursosAlumno.php">Mis cursos</a>
            <?php }?>
            
            
        </div>
    </body>
</html>
