<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.all.min.css">
</head>
<body>


<?php

    include("../controller/database.php");

    $query = "INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario) VALUES ('$_POST[correo]','$_POST[pass]','1')";

    $resultado1 = $conn->query($query);

    if(!$resultado1) die ("Falla al acceder a la BD (USUARIO)");

    $consulta_id_usuario = "SELECT id_usuario as id_usuario FROM usuario WHERE nombre_usuario='$_POST[correo]'";
    $resultado2 = mysqli_query($conn,$consulta_id_usuario);
    $row = mysqli_fetch_assoc($resultado2);

    $id_usuario = $row['id_usuario'];

    $query2 = "INSERT INTO cliente (nombre_cliente,apellido_cliente,edad,email_cliente,celular_cliente,id_usuario) VALUES ('$_REQUEST[nombres]','$_REQUEST[apellidos]','$_REQUEST[edad]','$_REQUEST[correo]','$_REQUEST[cel]',$id_usuario)";

    $resultado3 = $conn->query($query2);

    if(!$resultado3) die ("Falla al acceder a la BD (CLIENTE)");

    echo "<script>
            Swal.fire({
                title: 'Registro exitoso',
                icon: 'success'
              }).then(
                function(){
                    window.location='../views/login.php';
                }
              );
            
            </script>";

    $conn->close();

?>

</body>
</html>