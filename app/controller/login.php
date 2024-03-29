<?php
error_reporting(0);

class Login extends Controller
{
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function render()
    {
        $this->view->render('login');
    }

    public function loginUser()
    {
        $user = $_POST['user_name'];
        $pass = $_POST['password'];

        $data = $this->model->select(['user_name' => $user, 'password' => $pass]);

        if ( $data['TIPO_USUARIO'] == 'Admin') {
            echo "<p class='success admin'>Ingreso exitoso</p>";
        }else if($data['TIPO_USUARIO'] == 'Cliente'){
            echo "<p class='success cliente'>Ingreso exitoso</p>";
        }else {
            echo "<p class='error'>Datos invalidos<p>";
        }

        // Iniciar sesión
        $this->session->add('user',$data);
    }
}
