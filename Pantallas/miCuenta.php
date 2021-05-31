<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
if (!isset($_SESSION['username']) || $_SESSION['username'] == '') {
    $correo = "Notemail@gmail.com";
    $nombreCom = "notName";
    $usuario = "notUser";
} else {
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <title>Mi Cuenta</title>
        <!--Css  -->
        <link rel="stylesheet" href="css/miCuenta.css">


    </head>
    <body style="background-color: #333232">
        <!-- SideBar -->
        <?php include("sidebar.php"); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#btnModificarUsuario').click(function () {
                    if (checarValidacionNotAlert(this.form)) {

                    let frmData = new FormData();
                    
                    let imageData = $('#browse')[0].files[0];                
              
                    frmData.append("miCuentaNombre", $('#uNombreCompleto').val());
                    frmData.append("miCuentaUser", $('#uname').val());
                    frmData.append("correo", $('#coel').val());
                    frmData.append("imagenUpdate", imageData);
                    
                    $.ajax({
                        url: 'Procedimientos/updateUsuario.php',
                        contentType: false,
                        processData: false,
                        cache: false,
                        type: 'POST',
                        data: frmData,
                        success: function (res) {
                            alert("Datos actualizados");
                            //window.location.reload();
                        }
                    });
                    return false;
                }
                });


                $('#btnCambiarContraseña').click(function(){
                    if (checarValidacionNotAlert(this.form)) {
                        let frmData = new FormData();
                        // Name y id
                        // Correo y contraseña corretos
                        frmData.append("miCuentaCorreo", $('#coelUpdate').val());
                        frmData.append("pswdActual", $('#pwdActual').val());

                        // Cambio de contraseña
                        frmData.append("pwdNueva", $('#pwdNueva').val());
                        $.ajax({
                            url: 'Procedimientos/cambiarPass.php',
                            contentType: false,
                            processData: false,
                            cache: false,
                            type: 'POST',
                            data: frmData,
                            success: function (res) {
                                if (res == "1") {
                                    alert("Contraseña actual incorrecta");
                                } else if(res == "2"){  
                                    alert("La contraseña actual no puede ser igual a la antigua");
                                }else{
                                    alert(res);
                                    $('#pwdActual').val("");
                                    $('#pwdNueva').val("");
                                }
                            }
                        });
                        return false;
                     }
                });
    
            });      
        </script>
        <div class="container">
            <div class = "form-box">
                <form class="needs-validation"  id="formMiCuenta" novalidate method="POST" enctype="multipart/form-data">
                    <div class="form-groupImage">  
                        <input type="file" id="browse" name="imagenUpdate" accept="image/*" onChange="previewFile();" value="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($foto)?>"/>
                        <!--<input type="image"onmouseout="this.src = 'images/user.png';" onmouseover="this.src = 'images/user-icon.png';"  
                               src="images/user.png" id="topImage"  onclick="HandleBrowseClick(); this.disabled = true" />-->
                        <input type="image" class="imgFormulario" id="topImage"  src="data:image/png|jpg|jpeg;base64,<?php echo base64_encode($foto)?>" onclick="HandleBrowseClick();
                                this.disabled = false"/>
                         <!-- <input type="image" class="imgFormulario" id="topImage"   
                                         src="images/user.png" name = "Foto" onclick="HandleBrowseClick(); this.disabled = false" required/>-->
                    </div>
                    <div class="form-group">
                        <label for="uNombreCompleto">Nombre completo:</label>
                        <input type="text" class="form-control" id="uNombreCompleto" placeholder="Ingrese el nombre de usuario" name="miCuentaNombre"
                               required  value= "<?php echo $nombreCom ?>">
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Campo obligatorio.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Ingrese el nombre de usuario" name="miCuentaUser"
                               equired pattern="[A-Za-z0-9]{3,40}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 40" value=<?php echo $usuario ?>>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Campo obligatorio.</div>
                    </div>
                    <div class="form-group">
                        <label for="coel">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="coelUpdate" placeholder="correo@ejemplo.com" name="miCuentaCorreo" disabled
                               required  value=<?php echo $correo ?>>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Campo obligatorio.</div>
                    </div>

                    <div class="form-group">Última modificación:  <?php echo $fecha ?>.</div>

                    <div class="text-center">
                        <button type="submit" id="btnModificarUsuario" class="btn btn-secondary" >Modificar</button>
                    </div>
                </form>
                <form class="needs-validation"  id="formMiPass" novalidate method="POST" enctype="multipart/form-data">
                    <hr style="background-color: whitesmoke;">
                    <div class="">
                        <button type="button" class="collapsible">Cambiar contraseña</button>
                        <div class="content">
                            <div class="form-group mt-3">
                                <input type="password" class="form-control" id="pwdActual" placeholder="Ingrese la contraseña actual" name="pswdActual"  
                                    pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*" required title="Debe tener al menos una mayúscula, una minúscula y un dígito">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="pwdNueva" placeholder="Ingrese la contraseña nueva" name="pswdNueva"  
                                maxlength="25" pattern="^(?=(?:.*\d){1})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[¡”#$%&/=’?!'()<>+@¿:;,._+*{°}-]){1})\S{8,20}$" required title="Debe tener al menos 8 carácteres, entre ellos una mayúscula, una minúscula, un dígito y un carácter especial" >
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                                <div class="text-right mt-3">                                
                                    <input type="button" id="btnCambiarContraseña" class="btn btn-primary" value="Guardar Cambios">               
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>  
        </div>

        <script src="js/miCuenta.js"></script>
        <script src="js/validaciones.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </body>
</html>
