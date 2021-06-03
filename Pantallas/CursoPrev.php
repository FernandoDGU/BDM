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
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    require("./Connection_db/classConecction.php");
    $newConn2 = new ConnectionMySQL();
    $newConn2->CreateConnection();
    $query = " CALL sp_cursos(3, $id_curso,null, null, null, null, null,null, null, null);";
    $result = $newConn2->ExecuteQuery($query);

    $userId = $_SESSION['idUser'];
    if ($result) {
        /* $rowCursos = mysqli_fetch_array($result, MYSQLI_ASSOC);        
          $tituloCurso = $rowCursos['titulo'];
          $costo = '$' . $rowCursos['costo'] . '.00MX';
          $descCorta = $rowCursos['descripcion_corta'];
          $imagen = $rowCursos['imagen']; */
        while ($rowCursos = mysqli_fetch_assoc($result)) {
            $arrayDatosc[] = $rowCursos;
        }
        $tituloCurso = $arrayDatosc[0]['titulo'];
        $costo = '$' . $arrayDatosc[0]['costo'] . '.00MX';
        $descCorta = $arrayDatosc[0]['descripcion_corta'];
        $descLarga = $arrayDatosc[0]['descripcion'];
        $imagen = $arrayDatosc[0]['imagen'];
        $nombreAutor = $arrayDatosc[0]['nombrecomp'];
        $idAutor = $arrayDatosc[0]['id_usuario'];
        
        $newConn2->CreateConnection();
        $queryComent = " CALL sp_comentarios (2, null,null, $id_curso, null, 0, 0);";
        $resultComent = $newConn2->ExecuteQuery($queryComent);
        $rowComent = mysqli_fetch_all($resultComent, MYSQLI_ASSOC);

        $newConn2->CreateConnection();
        $queryCateg = " call sp_curso_categoria(5, null, $id_curso, null);";
        $resultCateg = $newConn2->ExecuteQuery($queryCateg);
        $rowCateg = mysqli_fetch_all($resultCateg, MYSQLI_ASSOC);


        //TRAER LIKES 
        $newConn2->CreateConnection();
        $querylikes = " CALL sp_comentarios (3, null,null, $id_curso, null, 0, 0);";
        $resullikes = $newConn2->ExecuteQuery($querylikes);
        $rowlikes = mysqli_fetch_all($resullikes, MYSQLI_ASSOC);

        // TRAER DISLIKES
        $newConn2->CreateConnection();
        $querydislike = "CALL sp_comentarios (4, null,null, $id_curso, null, 0, 0);";
        $resultdislike = $newConn2->ExecuteQuery($querydislike);
        $rowdislike = mysqli_fetch_all($resultdislike, MYSQLI_ASSOC);

        // CARGAR CAPITULOS
        $newConn2->CreateConnection();
        $queryCapitulos = "Call sp_curso_niveles(2, null, $id_curso, null, null, null, null, null);";
        $resultCapitulos = $newConn2->ExecuteQuery($queryCapitulos);
        $rowCapitulos =  mysqli_fetch_all($resultCapitulos, MYSQLI_ASSOC);

        // TRAER SI YA COMPRASTE ESTE CURSO
        $newConn2->CreateConnection();
        $queryFunction = "select CursoComprado($userId, $id_curso) as datos;";
        $resultFunction = $newConn2->ExecuteQuery($queryFunction);
        $rowCapFunction =  mysqli_fetch_all($resultFunction, MYSQLI_ASSOC);

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--Css  -->
        <link rel="stylesheet" href="css/CursoPrev.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jquery --->        
        <script type="text/javascript" src="libs/jquery-3.5.1.min.js" ></script>
        <!-- checar los comentarios y capitulos---> 

        <?php //require("Procedimientos/getComentarios.php");  ?>


    </head>
    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <div class="container">
            <div class="row contenedorCurso">
                <div class="infoCurso col-lg-6 col-sm-12 ">

                    <input id="txtId" type="text" value="<?php echo $idUser ?>" class="d-none invisible" name="idusario">

                    <!-- Cambiar al id del curso cuando lo tengamos-->
                    <input id="txtIdCurso" type="text" value="<?php echo $id_curso ?>" class="d-none invisible" name="idCurso">

                    <h1><?php echo $tituloCurso ?> </h1>
                    <div class='d-lg-flex'>
                        <?php if ($rowCateg == NULL) { ?>
                        <?php } else { ?>
                            <?php
                            foreach ($rowCateg as $key => $value) {
                                if($key == 0){
                                     $nombre = $value['nombre'];
                                }else{
                                     $nombre = ','.' '.$value['nombre'];
                                }
                               
                                ?>
                                <h5 class="textCat"><?php echo $nombre ?></h5>
                            <?php } ?>
                        <?php } ?>
                    </div>

                   
                    <h6><?php echo $nombreAutor ?></h6>

                    <!-- LIKES  -->
                    <?php if ($rowlikes == NULL) { ?>
                        <small id="smallLikes">0</small>
                        <i
                        class="fa fa-thumbs-up" 
                        id="likesCurso"
                        ></i>
                    <?php } else { ?> <?php ?>
                        <?php foreach ($rowlikes as $key => $value) {?>
                            <small id="smallLikes"> <?php echo $value['likes']?> </small>
                                    <i
                                    class="fa fa-thumbs-up" 
                                    id="likesCurso"
                                    ></i>
                        <?php } ?>
                       
                    <?php } ?>

                    <!-- DISLIKES  -->
                    <?php if ($rowdislike == NULL) { ?>

                        <small id="smallDislikes">0</small>
                        <i  
                        class="fa fa-thumbs-down" 
                        id="dislikesCurso"
                        ></i>

                    <?php } else { ?> <?php ?>
                        <?php foreach ($rowdislike as $key => $value) {?>
                            <small id="smallDislikes"><?php echo $value['dislikes']?></small>
                                <i  
                                class="fa fa-thumbs-down" 
                                id="dislikesCurso"
                                ></i>
                        <?php } ?>
                        
                    <?php } ?>
                    

                    <hr style="background-color: #5d5d5d;">
                    <p><?php echo $descCorta ?></p>
                     <p><?php echo $descLarga ?></p>
                    <h3><?php echo $costo ?></h3>
                    <!-- Validación para usuarios -->
                    <?php if($idUser != $idAutor &&  $rol != 0){?>

                        <!-- No tienes el curso -->
                        <?php if($rowCapFunction != NULL){?> 
                                <?php foreach ($rowCapFunction as $key => $value){?>
                                    <?php if ($value['datos'] == null){?>
                                        <a id="btnComprar" href="carritoPago.php?id=<?php echo $id_curso?>" class="btn btn-primary btn-block">Comprar</a>

                                    <?php }else{?>>
                                        <a id="btnComprar" disabled class="btn btn-primary btn-block">Comprar</a>
                                        <h4 style="color: red; text-align: center">Ya cuentas con este curso</h4>
                                        <?php }?>
                                <?php }?>

                                
                        <?php }?>   
                    <!-- <h4 style="color: red; text-align: center">Ya cuentas con este curso >:(</h4> -->
                    <?php } else{ ?>
                    <a id="btnComprar" disabled class="btn btn-primary btn-block">Comprar</a>
                    
                        
                    <?php }?>
                </div> 
                <div class="imagenCurso col-lg-6 col-sm-12">
                    <div class="tituloPresentacion">
                        <h6  class="decoracion"  id="menuPresentacion">Presentación</h6>
                        <h6 id="menuCapitulos">Capitulos</h6>
                    </div>


                    <!-- Cargar capitulos -->
                    <img id="imagenP" src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>">
                    <div class="contenedorCapitulos hide">
                        <ul class="capitulosCurso">
                        <?php ?>
                        <?php if($rowCapitulos == NULL){?>
                            <?php } else{ ?>
                                <?php
                                foreach ($rowCapitulos as $key => $value) { 
                                    ?>
                                    <li class="capitulo">
                                        <h4>Capitulo <?php echo $key + 1?> : <?php echo $value['titulo'] ?></h4>
                                        <p><?php echo $value['descripcion'] ?></p>
                                    </li>
                                    <?php }?>
                            <?php }?>
                        </ul>
                    </div>
                </div> 
            </div>
            <!-- Ingresar comentarios -->


            <form class="needs-validation"  id="formComentar" novalidate method="POST" enctype="multipart/form-data">
                <div class="calCurso">
                    <h3 id="tituloCalificar">¡Califica el curso!</h3>

                    <div class="inputComentar">
                        <i
                            class="fa fa-thumbs-up" 
                            id="likeIcon"></i>
                        <i  
                            class="fa fa-thumbs-down" 
                            id="dislikeIcon"></i>
                        <input 
                            id="checkLike" 
                            class="d-none" 
                            type="checkbox" 
                            checked name = "CheckLikes">
                        <input type="text" id = "txtComentario" placeholder="Escribe un comentario" required>
                        <button id="btnComentar">Comentar</button>
                    </div>
                </div>
            </form>

            <!-- Mostrar comentarios -->
            <div class="contenedorComentarios col-12">
                <h2 class="tituloComentario">Comentario de los alumnos</h2>
                <!--<hr style="align-self: center; width: 76%; background-color: #5d5d5d;">-->

                <ul class="seccionComentarios">
                    <?php if ($rowComent == NULL) { ?>
                        <div class='text-center'>
                            <h5 style="color:whitesmoke">No hay ningún comentario acerca de este curso.</h5>
                        </div>
                    <?php } else { ?>
                        <?php
                        foreach ($rowComent as $key => $value) {
                            $usuario = $value['username'];
                            $comentario = $value['comentario'];
                            $imagen = $value['imagen'];
                            $calificacion = $value['calificacion'];
                            ?>
                            <li class="comentario">
                                <img class="imgUsuarioComentario" src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($imagen) ?>">
                                <div class="infoComentario">
                                    <div class="tituPONE">
                                        <h5><?php echo $usuario ?></h5>
                                        <?php if ($calificacion == "1") { ?>
                                            <small class="comentarioPositivo">POSITIVO</small>
                                        <?php } else { ?>    
                                            <small class="comentarioNegativo">NEGATIVO</small>
                                        <?php } ?>
                                    </div>
                                    <p><?php echo $comentario ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>

                    <!--<li class="comentario">
                        <img class="imgUsuarioComentario" src="images/icn1.png">
                        <div class="infoComentario">
                            <div class="tituPONE">
                                <h5>Edgardo Gabriel de la Cruz</h5><small class="comentarioPositivo">POSITIVO</small>
                            </div>
                            <p>Varias cosas de las que no tenía conocimiento, me abrió más oportunidad de expansión
                                sobre mis herramientas a la hora de usar, estoy muy agradecido, es un curso muy completo
                                de los conocimientos necesarios que necesitaría un principiante.
                            </p>
                        </div>
                    </li>
                    <li class="comentario">
                        <img class="imgUsuarioComentario" src="images/icn1.png">
                        <div class="infoComentario">                      
                            <div class="tituPONE">
                                <h5>Francisco Muriel Sabariego</h5><small class="comentarioNegativo">NEGATIVO</small>
                            </div>
                            <p>este curso me fue de gran ayuda pues aprendí vastante, ahora solo falta practicar mucho. Gracias</p>
                        </div>
                    </li>-->
                </ul>

            </div>
        </div>
        <!-- Footer -->
        <?php include("footer.php"); ?>

        <script type="text/javascript">
            $(document).ready(function () {
                var seccionComentariosLongitud = $(".seccionComentarios").children().length;
                if (seccionComentariosLongitud < 6) {
                    $(".seccionComentarios").css({'overflow-y': 'hidden', 'height': 'auto'});
                }

                var capitulosLongitud = $(".capitulosCurso").children().length;
                if (capitulosLongitud < 4) {
                    $(".contenedorCapitulos").css({'overflow-y': 'hidden', 'height': 'auto'});
                }
                $("#menuPresentacion").click(function () {
                    $(".contenedorCapitulos").addClass("hide");
                    $(".contenedorCapitulos").removeClass("show");
                    $("#menuCapitulos").removeClass("decoracion");
                    $("#imagenP").addClass("show");
                    $("#menuPresentacion").addClass("decoracion");
                    $("#imagenP").removeClass("hide");

                });
                $("#menuCapitulos").click(function () {
                    $("#imagenP").addClass("hide");
                    $("#imagenP").removeClass("show");
                    $("#menuPresentacion").removeClass("decoracion");
                    $("#menuCapitulos").addClass("decoracion");
                    $(".contenedorCapitulos").addClass("show");
                    $(".contenedorCapitulos").removeClass("hide");
                });
                $("#likeIcon").click(function () {
                    $("#checkLike").attr('checked', 'checked');
                    $(this).css({'color': '#eb6953'});
                    $("#dislikeIcon").css({'color': '#925d54'});

                });
                $("#dislikeIcon").click(function () {
                    $("#checkLike").removeAttr('checked');
                    $(this).css({'color': '#eb6953'});
                    $("#likeIcon").css({'color': '#925d54'});
                });

                $('#btnComentar').click(function () {
                    
                            let frmData = new FormData();
                            frmData.append("comentario", $('#txtComentario').val());
                            frmData.append("id_usuario", $('#txtId').val());
                            frmData.append("id_curso", $('#txtIdCurso').val());
                            // frData.append("voto", $('#checkLike').checkdate());
                            if (document.getElementsByName('CheckLikes')[0].checked)
                            {
                                frmData.append('CheckLikes', $('input[name=CheckLikes]').val());
                            }
                            $.ajax({
                                url: 'Procedimientos/Comentario.php',
                                contentType: false,
                                processData: false,
                                cache: false,
                                type: 'POST',
                                data: frmData,
                                success: function (res) {
                                    alert(res);
                                    $('#txtComentario').val("");
                                    
                                    window.location.reload();
                                }
                            });
                            return false;
                        
                });

            });
        </script>

    </body>

</html>