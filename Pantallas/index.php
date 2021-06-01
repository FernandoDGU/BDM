<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>

        <!--Css  -->
        <link rel="stylesheet" href="css/index.css">
        <?php require("Procedimientos/getCursos.php"); ?>

        <!-- Plugins -->
        <link rel="stylesheet" type="text/css" href="slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
        <script type="text/javascript" src="slick/slick.min.js"></script>

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
                <!-- </div> -->
                <div class="text-center">
                    <div class="container-xx p-3">
                        <div class="multiple-items text-center" id="Slides">
                            <?php ?>
                            <?php if ($rowCurRec == NULL) { ?>
                               <div class='text-center'>
                            <h5 style="color:whitesmoke">No hay ningún curso reciente.</h5>
                        </div>
                            <?php } else { ?>
                                <?php
                                foreach ($rowCurRec as $key => $value) {
                                    $titulo = $value['titulo'];
                                    $costo = '$' . $value['costo'] . '.00MX';
                                    $descCorta = $value['descripcion_corta'];
                                    $imagen = $value['imagen'];
                                    $id_curso = $value['id_curso'];
                                    ?>
                                    <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                                        <div class="cursoImg">

                                        <?php if($idUser == null){?>
                                            <a href="Registro.php"><img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>" 
                                                    class="imagen"> </a>
                                        <?php } else{ ?>    
                                          <a href="CursoPrev.php?id=<?php echo $id_curso?>"><img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>" 
                                                    class="imagen"> </a>
                                          <?php }?>    
                                          <h3 class="d-none"><?php echo$id_curso ?></h3>
                                          </div>
                                        <div class="contenido">
                                            <h4 class="titulo"> <?php echo $titulo ?> </h4>
                                            <h6 class="autorCard"><?php echo $descCorta ?></h6>
                                            <div class="precioCard"><?php echo $costo ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <!--<div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                                <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo3.jpg" class="imagen"> </a>
                                <div class="contenido">
                                    <h4 class="titulo"> Desarrollo de videojuegos con Unreal Engine 4 </h4>
                                    <h6 class="autorCard">Mariano Rivas</h6>
                                    <div class="precioCard">$1,699.00MX</div>
                                </div>
                            </div>
                            <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                                <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo5.jpg" class="imagen"> </a>
                                <div class="contenido">
                                    <h4 class="titulo"> Canta desde cero </h4>
                                    <h6 class="autorCard">Escuela de Audio y Sonido Colombia</h6>
                                    <div class="precioCard">$429.00MX</div>
                                </div>
                            </div>
                            <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                                <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo4.jpg" class="imagen"> </a>
                                <div class="contenido">
                                    <h4 class="titulo"> El arte del retrato. Dibujo y pinturaEl arte del retrato. Dibujo y pintura </h4>
                                    <h6 class="autorCard">El arte del retrato. Dibujo y pinturaEl arte del retrato. Dibujo y pintura</h6>
                                    <div class="precioCard">$549.00MX</div>
                                </div>
                            </div>
                            <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                                <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo2.jpg" class="imagen"> </a>
                                <div class="contenido">
                                    <h4 class="titulo"> Photoshop desde cero para principiantes</h4>
                                    <h6 class="autorCard">Patricia Salazar</h6>
                                    <div class="precioCard">$320.00MX</div>
                                </div>
                            </div>
                            <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                                <a href="CursoPrev.php"> <img src="images/ejemplos/imgEjemplo1.jpg" class="imagen"> </a>
                                <div class="contenido">
                                    <h4 class="titulo"> HTML desde cero</h4>
                                    <h6 class="autorCard">Adrián Eras</h6>
                                    <div claclassss="precioCard">$279.00MX</div>
                                </div>
                            </div>-->
                        </div>
                    </div>

                    <!--<div class="info col-2">
                        <h1>¡Descubre más de prouge!</h1>
                        <h5>Visita nuestro cursos más recientes.</h5>
                    </div>
                    <!-- <div>7</div>
            <div>8</div>
            <div>9</div>
            <div>10</div> -->
                </div>


            </div>
            <div id="Infocursos2">
                <div class="row">
                    <div class="info2 col-4 ">
                        <h1>¡Conviértete en profesor en línea!</h1>
                        <h5>Con Prouge, es más fácil que nunca impartir conocimiento a millones de personas. Da el siguiente paso hacia tus metas personales y profesionales. </h5>
                        <!--<a type="button" id="btnInicio" class="btn btn-primary btn-block" href="Registro.php">Conviértete en maestro</a>-->
                    </div>
                    <div class="vl"></div>
                    <div class="col-4">
                        <img src="images/maestra.jpg" id="imgM">
                    </div>
                </div>

            </div>
        </div>

   
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="slick/slick.min.js"></script>


        <!--  AJAX -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('.multiple-items').slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 4
                });
                
                
            });
        </script>
    </body>

</html>