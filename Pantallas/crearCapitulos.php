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

<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear capitulos</title>
        <!--Css  -->
        <link rel="stylesheet" href="css/crearCurso.css">
        <script type="text/javascript">
            $(document).ready(function () {

                $(".custom-file-input").on("change", function () {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });

            });
        </script>

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
                        <form class="boxAgregarDatosCapitulos" action="" method="POST" enctype="multipart/form-data">
                            <div class="inputInfoCurso">
                                <label for="tituloCapitulo">Titulo del capitulo:</label>
                                <input type="text" class="form-control" id="tituloCapitulo" placeholder="Ingrese el titulo del curso" name="tituloCurso" maxlength="150" pattern="[A-Za-z0-9]{3,150}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 150">
                            </div>
                            <div class="inputInfoCurso">
                                <label for="descripcionCapitulo">Descripción:</label>
                                <textarea class="form-control" id="descripcionCapitulo" rows="2" wrap="hard" placeholder="Ingrese una descripción de presentacion" name="descripcion" maxlength="500" pattern="[A-Za-z0-9]{3,500}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 500"></textarea>
                            </div>
                            <div class="inputInfoCurso">
                                <label>Video:</label>
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

                        </form>
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
                                                <input class="inputCapituloTitulo  mb-2" id="" name="capituloTitulo" type="text" value="<?php echo $cap->Titulo ?>">
                                                <br>
                                                <!--<p class="inputCapituloDescripcion  mb-2"></p>-->
                                                <textarea class="textareaCapituloDescripcion form-control  mb-2" id="" name="capituloDescripcion"> <?php echo $cap->Descripcion ?></textarea>
                                                <!--<input type="file" class="videoCapituloAgregado  mb-2" id="" name="capituloVideo" accept="video/*" pattern="[A-Za-z0-9]" title="Sube un archivo"> -->
                                                <div class="custom-file mb-2">
                                                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                                                    <label class="custom-file-label lblCapitulos" for="customFile" value="<?php echo $cap->video ?>"><?php echo $cap->video ?></label>
                                                </div>
                                                <input class="cbPrecioCapituloAgregado mb-2" type="checkbox"><label>Gratis</label>
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

    </body>
</html>
