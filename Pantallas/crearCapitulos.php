<?php
/* class Capitulo {

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
  } */
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

                <!-- ID DEL NIVEL O CAPITULO -->
                <input id="levelId" type="text" class="d-none invisible" name="levelId">

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
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang1" lang="es">
                                    <label class="custom-file-label" for="Archivo" >Seleccionar Archivo</label>
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


                                <div class="">
                                    <label for="videoCapitulo">Agregar recurso multimedia:</label><br>
                                    <ul id="listaRecursos">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="Archivo" lang="es" disabled>
                                            <label class="custom-file-label" for="Archivo" >Seleccionar Archivo</label>
                                        </div>
                                    </ul>
                                    <div class="text-right">
                                        <button id="agregarRecurso" class="btn btn-secondary" disabled>+</button>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="videoCapitulo">Agregar enlace de referencia:</label><br>
                                    <ul id="listaEnlaces">
                                        <div class="boxEnlace">
                                            <label for="tituloEnlace">Titulo:</label>
                                            <input class="form-control" type="text" id = "idTitulo" name="Titulo" placeholder="Ingrese el titulo del enlace" maxlength="150" disabled>
                                            <label class="mt-3" for="enlaceURL" >URL:</label>
                                            <input class="form-control" type="text" id="idUrl" name= "Url" placeholder="Ingrese la URL" maxlength="150" disabled>
                                        </div>
                                    </ul>
                                    <div class="text-right" >
                                        <button id="agregarEnlace" class="btn btn-secondary" disabled >+</button>
                                    </div>
                                </div>
                                <div class="text-right mt-5">
                                    <!-- <button type="submit" id="btnAgregarOtroCurso" class="btn btn-primary ">Agregar otro capitulo</button> -->
                                </div>

                            </div>
                        </form>
                        <div class="text-right">
                            <input type="button" id="btnAgregarCapitulosCompletos" class="btn btn-primary" value="Agregar otro capitulo" disabled>
                            <input type="button" id="btnTerminar" class="btn btn-primary" value="Terminar" disabled>
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


                $('#btnAgregarCapitulo').click(function () {
                    let frmData = new FormData();
                    // descripcionCapitulo customFileLang1
                    frmData.append("tituloCapitulo", $('#tituloCapitulo').val());
                    frmData.append("descripcionCapitulo", $('#descripcionCapitulo').val());

                    if (document.getElementsByName('cbPrecioCapitulo')[0].checked)
                    {
                        frmData.append('cbPrecioCapitulo', $('input[name=cbPrecioCapitulo]').val());
                    }

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
                            alert("Capitulo agregado");
                            $('#levelId').val(res);

                            // disable to able
                            document.getElementById("agregarEnlace").disabled = false;
                            document.getElementById("idUrl").disabled = false;
                            document.getElementById("idTitulo").disabled = false;
                            document.getElementById("Archivo").disabled = false;
                            document.getElementById("agregarRecurso").disabled = false;
                            document.getElementById("btnAgregarCapitulosCompletos").disabled = false;
                            document.getElementById("btnTerminar").disabled = false;


                            // able to disable
                            document.getElementById("tituloCapitulo").disabled = true;
                            document.getElementById("descripcionCapitulo").disabled = true;
                            document.getElementById("cbPrecioCapitulo").disabled = true;
                            document.getElementById("customFileLang1").disabled = true;
                            document.getElementById("btnAgregarCapitulo").disabled = true;

                            // window.scrollTo(0,document.body.scrollHeight);
                            window.scrollTo({top: 1000, behavior: 'smooth'});

                        }, error: function (XHR, text, errorthrow) {
                            debugger;
                        }
                    });
                    return false;

                });

                $('#agregarRecurso').click(function () {
                    let frmData = new FormData();
                    frmData.append('archivo', $('#Archivo')[0].files[0]);
                    frmData.append("idNivel", $('#levelId').val())
                    $.ajax({
                        url: 'Procedimientos/addArchivos.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            alert("Recurso guardado con exito");
                            document.getElementById("Archivo").value = "";
                        }
                    });
                    return false;
                });

                $('#agregarEnlace').click(function () {
                    let frmData = new FormData();
                    frmData.append("idNivel", $('#levelId').val())
                    frmData.append("Titulo", $('#idTitulo').val())
                    frmData.append("Url", $('#idUrl').val())
                    $.ajax({
                        url: 'Procedimientos/addEnlaces.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            alert(res);
                            document.getElementById("idTitulo").value = "";
                            document.getElementById("idUrl").value = "";
                        }
                    });
                    return false;
                });

                $("#btnAgregarCapitulosCompletos").click(function () {
                    window.scrollTo({top: 0, behavior: 'smooth'});
                    document.getElementById("tituloCapitulo").value = "";
                    document.getElementById("descripcionCapitulo").value = "";
                    document.getElementById("customFileLang1").value = "";
                    document.getElementById("cbPrecioCapitulo").checked = false;
                    document.getElementById("idUrl").value = "";
                    document.getElementById("idTitulo").value = "";
                    document.getElementById("Archivo").value = "";
                    alert("Datos limpiados");

                    // able to disable
                    document.getElementById("agregarEnlace").disabled = true;
                    document.getElementById("idUrl").disabled = true;
                    document.getElementById("idTitulo").disabled = true;
                    document.getElementById("Archivo").disabled = true;
                    document.getElementById("agregarRecurso").disabled = true;
                    document.getElementById("btnAgregarCapitulosCompletos").disabled = true;
                    document.getElementById("btnTerminar").disabled = true;

                    //disable to able
                    document.getElementById("tituloCapitulo").disabled = false;
                    document.getElementById("descripcionCapitulo").disabled = false;
                    document.getElementById("cbPrecioCapitulo").disabled = false;
                    document.getElementById("customFileLang1").disabled = false;
                    document.getElementById("btnAgregarCapitulo").disabled = false;

                });

                $("#btnTerminar").click(function () {
                    window.location.href = "index.php";
                });
                
              
            });
        </script>
    </body>
</html>
