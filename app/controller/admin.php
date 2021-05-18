<?php

class Admin extends Controller
{
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        if($this->session->getStatus() === 1 || empty($this->session->get('user')) || $this->session->get('user')['TIPO_USUARIO'] != 'Administrador'){
            header('location: /cinemax/login');
        }
    }

    public function render()
    {
        $this->view->render('admin/main');
    }

    public function reserva(){
        $this->view->render('admin/reserva');
    }

    public function usuario(){
        $this->view->render('admin/usuario');
    }

    public function logout()
    {
      $this->session->close();
      header('location: /cinemax/login');
    }
}