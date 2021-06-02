<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busqueda</title>
        <!--Css  -->
        <link rel="stylesheet" href="css/Busqueda.css">
    </head>
    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>


        <div class="Busqueda">
            <!-- <div class="titulo">
                4 Resultados para "blah blah"
            </div> -->
            <div class="row">

                <div class="boxCategorias col-3">
                    <div class="boxFiltros">
                        <small>FILTRAR POR</small>

                        
                        <div class=" btn-group-toggle btnFiltros w-100" data-toggle="buttons">

                            <!-- TITULO -->
                            <label class=" mb-1 btnFiltroItem btn btn-secondary active w-100">
                                <input type="radio" name="options" id="opTitulo" autocomplete="off" checked> Titulo
                            </label>
                            <div class = "input-group">
                            <input type="text" class="form-control" id="BusquedaTitulo" placeholder="Ingrese el titulo" name="BusquedaTitulo"
                                   required>
                            <button id="btnBuscarTitulo">Buscar</button>
                            </div>
                            <br>

                            <!-- Categorias -->
                            <label class=" mb-1 btnFiltroItem btn btn-secondary w-100">
                                <input type="radio" name="options" id="opCategoria" autocomplete="off"> Categoria
                            </label>
                            <div class = "input-group">
                            <input type="text" class="form-control" id="BusquedaCateg" placeholder="Ingrese la categoria" name="BusquedaTitulo"
                                   required>
                            <button id="btnBuscarCateg">Buscar</button>
                            </div>
                            <br>
                            <!-- Usuarios -->
                            <label class=" mb-1 btnFiltroItem btn btn-secondary w-100">
                                <input type="radio" name="options" id="opUsuario" autocomplete="off"> Usuario
                            </label>
                            <div class = "input-group">
                            <input type="text" class="form-control" id="BusquedaUser" placeholder="Nombre del profesor" name="BusquedaTitulo"
                                   required>
                            <button id="btnBuscarUser">Buscar</button>
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- <p>Categorias</p>
                    <ul class="listaCategorias" id="boxCatergorias" >
                        <li>
                            <a href="#">categoría</a>
                        </li>
                        <li>
                            <a href="#">categoría</a>
                        </li>
                        <li>
                            <a href="#">categoría</a>
                        </li>
                        <li>
                            <a href="#">categoría</a>
                        </li>
                        <li>
                            <a href="#">categoría</a>
                        </li>
                        <li>
                            <a href="#">categoría</a>
                        </li>
                        <li>
                            <a href="#">categoría</a>
                        </li>                     
                    </ul> -->

                </div>
                <div class="productos col-9" id = "Cursos">
                    <!-- TRAER CURSOS -->
                    <!-- <div class="item">
                    
                        <a href="CursoPrev.php"><img class="imgCursoBusqueda" src="images/ejemplos/imgEjemplo1.jpg"></a>

                        <div class="description">
                            <span>HTML desde cero</span>
                            <span>Curso de HTML con todas las bases, para todas aquellas personas quieran aprender, y nunca lo habían hecho antes.</span>
                            <span>Adrián Eras</span>
                        </div>

                        <div class="total-price">$279.00MX</div>
                    </div>

                    <div class="item">
                        <a href="CursoPrev.php"><img class="imgCursoBusqueda" src="images/ejemplos/imgEjemplo2.jpg"></a>

                        <div class="description">
                            <span>Photoshop desde cero para principiantes</span>
                            <span>Aprende los tres pilares de Photoshop: capas, máscaras y selecciones. Entonces crea fotomontajes profesionales</span>
                            <span>Patricia Salazar</span>
                        </div>

                        <div class="total-price">$320.00MX</div>
                    </div>

                    <div class="item">
                        <a href="CursoPrev.php"><img class="imgCursoBusqueda" src="images/ejemplos/imgEjemplo3.jpg"></a>

                        <div class="description">
                            <span>Desarrollo de videojuegos con Unreal Engine 4</span>
                            <span>Si eres un apasionado en el desarrollo de los videojuegos, ¡este curso es para ti!</span>
                            <span>Mariano Rivas</span>
                        </div>

                        <div class="total-price">$1,699.00MX</div>
                    </div>

                    <div class="item">
                        <a href="CursoPrev.php"><img class="imgCursoBusqueda" src="images/ejemplos/imgEjemplo4.jpg"></a>

                        <div class="description">
                            <span>El arte del retrato. Dibujo y pintura</span>
                            <span>Aprende todo lo necesario para realizar un retrato. Clases teóricas, prácticas y material adicional. Dibujo y pintura.</span>
                            <span>Antonio García Villarán</span>
                        </div>

                        <div class="total-price">$549.00MX</div>
                    </div> -->


                    <nav class="navPaginacion" aria-label="Page navigation example">
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
                    </nav>
                </div>


            </div>


        </div>

        <!-- AJAX -->
        <script type="text/javascript"> 
        $(document).ready(function(){
            // Ocultar todos
            document.getElementById("BusquedaTitulo").style.display = "none";
            document.getElementById("btnBuscarTitulo").style.display = "none";

            document.getElementById("BusquedaCateg").style.display = "none";
            document.getElementById("btnBuscarCateg").style.display = "none";

            document.getElementById("BusquedaUser").style.display = "none";
            document.getElementById("btnBuscarUser").style.display = "none";

            // Mostrar ocultar
            $("#opTitulo").click(function(){
                document.getElementById("BusquedaTitulo").style.display = "block";
                document.getElementById("btnBuscarTitulo").style.display = "block";
                document.getElementById("BusquedaCateg").style.display = "none";
                document.getElementById("btnBuscarCateg").style.display = "none";
                document.getElementById("BusquedaUser").style.display = "none";
                document.getElementById("btnBuscarUser").style.display = "none";
            });
            
            $("#opCategoria").click(function(){
                document.getElementById("BusquedaCateg").style.display = "block";
                document.getElementById("btnBuscarCateg").style.display = "block";

                document.getElementById("BusquedaUser").style.display = "none";
                document.getElementById("btnBuscarUser").style.display = "none";

                document.getElementById("BusquedaTitulo").style.display = "none";
                document.getElementById("btnBuscarTitulo").style.display = "none";
            });

            $("#opUsuario").click(function(){

                document.getElementById("BusquedaCateg").style.display = "none";
                document.getElementById("btnBuscarCateg").style.display = "none";

                document.getElementById("BusquedaUser").style.display = "block";
                document.getElementById("btnBuscarUser").style.display = "block";

                document.getElementById("BusquedaTitulo").style.display = "none";
                document.getElementById("btnBuscarTitulo").style.display = "none";
            });


            $("#btnBuscarTitulo").click(function(){
                let frmData = new FormData();
                frmData.append("Titulo", $('#BusquedaTitulo').val());
                frmData.append("Categ", "");
                frmData.append("User", "");
                frmData.append("Opcion", 1);
                $.ajax({
                        url: 'Procedimientos/BusquedaProc.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            // alert(res); 
                            $('#Cursos').html("");
                            $('#Cursos').append(res);
                            document.getElementById("BusquedaTitulo").value = "";
                        }
                    });
                return false;
            });

            
            $("#btnBuscarCateg").click(function(){
                let frmData = new FormData();
                frmData.append("Titulo","" );
                frmData.append("Categ", $('#BusquedaCateg').val());
                frmData.append("User", "");
                frmData.append("Opcion", 2);
                $.ajax({
                        url: 'Procedimientos/BusquedaProc.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            $('#Cursos').html("");
                            $('#Cursos').append(res);
                            document.getElementById("BusquedaCateg").value = "";
                           
                        }
                    });
                return false;
            });

            
            $("#btnBuscarUser").click(function(){
                let frmData = new FormData();
                frmData.append("Titulo", "");
                frmData.append("Categ", "");
                frmData.append("User", $('#BusquedaUser').val());
                frmData.append("Opcion", 3);
                $.ajax({
                        url: 'Procedimientos/BusquedaProc.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            $('#Cursos').html("");
                            $('#Cursos').append(res);
                            document.getElementById("BusquedaUser").value = "";
                        }
                    });
                return false;
            });
        });
        </script>

        <!-- Footer -->
        <?php include("footer.php"); ?>        
        <script src="js/Busqueda.js"></script>
    </body>
</html>
