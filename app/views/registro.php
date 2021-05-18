<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/normalize.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/main.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>lib/fontawesome-5.15.2/css/all.min.css" />
    <script src="<?= constant('URL') ?>lib/fontawesome-5.15.2/js/all.min.js"></script>
    <title>Registro</title>
</head>

<body>
    <div class="registro-container">
        <div class="registro">
            <div id="message"></div>
            <h1>Registro de usuario</h1>
            <form id="form_register" method="POST">
                <label for="">Nombres</label> <br>
                <input type="text" name="nombre" id="nombres"> <br>
                <label for="">Apellidos</label> <br>
                <input type="text" name="apellido" id="apellidos"> <br>
                <label for="">Edad</label> <br>
                <input type="number" name="edad" id="edad"> <br>
                <label for="">Email</label> <br>
                <input type="email" name="email" id="correo"> <br>
                <label for="">Celular</label> <br>
                <input type="text" name="cel" id="cel"> <br>
                <label for="">Contraseña</label> <br>
                <input type="password" name="pass" id="pass"> <br>
                <label for="">Repetir contraseña</label> <br>
                <input type="password" name="pass2" id="pass2"> <br>
                <input type="submit" value="Registrar"> <br>
                <div class="warnings" id="warnings"></div> <br>
                <hr>
            </form> <br>
            <p><a href="<?= constant('URL') ?>login">Volver al login</a></p>
        </div>
    </div>
    <script src="<?= constant('URL') ?>public/js/regularExpression.js"></script>
    <script src="<?= constant('URL') ?>public/js/formValidation.js"></script>
</body>

</html>