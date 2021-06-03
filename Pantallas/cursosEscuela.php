<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mis cursos</title>
        <!-- css -->
        <link rel="stylesheet" href="css/cursosEscuela.css">
        <?php require("Procedimientos/cursosCreados.php"); ?>
    </head>
    <body>
        <!-- SideBar -->
        <?php include("sidebar.php"); ?>
        <div class="box">
            <div class="container mt-5 mb-5">
                <div class="row">                   
                    <div class="col-8 cursos">
                        <div class="cabeceraCursos">
                            <h4><?php echo $conteo ?> cursos en total</h4>
                            <h5><?php echo $rowCursosTotal[0]['alumnos'] ?> alumnos en total</h5>
                            <small>
                                GANANCIAS TOTALES: $<?php echo $rowCursosTotal[0]['totalVentas'] ?>.00MX
                            </small>                            
                        </div>
                        <div id="boxCursos">
                            <?php if ($rowCursosCreados == NULL) { ?>
                                <div class='text-center'>
                                    <h5 style="color:whitesmoke">No has creado ningún curso.</h5>
                                </div>
                            <?php } else { ?>
                                <?php
                                foreach ($rowCursosCreados as $key => $value) {
                                    $titulo = $value['titulo'];
                                    $autor = $value['nombrecomp'];
                                    $imagen = $value['imagen'];
                                    $descripcion = $value['descripcion'];
                                    $costo = '$' . $value['costo'] . '.00MX';
                                    $id_curso = $value['id_curso'];
                                    ?>


                                    <div class="card bg-secondary text-white">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img class="imgCurso" src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>">
                                                </div>
                                                <div class="col-8">
                                                    <h4><?php echo $titulo ?> </h4>
                                                    <p><?php echo $descripcion ?></p>
                                                    <small>PRECIO: <?php echo $costo ?></small>
                                                    <div class="text-right">
                                                        <button class="a btn-primary btn btnVerMas">
                                                            <h6 class="d-none"><?php echo $id_curso ?> </h6>
                                                            Ver más
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>




                    </div>
                    <div class="col-4 boxGanancias invisible">
                        <div class="boxCabecera">
                            
                        </div>
                        <ul class="listaAlumnos">
                            <!--<li>
                                <h6>Nombre del estudiante</h6>
                                <div class="boxProgreso">
                                    <div class="cajaProgresoTotal">
                                        <div class="cajaProgresoActual"></div>
                                    </div>
                                    <label class="progresoLabel">25% Completado</label>
                                </div>
                            </li>-->
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {

                $('.btnVerMas').click(function () {
                    let frmData = new FormData();
                    frmData.append("id_curso", $(this).find('h6').text());
                    $.ajax({
                        url: 'Procedimientos/infoCursoProfesor.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            $(".cabeceraListaAlumnos").remove();
                            $(".boxCabecera").append(res);
                            $(".boxGanancias").removeClass("invisible");
                            $.ajax({
                                url: 'Procedimientos/alumnosPorCurso.php',
                                contentType: false,
                                processData: false,
                                cache: false,
                                type: 'POST',
                                data: frmData,
                                success: function (res) {
                                    $(".alumnosItem").remove();
                                    $(".listaAlumnos").append(res);                              
                                }
                            });

                        }
                    });
                    return false;
                });

            }
            );

        </script>
    </body>
</html>
