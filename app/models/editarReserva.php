<?php

    $data = file_get_contents("php://input");
    require "../controller/databasePDO.php";
    $query = $pdo->prepare("SELECT id_pelicula,numero_sala,codigo_asiento,fecha_reservacion,hora_reservacion FROM reserva WHERE id_reserva = :id");
    $query->bindParam(":id",$data); 
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
?>