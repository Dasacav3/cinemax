<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listarUsers()
    {
        $resultado = $this->model->get(file_get_contents("php://input"));

        echo json_encode($resultado);
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
