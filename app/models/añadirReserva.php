<?php

if(isset($_POST)){
    include("../controller/databasePDO.php");
    $nombres = 'Daniel';
    $apellidos = 'Carrillo';
    // $nombres = $_POST['nombres'];
    // $apellidos = $_POST['apellidos'];
    $pelicula = $_POST['pelicula'];
    // $edad = $_POST['edad'];
    $sala = $_POST['sala'];
    $asiento = $_POST['asiento'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $estado=1;
    $cliente=1;

    $query= $pdo->prepare("INSERT INTO reserva (id_pelicula,id_cliente,numero_sala,codigo_asiento,fecha_reservacion,hora_reservacion,estado_reservacion) VALUES (:pelicula,:id,:sala,:asiento,:fecha,:hora,:estado)");
    $query->bindParam(":pelicula",$pelicula);
    $query->bindParam(":id",$cliente);
    $query->bindParam(":sala",$sala);
    $query->bindParam(":asiento",$asiento);
    $query->bindParam(":fecha",$fecha);
    $query->bindParam(":hora",$hora);
    $query->bindParam(":estado",$estado);
    $query->execute();
    $pdo = null;
    echo "ok";
    
}

?>