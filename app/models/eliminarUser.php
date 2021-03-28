<?php

    $data = file_get_contents("php://input");
    require "../controller/databasePDO.php";
    $query = $pdo->prepare("DELETE FROM cliente WHERE id_usuario = :id; DELETE FROM usuario WHERE id_usuario = :id");
    $query->bindParam(":id",$data);
    $query->execute();
    if ($query === false) {
        echo "SQL Error: " . $pdo->errorInfo();
    } else {
        echo "ok";
    }
?>