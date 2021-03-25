<?php

    include("../controller/databasePDO.php");
    $data = file_get_contents("php://input");
    $consulta = $pdo->prepare("SELECT * FROM reserva ORDER BY id_reserva DESC");
    $consulta->execute();
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
            <td><button type='button' onclick=editarReserva('" . $data['ID_RESERVA'] . "')>Editar</button>
                <button type='button' onclick=eliminarReserva('" . $data['ID_RESERVA'] . "')>Eliminar</button>
            </td>   
        </tr>";
    }
