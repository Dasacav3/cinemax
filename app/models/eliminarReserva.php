<?php

    $data = file_get_contents("php://input");
    require "../controller/databasePDO.php";

    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../views/login.php");
        die();
    }
    
    $query = $pdo->prepare("DELETE FROM reserva WHERE id_reserva = :id");
    $query->bindParam(":id",$data);
    $query->execute();
    echo "ok";

?>

 