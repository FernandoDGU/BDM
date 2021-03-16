<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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

                <!--
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" href="#">Categorías</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" type="button" href="#" >Categoría</a>
                                <a class="dropdown-item" type="button" href="#" >Categoría</a>
                                <a class="dropdown-item" type="button" href="#" >Categoría</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aprendizaje</a>
                    </li>

                    <!-- <li class="nav-item dropdown active" ></li> -->
                    <!-- <li class="nav-item dropdown active">  
                        <a class="nav-link" href="Login.html">Iniciar sesión</a>
    
                        <div class="dropdown-menu dropdown-menu-right" id="panel">
                            <a href=""></a>
                        </div>
                    </li> -->
                    <!-- Si no está registrado 
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" href="#">Iniciar sesión</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form class="px-4 py-3">
                                    <div class="form-group">
                                        <label class="lblNav" for="exampleDropdownFormEmail1">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="correo@ejemplo.com">
                                    </div>
                                    <div class="form-group">
                                        <label class="lblNav" for="exampleDropdownFormPassword1">Contraseña</label>
                                        <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Contraseña">
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                        <label class="form-check-label" for="dropdownCheck">
                                            Recuerdame
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="btnInicioSesionNav">Iniciar Sesión</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"  href="Registro.php">¿No tienes una cuenta? Registrate</a>
                            </div>
                        </div>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="Registro.php">Iniciar sesión</a>
                    </li>
                    <!-- Si está registrado -->
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" href="#">Mi cuenta</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="miCuenta.php" >Mi cuenta</a>
                                <a class="dropdown-item" href="Chat.php">Mis mensajes</a>
                                <a class="dropdown-item" href="crearCurso.php">Crear curso</a>
                                <a class="dropdown-item" href="cursosAlumno.php">Mis cursos(Alumno)</a>
                                <a class="dropdown-item" href="cursosEscuela.php">Mis cursos(Escuela)</a>
                            </div>
                        </div>
                    </li>
                </ul>
               

            </div>
        </nav>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script> -->
        <!-- jquery --->        
        <script type="text/javascript" src="libs/jquery-3.5.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    </body>
</html>

