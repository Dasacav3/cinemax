<?php

class ReservasModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($data1)
    {
        $id = $this->session->get('user')['ID_CLIENTE'];
        $user = $this->session->get('user')['TIPO_USUARIO'];

        if ($data1 != "") {
            if ($user == 'Administrador') {
                try {
                    $query = $this->db->connect()->prepare("SELECT * FROM reserva WHERE id_reserva LIKE '%$data1%' OR fecha_reservacion '%$data1%'");
                    $query->execute();
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                return $data;
            } else if ($user == 'Cliente') {
                try {
                    $query = $this->db->connect()->prepare("SELECT * FROM reserva WHERE id_cliente = :id AND id_reserva LIKE '%$data1%' OR fecha_reservacion '%$data1%'");
                    $query->execute(["id" => $id]);
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                return $data;
            }
        } else {
            if ($user == 'Administrador') {
                try {
                    $query = $this->db->connect()->prepare("SELECT * FROM reserva ORDER BY id_reserva DESC");
                    $query->execute();
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                return $data;
            } else if ($user == 'Cliente') {
                try {
                    $query = $this->db->connect()->prepare("SELECT * FROM reserva WHERE id_cliente = :id ORDER BY id_reserva DESC");
                    $query->execute(["id" => $id]);
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    return $e->getMessage();
                }
                return $data;
            }
        }
    }

    public function add($data)
    {
        $id = $this->session->get('user')['ID_CLIENTE'];

        try {
            $query = $this->db->connect()->prepare("INSERT INTO reserva (id_pelicula,id_cliente,numero_sala,codigo_asiento,fecha_reservacion,hora_reservacion,estado_reservacion) VALUES (:pelicula,:id,:sala,:asiento,:fecha,:hora,:estado)");
            $query->execute(['pelicula' => $data['idp'], 'id' => $id, 'sala' => $data['sala'], 'asiento' => $data['asiento'], 'fecha' => $data['fecha'], 'hora' => $data['hora'], 'estado' => $data['estado']]);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function cancel($id)
    {
        try {
            $query = $this->db->connect()->prepare("UPDATE reserva SET estado_reservacion = 'Cancelada'  WHERE id_reserva = :id");
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function listar($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT id_reserva,id_pelicula,numero_sala,codigo_asiento,fecha_reservacion,hora_reservacion,estado_reservacion FROM reserva WHERE id_reserva = :id");
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
            $query = $this->db->connect()->prepare("UPDATE reserva SET id_pelicula = :pelicula, numero_sala = :sala, codigo_asiento = :asiento, fecha_reservacion = :fecha, hora_reservacion = :hora WHERE id_reserva = :id");
            $query->execute(['pelicula' => $data['idp'], 'sala' => $data['sala'], 'asiento' => $data['asiento'], 'fecha' => $data['fecha'], 'hora' => $data['hora'], 'id' => $data['idr']]);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function edit2($data)
    {
        try {
            $query = $this->db->connect()->prepare("UPDATE reserva SET id_pelicula = :pelicula, numero_sala = :sala, codigo_asiento = :asiento, fecha_reservacion = :fecha, hora_reservacion = :hora, estado_reservacion = :estado WHERE id_reserva = :id");
            $query->execute(['pelicula' => $data['idp'], 'sala' => $data['sala'], 'asiento' => $data['asiento'], 'fecha' => $data['fecha'], 'hora' => $data['hora'], 'id' => $data['idr'], 'estado' => $data['estado']]);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function delete($id)
    {
        try {
            $query = $this->db->connect()->prepare("DELETE FROM reserva WHERE id_reserva = :id");

            if ($query->execute(['id' => $id])) {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function listarPelicula()
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM pelicula");
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
        return $data;
    }
}
