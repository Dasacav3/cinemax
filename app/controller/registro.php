
    <?php

    class Registro extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function render()
        {
            $this->view->render('registro');
        }

        public function registrarCliente()
        {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $edad = $_POST['edad'];
            $cel = $_POST['cel'];
            $password = $_POST['pass'];

            if ($this->model->insert(['nombre' => $nombre, 'pass' => $password, 'edad' => $edad, 'apellido' => $apellido, 'cel' => $cel, 'email' => $email])) {
                echo "<p class='success'>Usuario registrado correctamente</p>";
            } else {
                echo "<p class='error'>Usuario ya existente<p>";
            }
        }
    }
    ?>
