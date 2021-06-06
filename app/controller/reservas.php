<?php
error_reporting(0);

class Reservas extends Controller
{
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function listarReservas()
    {  
        $data = file_get_contents("php://input");
        $resultado = $this->model->get($data);
        $session = $this->session->get('user')['TIPO_USUARIO'];

        if ($session == 'Administrador') {
            if (!empty($resultado)) {
                foreach ($resultado as $data) {
                    echo "<tr>
                    <td>" . $data['ID_RESERVA'] . "</td>
                    <td>" . $data['ID_PELICULA'] . "</td>
                    <td>" . $data['ID_CLIENTE'] . "</td>
                    <td>" . $data['NUMERO_SALA'] . "</td>
                    <td>" . $data['CODIGO_ASIENTO'] . "</td>
                    <td>" . $data['FECHA_RESERVACION'] . "</td>
                    <td>" . $data['HORA_RESERVACION'] . "</td>
                    <td>" . $data['ESTADO_RESERVACION'] . "</td> 
                    <td><button class='abrirPopup-edit btn-edit' type='button' id='btnDelete-".$data['ID_RESERVA']."'>Editar</button>
                        <button class='btn-delete' type='button' id='btnEdit-".$data['ID_RESERVA']."'>Eliminar</button>
                    </td>   
                </tr>";
                }
            }
        } else {
            if (!empty($resultado)) {
                foreach ($resultado as $data) {
                    echo "<tr>
                    <td>" . $data['ID_RESERVA'] . "</td>
                    <td>" . $data['ID_PELICULA'] . "</td>
                    <td>" . $data['NUMERO_SALA'] . "</td>
                    <td>" . $data['CODIGO_ASIENTO'] . "</td>
                    <td>" . $data['FECHA_RESERVACION'] . "</td>
                    <td>" . $data['HORA_RESERVACION'] . "</td>
                    <td>" . $data['ESTADO_RESERVACION'] . "</td>
                    <td>";
                    if($data['ESTADO_RESERVACION'] == 'Activa'){
                    echo "
                        <button class='btn-delete' type='button' id='btnEdit-".$data['ID_RESERVA']."'>Cancelar</button>
                    </td>   
                    </tr>";
                    }
                    
                }
            }
        }
    }

    public function añadirReserva()
    {
        $pelicula = $_POST['pelicula'];
        $sala = $_POST['sala'];
        $asiento = $_POST['asiento'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $estado = 1;

        $resultado = $this->model->add(['idp' => $pelicula, 'sala' => $sala, 'asiento' => $asiento, 'fecha' => $fecha, 'hora' => $hora, 'estado' => $estado]);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function cancelarReserva()
    {
        $id = file_get_contents("php://input");

        $resultado = $this->model->cancel($id);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function actualizarReserva2()
    {
        $id = file_get_contents("php://input");

        $resultado = $this->model->listar($id);

        if (empty($resultado)) {
            echo "Hubo un problema";
        } else {
            print_r($resultado);
        }
    }

    public function editarReserva()
    {
        $reserva = $_POST['reserva1'];
        $pelicula = $_POST['pelicula1'];
        $sala = $_POST['sala1'];
        $asiento = $_POST['asiento1'];
        $fecha = $_POST['fecha1'];
        $hora = $_POST['hora1'];

        $resultado = $this->model->edit(['idr' => $reserva, 'idp' => $pelicula, 'sala' => $sala, 'asiento' => $asiento, 'fecha' => $fecha, 'hora' => $hora]);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function editarReserva2()
    {
        $reserva = $_POST['reserva1'];
        $pelicula = $_POST['pelicula1'];
        $sala = $_POST['sala1'];
        $asiento = $_POST['asiento1'];
        $fecha = $_POST['fecha1'];
        $hora = $_POST['hora1'];
        $estado = $_POST['estado1'];

        $resultado = $this->model->edit2(['idr' => $reserva, 'idp' => $pelicula, 'sala' => $sala, 'asiento' => $asiento, 'fecha' => $fecha, 'hora' => $hora, 'estado' => $estado]);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function eliminarReserva()
    {
        $id = file_get_contents("php://input");

        var_dump($id);

        $resultado = $this->model->delete($id);

        if ($resultado) {
            echo "Registro eliminado";
        } else {
            echo "Hubo un problema";
        }
    }
}
