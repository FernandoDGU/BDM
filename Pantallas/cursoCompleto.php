<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
$id_curso = isset($_GET["id"]) ? $_GET["id"] : 0;
if ($id_curso <= 0) {
    header("Location: /index.php");
    exit();
} else {
    error_reporting(E_ERROR | E_PARSE);
    require("./Connection_db/classConecction.php");
    $newConn2 = new ConnectionMySQL();
    $newConn2->CreateConnection();
    $query = " CALL sp_cursos(3, $id_curso,null, null, null, null, null,null, null, null);";
    $result = $newConn2->ExecuteQuery($query);

    if ($result) {

        while ($rowCursos = mysqli_fetch_assoc($result)) {
            $arrayDatosc[] = $rowCursos;
        }
        $tituloCurso = $arrayDatosc[0]['titulo'];
        $descLarga = $arrayDatosc[0]['descripcion'];
        $nombreAutor = $arrayDatosc[0]['nombrecomp'];
        $idAutor = $arrayDatosc[0]['id_usuario'];

        // CARGAR IMAGEN
        $newConn2->CreateConnection();
        $queryImagen = "CALL spUsuarios (4, $idAutor, null, null,null,null, null, null, null);";
        $resultImagen = $newConn2->ExecuteQuery($queryImagen);
        $rowImagen = mysqli_fetch_all($resultImagen, MYSQLI_ASSOC);

        // CARGAR CAPITULOS
        $newConn2->CreateConnection();
        $queryCapitulos = "Call sp_curso_niveles(2, null, $id_curso, null, null, null, null, null);";
        $resultCapitulos = $newConn2->ExecuteQuery($queryCapitulos);
        $rowCapitulos = mysqli_fetch_all($resultCapitulos, MYSQLI_ASSOC);
    } else {
        echo "Nada esta bien :(";
    }
    $newConn2->CloseConnection();
}
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso</title>
        <!-- jquery --->        
        <script type="text/javascript" src="libs/jquery-3.5.1.min.js" ></script>
        <!-- css -->
        <link rel="stylesheet" href="css/cursoCompleto.css">

      

    </head>
    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <div class="row">

            <input id="txtId" type="text" value="<?php echo $idUser ?>" class="d-none invisible" name="idusario">
            <input id="txtIdCurso" type="text" value="<?php echo $id_curso ?>" class="d-none invisible" name="idCurso">

            <div class="col-4" id="boxListaCapitulos">
                <h5 id="contenidoCursoTitulo">Contenido del curso</h5>

                <!-- LISTA CAPITULOS -->
                <ul id="listaCapitulos">

                    <?php if ($rowCapitulos == NULL) { ?>
                        <li>
                            <label class="tituloCapitulo">No tiene capitulos</label>                       
                        </li>
                    <?php } else { ?>
                        <?php
                        foreach ($rowCapitulos as $key => $value) {
                            if ($key == 0) {
                                ?>
                                <li class="liCapitulo capituloActual">
                                    <!-- <input type="checkbox" class="cbCapituloCurso" > -->
                                    <label class="tituloCapitulo tituloActual" id="<?php echo $value['id_curso_nivel'] ?>">Capitulo <?php echo $key + 1 ?>:  <?php echo $value['titulo'] ?> </label>                       
                                </li>
                                <!-- PONER UN scrollbar -->
                            <?php } else { ?>
                                <li class="liCapitulo">
                                    <label class="tituloCapitulo" id="<?php echo $value['id_curso_nivel'] ?>">Capitulo <?php echo $key + 1 ?>:  <?php echo $value['titulo'] ?> </label>                       
                                </li>
                                <?php
                            }
                        }
                    }
                    ?>
                    <!-- <li class="capituloSeleccionado">
                        <input type="checkbox" class="cbCapituloCurso">
                        <label class="tituloCapitulo">Capitulo 2: Herramientas de Photoshop ( Parte 1)</label>                       
                    </li>-->
                </ul>
            </div>

            <div class="col-8" id="cursoVideo">
                <video id = "videoCapitulo" controls >
                    Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.
                </video>
                <div id="boxInformacionCurso">

                    <div class="menuCurso">
                        <h6 class="decoracion" id="menuInformacionCurso">Información del curso</h6>
                        <h6 id="menuInformaciónProfesor">Información del Profesor</h6>
                        <h6 id="menuRecursosCurso">Recursos del curso</h6>
                    </div>
                    <!-- DATOS DEL CURSO -->
                    <div class="contenidosCurso">
                        <div  id="informacionCurso">
                            <h4 id= "NombreCurso"><?php echo $tituloCurso ?></h4>
                            <p><?php echo $descLarga ?></p>
                        </div>

                        <!--DATOS DEL PROFESOR -->
                        <div class="hide"  id="informaciónProfesor">                          
                            <div  class="infoProfesor " style="display: flex">

                                <?php if ($rowImagen == NULL) { ?>
                                    <img class="imgProfesorCurso" src="images/icn1.png">
                                <?php } else { ?>
                                    <?php foreach ($rowImagen as $key => $value) { ?>
                                        <img class="imgProfesorCurso" src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($value['Imagen']) ?>" alt="">
                                    <?php } ?>
                                <?php } ?>

                                <h4 class="mr-5"><?php echo $nombreAutor ?></h4>
                                <a href="Chat.php" class="btn btn-dark" id="ProfesorMensaje">Enviarle un mensaje</a>

                                <!-- Cambiar al id del profesor -->
                                <input id="txtIdProfe" type="text" value="<?php echo $idAutor ?>" class="d-none" name="idProfesor">
                            </div>

                        </div>

                        <!-- RECURSOS POR CAPITULO -->
                        <div class="hide"  id="recursosCurso">

                            <h4>Recursos compartidos, selecciona un nivel.</h4><hr style="background-color: whitesmoke">
                            <ul class="listaRecursos">
                                <!-- <li>
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
                                </li> -->
                            </ul>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include("footer.php"); ?>
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


                // Mandar mensaje al profesor
                $("#ProfesorMensaje").click(function () {
                    let frmData = new FormData();
                    frmData.append("IdAlumno", $('#txtId').val());
                    frmData.append("IdProfesor", $('#txtIdProfe').val());
                    frmData.append("nombreCurso", $('#NombreCurso').val());
                    $.ajax({
                        url: 'Procedimientos/MensajeProfesor.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                        }
                    });
                });


                // OBTENER EL VIDEO Y LOS ARCHIVOS
                $(".tituloCapitulo").click(function (e) {
                    let frmData = new FormData();
                    frmData.append("idCapitulo", e.currentTarget.id);
                    $.ajax({
                        url: 'Procedimientos/getDatosCapitulo.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            $('.listaRecursos').html("");
                            $('.listaRecursos').append(res);

                            let frmData = new FormData();
                            frmData.append("idCapitulo", e.currentTarget.id);

                            $.ajax({
                                url: 'Procedimientos/showVideos.php',
                                contentType: false,
                                processData: false,
                                cache: false,
                                type: 'POST',
                                data: frmData,
                                success: function (ress) {

                                    if (ress === undefined || ress === "") {
                                        return;
                                    }

                                    // se parsea
                                    // let multimedia = JSON.parse(ress);
                                    let videoContainer = $("#videoCapitulo");
                                    let blobsPathIdx = ress.indexOf("archivos"); //Nombre de carpeta archivos 
                                    let relativePath = ress.substr(blobsPathIdx, ress.length); //multimedia ruta es la ruta del archivo
                                    let finalPath = decodeURI(location.host) + "\\" + decodeURI(relativePath);

                                    videoContainer.html("");
                                    videoContainer.attr('src', "http://" + finalPath);
                                    debugger;
                                    alert(ress);
                                }
                            });
                        }
                    });
                });



                $(".tituloCapitulo").click(function () {
                    $(".liCapitulo").removeClass("capituloActual");
                    $(".tituloCapitulo").removeClass("tituloActual");
                    $(this).parent("li").addClass("capituloActual");
                    $(this).addClass("tituloActual");
                });
            });
        </script>
    </body>
</html>
