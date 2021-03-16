<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagar</title>
        <!--Css  -->
        <link rel="stylesheet" href="css/carritoPago.css">
    </head>
    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <div class="row boxMetodoPago">
            <div class = "form-box col-4">
                <form class="needs-validation" id="formDatos" novalidate method="POST" action='cursosAlumno.php' enctype="multipart/formdata">                           
                    <div class="form-group">
                        <label for="inputNumeroTarjeta">Numero de tarjeta</label>
                        <input type="text" class="form-control" id="inputNumeroTarjeta" placeholder="Número de tarjeta" name="inputNumeroTarjeta"
                               required  maxlength="16" pattern="[0-9]{16}"  title="Tamaño requerido: 16">
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Campo obligatorio.</div>
                    </div>
                    <div class="form-group">
                        <label for="inputNombreTarjeta">Nombre Completo:</label>
                        <input type="text" class="form-control" id="inputNombreTarjeta" placeholder="Nombre completo" name="inputNombreTarjeta"
                               required  pattern="[A-Za-z]{3,100}"  title="Solo letras">
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Campo obligatorio.</div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="inputFechaVencimiento">Fecha de Vencimiento:</label>
                            <input type="month" min = "<?php echo date("Y-m"); ?>" max="2041-12" class="form-control" id="inputFechaVencimiento" placeholder="MM/YY" name="inputFechaVencimiento"  
                                   required title="Debe coincidir con el formato solicitado">
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio</div>
                        </div>
                        <div class="form-group col-6">
                            <label for="inputTarjetaCVV">Número CVV:</label>
                            <input type="text" class="form-control" id="inputTarjetaCVV" placeholder="Número CVV" name="inputTarjetaCVV"
                                   required  maxlength="3" pattern="[0-9]{3}"  title="Debe coincidir con el formato solicitado">
                            <div class="valid-feedback">Valido.</div>
                            <div class="invalid-feedback">Campo obligatorio.</div>
                        </div>
                    </div>
                    <button type="submit" id="btnCarritoPago" class="btn btn-primary btn-block">Confirmar compra</button>
                </form>
            </div>  
            <div class="listaCarritoPago col-2">
                <h4 style="color:#eb6953; font-weight:bold">Resumen de compra</h4>
                <table id="listaProductosCarritoPago">                 
                    <tr>
                        <td><h6 class="titlePrecioCarritoPago">$320.00MX</h6></td>      
                        <td><h6 class="titleTituloCarritoPago">Photoshop desde cero para principiantes</h6></td>

                    </tr>                


                </table>
                <h4 id="totalCarritoPago">Total: $320.00MX</h4>
            </div>
        </div>
      
        <script type="text/javascript">
            document.getElementById("btnCarritoPago").addEventListener("click", function () {
                var form = document.getElementById("formDatos");
                var isValidForm = form.checkValidity();
                if (isValidForm) {
                    alert("Compra realizada con éxito");
                } else {                 
                    alert("Faltan campos de validar");             
                }
            });
        </script>

        <!-- Footer -->
        <?php include("footer.php"); ?>
        <!--js -->
        <script src="js/validaciones.js"></script>
    </body>
</html>
