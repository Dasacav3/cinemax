<?php

    $data = file_get_contents("php://input");
    include("../controller/databasePDO.php");

    $id= $_POST['id_user'];
    $user1= $_POST['user'];
    $pass1 = $_POST['pass'];
    $tipo1 = $_POST['tipo'];

    $query= $pdo->prepare("UPDATE usuario SET NOMBRE_USUARIO = :user, CLAVE_USUARIO = :clave, TIPO_USUARIO = :tipo WHERE ID_USUARIO = :id");
    $query->bindParam(":user",$user1);
    $query->bindParam(":clave",$pass1);
    $query->bindParam(":tipo",$tipo1);
    $query->bindParam(":id",$id);
    $query->execute();
    $pdo = null;
    echo "ok";



?>