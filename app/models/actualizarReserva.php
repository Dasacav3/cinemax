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
    $query = $pdo->prepare("SELECT id_reserva,id_pelicula,numero_sala,codigo_asiento,fecha_reservacion,hora_reservacion,estado_reservacion FROM reserva WHERE id_reserva = :id");
    $query->bindParam(":id",$data); 
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($resultado);

?>