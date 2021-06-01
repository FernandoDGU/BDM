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

    <body >


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
                    <div class="row">
                        <div class="col-2 p-5 boxInfo">
                            <div class="info">
                                <h3>¡Descubre más de prouge!</h3>
                                <h5>Visita nuestros cursos más recientes.</h5>
                            </div>
                        </div>
                        <div class="col-10 p-5" id="boxMasRecientes">
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

                                                <?php if ($idUser == null) { ?>
                                                    <a href="Registro.php"><img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>" 
                                                                                class="imagen"> </a>
                                                    <?php } else { ?>    
                                                    <a href="CursoPrev.php?id=<?php echo $id_curso ?>"><img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>" 
                                                                                                            class="imagen"> </a>
                                                    <?php } ?>    
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
                            </div>
                        </div>


                    </div>
                    <div class="boxMC row">
                        <div class="col-2 p-5 boxInfo">
                            <div class="infoMC">
                                <h3>¡Descubre más de prouge!</h3>
                                <h5>Visita nuestro cursos mejor calificados.</h5>
                            </div>
                        </div>
                        <div class="col-10 p-5" id="boxMejoresCalificados">
                            <div class=" multiple-items text-center" id="Slides">
                                <?php if ($rowCurBest == NULL) { ?>
                                    <div class='text-center'>
                                        <h5 style="color:whitesmoke">No hay ningún curso mejor calificado.</h5>
                                    </div>
                                <?php } else { ?>
                                    <?php
                                    foreach ($rowCurBest as $key => $value) {
                                        $titulo = $value['titulo'];
                                        $costo = '$' . $value['costo'] . '.00MX';
                                        $descCorta = $value['descripcion_corta'];
                                        $imagen = $value['imagen'];
                                        $id_curso = $value['id_curso'];
                                        ?>
                                        <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                                            <div class="cursoImg">

                                                <?php if ($idUser == null) { ?>
                                                    <a href="Registro.php"><img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>" 
                                                                                class="imagen"> </a>
                                                    <?php } else { ?>    
                                                    <a href="CursoPrev.php?id=<?php echo $id_curso ?>"><img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>" 
                                                                                                            class="imagen"> </a>
                                                    <?php } ?>    
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
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-2 p-5 boxInfo">
                            <div class="info">
                                <h3>¡Descubre más de prouge!</h3>
                                <h5>Visita nuestros cursos mejor vendidos.</h5>
                            </div>
                        </div>
                        <div class="col-10 p-5" id="boxMasVendidos" >
                            <div class="multiple-items text-center" id="Slides">
                                <?php if ($rowCurVend == NULL) { ?>
                                    <div class='text-center'>
                                        <h5 style="color:whitesmoke">No hay ningún curso mejor vendido.</h5>
                                    </div>
                                <?php } else { ?>
                                    <?php
                                    foreach ($rowCurVend as $key => $value) {
                                        $titulo = $value['titulo'];
                                        $costo = '$' . $value['costo'] . '.00MX';
                                        $descCorta = $value['descripcion_corta'];
                                        $imagen = $value['imagen'];
                                        $id_curso = $value['id_curso'];
                                        ?>
                                        <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                                            <div class="cursoImg">

                                                <?php if ($idUser == null) { ?>
                                                    <a href="Registro.php"><img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>" 
                                                                                class="imagen"> </a>
                                                    <?php } else { ?>    
                                                    <a href="CursoPrev.php?id=<?php echo $id_curso ?>"><img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>" 
                                                                                                            class="imagen"> </a>
                                                    <?php } ?>    
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
                            </div>
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
            <div id="container Infocursos2 ">
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

                $("#menuInformacionCurso").click(function () {
                    $("#menuRecursosCurso").removeClass("decoracion");
                    $("#menuInformaciónProfesor").removeClass("decoracion");
                    $("#menuInformacionCurso").addClass("decoracion");


                });
                $("#menuInformaciónProfesor").click(function () {
                    $("#menuInformacionCurso").removeClass("decoracion");
                    $("#menuRecursosCurso").removeClass("decoracion");
                    $("#menuInformaciónProfesor").addClass("decoracion");

                });
                $("#menuRecursosCurso").click(function () {
                    $("#menuInformaciónProfesor").removeClass("decoracion");
                    $("#menuInformacionCurso").removeClass("decoracion");
                    $("#menuRecursosCurso").addClass("decoracion");

                });
                $('.multiple-items').slick({
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 4
                });
            });
        </script>
    </body>

</html>