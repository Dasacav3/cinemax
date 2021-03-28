<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../lib/sweetaler2/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.all.min.css">
  <style>
    @import url("../views/dist/css/colors_fonts.css");

    body{
        background: var(--gray-dark);
    }

    * {
      font-family: "Poppins", sans-serif;
    }
  </style>
</head>

<body>

    <?php

    include("../controller/database.php");

    $nombre = $_POST['user_name'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo_usuario'];

    $registros = mysqli_query($conn, "SELECT * FROM usuario WHERE nombre_usuario = '$nombre' AND clave_usuario = '$password' AND tipo_usuario = '$tipo'");
    if ($reg = mysqli_fetch_array($registros)) {
    ?>
        <script>
            Swal.fire({
                title: 'Ingreso exitoso',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            }).then(
                function() {
                    window.location = '../views/main.php';
                }
            );
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                title: 'Vuelve a intertarlo',
                text: 'Usuario o contraseña incorrectos',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            }).then(
                function() {
                    window.history.go(-1);
                }
            );
        </script>
    <?php
    }
    ?>

</body>

</html>