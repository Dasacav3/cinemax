<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/normalize.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/main.css">
    <link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= constant('URL') ?>lib/fontawesome-5.15.2/css/all.min.css" />
    <script src="<?= constant('URL') ?>lib/fontawesome-5.15.2/js/all.min.js"></script>
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="login_container">
        <div class="login">
            <div id="message"></div>
            <div class="login-img">
                <img src="" alt="" class="login-img__img" />
            </div>
            <h2>Inicio de sesión</h2>
            <form class="form-login" id="form" method="POST">
                <label for="user_name">Nombre de usuario</label> <br />
                <input type="email" id="user_name" name="user_name" required placeholder="example@domain.com" /> <br>
                <label for="password">Contraseña</label> <br />
                <input type="password" id="password" name="password" required maxlength="30" /> <br>
                <input type="submit" value="Iniciar sesión" id="submit"/>
            </form>
            <div class="register">
                <p>
                    <a href="<?= constant('URL') ?>registro">¿No tienes cuenta? Crea tu cuenta</a>
                </p>
            </div> <br>
            <hr> <br>
            <div class="return">
                <a href="<?= constant('URL') ?>">Volver...</a>
            </div>
        </div>
    </div>
    <script src="<?= constant('URL') ?>public/js/loginUser.js"></script>
</body>

</html>