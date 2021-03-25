<?php

    $data = file_get_contents("php://input");
    require "../controller/databasePDO.php";
    $query = $pdo->prepare("DELETE FROM reserva WHERE id_reserva = :id");
    $query->bindParam(":id",$data);
    $query->execute();
    echo "ok";

?>

 