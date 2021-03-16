<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso</title>
        <!-- jquery --->        
        <script type="text/javascript" src="libs/jquery-3.5.1.min.js" ></script>
        <!-- css -->
        <link rel="stylesheet" href="css/cursoCompleto.css">

        <script type="text/javascript">
            $(document).ready(function () {
                $("#menuInformacionCurso").click(function () {
                    $("#informaciónProfesor").addClass("hide");
                    $("#recursosCurso").addClass("hide");
                    $("#informaciónProfesor").removeClass("show");
                    $("#recursosCurso").removeClass("show");
                    $("#menuRecursosCurso").removeClass("decoracion");
                    $("#menuInformaciónProfesor").removeClass("decoracion");
                    $("#informacionCurso").addClass("show");
                    $("#menuInformacionCurso").addClass("decoracion");
                    $("#informacionCurso").removeClass("hide");

                });
                $("#menuInformaciónProfesor").click(function () {
                    $("#informacionCurso").addClass("hide");
                    $("#recursosCurso").addClass("hide");
                    $("#informacionCurso").removeClass("show");
                    $("#recursosCurso").removeClass("show");
                    $("#menuInformacionCurso").removeClass("decoracion");
                    $("#menuRecursosCurso").removeClass("decoracion");
                    $("#informaciónProfesor").addClass("show");
                    $("#menuInformaciónProfesor").addClass("decoracion");
                    $("#informaciónProfesor").removeClass("hide");
                });
                $("#menuRecursosCurso").click(function () {
                    $("#informacionCurso").addClass("hide");
                    $("#informaciónProfesor").addClass("hide");
                    $("#informacionCurso").removeClass("show");
                    $("#informaciónProfesor").removeClass("show");
                    $("#menuInformaciónProfesor").removeClass("decoracion");
                    $("#menuInformacionCurso").removeClass("decoracion");
                    $("#recursosCurso").addClass("show");
                    $("#menuRecursosCurso").addClass("decoracion");
                    $("#recursosCurso").removeClass("hide");
                });
            });
        </script>

    </head>
    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <div class="row">

            <div class="col-4" id="boxListaCapitulos">
                <h5 id="contenidoCursoTitulo">Contenido del curso</h5>
                <ul id="listaCapitulos">
                    <li >
                        <input type="checkbox" class="cbCapituloCurso" checked >
                        <label class="tituloCapitulo">Capitulo 1: Conoce la Interfaz de Photoshop</label>                       
                    </li>
                    <li class="capituloSeleccionado">
                        <input type="checkbox" class="cbCapituloCurso">
                        <label class="tituloCapitulo">Capitulo 2: Herramientas de Photoshop ( Parte 1)</label>                       
                    </li>
                    <li>
                        <input type="checkbox" class="cbCapituloCurso">
                        <label class="tituloCapitulo">Capitulo 3: Herramientas de Photoshop ( Parte 2)</label>                       
                    </li>
                      <li>
                        <input type="checkbox" class="cbCapituloCurso">
                        <label class="tituloCapitulo">Capitulo 4: Herramientas de Photoshop ( Parte 3)</label>                       
                    </li>
                    
                </ul>
            </div>
            <div class="col-8" id="cursoVideo">
                <video src="images/videos/intro-KawaiiPosting.mp4" preload controls poster="images/ejemplos/imgEjemplo2.jpg">
                    Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.
                </video>
                <div id="boxInformacionCurso">
                    <div class="menuCurso">
                        <h6 class="decoracion" id="menuInformacionCurso">Información del curso</h6>
                        <h6 id="menuInformaciónProfesor">Información del Profesor</h6>
                        <h6 id="menuRecursosCurso">Recursos del curso</h6>
                    </div>
                    <div class="contenidosCurso">
                        <div  id="informacionCurso">
                            <h4>Photoshop desde cero para principiantes</h4>
                            <p>Aprende los tres pilares de Photoshop: capas, máscaras y selecciones. Entonces crea fotomontajes profesionales.</p>
                        </div>
                        <div class="hide"  id="informaciónProfesor">                          
                                 <div  class="infoProfesor" style="display: flex">
                                    <img class="imgProfesorCurso" src="images/icn1.png">
                                    <h4>Nombre del profesor</h4>
                                 </div>
                                    <a href="Chat.php" class="btn btn-secondary">Enviarle un mensaje</a>
                              
                        </div>
                        <div class="hide"  id="recursosCurso">
                            <h4>Recursos compartidos</h4><hr style="background-color: whitesmoke">
                            <ul class="listaRecursos">
                                <li>
                                     <a class="archivoCurso" href="#">imagen.jpg</a>
                                </li>
                                <li>
                                    <a class="archivoCurso" href="#">documento.pdf</a>
                                </li>
                                <li>
                                     <a class="archivoCurso" href="#">video.jpg</a>
                                </li>
                                <li>
                                    <a class="archivoCurso" href="#">Página de referencia</a>
                                </li>
                            </ul>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include("footer.php"); ?>
    </body>
</html>
