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
            <div class="titulo">
                4 Resultados para "blah blah"
            </div>
            <div class="row">

                <div class="boxCategorias col-2">
                    <div class="boxFiltros">
                        <small>FILTRAR POR</small>
                        <div class="btn-group btn-group-toggle btnFiltros" data-toggle="buttons">
                            <label class="btnFiltroItem btn btn-secondary active ">
                                <input type="radio" name="options" id="opTitulo" autocomplete="off" checked> Titulo
                            </label>
                            <label class="btnFiltroItem btn btn-secondary">
                                <input type="radio" name="options" id="opCategoria" autocomplete="off"> Categoria
                            </label>
                            <label class="btnFiltroItem btn btn-secondary">
                                <input type="radio" name="options" id="opUsuario" autocomplete="off"> Usuario
                            </label>
                        </div>
                    </div>
                    <p>Categorias</p>
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
                    </ul>

                </div>
                <div class="productos col-10">
                    <div class="item">
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
                    </div>
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


        <!-- Footer -->
        <?php include("footer.php"); ?>        
        <script src="js/Busqueda.js"></script>
    </body>
</html>
