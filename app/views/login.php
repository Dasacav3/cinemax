<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/normalize.css">
    <link rel="stylesheet" href="dist/css/main.css">
    <link rel="shortcut icon" href="dist/img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ef5bd2f060.js" crossorigin="anonymous"></script>
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="login_container">
        <div class="login">
            <div class="login-img">
                <img src="" alt="" class="login-img__img" />
            </div>
            <h2>Inicio de sesión</h2>
            <form class="form-login" id="form" method="POST" action="../models/loginUser.php">
                <label for="user_name">Nombre de usuario</label> <br />
                <input type="email" id="user_name" name="user_name" required placeholder="example@domain.com" /> <br>
                <label for="password">Contraseña</label> <br />
                <input type="password" id="password" name="password" required maxlength="30" /> <br>
                <input type="submit" value="Iniciar sesión" id="submit" />
            </form>
            <div class="register">
                <p>
                    <a href="registro.php">¿No tienes cuenta? Crea tu cuenta</a>
                </p>
            </div> <br>
            <hr> <br>
            <div class="return">
                <a href="../../index.php">Volver...</a>
            </div>
        </div>
    </div>
</body>

</html>