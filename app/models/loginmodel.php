<?php class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function select($datos)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE nombre_usuario = :nombre");
            $query->execute(['nombre' => $datos['user_name']]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result['TIPO_USUARIO'] == 'Admin' and password_verify($datos['password'], $result['CLAVE_USUARIO'])) {
                try {
                    $admin = $this->db->connect()->prepare("SELECT u.ID_USUARIO, u.NOMBRE_USUARIO, u.TIPO_USUARIO, a.ID_ADMIN, a.NOMBRE_ADMIN, a.APELLIDO_ADMIN, u.CLAVE_USUARIO FROM usuario as u INNER JOIN administrador as a ON u.ID_USUARIO = a.ID_USUARIO WHERE u.NOMBRE_USUARIO = :nombre");
                    $admin->execute(['nombre' => $datos['user_name']]);
                    $data = $admin->fetch(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                return $data;
            } else if ($result['TIPO_USUARIO'] == 'Cliente' and password_verify($datos['password'], $result['CLAVE_USUARIO'])) {
                try {
                    $cliente = $this->db->connect()->prepare("SELECT u.ID_USUARIO, u.NOMBRE_USUARIO, u.TIPO_USUARIO, c.ID_CLIENTE, c.NOMBRE_CLIENTE, c.APELLIDO_CLIENTE, u.CLAVE_USUARIO FROM usuario as u INNER JOIN cliente as c ON u.ID_USUARIO = c.ID_USUARIO WHERE u.NOMBRE_USUARIO = :nombre");
                    $cliente->execute(['nombre' => $datos['user_name']]);
                    $data = $cliente->fetch(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                return $data;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
