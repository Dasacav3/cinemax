<?php

class Error_Manage extends Controller{
    public function __construct(){
        parent::__construct();
        $this->view->render('errors/404');
    }
}