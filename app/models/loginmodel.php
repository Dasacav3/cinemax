<?php

class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function select($datos)
    {
        // Insertar datos en la BD
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE nombre_usuario = :nombre AND clave_usuario = :pass");
            $query->execute(['nombre' => $datos['user_name'], 'pass' => $datos['password']]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if($result['TIPO_USUARIO'] == 'Administrador'){
                try {
                    $admin = $this->db->connect()->prepare("SELECT u.ID_USUARIO, u.NOMBRE_USUARIO, u.TIPO_USUARIO, a.ID_ADMIN, a.NOMBRE_ADMIN, a.APELLIDO_ADMIN FROM usuario as u INNER JOIN administrador as a ON u.ID_USUARIO = a.ID_USUARIO WHERE u.NOMBRE_USUARIO = :nombre AND u.CLAVE_USUARIO = :pass");
                    $admin->execute(['nombre' => $datos['user_name'], 'pass' => $datos['password']]);
                    $data = $admin->fetch(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                return $data;
            }else if($result['TIPO_USUARIO'] == 'Cliente'){
                try {
                    $cliente = $this->db->connect()->prepare("SELECT u.ID_USUARIO, u.NOMBRE_USUARIO, u.TIPO_USUARIO, c.ID_CLIENTE, c.NOMBRE_CLIENTE, c.APELLIDO_CLIENTE FROM usuario as u INNER JOIN cliente as c ON u.ID_USUARIO = c.ID_CLIENTE WHERE u.NOMBRE_USUARIO = :nombre AND u.CLAVE_USUARIO = :pass");
                    $cliente->execute(['nombre' => $datos['user_name'], 'pass' => $datos['password']]);
                    $data = $cliente->fetch(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                return $data;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}

?>