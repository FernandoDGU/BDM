<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php 
    session_start();
    $usuario = $_SESSION['username'];
    $nombreCom = $_SESSION['nombrecomp'];
    $correo = $_SESSION['correo'];

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
        <?php include("sidebar.php");?>
        <div class="container">
            <div class = "form-box">
                <form class="needs-validation"  id="formMiCuenta" novalidate method="POST" action='' enctype="multipart/formdata">
                    <div class="form-groupImage">  
                        <input type="file" id="browse" name="fileupload"  accept="image/*" onChange="previewFile();"/>
                        <!--<input type="image"onmouseout="this.src = 'images/user.png';" onmouseover="this.src = 'images/user-icon.png';"  
                               src="images/user.png" id="topImage"  onclick="HandleBrowseClick(); this.disabled = true" />-->
                        <input type="image" class="imgFormulario" id="topImage" src="images/user.png" onclick="HandleBrowseClick(); this.disabled = false" />
                    </div>
                    <div class="form-group">
                        <label for="uNombreCompleto">Nombre completo:</label>
                        <input type="text" class="form-control" id="uNombreCompleto" placeholder="Ingrese el nombre de usuario" name="uNombreCompleto"
                               required  value= <?php echo $nombreCom?>>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Campo obligatorio.</div>
                    </div>
                    <div class="form-group">
                        <label for="uname">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Ingrese el nombre de usuario" name="uname"
                               equired pattern="[A-Za-z0-9]{3,40}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 40" value=<?php echo $usuario?>>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Campo obligatorio.</div>
                    </div>
                    <div class="form-group">
                        <label for="coel">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="coel" placeholder="correo@ejemplo.com" name="correo" 
                               required  value=<?php echo $correo?>>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Campo obligatorio.</div>
                    </div>

                    <div class="form-group">Este usuario ha sido miembro desde 03/03/21.</div>

                    <button type="submit" id="btnModificarUsuario" class="btn btn-secondary " onclick="checarValidacion(this.form);">Modificar</button>
                    <button type="submit" id="btnEliminarUsuario" class="btn btn-primary ">Eliminar cuenta</button>
                </form>
                <hr style="background-color: whitesmoke;">
                <div class="">
                    <button type="button" class="collapsible">Cambiar contraseña</button>
                    <div class="content">
                        <div class="form-group mt-3">
                            <input type="password" class="form-control" id="pwdActual" placeholder="Ingrese la contraseña actual" name="pswd"  
                                   pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*" required title="Debe tener al menos una mayúscula, una minúscula y un dígito">
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio</div>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="pwdNueva" placeholder="Ingrese la contraseña nueva" name="pswd"  
                                   pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*" required title="Debe tener al menos una mayúscula, una minúscula y un dígito" >
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio</div>
                            <div class="text-right mt-3">                                
                                <input type="button" id="btnCambiarContraseña" class="btn btn-primary" value="Guardar Cambios">               
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <script src="js/miCuenta.js"></script>
        <script src="js/validaciones.js"></script>


    </body>
</html>
