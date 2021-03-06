<?php class RegistroModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($datos)
    {
        $password_hash = password_hash($datos['pass'], PASSWORD_BCRYPT);
        
        try {
            $connect = $this->db->connect();
            $queryUsuario = $connect->prepare("INSERT INTO usuario (NOMBRE_USUARIO,CLAVE_USUARIO,TIPO_USUARIO) VALUES(:nombre, :pass, :tipo)");
            $queryUsuario->execute(['nombre' => $datos['email'], 'pass' => $password_hash, 'tipo' => '1']);
            $id = $connect->lastInsertId();
            $queryCliente = $connect->prepare("INSERT INTO cliente (NOMBRE_CLIENTE,APELLIDO_CLIENTE,EDAD,EMAIL_CLIENTE,CELULAR_CLIENTE,ID_USUARIO) VALUES(:nombre, :apellido, :edad, :email, :cel, :id)");
            $queryCliente->execute(['nombre' => $datos['nombre'], 'apellido' => $datos['apellido'], 'edad' => $datos['edad'], 'email' => $datos['email'], 'cel' => $datos['cel'], 'id' => $id]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
