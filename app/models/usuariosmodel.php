<?php

class UsuariosModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM usuario ORDER BY id_usuario DESC");
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            if (count($data) > 1) {
                return $data;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
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
            $query = $this->db->connect()->prepare("DELETE FROM cliente WHERE id_usuario = :id; DELETE FROM usuario WHERE id_usuario = :id");
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
