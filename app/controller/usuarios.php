<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listarUsers()
    {
        $resultado = $this->model->get();

        if (!empty($resultado)) {
            foreach ($resultado as $data) {
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
        }
    }

    public function actualizarUser(){
        $id = file_get_contents("php://input");

        $resultado = $this->model->listar($id);

        if(!$resultado){
            echo "Hubo un problema";
        }else{
            echo $resultado;
        }
    }

    public function editUser(){
        
        $id= $_POST['id_user'];
        $user1= $_POST['user'];
        $pass1 = $_POST['pass'];
        $tipo1 = $_POST['tipo'];

        $resultado = $this->model->edit(['id' => $id, 'user' => $user1, 'pass' => $pass1, 'tipo' => $tipo1]);

        if($resultado){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
    }

    public function deleteUser(){
        $id = file_get_contents("php://input");

        $resultado = $this->model->delete($id);

        if($resultado){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
    }
}
