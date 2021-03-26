<?php

    $data = file_get_contents("php://input");
    require "../controller/databasePDO.php";
    $query = $pdo->prepare("UPDATE reserva SET numero_sala=:sala,codigo_asiento=:asiento,fecha_reservacion=:fecha,hora_reservacion=:hora) WHERE id_reserva = :id");
    $query->bindParam(":id",$data);
    $query->bindParam(":sala",$data);
    $query->bindParam(":asiento",$data); 
    $query->bindParam(":fecha",$data); 
    $query->bindParam(":hora",$data); 
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
?>