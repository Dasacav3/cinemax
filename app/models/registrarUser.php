<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../../lib/sweetaler2/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.all.min.css">
  <link rel="stylesheet" href="">
  <style>
    @import url("../views/dist/css/colors_fonts.css");

    body {
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

  $query = "INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario) VALUES ('$_POST[correo]','$_POST[pass]','1')";

  $resultado1 = $conn->query($query);

  if (!$resultado1) {
  ?>
    <script>
      Swal.fire({
        title: 'Vuelve a intertarlo',
        text: 'Usuario no registrado',
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
    die("Query Failed " . mysqli_error($conn));
  }

  $consulta_id_usuario = "SELECT id_usuario as id_usuario FROM usuario WHERE nombre_usuario='$_POST[correo]'";
  $resultado2 = mysqli_query($conn, $consulta_id_usuario);
  $row = mysqli_fetch_assoc($resultado2);

  $id_usuario = $row['id_usuario'];

  $query2 = "INSERT INTO cliente (nombre_cliente,apellido_cliente,edad,email_cliente,celular_cliente,id_usuario) VALUES ('$_REQUEST[nombres]','$_REQUEST[apellidos]','$_REQUEST[edad]','$_REQUEST[correo]','$_REQUEST[cel]',$id_usuario)";

  $resultado3 = $conn->query($query2);

  if (!$resultado3) {
  ?>
    <script>
      Swal.fire({
        title: 'Vuelve a intertarlo',
        text: 'Usuario no registrado',
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
    die("Query Failed " . mysqli_error($conn));
  }

  ?>


  <script>
    Swal.fire({
      title: 'Registro exitoso',
      icon: 'success'
    }).then(
      function() {
        window.location = '../views/login.php';
      }
    );
  </script>";

  <?php
  $conn->close();
  ?>


</body>

</html>