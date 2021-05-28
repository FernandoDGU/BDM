<!DOCTYPE html>
<html lang="en">
<?php

if (isset($_POST['btn'])) {
    print_r($_FILES);
}

?>

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

    <script type="text/javascript">

    // Inicio de sesión
    // Campos no deben de estar vacios 
    $(document).ready(function(){
        $('#btnInicioSesion').click(function(){
            let frmData = new FormData();
            // Name y id
            frmData.append("correoLogin", $('#coelLogin').val());
            frmData.append("passwordLogin", $('#pwdLogin').val());
            $.ajax({
                    url: 'Procedimientos/login.php',
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: 'POST',
                    data: frmData,
                    success: function(res) {
                        if(res == "1"){
                            alert("Contraseña incorrecta");
                        }else{
                            window.location="index.php";
                        }
                    }
                });
                return false;
        });

        // Registrarse
        $('#btnRegistro').click(function(){

            if (checarValidacion(this.form)) {
                let frData = new FormData();
                let imageData = $('#browse')[0].files[0];
                //NAME Y ID  
                frData.append("nombreRegistro", $('#uNombreCompleto').val());
                frData.append("usernameRegistro", $('#uname').val());
                frData.append("correoRegistro", $('#coelRegistro').val());
                frData.append("passwordRegistro", $('#pwdRegistro').val());
                frData.append("optradio", $('#optionradio').val());
                frData.append("imagenRegistro", imageData);
            $.ajax({
                    url: 'Procedimientos/registroUsuarios.php',
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: 'POST',
                    data: frData,
                    success: function(res) {
                        if(res == "2"){
                            alert("Usuario repetido, ingresa otro");
                        }else{
                            window.location="index.php";
                        }
                    }
                });
                return false;
            }
            
        });
    });
    </script>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-box">

                    <!-- Registro -->
                    <!--  Hay que cambiar la ruta para subirlo a github o puedes dejarlo así pero cambiar el nombre de la carpeta -->
                    <form class="needs-validation" id="formRegistro" novalidate method="POST" action='' enctype="multipart/form-data">
                        <h3 class="titulo"> Registrate</h3>
                        <div class="form-groupImage">
                            <input type="file" id="browse" name="imagenRegistro" accept="image/*" onChange="previewFile();" required />
                            <!--<input type="image" class="imgFormulario" id="topImage" onmouseout="this.src = 'images/user.png';" onmouseover="this.src = 'images/user-icon.png';"  
                                       src="images/user.png" onclick="HandleBrowseClick(); this.disabled = false" />-->

                            <input type="image" class="imgFormulario" id="topImage" src="images/user.png" name="Foto" onclick="HandleBrowseClick(); this.disabled = false" required />
                        </div>
                        <div class="form-group">
                            <label for="uNombreCompleto">Nombre completo:</label>
                            <input type="text" class="form-control" id="uNombreCompleto" placeholder="Ingrese el nombre de usuario" name="nombreRegistro" required>
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="uname">Nombre de usuario:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Ingrese el nombre de usuario" name="usernameRegistro" required pattern="[A-Za-z0-9]{3,40}" title="Letras y números. Tamaño mínimo: 3. Tamaño máximo: 40">
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="coel">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="coelRegistro" placeholder="correo@ejemplo.com" name="correoRegistro" required>
                            <div class="valid-feedback">Valido.</div>
                            <div class="invalid-feedback">Campo obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Contraseña:</label>
                            <input type="password" class="form-control" id="pwdRegistro" placeholder="Ingrese la contraseña" name="passwordRegistro" maxlength="25" pattern="^(?=(?:.*\d){1})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[¡”#$%&/=’?!'()<>+@¿:;,._+*{°}-]){1})\S{8,20}$" required title="Debe tener al menos 8 carácteres, entre ellos una mayúscula, una minúscula, un dígito y un carácter especial">
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio</div>
                        </div>
                        <div class="form-groupRadio">
                            <p> Usuario: </p>
                            <label class="radio-inline"><input type="radio" id = "optionradio" name="optradio" value="Profesor" checked>Profesor</label>
                            <label class="radio-inline"><input type="radio" id = "optionradio" name="optradio" value="Alumno">Alumno</label>
                        </div>
                        <button type="submit" id="btnRegistro" class="btn btn-primary btn-block">Registrarse</button>
                    </form>
                </div>
            </div>


            <!-- LOGIN -->
            <!-- Procedimientos/login.php -->
            <div class="vl"></div>
            <div class="col-lg-6">
                <div class="form-box" id="formIS">
                    <form class="needs-validation" novalidate method="POST" action='' enctype="multipart/form-data">
                        <h3 class="titulo"> Inicia Sesión</h3>
                        <div class="form-group">
                            <label for="coel">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="coelLogin" placeholder="correo@ejemplo.com" name="correoLogin" required>
                            <div class="valid-feedback">Valido.</div>
                            <div class="invalid-feedback">Campo obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Contraseña:</label>
                            <input type="password" class="form-control" id="pwdLogin" placeholder="Ingrese la contraseña" name="passwordLogin" maxlength="25" pattern="^(?=(?:.*\d){1})(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[¡”#$%&/=’?!'()<>+@¿:;,._+*{°}-]){1})\S{8,20}$" required title="Debe tener al menos 8 carácteres, entre ellos una mayúscula, una minúscula, un dígito y un carácter especial">
                            <div class="valid-feedback">Válido.</div>
                            <div class="invalid-feedback">Campo obligatorio</div>
                        </div>
                        <button type="submit" id="btnInicioSesion" class="btn btn-primary btn-block">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
    <!--js -->
    <script src="js/Registro.js"></script>
    <script src="js/validaciones.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>