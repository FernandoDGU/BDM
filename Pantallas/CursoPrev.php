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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery --->        
    <script type="text/javascript" src="libs/jquery-3.5.1.min.js" ></script>
    <!-- checar los comentarios y capitulos---> 

    <?php require("Procedimientos/getComentarios.php"); ?>
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
            $("#likeIcon").click(function () {
                $("#checkLike").attr('checked', 'checked');
                $(this).css({'color': '#eb6953'});
                $("#dislikeIcon").css({'color': '#925d54'});

            });
            $("#dislikeIcon").click(function () {
                $("#checkLike").removeAttr('checked');
                $(this).css({'color': '#eb6953'});
                $("#likeIcon").css({'color': '#925d54'});
            });

            $('#btnComentar').click(function(){
                let frmData = new FormData();
                frmData.append("comentario", $('#txtComentario').val());
                frmData.append("id_usuario", $('#txtId').val());
                frmData.append("id_curso", $('#txtIdCurso').val());
                // frData.append("voto", $('#checkLike').checkdate());
                if(document.getElementsByName('CheckLikes')[0].checked)
                {frmData.append( 'CheckLikes', $('input[name=CheckLikes]').val());}
                $.ajax({
                        url: 'Procedimientos/Comentario.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            alert("Comentario con exito");
                            $('#txtComentario').val("");
                        }
                    });
                return false;
            })

        });
    </script>


</head>
<body>
    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <div class="container">
        <div class="row contenedorCurso">
            <div class="infoCurso col-lg-6 col-sm-12 ">

            <input id="txtId" type="text" value="<?php echo $idUser ?>" class="d-none invisible" name="idusario">

            <!-- Cambiar al id del curso cuando lo tengamos-->
            <input id="txtIdCurso" type="text" value="2" class="d-none invisible" name="idCurso">

                <h1>Photoshop desde cero para principiantes</h1>
                <h5>Programas de diseño</h5>
                <h6>Patricia Salazar</h6>
                 <small id="smallLikes">3,739</small>
                <i
                    class="fa fa-thumbs-up" 
                    id="likesCurso"
                    ></i>
               <small id="smallDislikes">345</small>
                <i  
                    class="fa fa-thumbs-down" 
                    id="dislikesCurso"
                    ></i>
                
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
        <!-- Ingresar comentarios -->
        <form class="needs-validation"  id="formComentar" novalidate method="POST" enctype="multipart/form-data">
            <div class="calCurso">
                <h3 id="tituloCalificar">¡Califica el curso!</h3>

                <div class="inputComentar">
                    <i
                        class="fa fa-thumbs-up" 
                        id="likeIcon"></i>
                    <i  
                        class="fa fa-thumbs-down" 
                        id="dislikeIcon"></i>
                        <input 
                        id="checkLike" 
                        class="d-none" 
                        type="checkbox" 
                        checked name = "CheckLikes">
                    <input type="text" id = "txtComentario" placeholder="Escribe un comentario">
                    <button id="btnComentar">Comentar</button>
                </div>
            </div>
        </form>

        <!-- Mostrar comentarios -->
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
                        <p>este curso me fue de gran ayuda pues aprendí vastante, ahora solo falta practicar mucho. Gracias</p>
                    </div>
                </li>
            </ul>

        </div>
    </div>
    <!-- Footer -->
    <?php include("footer.php"); ?>


</body>

