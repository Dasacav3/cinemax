<?php

// include_once 'libs/imodel.php';

class Model extends Database{

    function __construct(){
        $this->db = new Database();
        $this->session = new Session();
        $this->session->init();
    }
}

?>