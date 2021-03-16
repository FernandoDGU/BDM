<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Cuenta</title>
        <!--Css  -->
        <link rel="stylesheet" href="css/miCuenta.css">
    </head>
    <body style="background-color: #333232">
        <!-- SideBar -->
        <?php include("sidebar.php"); ?>
        <div class="container">
                    <div class = "form-box">
                        <form class="needs-validation" novalidate method="POST" action='#' enctype="multipart/formdata">
                            <div class="form-groupImage">  
                                <input type="file" id="browse" name="fileupload"  accept="image/*" onChange="Handlechange();"/>
                                <input type="image"onmouseout="this.src = 'images/user.png';" onmouseover="this.src = 'images/user-icon.png';"  
                                       src="images/user.png" id="topImage"  onclick="HandleBrowseClick(); this.disabled = true" />

                            </div>
                              <div class="form-group">
                                <label for="uNombreCompleto">Nombre completo:</label>
                                <input type="text" class="form-control" id="uNombreCompleto" placeholder="Ingrese el nombre de usuario" name="uNombreCompleto"
                                       required pattern="[A-Za-z0-9]{3,40}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 40" readonly value="Juanito Pepe Pecas">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="uname">Nombre de usuario:</label>
                                <input type="text" class="form-control" id="uname" placeholder="Ingrese el nombre de usuario" name="uname"
                                       equired pattern="[A-Za-z0-9]{3,40}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 40" readonly value="JuanitoPP">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="coel">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="coel" placeholder="correo@ejemplo.com" name="correo" 
                                       required readonly value="juanitoPP@gmail.com">
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Contraseña:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Ingrese la contraseña" name="pswd"  
                                       pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*" required title="Debe tener al menos una mayúscula, una minúscula y un dígito" readonly value="_Juanito1234" >
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                            </div>
                            <div class="form-group">Este usuario ha sido miembro desde 03/03/21.</div>

                            <button type="submit" id="btnModificarUsuario" class="btn btn-secondary ">Modificar</button>
                             <button type="submit" id="btnEliminarUsuario" class="btn btn-primary ">Eliminar cuenta</button>
                        </form>
                    </div>  
                </div>




                </body>
                </html>
