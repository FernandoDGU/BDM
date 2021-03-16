<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>

        <!--Css  -->
        <link rel="stylesheet" href="css/home.css">
    </head>
    <!-- PROYECTO BDM -->

    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <!-- Imagen  -->
        <div class="container-xxl">

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/FLAYER.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>

            <div id="Infocursos">
                <div class=" row">
                    <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                        <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo1.jpg" class="imagen"> </a>
                        <div class="contenido" >
                            <h4 class="titulo"> HTML desde cero</h4>
                            <h6 class="autorCard">Adrián Eras</h6>
                            <div class="precioCard">$279.00MX</div>
                        </div>                  
                    </div>
                    <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                        <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo2.jpg" class="imagen"> </a>
                        <div class="contenido" >
                            <h4 class="titulo"> Photoshop desde cero para principiantes</h4>
                            <h6 class="autorCard">Patricia Salazar</h6>
                            <div class="precioCard">$320.00MX</div>
                        </div>        
                    </div>
                    <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                         <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo3.jpg" class="imagen"> </a>
                        <div class="contenido" >
                            <h4 class="titulo"> Desarrollo de videojuegos con Unreal Engine 4 </h4>
                            <h6 class="autorCard">Mariano Rivas</h6>
                            <div class="precioCard">$1,699.00MX</div>
                        </div>            
                    </div>
                      <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                          <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo4.jpg" class="imagen"> </a>
                        <div class="contenido" >
                            <h4 class="titulo"> El arte del retrato. Dibujo y pintura </h4>
                            <h6 class="autorCard">Antonio García Villarán</h6>
                            <div class="precioCard">$549.00MX</div>
                        </div>            
                    </div>
                      <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                          <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo5.jpg" class="imagen"> </a>
                        <div class="contenido" >
                            <h4 class="titulo"> Canta desde cero </h4>
                            <h6 class="autorCard">Escuela de Audio y Sonido Colombia</h6>
                            <div class="precioCard">$429.00MX</div>
                        </div>            
                    </div>
                    <div class="vl"></div>
                    <div class="info col-xl col-md-8 col-sm-6 col-xs-12">
                        <h1>¡Descubre más de prouge!</h1>
                        <h5>Visita nuestro cursos más recientes.</h5>
                    </div>
                </div>

            </div>

            <div id="Infocursos2">
                <div class="row">
                     <div class="info2 col-4 ">
                        <h1>¡Conviértete en profesor en línea!</h1>
                        <h5>Con Prouge, es más fácil que nunca impartir conocimiento a millones de personas. Da el siguiente paso hacia tus metas personales y profesionales.  </h5>
                        <!--<a type="button" id="btnInicio" class="btn btn-primary btn-block" href="Registro.php">Conviértete en maestro</a>-->
                    </div>
                <div class="vl"></div>
                <div class="col-4">
                     <img src="images/maestra.jpg" id="imgM">
                </div>
                </div>
                   
            </div>
        </div>

        <?php include("footer.php"); ?>
    </body>

</html>
