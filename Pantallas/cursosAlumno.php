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
        <!--Css  -->
        <link rel="stylesheet" href="css/cursosAlumno.css">
        <?php require("Procedimientos/cursosComprados.php"); ?>
    </head>
    <body>
        <!-- SideBar -->
        <?php include("sidebar.php"); ?> 
        <div class="box">        
            <div class="container mt-5 mb-5">
                <h1 id="tituloMisCursos">Mis cursos</h1><hr style="background-color: whitesmoke">
                <div class=" row">
                    <?php if ($rowCursosC == NULL) { ?>
                        <div class='text-center'>
                            <h5 style="color:whitesmoke">No has comprado ningún curso.</h5>
                        </div>
                    <?php } else { ?>
                        <?php
                        foreach ($rowCursosC as $key => $value) {
                            $titulo = $value['titulo'];
                            $autor = $value['nombrecomp'];
                            $imagen = $value['imagen'];
                            $id_curso = $value['id_curso'];
                            if ($key % 4 == 0) {
                                ?>
                                </div>
                                <div class=" row">
                                     <div class="card">
                                     <!-- Redirrecion -->
                                        <a href="cursoCompleto.php?id=<?php echo $id_curso?>"> <img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>"  class="imagen"> </a>
                                        <div class="contenido" >
                                            <h4 class="titulo">  <?php echo $titulo ?> </h4>
                                            <h6 class="autorCard"> <?php echo $autor ?> </h6>
                                            <div class="boxProgreso">
                                                <div class="cajaProgresoTotal">
                                                    <div class="cajaProgresoActual"></div>
                                                </div>
                                                <label class="progresoLabel">25% Completado</label>
                                            </div>
                                            <a class="enlaceCurso" href="cursoCompleto.php?id=<?php echo $id_curso?>">Continuar curso</a>
                                        </div>                  
                                    </div>
                                <?php } else { ?>

                                <!-- Es por lo de los 4 -->
                                    <div class="card">
                                        <a href="cursoCompleto.php?id=<?php echo $id_curso?>"> <img src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>"  class="imagen"> </a>
                                        <div class="contenido" >
                                            <h4 class="titulo">  <?php echo $titulo ?> </h4>
                                            <h6 class="autorCard"> <?php echo $autor ?> </h6>
                                            <div class="boxProgreso">
                                                <div class="cajaProgresoTotal">
                                                    <div class="cajaProgresoActual"></div>
                                                </div>
                                                <label class="progresoLabel">25% Completado</label>
                                            </div>
                                            <!-- Redirrecion -->
                                            <a class="enlaceCurso" href="cursoCompleto.php?id=<?php echo $id_curso?>">Continuar curso</a>
                                        </div>                  
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>

                        <!--  <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                              <a href="cursoCompleto.php"> <img src="images/ejemplos/imgEjemplo1.jpg" class="imagen"> </a>
                              <div class="contenido" >
                                  <h4 class="titulo"> HTML desde cero</h4>
                                  <h6 class="autorCard">Adrián Eras</h6>
                                  <div class="boxProgreso">
                                      <div class="cajaProgresoTotal">
                                          <div class="cajaProgresoActual"></div>
                                      </div>
                                      <label class="progresoLabel">25% Completado</label>
                                  </div>
                                  <a class="enlaceCurso" href="cursoCompleto.php">Continuar curso</a>
                              </div>                  
                          </div>
                          <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                              <a href="cursoCompleto.php"> <img src="images/ejemplos/imgEjemplo2.jpg" class="imagen"> </a>
                              <div class="contenido" >
                                  <h4 class="titulo"> Photoshop desde cero para principiantes</h4>
                                  <h6 class="autorCard">Patricia Salazar</h6>
                                  <div class="boxProgreso" hidden>
                                      <div class="cajaProgresoTotal" >
                                          <div class="cajaProgresoActual"></div>
                                      </div>
                                      <label class="progresoLabel">25% Completado</label>
                                  </div>
                                  <a class="enlaceCurso" href="cursoCompleto.php">Empezar curso</a>
                              </div>       
      
                          </div>
                          <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                              <a href="cursoCompleto.php"> <img src="images/ejemplos/imgEjemplo3.jpg" class="imagen"> </a>
                              <div class="contenido" >
                                  <h4 class="titulo"> Desarrollo de videojuegos con Unreal Engine 4 </h4>
                                  <h6 class="autorCard">Mariano Rivas</h6>
                                  <div class="boxProgreso" hidden>
                                      <div class="cajaProgresoTotal">
                                          <div class="cajaProgresoActual"></div>
                                      </div>
                                      <label class="progresoLabel">25% Completado</label>
                                  </div>
                                  <a class="enlaceCurso" href="cursoCompleto.php">Empezar curso</a>
                              </div>            
                          </div>
                          <div class="card col-xl col-md-4 col-sm-6 col-xs-12">
                              <a href="cursoCompleto.php"> <img src="images/ejemplos/imgEjemplo4.jpg" class="imagen"> </a>
                              <div class="contenido" >
                                  <h4 class="titulo"> El arte del retrato. Dibujo y pintura </h4>
                                  <h6 class="autorCard">Antonio García Villarán</h6>
                                  <div class="boxProgreso" hidden>
                                      <div class="cajaProgresoTotal">
                                          <div class="cajaProgresoActual"></div>
                                      </div>
                                      <label class="progresoLabel">25% Completado</label>
                                  </div>
                                  <a class="enlaceCurso" href="cursoCompleto.php">Empezar curso</a>
                              </div>            
                          </div>              
      
                      </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Siguiente</a>
                                </li>
                            </ul>
                        </nav>-->

                    </div>
                </div>
                </body>
                </html>
