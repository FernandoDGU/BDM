<?php

/*class Capitulo {

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
}*/
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear capitulos</title>
        <!--Css  -->
        <link rel="stylesheet" href="css/crearCurso.css">
        

    </head>
    <body>
        <!-- SideBar -->
        <?php include("sidebar.php"); ?>
        <div class="box">
            <div class="container mt-5 mb-5">

                <div class="form-box">
                    <div class="menuAuto">
                        <h6 id="menuCrearCurso">Informacion del curso</h6>
                        <h6 id="menuFlechita">></h6>
                        <h6 class="decoracion" id="menuAgregarCapitulos">Agregar capitulos</h6>
                    </div>
                    <div class="agregarCapitulo mt-4" id="agregarCapitulo">
                        <h5>Agregar capitulos</h5>
                        <form class="boxAgregarDatosCapitulos mb-5" action="" method="POST" enctype="multipart/form-data">
                            <div class="inputInfoCurso">
                                <label for="tituloCapitulo">Titulo del capitulo:</label>
                                <input type="text" class="form-control" id="tituloCapitulo" placeholder="Ingrese el titulo del curso" name="tituloCapitulo" maxlength="150" pattern="[A-Za-z0-9]{3,150}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 150">
                            </div>
                            <div class="inputInfoCurso">
                                <label for="descripcionCapitulo">Descripción:</label>
                                <textarea class="form-control" id="descripcionCapitulo" rows="2" wrap="hard" placeholder="Ingrese una descripción de presentacion" name="descripcion" maxlength="500" pattern="[A-Za-z0-9]{3,500}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 500"></textarea>
                            </div>
                            <div class="inputInfoCurso">
                                <label>Video:</label>
                                <div class="">
                                    <input type="file" class="" id="customFileLang1" lang="es">
                                    <!-- <label class="" for="customFileLang">Seleccionar Archivo</label> -->
                                </div>
                            </div>
                            <div class="inputInfoCurso">
                                <input id="cbPrecioCapitulo" name = "cbPrecioCapitulo" type="checkbox"><label>Gratis</label>
                            </div>
                            <div class="inputInfoCurso text-right">
                                <input type="button" id="btnAgregarCapitulo" class="btn btn-primary" value="Agregar Capitulo">
                            </div>

                        </form>



                        <h5>Recursos extra</h5>
                        <form class="needs-validation mt-4" id="formRecursosCurso" novalidate method="post" action='Procedimientos/RegistrarCategoria.php' enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <div id="boxRecursosGuardados">
                                            <label>Recursos guardados:</label>
                                            <ul class="listaCategorias" id="recGuardadas">
                                                <!--<li class="itemCategoria">
                                                    <a class="EliminarCategoria" onclick="EliminarCategoria(this)"> x </a>
                                                    <h6 class="nombreCateg">Categoria</h6>
                                                </li>-->

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-8">

                                        <div class="">
                                            <label for="videoCapitulo">Agregar recurso multimedia:</label><br>
                                            <!-- <div class="input-group mb-3 w-100"> -->
                                                <!-- <div class="input-group-prepend"> -->
                                                    <!-- <label class="input-group-text" for="inputGroupSelect01">Tipo de archivo</label> -->
                                                <!-- </div> -->
                                                <!-- <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Elige</option>
                                                    <option value="1">Imagen</option>
                                                    <option value="2">Video</option>
                                                    <option value="3">PDF</option>
                                                    <option value="3">TXT</option>
                                                </select> -->

                                            <!-- </div> -->
                                            <ul id="listaRecursos">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="Archivo" lang="es">
                                                    <label class="custom-file-label" for="customFileLang1">Seleccionar Archivo</label>
                                                </div>
                                            </ul>
                                            <div class="text-right">
                                                <a id="agregarRecurso" class="btn btn-secondary">+</a>
                                            </div>
                                        </div>
                                        <div class="">
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
                                    </div>
                                </div>
                            </div>




                        </form>
                       <!-- <div class="CapitulosAgregados">
                            <h5>Capitulos Guardados </h5>
                            <ul class="listaprueba">
                             <li class="cap">test</li>
                             <li class="cap">test</li>
                             <li class="cap">test</li>
                             </ul>
                            <ul id="listaCapitulosAgregados">
                                <?php /*
                                $contador = 0;

                                foreach ($capitulos as $key => &$cap) {

                                    $contador++;*/
                                    ?>
                                    <li id="<?php // echo $cap->Id ?>">
                                        <div class="row wom">
                                            <div class="col-2 columNumeroCapitulo">
                                                <p class="">
                                                    Capitulo <?php //echo $contador ?>
                                                </p>
                                            </div>
                                            <div class="col-10 columInfoCapitulo">
                                                <input class="inputCapituloTitulo  mb-2" id="" name="capituloTitulo" type="text" value="<?php //echo $cap->Titulo ?>">
                                                <br>
                                                <p class="inputCapituloDescripcion  mb-2"></p>
                                                <textarea class="textareaCapituloDescripcion form-control  mb-2" id="" name="capituloDescripcion"> <?php // echo $cap->Descripcion ?></textarea>
                                                <input type="file" class="videoCapituloAgregado  mb-2" id="" name="capituloVideo" accept="video/*" pattern="[A-Za-z0-9]" title="Sube un archivo"> 
                                                <div class="custom-file mb-2">
                                                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                                                    <label class="custom-file-label lblCapitulos" for="customFile" value="<?php //echo $cap->video ?>"><?php //echo $cap->video ?></label>
                                                </div>
                                                <input class="cbPrecioCapituloAgregado mb-2" type="checkbox"><label>Gratis</label>
                                                <div class="text-right">
                                                    <a class="btn btn-secondary btnEliminarCapitulo" href="crearCurso.php?id=<?php //echo $key ?>&action=delete">
                                                        Retirar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <?php
                                //}
                                ?>
                            </ul>

                        </div>-->
                        <div class="text-right">
                            <input type="button" id="btnAgregarCapitulosCompletos" class="btn btn-primary" value="Guardar Capitulos">
                        </div>
                    </div>
                </div>
            </div>
        </div>

           <!--js -->
            <script src="js/validaciones.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">

            $(document).ready(function () {

                $(".custom-file-input").on("change", function () {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });


                $('#btnAgregarCapitulo').click(function(){
                        let frmData = new FormData();
                        // descripcionCapitulo customFileLang1
                        frmData.append("tituloCapitulo", $('#tituloCapitulo').val());
                        frmData.append("descripcionCapitulo", $('#descripcionCapitulo').val());

                        if(document.getElementsByName('cbPrecioCapitulo')[0].checked)
                        {frmData.append( 'cbPrecioCapitulo', $('input[name=cbPrecioCapitulo]').val());}

                        // frmData.append("customFileLang1", $('#customFileLang1').val());
                        frmData.append('customFileLang1', $('#customFileLang1')[0].files[0]);

                        $.ajax({
                            url: 'Procedimientos/addCapitulo.php',
                            contentType: false,
                            processData: false,
                            cache: false,
                            type: 'POST',
                            data: frmData,
                            success: function (res) {
                                alert(res);
                            },error: function(XHR,text,errorthrow){
                                debugger;
                            }
                        });
                        return false;

                });

                $('#agregarRecurso').click(function(){
                    let frmData = new FormData();
                    frmData.append("archivo", $('#Archivo').val());

                    $.ajax({
                        url: 'Procedimientos/RegistrarCategoria.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            $('#catGuardadas').append(res);
                            // $('#sbCategorias').load(location.href+" #sbCategorias>*","");
                            //alert(res);
                        }
                    });
                    return false;
                });

                $('#agregarEnlace').click(function(){       
                    alert("Boton agregar Enlace")


                });

                



            });
        </script>
    </body>
</html>
