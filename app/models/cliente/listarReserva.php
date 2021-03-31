<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/datatable.css">
    <title>Document</title>
</head>
<body>

<?php
    $data = file_get_contents("php://input");
    include("../../controller/databasePDO.php");
    include("../../controller/database.php");

    session_start();

    $sesion = $_SESSION['datos'];

    $id = $sesion[0];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }

    $consulta2 = mysqli_query($conn, "SELECT id_usuario FROM usuario WHERE nombre_usuario = '$sesion'");

    $data1 = mysqli_fetch_array($consulta2);

    $consulta = $pdo->prepare("SELECT reserva.ID_RESERVA, reserva.ID_PELICULA, reserva.NUMERO_SALA, 
    reserva.CODIGO_ASIENTO, reserva.FECHA_RESERVACION, reserva.HORA_RESERVACION, reserva.ESTADO_RESERVACION 
    FROM reserva INNER JOIN cliente ON reserva.ID_CLIENTE = cliente.ID_CLIENTE WHERE cliente.ID_CLIENTE = '$id'");
    $consulta->execute();
    if($data != ""){
        $consulta = $pdo->prepare("SELECT reserva.ID_RESERVA, reserva.ID_PELICULA, reserva.NUMERO_SALA, 
        reserva.CODIGO_ASIENTO, reserva.FECHA_RESERVACION, reserva.HORA_RESERVACION, reserva.ESTADO_RESERVACION 
        FROM reserva INNER JOIN cliente ON reserva.ID_CLIENTE = cliente.ID_CLIENTE WHERE cliente.ID_CLIENTE = '$id' AND (reserva.ID_RESERVA LIKE '%".$data."%' OR reserva.ID_PELICULA LIKE '%".$data."%' OR reserva.NUMERO_SALA LIKE '%".$data."%' OR reserva.CODIGO_ASIENTO LIKE '%".$data."%' OR reserva.FECHA_RESERVACION LIKE '%".$data."%' OR reserva.HORA_RESERVACION LIKE '%".$data."%' OR reserva.ESTADO_RESERVACION LIKE '%".$data."%')");
        $consulta->execute();
    }
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $data){
        echo "<tr>
            <td>" . $data['ID_RESERVA'] . "</td>
            <td>" . $data['ID_PELICULA'] . "</td>
            <td>" . $data['NUMERO_SALA'] . "</td>
            <td>" . $data['CODIGO_ASIENTO'] . "</td>
            <td>" . $data['FECHA_RESERVACION'] . "</td>
            <td>" . $data['HORA_RESERVACION'] . "</td>
            <td>" . $data['ESTADO_RESERVACION'] . "</td> 
            <td><button class='abrirPopup-edit btn-edit' type='button' onclick=Editar('" . $data['ID_RESERVA'] . "');abrir()>Editar</button>
            </td>   
        </tr>";
    }

?>

</body>
</html>
