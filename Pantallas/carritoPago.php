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
        /* $rowCursos = mysqli_fetch_array($result, MYSQLI_ASSOC);        
          $tituloCurso = $rowCursos['titulo'];
          $costo = '$' . $rowCursos['costo'] . '.00MX';
          $descCorta = $rowCursos['descripcion_corta'];
          $imagen = $rowCursos['imagen']; */
        while ($rowCursos = mysqli_fetch_assoc($result)) {
            $arrayDatosc[] = $rowCursos;
        }
        $tituloCurso = $arrayDatosc[0]['titulo'];
        $costo = $arrayDatosc[0]['costo'];
        $descCorta = $arrayDatosc[0]['descripcion_corta'];
        $descLarga = $arrayDatosc[0]['descripcion'];
        $imagen = $arrayDatosc[0]['imagen'];
        $nombreAutor = $arrayDatosc[0]['nombrecomp'];
    } else {
        echo "Nada esta bien :(";
    }

    $newConn2->CloseConnection();
}
?>
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
        <input id="txtId" type="text" value="<?php echo $idUser ?>" class="d-none invisible" name="idusario">
        <input id="txtIdCurso" type="text" value="<?php echo $id_curso ?>" class="d-none invisible" name="idCurso">
        <input id="txtCosto" type="text" value="<?php echo $costo ?>" class="d-none invisible" name="costoCurso">
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
                        <td><h6 class="titlePrecioCarritoPago"><?php echo '$' .$costo.'.00MX' ?></h6></td>      
                        <td><h6 class="titleTituloCarritoPago"><?php echo $tituloCurso ?> </h6></td>

                    </tr>                


                </table>
                <h4 id="totalCarritoPago">Total: <?php echo '$' .$costo.'.00MX' ?></h4>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            document.getElementById("btnCarritoPago").addEventListener("click", function () {
                var form = document.getElementById("formDatos");
                var isValidForm = form.checkValidity();
                if (isValidForm) {
                    let frmData = new FormData();
                    frmData.append("idUsuario", $('#txtId').val());
                    frmData.append("idCurso", $('#txtIdCurso').val());
                    frmData.append('totalPago', $('#txtCosto').val());
                    $.ajax({
                        url: 'Procedimientos/realizarCompra.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            alert(res);
                        }, error: function (XHR, text, errorthrow) {
                            debugger;
                        }
                    });
                    return false;
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
