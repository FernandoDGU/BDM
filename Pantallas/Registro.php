<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>


        <!--Css  -->
        <link rel="stylesheet" href="css/Login.css">

    </head>

    <body>
        <!-- Navbar -->
        <?php include("navbar.php"); ?>

        <!-- <div class="container">
             <div class="row">
     
                 <div class="col-lg-6" id="center">
                     <form>
                     <a class="nav-link" id="Text">Registrarse</a>
                     <div class="col-lg-12 "><a class="inputText" ><input type="text" id="Rusuario" placeholder="Nombre de usuario"></a></div>
                     <div class="col-lg-12 "><a class="nav-link" ><input type="text" id="Rcorreo" placeholder="Correo electrÃ³nico"></a></div>
                     <div class="col-lg-12 "><a class="nav-link" ><input type="text" id="RcontraseÃ±a" placeholder="ContraseÃ±a"></a></div>
                     <div class="col-lg-12 "><a class="nav-link" ><input type="text" id="Rrol" placeholder="ContraseÃ±a"></a></div>
                     <div class="col-lg-12 "><a class="nav-link" ><button id="ButtonColor">Aceptar</button></a></div>
                     </form>
                 </div>
     
                 <div class="vl"></div>
     
                 <div class="col-lg-6" id="center">
                     <form>
                     <a class="nav-link" id="Text">Inicio sesiÃ³n</a>
                     <div class="col-lg-12 "><a class="nav-link" id="Iusuario"><input type="text" id="inputText" placeholder="Correo electrÃ³nico"></a></div>
                     <div class="col-lg-12 "><a class="nav-link" id="IcontraseÃ±a"><input type="text" id="inputText" placeholder="ContraseÃ±a"></a></div>
                     <div class="col-lg-12 "><button type = "submit" id="ButtonColor">Aceptar</button></div>
                     </form>
                 </div>
                 
     
             </div>
     
         </div>-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class = "form-box">

                        <form class="needs-validation" id="formRegistro" novalidate method="POST" action='index.php' enctype="multipart/formdata">
                            <h3 class="titulo"> Registrate</h3>
                            <div class="form-groupImage">  
                                <input type="file" id="browse" name="fileupload"  accept="image/*" onChange="Handlechange();"/>
                                <input type="image"onmouseout="this.src = 'images/user.png';" onmouseover="this.src = 'images/user-icon.png';"  
                                       src="images/user.png" id="topImage"  onclick="HandleBrowseClick(); this.disabled = false" />

                            </div>
                            <div class="form-group">
                                <label for="uNombreCompleto">Nombre completo:</label>
                                <input type="text" class="form-control" id="uNombreCompleto" placeholder="Ingrese el nombre de usuario" name="uNombreCompleto"
                                       required pattern="[A-Za-z0-9]{3,40}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 40">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="uname">Nombre de usuario:</label>
                                <input type="text" class="form-control" id="uname" placeholder="Ingrese el nombre de usuario" name="uname"
                                       required pattern="[A-Za-z0-9]{3,40}"  title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 40">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="coel">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="coel" placeholder="correo@ejemplo.com" name="correo"
                                       required>
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Contraseña:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Ingrese la contraseña" name="pswd"  
                                       maxlength="25" pattern="^(?=(?:.*\d){1})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[¡”#$%&/=’?!'()<>+@¿:;,._+*{°}-]){1})\S{8,20}$" required title="Debe tener al menos 8 carácteres, entre ellos una mayúscula, una minúscula, un dígito y un carácter especial">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                            </div>
                            <div class="form-groupRadio">
                                <p> Usuario: </p>
                                <label class="radio-inline"><input type="radio" name="optradio" checked>Profesor</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Alumno</label>
                            </div>
                            <button type="submit" id="btnRegistro" class="btn btn-primary btn-block" onclick="checarValidacion(this.form)">Registrarse</button>
                        </form>
                    </div>  
                </div>

                <div class="vl"></div>
                <div class = "col-lg-6">
                    <div class="form-box" id="formIS">

                        <form class="needs-validation" novalidate method="POST" action='index.php' enctype="multipart/formdata">

                            <h3 class="titulo"> Inicia Sesión</h3>
                            <div class="form-group">
                                <label for="coel">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="coel" placeholder="correo@ejemplo.com" name="correo"
                                       required>
                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Campo obligatorio.</div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Contraseña:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Ingrese la contraseña" name="pswd"  
                                       maxlength="25" pattern="^(?=(?:.*\d){1})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[¡”#$%&/=’?!'()<>+@¿:;,._+*{°}-]){1})\S{8,20}$" required title="Debe tener al menos 8 carácteres, entre ellos una mayúscula, una minúscula, un dígito y un carácter especial">
                                <div class="valid-feedback">Válido.</div>
                                <div class="invalid-feedback">Campo obligatorio</div>
                            </div>

                            <button type="submit" id="btnInicioSesion" class="btn btn-primary btn-block" onclick="checarValidacion(this.form)">Iniciar Sesión</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
        <script type="text/javascript">

            function checarValidacion(form) {               
                var isValidForm = form.checkValidity();
                if (isValidForm) {
                    alert("Parece que todo salió bien!");
                } else {
                    alert("Faltan campos de validar");
                }
            }
        </script>
        <?php include("footer.php"); ?>
        <!--js -->
        <script src="js/Registro.js"></script>
        <script src="js/validaciones.js"></script>
    </body>

</html>