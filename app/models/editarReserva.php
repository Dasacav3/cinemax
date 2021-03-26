<?php

    $data = file_get_contents("php://input");
    // require "../controller/databasePDO.php";
    // $query = $pdo->prepare("SELECT id_reserva,id_pelicula,numero_sala,codigo_asiento,fecha_reservacion,hora_reservacion FROM reserva WHERE id_reserva = :id");
    // $query->bindParam(":id",$data); 
    // $query->execute();
    // $resultado = $query->fetch(PDO::FETCH_ASSOC);
    // echo json_encode($resultado);
    include("../controller/databasePDO.php");

    $reserva = $_POST['reserva1'];
    $pelicula = $_POST['pelicula1'];
    // $edad = $_POST['edad'];
    $sala = $_POST['sala1'];
    $asiento = $_POST['asiento1'];
    $fecha = $_POST['fecha1'];
    $hora = $_POST['hora1'];

    $query= $pdo->prepare("UPDATE reserva SET id_pelicula = :pelicula, numero_sala = :sala, codigo_asiento = :asiento, fecha_reservacion = :fecha, hora_reservacion = :hora WHERE id_reserva = :id");
    $query->bindParam(":pelicula",$pelicula);
    $query->bindParam(":sala",$sala);
    $query->bindParam(":asiento",$asiento);
    $query->bindParam(":fecha",$fecha);
    $query->bindParam(":hora",$hora);
    $query->bindParam(":id",$reserva);
    $query->execute();
    $pdo = null;
    echo "ok";



?>