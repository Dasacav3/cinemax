<?php

$data = file_get_contents("php://input");

// if(!empty($data)){
//     echo $data;
// }else{
//     echo "Fallo al obtener el id";
// }


    require "../controller/databasePDO.php";
    $query = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
    $query->bindParam(":id",$data); 
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($resultado);

?>