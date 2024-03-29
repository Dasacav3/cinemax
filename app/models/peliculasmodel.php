<?php class PeliculasModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listarPeliculas()
    {
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM pelicula");
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
        return $resultado;
    }
    public function añadirPeliculas($data)
    {
        try {
            $query = $this->db->connect()->prepare("INSERT INTO pelicula (titulo_pelicula,genero,año_publicacion,imagen) VALUES (:titulo,:genero,:fecha,:imagen)");
            $query->execute(['titulo' => $data['titulo'], 'genero' => $data['genero'], 'fecha' => $data['año'], 'imagen' => $data['imagen']]);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
    public function getData($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT id_pelicula,titulo_pelicula,genero,año_publicacion FROM pelicula WHERE id_pelicula = :id");
            $query->execute(['id' => $id]);
            $data = $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e;
        }
        return $data;
    }
    public function editarPeliculas($data)
    {
        try {
            if (isset($data['imagen'])) {
                $query = $this->db->connect()->prepare("UPDATE pelicula SET titulo_pelicula = :titulo, genero = :genero, año_publicacion = :fecha, imagen = :imagen WHERE id_pelicula = :id ");
                $query->execute(['titulo' => $data['titulo'], 'genero' => $data['genero'], 'fecha' => $data['año'], 'imagen' => $data['imagen'], 'id' => $data['id']]);
            } else {
                $query = $this->db->connect()->prepare("UPDATE pelicula SET titulo_pelicula = :titulo, genero = :genero, año_publicacion = :fecha WHERE id_pelicula = :id ");
                $query->execute(['titulo' => $data['titulo'], 'genero' => $data['genero'], 'fecha' => $data['año'], 'id' => $data['id']]);
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
    public function eliminarPeliculas($id)
    {
        try {
            $query = $this->db->connect()->prepare("DELETE FROM pelicula WHERE id_pelicula = :id");
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}
