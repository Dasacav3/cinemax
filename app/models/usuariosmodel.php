<?php

class UsuariosModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($data)
    {
        if ($data != "") {
            try {
                $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE id_usuario LIKE '%$data%' OR nombre_usuario LIKE '%$data%' OR tipo_usuario LIKE '%$data%'");
                $query->execute();
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($resultado) > 1) {
                    return $resultado;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                return false;
            }
        } else {
            try {
                $query = $this->db->connect()->prepare("SELECT * FROM usuario ORDER BY id_usuario DESC");
                $query->execute();
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                if (count($resultado) > 1) {
                    return $resultado;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                return false;
            }
        }
    }

    public function listar($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
            $query->execute(['id' => $id]);
            $data = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }

        $json = json_encode($data);

        return $json;
    }

    public function edit($data)
    {
        try {
            $query = $this->db->connect()->prepare("UPDATE usuario SET NOMBRE_USUARIO = :user, CLAVE_USUARIO = :clave, TIPO_USUARIO = :tipo WHERE ID_USUARIO = :id");
            $query->execute(['user' => $data['user'], 'clave' => $data['pass'], 'tipo' => $data['tipo'], 'id' => $data['id']]);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function delete($id)
    {
        try {
            $query = $this->db->connect()->prepare("DELETE FROM cliente WHERE id_usuario = :id");
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            return $e;
        }
        try {
            $query = $this->db->connect()->prepare("DELETE FROM usuario WHERE id_usuario = :id");
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            return $e;
        }
        return true;
    }
}
