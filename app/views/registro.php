<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="dist/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="dist/css/normalize.css">
    <link rel="stylesheet" href="dist/css/main.css">
    <script src="https://kit.fontawesome.com/ef5bd2f060.js" crossorigin="anonymous"></script>
    <title>Registro</title>
</head>
<body>
    <div class="registro-container">
        <div class="registro">
            <h1>Registro de usuario</h1>
            <form id="form_register" method="POST" action="../models/registrarUser.php">
                <label for="">Nombres</label> <br>
                <input type="text" name="nombres" id="nombres"> <br>
                <label for="">Apellidos</label> <br>
                <input type="text" name="apellidos" id="apellidos"> <br>
                <label for="">Edad</label> <br>
                <input type="number" name="edad" id="edad"> <br>
                <label for="">Email</label> <br>
                <input type="email" name="correo" id="correo"> <br>
                <label for="">Celular</label> <br>
                <input type="text" name="cel" id="cel"> <br>
                <label for="">Contraseña</label> <br>
                <input type="password" name="pass" id="pass"> <br>
                <label for="">Repetir contraseña</label> <br>
                <input type="password" name="pass2" id="pass2"> <br>
                <input type="submit" value="Registrar"> <br>
                <div class="warnings" id="warnings"></div> <br> <hr>
            </form> <br>
            <p><a href="login.php">Volver al login</a></p>
        </div>
    </div>
    <script src="dist/js/regularExpression.js"></script>
    <script src="dist/js/formValidation.js"></script>
</body>
</html>