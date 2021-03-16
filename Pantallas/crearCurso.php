<?php

class Capitulo {

    public $Id = 0;
    public $Titulo = "";
    public $Descripcion = "";
    public $EsGratis = false;

    function __construct(int $id, string $titulo, string $descripcion, string $video, string $esGratis) {
        $this->Id = $id;
        $this->Titulo = $titulo;
        $this->Descripcion = $descripcion;
        $this->video = $video;
        $this->EsGratis = $esGratis;
    }

}

$capitulos = array(
    new Capitulo(1, "Introducción", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies ut nunc et cursus.", "video.mp4", false),
    new Capitulo(2, "Teoría", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies ut nunc et cursus.", "video.mp4", false),
    new Capitulo(3, "Capacitación", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies ut nunc et cursus.", "video.mp4", true),
    new Capitulo(10, "Recursos", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies ut nunc et cursus.", "video.mp4", true),
);

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == "delete" && isset($_GET['id'])) {
        $id = $_GET['id'];
        unset($capitulos[$id]);
    }
}
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear curso</title>
        <!--Css  -->
        <link rel="stylesheet" href="css/crearCurso.css">
        <style>
            ul.listaprueba {
                counter-reset: headings;
            }

            ul.listaprueba li.cap:before {
                counter-increment: headings;
                content: counter(headings);
            }
        </style>
    </head>
    <body>
        <!-- SideBar -->
        <?php include("sidebar.php"); ?>

        <script type="text/javascript">
            $(document).ready(function () {

                var contador = 0;

                $("#btnAgregarCapitulo").click(function () {

                    /*
                     var titulo = $("#tituloCapitulo").val();
                     var descripcion = $("#descripcionCapitulo").val();
                     var video = $("#videoCapitulo").val();
                     if (titulo.length > 0 && descripcion.length > 0 && video.length > 0) {
                     contador = contador + 1;
                     
                     /*
                     var agregadoFinal = "<li><div class='row'><div class='col-2'>\n\
                     <p class='inputNumeroCapitulo' name='capituloNumero" + contador + "' type='text'>Capitulo " + contador + "</p>\n\
                     </div><div class='col-10'><input class='inputCapituloTitulo id='capituloTitulo" + contador + "' name='capituloTitulo" + contador + "' type='text' \n\
                     value='" + titulo + "' readonly><br> <p class='inputCapituloDescripcion'>" + descripcion + "</p>\n\
                     <textarea class='textareaCapituloDescripcion' id='capituloDescripcion" + contador + "' name='capituloDescripcion" + contador + "' hidden>" + descripcion + "</textarea>\n\
                     <input type='file' class='videoCapituloAgregado' id='capituloVideo" + contador + "' name='capituloVideo" + contador + "' accept='video/*' \n\
                     pattern='[A-Za-z0-9]' title='Sube un archivo' hidden> <input type='text' class='inputCapituloVideo' value='" + video + "' readonly>\n\
                     <input type='button' class='btn btn-primary btn-block btnEditarCapitulo' id=" + contador + "' value='Editar Capitulo'></div></div></li>";
                     */
                    /*                                                                       
                     
                     
                     lista.push(agregadoFinal);
                     $("#listaCapitulosAgregados").append(agregadoFinal);
                     } else {
                     alert("No se puedo agregar capitulo (campos vacios)");
                     }
                     */
                });

                $("#listaCapitulosAgregados").on("click", ".btnEditarCapitulo", function () {

                    // $(this).parent().parent().remove(); 

                    /*
                     $.ajax({
                     type: "POST",
                     url: 'crearCurso.php',
                     data: {
                     action: "delete",
                     id: 5
                     },
                     success: function(data) {
                     
                     }
                     });*/

                });

                $("#cbPrecioCurso").click(function () {
                    if ($(this).is(":checked")) {
                        $("#precioCurso").attr('disabled', 'disabled');
                        $("#precioCurso").removeAttr('required');
                        $("#precioCurso").val('');

                    } else {
                        $("#precioCurso").removeAttr('disabled');
                        $("#precioCurso").attr('required', 'required');
                    }

                });
                $("#sbCategorias").change(function () {
                    alert("$(this).val()");
                });

                $(".btnEditarCapitulo").click(function () {
                    $(".inputCapituloTitulo").removeAttr('readonly');
                    $(".textareaCapituloDescripcion").removeAttr('hidden');
                    $(".inputCapituloVideo").attr('hidden', 'hidden');
                    $(".inputCapituloDescripcion").attr('hidden', 'hidden');
                    $(".videoCapituloAgregado").removeAttr('hidden');
                    $(".cbPrecioCapituloAgregado").removeAttr('disabled');

                });

                $("#agregarRecurso").click(function () {
                    $("#listaRecursos").append("<div class='custom-file mt-3'><input type='file' class='custom-file-input' id='customFileLang' lang='es'  accept='/*'>\n\
                                                    <label class='custom-file-label' for='customFileLang'>Seleccionar Archivo</label></div>");
                });
            });
        </script>
        <div class="box">
            <div class="container mt-5 mb-5">
                <div class = "form-box">
                    <form class="needs-validation" novalidate method="POST" action='#' enctype="multipart/formdata">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-groupImage">  
                                    <input type="file" id="browse" name="fileupload"  accept="image/*" onChange="Handlechange();"/>
                                    <input type="image"onmouseout="this.src = 'images/imagen.png';" onmouseover="this.src = 'images/imagen-icon.png     ';"  
                                           src="images/imagen.png" id="topImage"  onclick="HandleBrowseClick();
                                                   this.disabled = false" />
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="tituloCurso">Titulo del curso:</label>
                                    <input type="text" class="form-control" id="tituloCurso" placeholder="Ingrese el titulo del curso" name="tituloCurso"
                                           maxlength="150"  required pattern="[A-Za-z0-9]{3,150}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 150">
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Campo obligatorio.</div>
                                </div>
                                <div class="form-group">
                                    <label for="categoria">Categoría:</label>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="custom-select">
                                                <select id="sbCategorias">
                                                    <option value="0">Categoría</option>
                                                    <option value="1">Otro</option>
                                                    <option value="2">Categoría</option>
                                                    <option value="3">Categoría</option>
                                                    <option value="4">Categoría</option>
                                                    <option value="5">Categoría</option>
                                                    <option value="6">Categoría</option>
                                                    <option value="7">Categoría</option>
                                                    <option value="8">Categoría</option>
                                                    <option value="9">Categoría</option>
                                                    <option value="10">Categoría</option>
                                                    <option value="11">Categoría</option>
                                                    <option value="12">Categoría</option>
                                                </select>                                               
                                            </div>
                                            <div class="mt-3">Categorías guardadas:</div>
                                            <ul class="mt-2">
                                                <li>Categoria</li>
                                                <li>Categoria</li>
                                                <li>Categoria</li>
                                            </ul>
                                        </div>
                                        <div class="col-8">
                                            <input type="categoria" class="inputText mb-2" id="categoriaInput" placeholder="Ingrese la categoría" name="categoria">     
                                            <textarea class="inputText inputTextarea mb-2" id="descripcionCortaCurso" rows="2" wrap="hard" placeholder="Ingrese una descripción de presentacion" name="descripcionCorta"
                                                      maxlength="150"   pattern="[A-Za-z0-9]{3,150}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 150"></textarea>
                                            <div class="text-right">
                                                <a class="btn btn-secondary">+</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcionLarga">Descripción:</label>
                            <textarea class="form-control" id="descripcionLarga" rows="3" wrap="hard" placeholder="Ingrese una descripción" name="descripcionLarga"
                                      maxlength="500" required pattern="[A-Za-z0-9]{3,500}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 500"></textarea>
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio</div>
                        </div>

                        <div class="inputInfoCurso form-group">
                            <label for="precioCapitulo">Precio:</label>
                            <input type="number" min="1" max="99999" step="1" class="form-control" id="precioCurso" 
                                   maxlength="10" required  pattern="[0-9]{10}" title="Ingresa un precio máximo de 99999">
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio</div>
                            <input id="cbPrecioCurso" type="checkbox" /><label>Gratis</label>                        
                        </div>
                        <div class="inputInfoCurso">
                            <label for="videoCapitulo">Agregar recurso multimedia:</label><br>
                            <ul id="listaRecursos">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="es"  accept='/*'>
                                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                </div>
                            </ul>
                            <div class="text-right">
                                <a id="agregarRecurso" class="btn btn-secondary">+</a>
                            </div>
                        </div>
                        <hr style="background-color: whitesmoke;">
                        <div class="form-group agregarCapitulo">
                            <h5>Agregar capitulos</h5>
                            <div class="boxAgregarDatosCapitulos">                            
                                <div class="inputInfoCurso">
                                    <label for="tituloCapitulo">Titulo del capitulo:</label>
                                    <input type="text" class="form-control" id="tituloCapitulo" placeholder="Ingrese el titulo del curso" name="tituloCurso"
                                           maxlength="150" pattern="[A-Za-z0-9]{3,150}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 150">
                                </div>
                                <div class="inputInfoCurso">
                                    <label for="descripcionCapitulo">Descripción:</label>
                                    <textarea  class="form-control" id="descripcionCapitulo" rows="2" wrap="hard" placeholder="Ingrese una descripción de presentacion" name="descripcion"
                                               maxlength="500"  pattern="[A-Za-z0-9]{3,500}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 500"></textarea>
                                </div>
                                <div class="inputInfoCurso mt-4">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                    </div>
                                </div>
                                <div class="inputInfoCurso">                                
                                    <input id="cbPrecioCapitulo" type="checkbox"><label>Gratis</label>                      
                                </div>
                                <div class="inputInfoCurso text-right">                                
                                    <input type="button" id="btnAgregarCapitulo" class="btn btn-primary" value="Agregar Capitulo">               
                                </div>

                            </div>
                            <div class="CapitulosAgregados">
                                <h5>Capitulos Guardados </h5>
                                <!-- <ul class="listaprueba">
                                     <li class="cap">test</li>
                                     <li class="cap">test</li>
                                     <li class="cap">test</li>
                                 </ul>-->
                                <ul id="listaCapitulosAgregados">
                                    <?php
                                    $contador = 0;

                                    foreach ($capitulos as $key => &$cap) {

                                        $contador++;
                                        ?>
                                        <li id="<?php echo $cap->Id ?>">
                                            <div class="row">
                                                <div class="col-2">
                                                    <p class="">
                                                        Capitulo <?php echo $contador ?>
                                                    </p>
                                                </div>
                                                <div class="col-10">
                                                    <input class="inputCapituloTitulo  mb-2" id="" name="capituloTitulo" type="text" value="<?php echo $cap->Titulo ?>" readonly>
                                                    <br> 
                                                    <p class="inputCapituloDescripcion  mb-2"> <?php echo $cap->Descripcion ?></p>
                                                    <textarea class="textareaCapituloDescripcion form-control  mb-2" id="" name="capituloDescripcion" hidden> <?php echo $cap->Descripcion ?></textarea>
                                                    <input type="file" class="videoCapituloAgregado  mb-2" id="" name="capituloVideo" accept="video/*" pattern="[A-Za-z0-9]" title="Sube un archivo" hidden> 
                                                    <input type="text" class="inputCapituloVideo  mb-2" value="<?php echo $cap->video ?>" readonly>
                                                    <input class="cbPrecioCapituloAgregado mb-2" type="checkbox" disabled ><label>Gratis</label>          
                                                    <div class="text-right">
                                                        <input type="button" class="btn btn-secondary btnEditarCapitulo" id="" value="Editar">
                                                        <a class="btn btn-secondary btnEliminarCapitulo" href="crearCurso.php?id=<?php echo $key ?>&action=delete">
                                                            Retirar
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" id="btnAgregarCurso" class="btn btn-primary btn-block " onclick="checarValidacion(this.form)">Agregar curso</button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
        <script type="text/javascript">

            function checarValidacion(form) {
                var isValidForm = form.checkValidity();
                if (isValidForm) {
                    alert("Parece que todo salió bien!");
                } else {
                    alert("Faltan campos de validar");
                }
            }
        </script>
        <!--js -->
        <script src="js/crearCurso.js"></script>
        <script src="js/validaciones.js"></script>
    </body>
</html>
