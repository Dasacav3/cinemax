<?php

    $data = file_get_contents("php://input");

    include("../../controller/databasePDO.php");

    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }
    

    $reserva = $_POST['reserva1'];
    $pelicula = $_POST['pelicula1'];
    $sala = $_POST['sala1'];
    $asiento = $_POST['asiento1'];
    $fecha = $_POST['fecha1'];
    $hora = $_POST['hora1'];
    $estado = $_POST['estado1'];

    $query= $pdo->prepare("UPDATE reserva SET id_pelicula = :pelicula, numero_sala = :sala, codigo_asiento = :asiento, fecha_reservacion = :fecha, hora_reservacion = :hora, estado_reservacion = :estado WHERE id_reserva = :id");
    $query->bindParam(":pelicula",$pelicula);
    $query->bindParam(":sala",$sala);
    $query->bindParam(":asiento",$asiento);
    $query->bindParam(":fecha",$fecha);
    $query->bindParam(":hora",$hora);
    $query->bindParam(":estado",$estado);
    $query->bindParam(":id",$reserva);
    $query->execute();
    $pdo = null;
    echo "ok";



?>