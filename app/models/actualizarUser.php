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

// if(!empty($data)){
//     echo $data;
// }else{
//     echo "Fallo al obtener el id";
// }


    $query = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
    $query->bindParam(":id",$data); 
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($resultado);

?>