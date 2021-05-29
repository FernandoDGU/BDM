<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php 
session_start();

if(!isset($_SESSION['username']) || $_SESSION['username'] == ''){
    $validate = 0;
    $usuario = "notUser";
}else{
    $idUser = $_SESSION['idUser'];
    $usuario = $_SESSION['username'];
    $nombreCom =  $_SESSION['nombrecomp'];
    $correo = $_SESSION['correo'];
    $fecha = $_SESSION['fecha'];
    $rol = $_SESSION['rol'];
    $foto = $_SESSION['foto'];
    $validate = 1;
    $_POST["IdPrueba"] = $idUser;
}
    
?>
    <head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Anton:400|Roboto:400,900|Playball:300,400">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- css -->
        <link rel="stylesheet" href="css/navbar.CSS">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="navbar-brand" id="show-home" href="index.php" title="Página de inicio">
                            <img src="images/logo4.png" width="150" />

                        </a>
                </ul>
               
                <form class="form-inline my-lg-6 ml-auto">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" id="Search"  >
                    <a id="btnBuscar" href="Busqueda.php">    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 48 48">
                        <circle id="Elipse_1" data-name="Elipse 1" cx="24" cy="24" r="24" fill="#972e25"/>
                        <path id="Unión_1" data-name="Unión 1" d="M7.619,31.619V19.546A9.909,9.909,0,0,1,2.9,2.9,9.9,9.9,0,1,1,16.908,16.908a9.856,9.856,0,0,1-3.957,2.427q0,.047,0,.093V31.619a2.667,2.667,0,0,1-5.333,0ZM5.333,10.286a4.952,4.952,0,1,0,4.953-4.953A4.957,4.957,0,0,0,5.333,10.286Z" transform="translate(6.701 21.471) rotate(-45)" fill="#cf6955"/>
                        </svg> </a> 
                </form>

                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                    </li>
                    <?php if($validate == 0){?>
                        <li class="nav-item">
                            <a class="nav-link" href="Registro.php">Iniciar sesión</a>
                        </li>
                    <?php }else{?>

                    <!-- Si está registrado -->
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" href="#">Mi cuenta</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="miCuenta.php" >Mi cuenta</a>
                                    <a class="dropdown-item" href="Chat.php">Mis mensajes</a>
                                    <!-- Rol 0 es escuela, 1 es estudiante  -->
                                    <?php if($rol == 0){?>
                                            <a class="dropdown-item" href="crearCurso.php">Crear curso</a>
                                            <a class="dropdown-item" href="cursosEscuela.php">Mis cursos(Escuela)</a>
                                    <?php }else{?>
                                            <a class="dropdown-item" href="cursosAlumno.php">Mis cursos(Alumno)</a>
                                    <?php }?>
                                    <a class="dropdown-item" href="Procedimientos/cerrarSession.php">Cerrar sesión </a> 
                                    <!-- Checar para cerrar la sesión -->
                                </div>
                            </div>
                        </li>
                    <?php }?>
                    </ul>
                </div>
            
        </nav>   
        <script type="text/javascript" src="libs/jquery-3.5.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
        
    </body>
</html>

