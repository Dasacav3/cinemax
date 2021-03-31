<?php

if(isset($_POST)){
    include("../../controller/databasePDO.php");

    session_start();

    $sesion = $_SESSION['datos'];

    foreach($sesion as $data){
        $id = $data;
    }

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }

    $pelicula = $_POST['pelicula'];
    $sala = $_POST['sala'];
    $asiento = $_POST['asiento'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $estado=1;

    $query=$pdo->prepare("INSERT INTO reserva (id_pelicula,id_cliente,numero_sala,codigo_asiento,fecha_reservacion,hora_reservacion,estado_reservacion) VALUES (:pelicula,:id,:sala,:asiento,:fecha,:hora,:estado)");
    $query->bindParam(":pelicula",$pelicula);
    $query->bindParam(":id",$id);
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