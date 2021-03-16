<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
    <meta charset="UTF-8">
    <title>Curso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Css  -->
    <link rel="stylesheet" href="css/CursoPrev.css">
    <!-- jquery --->        
    <script type="text/javascript" src="libs/jquery-3.5.1.min.js" ></script>
    <!-- checar los comentarios y capitulos---> 
    <script type="text/javascript">
        $(document).ready(function () {
            var seccionComentariosLongitud = $(".seccionComentarios").children().length;
            if (seccionComentariosLongitud < 6) {
                $(".seccionComentarios").css({'overflow-y': 'hidden', 'height': 'auto'});
            }

            var capitulosLongitud = $(".capitulosCurso").children().length;
            if (capitulosLongitud < 4) {
                $(".contenedorCapitulos").css({'overflow-y': 'hidden', 'height': 'auto'});
            }
            $("#menuPresentacion").click(function () {
                $(".contenedorCapitulos").addClass("hide");
                $(".contenedorCapitulos").removeClass("show");
                $("#menuCapitulos").removeClass("decoracion");
                $("#imagenP").addClass("show");
                $("#menuPresentacion").addClass("decoracion");
                $("#imagenP").removeClass("hide");

            });
            $("#menuCapitulos").click(function () {
                $("#imagenP").addClass("hide");
                $("#imagenP").removeClass("show");
                $("#menuPresentacion").removeClass("decoracion");
                $("#menuCapitulos").addClass("decoracion");
                $(".contenedorCapitulos").addClass("show");
                $(".contenedorCapitulos").removeClass("hide");
            });
        });
    </script>


</head>
<body>
    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <div class="container">
        <div class="row contenedorCurso">
            <div class="infoCurso col-lg-6 col-sm-12 ">
                <h1>Photoshop desde cero para principiantes</h1>
                <h5>Programas de diseño</h5>
                <h6>Patricia Salazar</h6>
                <div class="estrellasCurso">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <small>3.0</small>
                </div>

                <hr style="background-color: #5d5d5d;">
                <p>Aprende los tres pilares de Photoshop: capas, máscaras y selecciones. Entonces crea fotomontajes profesionales</p>
                <h3>$320.00MX</h3>
                <a id="btnComprar" href="carritoPago.php" class="btn btn-primary btn-block">Comprar</a>
            </div> 
            <div class="imagenCurso col-lg-6 col-sm-12">
                <div class="tituloPresentacion">
                    <h6  class="decoracion"  id="menuPresentacion">Presentación</h6>
                    <h6 id="menuCapitulos">Capitulos</h6>
                </div>
                <img id="imagenP" src="images/ejemplos/imgEjemplo2.jpg">
                <div class="contenedorCapitulos hide">
                    <ul class="capitulosCurso">
                        <li class="capitulo">
                            <h4>Capitulo 1: Conoce la Interfaz de Photoshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Quisque ultricies ut nunc et cursus. Quisque euismod sapien
                                nunc. Morbi sed ante quis lectus viverra bibendum id et ante.</p>
                        </li>
                        <li class="capitulo">
                            <h4>Capitulo 2: Herramientas de Photoshop ( Parte 1)</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Quisque ultricies ut nunc et cursus. Quisque euismod sapien
                                nunc. Morbi sed ante quis lectus viverra bibendum id et ante.</p>
                        </li>
                        <li class="capitulo">
                            <h4>Capitulo 3: Herramientas de Photoshop ( Parte 2)</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Quisque ultricies ut nunc et cursus. Quisque euismod sapien
                                nunc. Morbi sed ante quis lectus viverra bibendum id et ante.</p>
                        </li>
                        <li class="capitulo">
                            <h4>Capitulo 4: Herramientas de Photoshop ( Parte 3)</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Quisque ultricies ut nunc et cursus. Quisque euismod sapien
                                nunc. Morbi sed ante quis lectus viverra bibendum id et ante.</p>
                        </li>

                    </ul>
                </div>
            </div> 
        </div>
        <div class="calCurso">
            <h3 id="tituloCalificar">¡Califica el curso!</h3>

            <div class="inputComentar">
                <div class="estrellasCalificar">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <input type="text" placeholder="Escribe un comentario">
                <button>Comentar</button>
            </div>
        </div>

        <div class="contenedorComentarios col-12">
            <h2 class="tituloComentario">Comentario de los alumnos</h2>
            <!--<hr style="align-self: center; width: 76%; background-color: #5d5d5d;">-->

            <ul class="seccionComentarios">
                <li class="comentario">
                    <img class="imgUsuarioComentario" src="images/icn1.png">
                    <div class="infoComentario">
                        <div class="tituPONE">
                            <h5>Edgardo Gabriel de la Cruz</h5><small class="comentarioPositivo">POSITIVO</small>
                        </div>
                        <div class="estrellasComentarios">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <small>3.0</small>
                        </div>
                        <p>Varias cosas de las que no tenía conocimiento, me abrió más oportunidad de expansión
                            sobre mis herramientas a la hora de usar, estoy muy agradecido, es un curso muy completo
                            de los conocimientos necesarios que necesitaría un principiante.
                        </p>
                    </div>
                </li>
                <li class="comentario">
                    <img class="imgUsuarioComentario" src="images/icn1.png">
                    <div class="infoComentario">                      
                        <div class="tituPONE">
                            <h5>Francisco Muriel Sabariego</h5><small class="comentarioNegativo">NEGATIVO</small>
                        </div>
                        <div class="estrellasComentarios">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <small>2.0</small>
                        </div>
                        <p>este curso me fue de gran ayuda pues aprendí vastante, ahora solo falta practicar mucho. Gracias</p>
                    </div>
                </li>


                <li class="comentario">
                    <img class="imgUsuarioComentario" src="images/icn1.png">
                    <div class="infoComentario">                       
                        <div class="tituPONE">
                            <h5>Jessy Fernando Orellana</h5><small class="comentarioPositivo">POSITIVO</small>
                        </div>
                        <div class="estrellasComentarios">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <small>3.0</small>
                        </div>
                        <p>El curso es bueno para introducirte al programa, lo que siento es que le falto
                            un poco mas de detalle en las imágenes, pero para empezar a conocer la plataforma
                            esta bien</p>
                    </div>
                </li>
                <li class="comentario">
                    <img class="imgUsuarioComentario" src="images/icn1.png">
                    <div class="infoComentario">                       
                        <div class="tituPONE">
                            <h5>Alvaro Cabrera Rodríguez</h5><small class="comentarioPositivo">POSITIVO</small>
                        </div>
                        <div class="estrellasComentarios">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <small>3.0</small>
                        </div>
                        <p>Excelente. Llevaba muchísimos años usando Photoshop de forma autónoma
                            y me ayudó a comprender cosas que no entendía y, sobretodo, muchas otras 
                            que desconocía.</p>
                    </div>
                </li>
                <li class="comentario">
                    <img class="imgUsuarioComentario" src="images/icn1.png">
                    <div class="infoComentario">                       
                        <div class="tituPONE">
                            <h5>Juan Carlos Pérez Llano</h5><small class="comentarioPositivo">POSITIVO</small>
                        </div>
                        <div class="estrellasComentarios">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <small>3.0</small>
                        </div>
                        <p>Al profesor no se le entiende muy bien, hay palabras que acelera y que traduce en spanish-english.</p>
                    </div>
                </li>
                <li class="comentario">
                    <img class="imgUsuarioComentario" src="images/icn1.png">
                    <div class="infoComentario">
                        <div class="tituPONE">
                            <h5>Rogelio Moreno Borondo</h5><small class="comentarioPositivo">POSITIVO</small>
                        </div>
                        <div class="estrellasComentarios">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <small>3.0</small>
                        </div>
                        <p>Muy bueno para gente como yo yo que tienía los conocimientos justos.</p>
                    </div>
                </li>
                <li class="comentario">
                    <img class="imgUsuarioComentario" src="images/icn1.png">
                    <div class="infoComentario">
                        <div class="tituPONE">
                            <h5>Jose Manuel Lorenzo Cid</h5><small class="comentarioPositivo">POSITIVO</small>
                        </div>
                        <div class="estrellasComentarios">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <small>3.0</small>
                        </div>
                        <p>Buen Curso. Las explicaciones y la forma de impartir el curso son correctas.</p>
                    </div>
                </li>

            </ul>

        </div>
    </div>
    <!-- Footer -->
    <?php include("footer.php"); ?>

</body>

