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


                $("#agregarRecurso").click(function () {
                    $("#listaRecursos").append("<div class='custom-file mt-3'><input type='file' class='custom-file-input' id='customFile' name='filename'>\n\
                                                    <label class='custom-file-label' for='customFile'>Seleccionar Archivo</label></div>");
                });

                $("#agregarEnlace").click(function () {
                    $("#listaEnlaces").append("<div class='boxEnlace mt-5'><label for='tituloEnlace'>Titulo:</label>\n\
                                               <input class='form-control' type='text' placeholder='Ingrese el titulo del enlace' maxlength='150'><label class='mt-3' for='enlaceURL'>URL:</label>\n\
                                               <input class='form-control' type='text' placeholder='Ingrese la URL' maxlength='150'></div>");
                });
                $(".custom-file-input").on("change", function () {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
                $("#btnAgregarCurso").click(function () {
                    $.ajax({
                        type: "POST",
                        url: 'crearCurso.php',
                        data: $("#formCrearCurso").serialize(),
                        success: function () {
                            var isValidForm = $("#formCrearCurso")[0].checkValidity();
                            if (isValidForm) {
                                alert("Parece que todo salió bien!");
                                $("#formCrearCurso").addClass("hide");
                                $("#formCrearCurso").removeClass("show");
                                $("#agregarCapitulo").addClass("show");
                                $("#agregarCapitulo").removeClass("hide");
                                $("#menuAgregarCapitulos").addClass("decoracion");
                                $("#menuCrearCurso").removeClass("decoracion");
                            } else {
                                alert("Faltan campos de validar");
                            }
                            $("#formCrearCurso").addClass("was-validated");
                        }
                    });
                    return false;
                });
            });
        </script>
        <div class="box">
            <div class="container mt-5 mb-5">

                <div class = "form-box">
                    <div class="menuAuto">
                        <h6 class="decoracion" id="menuCrearCurso">Informacion del curso</h6>
                        <h6 id="menuFlechita">></h6>
                        <h6 id="menuAgregarCapitulos">Agregar capitulos</h6>
                    </div>

                    <form class="needs-validation mt-4" id="formCrearCurso" novalidate method="post" action='Procedimientos/RegistrarCategoria.php' enctype="multipart/formdata">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-groupImage">  
                                    <input type="file" id="browse" name="fileupload"  accept="image/*" onChange="previewFile();"/>
                                   <!-- <input type="image"onmouseout="this.src = 'images/imagen.png';" onmouseover="this.src = 'images/imagen-icon.png     ';"  
                                           src="images/imagen.png" id="topImage"  onclick="HandleBrowseClick();
                                                   this.disabled = false" />-->
                                    <input type="image" class="imgFormulario" id="topImage" 
                                           src="images/imagen-icon.png"  onclick="HandleBrowseClick();
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
                                <div class="row">
                                    <div class="form-group col-8">
                                        <label for="descripcionLarga">Descripción:</label>
                                        <textarea class="form-control" id="descripcionLarga" rows="3" wrap="hard" placeholder="Ingrese una descripción" name="descripcionLarga"
                                                  maxlength="500" required pattern="[A-Za-z0-9]{3,500}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 500"></textarea>
                                        <div class="valid-feedback">Válido.</div>
                                        <div class="invalid-feedback">Campo obligatorio</div>
                                    </div>

                                    <div class="inputInfoCurso form-group col-4">
                                        <label for="precioCapitulo">Precio:</label>
                                        <input type="number" min="1" max="99999" step="1" class="form-control" id="precioCurso" 
                                               maxlength="10" required  pattern="[0-9]{10}" title="Ingresa un precio máximo de 99999">
                                        <div class="valid-feedback">Válido.</div>
                                        <div class="invalid-feedback">Campo obligatorio</div>
                                        <input id="cbPrecioCurso" type="checkbox" /><label>Gratis</label>                        
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group">   
                            <div class="row">
                                <div class="col-4">
                                    <div id="boxCategoriasGuardadas">
                                        <h6>Categorías guardadas:</h6>
                                        <ul class="mt-2 listaCategorias" id="catGuardadas">
                                            <li class="itemCategoria">
                                                <a class="EliminarCategoria"> x </a> 
                                                <h6>Categoria</h6>
                                            </li>
                                            <li class="itemCategoria">
                                                <a class="EliminarCategoria"> x </a> 
                                                <h6>Categoria</h6>
                                            </li>
                                            <li class="itemCategoria">
                                                <a class="EliminarCategoria"> x </a> 
                                                <h6>Categoria</h6>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <label for="categoria">Elige una categoría:</label>
                                    <div class="custom-select">
                                        <select id="sbCategorias">
                                            <option value="0">Categoríaa</option>
                                            <!-- <option value="1">Otro</option>
                                            <option value="2">Categoríaaa</option>
                                            <option value="3">Categoríaaaa</option>
                                            <option value="4">Categoríaaaaa</option>
                                            <option value="5">Categoría</option>
                                            <option value="6">Categoría</option>
                                            <option value="7">Categoría</option>
                                            <option value="8">Categoría</option>
                                            <option value="9">Categoría</option>
                                            <option value="10">Categoría</option>
                                            <option value="11">Categoría</option>
                                            <option value="12">Categoría</option> -->
                                        </select>                                               
                                    </div>
                                    <div class="text-right mt-2">
                                        <a class="btn btn-secondary">+</a>
                                    </div>

                                    <div class="mt-2">
                                        <label for="categoriaInput">Agrega una nueva:</label>
                                        <input type="categoria" class="inputText mb-2" id="categoriaInput" placeholder="Ingrese la categoría" name="categoriaInput">     
                                        <textarea class="inputText inputTextarea mb-2" id="descripcionCortaCurso" rows="2" wrap="hard" placeholder="Ingrese una descripción de presentacion" name="DescCorta"
                                                  maxlength="150"   pattern="[A-Za-z0-9]{3,150}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 150"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <a class="btn btn-secondary" id="NewCateg">+</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr style="background-color:whitesmoke;">
                        <div class="inputInfoCurso">
                            <label for="videoCapitulo">Agregar recurso multimedia:</label><br>
                            <ul id="listaRecursos">                                
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                                    <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                                </div>
                            </ul>
                            <div class="text-right">
                                <a id="agregarRecurso" class="btn btn-secondary">+</a>
                            </div>
                        </div>    
                        <div class="inputInfoCurso">
                            <label for="videoCapitulo">Agregar enlace de referencia:</label><br>
                            <ul id="listaEnlaces">
                                <div class="boxEnlace">
                                    <label for="tituloEnlace">Titulo:</label>
                                    <input class="form-control" type="text" placeholder="Ingrese el titulo del enlace" maxlength="150">
                                    <label class="mt-3" for="enlaceURL">URL:</label>
                                    <input class="form-control" type="text" placeholder="Ingrese la URL" maxlength="150">
                                </div>
                            </ul>
                            <div class="text-right">
                                <a id="agregarEnlace" class="btn btn-secondary">+</a>
                            </div>
                        </div>    
                        <div class="text-right mt-5">
                            <button type="submit" id="btnAgregarCurso" class="btn btn-primary ">Agregar curso</button>
                        </div>
                    </form>
                    <div class="agregarCapitulo hide mt-4" id="agregarCapitulo">
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
                            <div class="inputInfoCurso">
                                <label >Video:</label>
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
                                        <div class="row wom">
                                            <div class="col-2 columNumeroCapitulo">
                                                <p class="">
                                                    Capitulo <?php echo $contador ?>
                                                </p>
                                            </div>
                                            <div class="col-10 columInfoCapitulo">
                                                <input class="inputCapituloTitulo  mb-2" id="" name="capituloTitulo" type="text" value="<?php echo $cap->Titulo ?>" >
                                                <br> 
                                                <!--<p class="inputCapituloDescripcion  mb-2"></p>-->
                                                <textarea class="textareaCapituloDescripcion form-control  mb-2" id="" name="capituloDescripcion"> <?php echo $cap->Descripcion ?></textarea>
                                                <!--<input type="file" class="videoCapituloAgregado  mb-2" id="" name="capituloVideo" accept="video/*" pattern="[A-Za-z0-9]" title="Sube un archivo"> -->
                                                <div class="custom-file mb-2">
                                                    <input type="file" class="custom-file-input" id="customFile" name="filename" >
                                                    <label class="custom-file-label lblCapitulos" for="customFile" value="<?php echo $cap->video ?>"><?php echo $cap->video ?></label>
                                                </div>
                                                <input class="cbPrecioCapituloAgregado mb-2" type="checkbox" ><label>Gratis</label>          
                                                <div class="text-right">
                                                    <a class="btn btn-secondary btnEliminarCapitulo" href="crearCurso.php?id=<?php echo $key ?>&action=delete">
                                                        Retirar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </div>
                        <div class="text-right">                                
                            <input type="button" id="btnAgregarCapitulosCompletos" class="btn btn-primary" value="Guardar Capitulos">               
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <!--js -->
        <script src="js/crearCurso.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--<script src="js/validaciones.js"></script>-->
    </body>

    <!-- Prueba Ajax -->
    <script>
        $('#NewCateg').click(function(){
            $.ajax({
                url: 'Procedimientos/RegistrarCategoria.php', 
                type: 'POST',
                data: $('crearCurso.php').serialize(),
                success: function(res){
                    $('#catGuardadas').html(res);
                }
            })
        })
    </script>
</html>
