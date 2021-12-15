<?php

class Peliculas extends Controller
{
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function get()
    {
        $resultado = $this->model->listarPeliculas();
        $session = $this->session->get('user')['TIPO_USUARIO'];

        if ($resultado != null || !empty($resultado)) {
            foreach ($resultado as $data) {
                echo "
                    <div class='card' style='background: url(" . constant('URL') .  $data['IMAGEN'] . ");background-size: cover;' title='Titulo: " . $data['TITULO_PELICULA'] . "\nGenero: " . $data['GENERO'] . "\nAño: " . $data['AÑO_PUBLICACION'] . "'>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class='content'>
                            <h2>" . $data['ID_PELICULA'] . "</h2>
                        </div>";
                if ($session != 'Cliente') {
                    echo "<div class='card-btn'>
                                <i class='fas fa-trash btnDelete' id='btnDelete-" . $data['ID_PELICULA'] . "'></i>
                                <i class='fas fa-edit btnEdit' id='btnEdit-" . $data['ID_PELICULA'] . "'></i>
                        </div>";
                }
                echo
                "</div>";
            }
        }
    }

    public function add()
    {
        $titulo = $_POST['movieTitle'];
        $genero = $_POST['movieGender'];
        $año = $_POST['añoPublicacion'];

        $thumbName = $this->crearMiniatura($_FILES['movieImage']['name']);

        $resultado = $this->model->añadirPeliculas(['titulo' => $titulo, 'genero' => $genero, 'año' => $año, 'imagen' => $thumbName]);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function getEditData()
    {
        $id = file_get_contents("php://input");

        $resultado = $this->model->getData($id);

        if (!empty($resultado)) {
            echo json_encode($resultado);
        } else {
            echo "Hubo un problema";
        }
    }

    public function edit()
    {
        $id = $_POST['idMovie1'];
        $titulo = $_POST['movieTitle1'];
        $genero = $_POST['movieGender1'];
        $año = $_POST['añoPublicacion1'];
        $img = $_FILES['movieImage']['name'];

        if ($img == "") {
            $resultado = $this->model->editarPeliculas(['id' => $id, 'titulo' => $titulo, 'genero' => $genero, 'año' => $año]);
        } else {
            $thumbName = $this->crearMiniatura($img);
            $resultado = $this->model->editarPeliculas(['id' => $id, 'titulo' => $titulo, 'genero' => $genero, 'año' => $año, 'imagen' => $thumbName]);
        }

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function delete()
    {
        $id = file_get_contents("php://input");

        $resultado = $this->model->eliminarPeliculas($id);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function crearMiniatura($fileName)
    {
        $finalWidth = 300;
        $dirFullImagen = "./public/movies/full/";
        $dirThumbImage = "./public/movies/thumbs/";
        $tmpName = $_FILES['movieImage']['tmp_name'];
        $finalName = $dirFullImagen . $_FILES['movieImage']['name'];

        $this->copyImage($tmpName, $finalName);

        $img = null;

        if (preg_match('/[.](jpg)$/', $fileName) || preg_match('/[.](jpeg)$/', $fileName)) {
            $img = imagecreatefromjpeg($finalName);
        } else if (preg_match('/[.](png)$/', $fileName)) {
            $img = imagecreatefrompng($finalName);
        } else if (preg_match('/[.](gif)$/', $fileName)) {
            $img = imagecreatefromgif($finalName);
        }

        $width = imagesx($img);
        $height = imagesy($img);

        $minWidth = $finalWidth;
        $minHeigth = floor($height * ($finalWidth / $width));

        $imageTrueColor = imagecreatetruecolor($minWidth, $minHeigth);

        imagecopyresized($imageTrueColor, $img, 0, 0, 0, 0, $minWidth, $minHeigth, $width, $height);

        if (!file_exists($dirThumbImage)) {
            if (!mkdir($dirThumbImage)) {
                die("Hubo un problema con la miniatura");
            }
        }

        imagejpeg($imageTrueColor, $dirThumbImage . $fileName);

        $data = $dirThumbImage;

        str_starts_with($data, ".");

        $new = str_replace("./", "", $data);

        $thumbName = $new . $_FILES['movieImage']['name'];

        return $thumbName;
    }

    public function copyImage($origin, $destination)
    {
        move_uploaded_file($origin, $destination);
    }
}
