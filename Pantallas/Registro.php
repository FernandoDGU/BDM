<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrarse</title>
        <!--Css  -->
        <link rel="stylesheet" href="css/Login.css">
    </head>
    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class = "form-box">

                    <!-- Registro --> <!--  Hay que cambiar la ruta para subirlo a github o puedes dejarlo así pero cambiar el nombre de la carpeta -->
                        <form class="needs-validation" id="formRegistro" novalidate method="POST" action='Procedimientos/registroUsuarios.php' enctype="multipart/formdata">
                            <h3 class="titulo"> Registrate</h3>
                            <div class="form-groupImage">  
                                <input type="file" id="browse" name="imagenRegistro"  accept="image/*" onChange="previewFile();"/>
                                <!--<input type="image" class="imgFormulario" id="topImage" onmouseout="this.src = 'images/user.png';" onmouseover="this.src = 'images/user-icon.png';"  
                                       src="images/user.png" onclick="HandleBrowseClick(); this.disabled = false" />-->
                                <input type="image" class="imgFormulario" id="topImage"   
                                       src="images/user.png" onclick="HandleBrowseClick(); this.disabled = false" />
                            </div>
                            <div class="form-group">
                                <label for="uNombreCompleto">Nombre completo:</label>
                                <input type="text" class="form-control" id="uNombreCompleto" placeholder="Ingrese el nombre de usuario" name="nombreRegistro"
                                       required>
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="uname">Nombre de usuario:</label>
                                <input type="text" class="form-control" id="uname" placeholder="Ingrese el nombre de usuario" name="usernameRegistro"
                                       required pattern="[A-Za-z0-9]{3,40}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 40">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="coel">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="coel" placeholder="correo@ejemplo.com" name="correoRegistro"
                                       required>
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Contraseña:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Ingrese la contraseña" name="passwordRegistro"  
                                       maxlength="25" pattern="^(?=(?:.*\d){1})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[¡”#$%&/=’?!'()<>+@¿:;,._+*{°}-]){1})\S{8,20}$" required title="Debe tener al menos 8 carácteres, entre ellos una mayúscula, una minúscula, un dígito y un carácter especial">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                            </div>
                            <div class="form-groupRadio">
                                <p> Usuario: </p>
                                <label class="radio-inline"><input type="radio" name="optradio" checked>Profesor</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Alumno</label>
                            </div>
                            <button type="submit" id="btnRegistro" class="btn btn-primary btn-block" onclick="checarValidacion(this.form);">Registrarse</button>
                        </form>
                    </div>  
                </div>


                <!-- LOGIN -->
                <div class="vl"></div>
                <div class = "col-lg-6">
                    <div class="form-box" id="formIS">
                        <form class="needs-validation"  novalidate method="POST" action='Procedimientos/login.php' enctype="multipart/formdata">
                            <h3 class="titulo"> Inicia Sesión</h3>
                            <div class="form-group">
                                <label for="coel">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="coel" placeholder="correo@ejemplo.com" name="correoLogin"
                                       required>
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Contraseña:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Ingrese la contraseña" name="passwordLogin"  
                                       maxlength="25" pattern="^(?=(?:.*\d){1})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[¡”#$%&/=’?!'()<>+@¿:;,._+*{°}-]){1})\S{8,20}$" required title="Debe tener al menos 8 carácteres, entre ellos una mayúscula, una minúscula, un dígito y un carácter especial">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                            </div>
                            <button type="submit" id="btnInicioSesion" class="btn btn-primary btn-block" onclick="checarValidacion(this.form); ">Iniciar Sesión</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>
        <!--js -->
        <script src="js/Registro.js"></script>
        <script src="js/validaciones.js"></script>
    </body>

</html>