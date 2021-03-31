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

    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }

    $consulta = $pdo->prepare("SELECT * FROM reserva ORDER BY id_reserva DESC");
    $consulta->execute();
    if($data != ""){
        $consulta = $pdo->prepare("SELECT * FROM reserva WHERE id_reserva LIKE '%".$data."%' OR id_pelicula LIKE '%".$data."%' OR id_cliente LIKE '%".$data."%' OR numero_sala LIKE '%".$data."%' OR codigo_asiento LIKE '%".$data."%' OR fecha_reservacion LIKE '%".$data."%' OR hora_reservacion LIKE '%".$data."%' OR estado_reservacion LIKE '%".$data."%'");
        $consulta->execute();
    }
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $data){
        echo "<tr>
            <td>" . $data['ID_RESERVA'] . "</td>
            <td>" . $data['ID_PELICULA'] . "</td>
            <td>" . $data['ID_CLIENTE'] . "</td>
            <td>" . $data['NUMERO_SALA'] . "</td>
            <td>" . $data['CODIGO_ASIENTO'] . "</td>
            <td>" . $data['FECHA_RESERVACION'] . "</td>
            <td>" . $data['HORA_RESERVACION'] . "</td>
            <td>" . $data['ESTADO_RESERVACION'] . "</td> 
            <td><button class='abrirPopup-edit btn-edit' type='button' onclick=Editar('" . $data['ID_RESERVA'] . "');abrir()>Editar</button>
                <button class='btn-delete' type='button' onclick=eliminarReserva('" . $data['ID_RESERVA'] . "')>Eliminar</button>
            </td>   
        </tr>";
    }

?>

</body>
</html>
