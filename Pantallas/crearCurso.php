<?php
class Capitulo
{

    public $Id = 0;
    public $Titulo = "";
    public $Descripcion = "";
    public $EsGratis = false;

    function __construct(int $id, string $titulo, string $descripcion, string $video, string $esGratis)
    {
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

    <?php require("Procedimientos/mostrarCategorias.php"); ?>
</head>

<body>
    <!-- SideBar -->
    <?php include("sidebar.php"); ?>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#btnAgregarCapitulo").click(function() {

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

            $("#listaCapitulosAgregados").on("click", ".btnEditarCapitulo", function() {

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

            $("#cbPrecioCurso").click(function() {
                if ($(this).is(":checked")) {
                    $("#precioCurso").attr('disabled', 'disabled');
                    $("#precioCurso").removeAttr('required');
                    $("#precioCurso").val('');

                } else {
                    $("#precioCurso").removeAttr('disabled');
                    $("#precioCurso").attr('required', 'required');
                }

            });
            $("#sbCategorias").change(function() {
                alert("$(this).val()");
            });


            $("#agregarRecurso").click(function() {
                $("#listaRecursos").append("<div class=' mt-3'><input type='file' name='filename'>\n\
                                                    <label class='' for='customFile'></label></div>");
            });

            $("#agregarEnlace").click(function() {
                $("#listaEnlaces").append("<div class='boxEnlace mt-5'><label for='tituloEnlace'>Titulo:</label>\n\
                                               <input class='form-control' type='text' placeholder='Ingrese el titulo del enlace' maxlength='150'><label class='mt-3' for='enlaceURL'>URL:</label>\n\
                                               <input class='form-control' type='text' placeholder='Ingrese la URL' maxlength='150'></div>");
            });
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            /*$("#btnAgregarCurso").click(function() {
                $.ajax({
                    type: "POST",
                    url: 'crearCurso.php',
                    dat a: $("#formCrearCurso").serialize(),
                    success: function() {
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
            });*/
            //Este lo hice yo pinche meco
            $('#NewCateg').click(function() {
                $.ajax({
                    url: 'Procedimientos/RegistrarCategoria.php',
                    type: 'POST',
                    data: $('#formCrearCurso').serialize(),
                    success: function(res) {
                        $('#catGuardadas').append(res);
                        // $('#sbCategorias').load(location.href+" #sbCategorias>*","");
                        //alert(res);
                    }
                });
                return false;
            });

            $('#NewCateg2').click(function() {
                var conceptName = $('#sbCategorias').find(":selected").text();
                // alert(conceptName);
                $.ajax({
                    url: 'Procedimientos/selectCategoria.php',
                    type: 'POST',
                    data: {
                        'Seleccionado': $('#sbCategorias option:selected').text()
                    },
                    success: function(res) {
                        $('#catGuardadas').append(res);

                    }

                });
                return false;
            });

            var column1RelArray = [];

            $('#btnAgregarCategorias').click(function(){
                // $('#catGuardadas li').each(function() {
                //     column1RelArray.push($(this).children('.itemCategoria').children('.nombreCateg'));
                //     alert($('.itemCategoria > h6').text());
                // });
                // for(var i= 0; i<$('#catGuardadas').children.length ; i++){
                //     alert($('.itemCategoria > h6').text());
                    
                //     // column1RelArray.push($('#catGuardadas').children('li:nth-child('+i+')').children('h6:nth-child(1)'));
                // }

                var targetImages = document.getElementById("catGuardadas").querySelectorAll("h6");
                for(var i= 0; i< targetImages.length; i++){
                    console.log(targetImages[i].textContent);
                }
            });

          

        });
    </script>
    <div class="box">
        <div class="container mt-5 mb-5">
        <!-- ID USER OCULTO -->


            <div class="form-box">
                <div class="menuAuto">
                    <h6 class="decoracion" id="menuCrearCurso">Informacion del curso</h6>
                    <h6 id="menuFlechita">></h6>
                    <h6 id="menuAgregarCapitulos">Agregar capitulos</h6>
                </div>
                <!-- Agregar un curso -->
                <form class="needs-validation mt-4" id="formCrearCurso" novalidate method="post" action='Procedimientos/RegistrarCurso.php' enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-groupImage">
                                <input id="txtId" type="text" value="<?php echo $idUser?>" class="d-none invisible" name="idusario">
                                <input type="file" id="browse" name="fileupload" accept="image/*" onChange="previewFile();" />
                                <!-- <input type="image"onmouseout="this.src = 'images/imagen.png';" onmouseover="this.src = 'images/imagen-icon.png     ';"  
                                           src="images/imagen.png" id="topImage"  onclick="HandleBrowseClick();
                                                   this.disabled = false" />-->
                                <input type="image" class="imgFormulario" id="topImage" src="images/imagen-icon.png" onclick="HandleBrowseClick();
                                                   this.disabled = false" />
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="tituloCurso">Titulo del curso:</label>
                                <input type="text" class="form-control" id="tituloCurso" placeholder="Ingrese el titulo del curso" name="tituloCurso" maxlength="150" required pattern="[A-Za-z0-9]{3,150}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 150">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8">
                                    <label for="descripcionLarga">Descripción corta:</label>
                                    <textarea class="form-control inputTextarea" id="descripcionLarga" rows="2" wrap="hard" placeholder="Ingrese una descripción" name="descripcionCorta" maxlength="50" required pattern="[A-Za-z0-9]{3,500}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 500" ></textarea>
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Campo obligatorio</div>
                                </div>

                                <div class="inputInfoCurso form-group col-4">
                                    <label for="precioCapitulo">Precio:</label>
                                    <input type="number" min="1" max="99999" step="1" class="form-control" id="precioCurso" maxlength="10" required pattern="[0-9]{10}" title="Ingresa un precio máximo de 99999" name="Precio">
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Campo obligatorio</div>
                                    <input id="cbPrecioCurso" type="checkbox" /><label>Gratis</label>
                                </div>
                                <div class="form-group col-12">
                                    <label for="descripcionLarga">Descripción:</label>
                                    <textarea class="form-control inputTextarea" id="descripcionLarga" rows="3" wrap="hard" placeholder="Ingrese una descripción" name="descripcionLarga" maxlength="250" required pattern="[A-Za-z0-9]{3,250}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 100"></textarea>
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Campo obligatorio</div>
                                </div>
                            </div>
                            <div class="text-right mt-5">
                                <button type="submit" id="btnGuardarCurso" class="btn btn-primary" onclick="checarValidacion(this.form);">Guardar curso</button>
                            </div>
                        </div>
                        
                    </div>
                </form>
                <!-- Agregar una categoria -->
                <form class="needs-validation mt-4" id="formCrearCategoria" novalidate method="post" action='Procedimientos/RegistrarCategoria.php' enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <div id="boxCategoriasGuardadas">
                                    <h6>Categorías guardadas:</h6>

                                    <ul class="mt-2 listaCategorias" id="catGuardadas">
                                            <li class="itemCategoria">
                                                <a class="EliminarCategoria" onclick = "EliminarCategoria(this)"> x </a> 
                                                <h6 class = "nombreCateg">Categoria</h6>
                                            </li>
                                            <li class="itemCategoria">
                                                <a class="EliminarCategoria" onclick = "EliminarCategoria(this)"> x </a> 
                                                <h6 class = "nombreCateg">Categoria2</h6>
                                            </li>


                                    </ul>
                                </div>
                            </div>
                            <div class="col-8">
                                <label for="categoria">Elige una categoría:</label>
                                <div class="custom-select">
                                    <select id="sbCategorias">

                                        <?php
                                        if ($row == NULL) { ?>
                                            <option value="0">No hay categorias</option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="0">Escoge una categoria</option>
                                            <?php //for ($i= 0; $i< count($row)-2*(count($row)/3); $i++){
                                            $i = 0;
                                            foreach ($row as $key => $value) {

                                            ?>
                                                <option value="<?php $value['id_categoria'] ?>"> <?php echo $value['nombre']; ?> </option>
                                                <!-- <option value="1">Otro</option>-->

                                        <?php $i++;
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="text-right mt-2">
                                    <a class="btn btn-secondary" id="NewCateg2">+</a>
                                </div>

                                <div class="mt-2">
                                    <label for="categoriaInput">Agrega una nueva:</label>
                                    <input type="categoria" class="inputText mb-2" id="categoriaInput" name="categoriaNombre" placeholder="Ingrese la categoría" name="categoriaInput">
                                    <textarea class="inputText inputTextarea mb-2" id="descripcionCortaCurso" name="categoriaDesc" rows="2" wrap="hard" placeholder="Ingrese una descripción de presentacion" name="DescCorta" maxlength="150" pattern="[A-Za-z0-9]{3,150}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 150"></textarea>
                                </div>
                                <div class="text-right">
                                    <a class="btn btn-secondary" id="NewCateg">+</a>
                                </div>
                                <div class="text-right mt-5">
                                    <button type="submit" id="btnAgregarCategorias" class="btn btn-primary">Guardar categorias</button>
                                </div>  
                            </div>
                        </div>
                    </div>

                </form>
                 <!-- Agregar recursos -->
                <form class="needs-validation mt-4" id="formCrearCategoria" novalidate method="post" action='Procedimientos/RegistrarCategoria.php' enctype="multipart/form-data">
                    <div class="inputInfoCurso">
                        <label for="videoCapitulo">Agregar recurso multimedia:</label><br>
                        <ul id="listaRecursos">
                            <div class="">
                                <input type="file" class="" id="" name="filename">
                                <label class="" for="customFile"></label>
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
                        <button type="submit" id="btnAgregarMultimedia" class="btn btn-primary ">Agregar multimedia</button>
                    </div>
                                      
                </form>
            </div>
        </div>
    </div>

    <!--js -->
    <script src="js/crearCurso.js"></script>
    <script src="js/validaciones.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="js/validaciones.js"></script>-->
</body>

</html>