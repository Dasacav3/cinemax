<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/dist/css/datatable.css">
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



    $consulta = $pdo->prepare("SELECT * FROM usuario ORDER BY id_usuario DESC");
    $consulta->execute();
    if($data != ""){
        $consulta = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario LIKE '%".$data."%' OR nombre_usuario LIKE '%".$data."%' OR clave_usuario LIKE '%".$data."%' OR tipo_usuario LIKE '%".$data."%'");
        $consulta->execute();
    }
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $data){
        echo "<tr>
            <td>" . $data['ID_USUARIO'] . "</td>
            <td>" . $data['NOMBRE_USUARIO'] . "</td>
            <td>" . $data['CLAVE_USUARIO'] . "</td>
            <td>" . $data['TIPO_USUARIO'] . "</td>  
            <td> 
                <button class='abrirPopup-edit btn-edit' type='button' onclick=Editar('" . $data['ID_USUARIO'] . "');abrir()>Editar</button>
                <button class='btn-delete' type='button' onclick=eliminarUser('" . $data['ID_USUARIO'] . "')>Eliminar</button> 
            </td>
        </tr>";
    }

?>

</body>
</html>
