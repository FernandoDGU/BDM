<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Carrito</title>
        <link rel="stylesheet" href="css/Carrito.css">
    </head>
    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>

        <div class="Carrito">
            <div class="titulo">
                Carrito de compra
            </div>
            <div class="productos">
                <div class="item">
                    <div class="buttons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42.428" height="42.428" viewBox="0 0 42.428 42.428">
                        <path id="Unión_4" data-name="Unión 4" d="M-16113-32v-7h-7a4,4,0,0,1-4-4,4,4,0,0,1,4-4h7v-7a4,4,0,0,1,4-4,4,4,0,0,1,4,4v7h7a4,4,0,0,1,4,4,4,4,0,0,1-4,4h-7v7a4,4,0,0,1-4,4A4,4,0,0,1-16113-32Z" transform="translate(11381.592 11442.401) rotate(45)" fill="#cf6955"/>
                        </svg>

                    </div>

                  <img class="imgCursoCarrito"  src="images/ejemplos/imgEjemplo1.jpg">

                    <div class="description">
                        <span>HTML desde cero</span>
                        <span>Adrián Eras</span>
                    </div>

                    <div class="total-price">$279.00MX</div>
                </div>

                <div class="item">
                    <div class="buttons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42.428" height="42.428" viewBox="0 0 42.428 42.428">
                        <path id="Unión_4" data-name="Unión 4" d="M-16113-32v-7h-7a4,4,0,0,1-4-4,4,4,0,0,1,4-4h7v-7a4,4,0,0,1,4-4,4,4,0,0,1,4,4v7h7a4,4,0,0,1,4,4,4,4,0,0,1-4,4h-7v7a4,4,0,0,1-4,4A4,4,0,0,1-16113-32Z" transform="translate(11381.592 11442.401) rotate(45)" fill="#cf6955"/>
                        </svg>

                    </div>

                   <img class="imgCursoCarrito" src="images/ejemplos/imgEjemplo2.jpg">

                    <div class="description">
                        <span>Photoshop desde cero para principiantes</span>
                        <span>Patricia Salazar</span>
                    </div>

                    <div class="total-price">$320.00MX</div>
                </div>

                <div class="item">
                    <div class="buttons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42.428" height="42.428" viewBox="0 0 42.428 42.428">
                        <path id="Unión_4" data-name="Unión 4" d="M-16113-32v-7h-7a4,4,0,0,1-4-4,4,4,0,0,1,4-4h7v-7a4,4,0,0,1,4-4,4,4,0,0,1,4,4v7h7a4,4,0,0,1,4,4,4,4,0,0,1-4,4h-7v7a4,4,0,0,1-4,4A4,4,0,0,1-16113-32Z" transform="translate(11381.592 11442.401) rotate(45)" fill="#cf6955"/>
                        </svg>

                    </div>
                    <img class="imgCursoCarrito"  src="images/ejemplos/imgEjemplo3.jpg">
                    <div class="description">
                        <span>Desarrollo de videojuegos con Unreal Engine 4</span>
                        <span>Mariano Rivas</span>
                    </div>

                    <div class="total-price">$1,699.00MX</div>
                </div>

                <div class="item">
                    <div class="buttons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42.428" height="42.428" viewBox="0 0 42.428 42.428">
                        <path id="Unión_4" data-name="Unión 4" d="M-16113-32v-7h-7a4,4,0,0,1-4-4,4,4,0,0,1,4-4h7v-7a4,4,0,0,1,4-4,4,4,0,0,1,4,4v7h7a4,4,0,0,1,4,4,4,4,0,0,1-4,4h-7v7a4,4,0,0,1-4,4A4,4,0,0,1-16113-32Z" transform="translate(11381.592 11442.401) rotate(45)" fill="#cf6955"/>
                        </svg>

                    </div>

                   <img class="imgCursoCarrito"  src="images/ejemplos/imgEjemplo4.jpg">

                    <div class="description">
                        <span>El arte del retrato. Dibujo y pintura</span>
                        <span>Antonio García Villarán</span>
                    </div>

                    <div class="total-price">$549.00MX</div>
                </div>
            </div>
            <div class="total">
                <span>Total:</span> 
                <div>$2,847.00MX</div>
            </div>
            <a id="anchorBtnCarrito" href="carritoPago.php"><button type="submit" id="btnCarrito" href="carritoPago.php">Pagar</button></a>
        </div>


        <?php include("footer.php"); ?>
    </body>
</html>
