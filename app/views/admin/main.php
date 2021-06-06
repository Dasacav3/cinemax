<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/normalize.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/main.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/movie_cards.css">
    <script src="https://kit.fontawesome.com/ef5bd2f060.js" crossorigin="anonymous"></script>
    <script src="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.all.min.css">
    <title>Cinemax - Inicio</title>
</head>

<body>
    <div class="form_container pop-up" id="form_add_movie_wrap">
        <form id="form_add_movie" class="pop-up-wrap" method="POST">
            <a href="#" class="closePopup">
                <i class="fas fa-times-circle" title="Cerrar"></i>
            </a>
            <h4>Añadir pelicula</h4>
            <label for="">Titulo</label> <br>
            <input type="text" id="movieTitle" name="movieTitle"> <br>
            <label for="">Genero</label> <br>
            <input type="text" name="movieGender" id="movieGender" placeholder="Ej. Accion/Ciencia Ficcion"> <br>
            <label for="">Año publicación</label> <br>
            <input type="text" id="añoPublicacion" name="añoPublicacion" placeholder="Ej. 2000"> <br>
            <label for="">Imagen</label> <br>
            <input type="file" accept="image/*" id="movieImage" name="movieImage"> <br>
            <input type="button" value="Añadir" id="sendMovie">
        </form>
    </div>
    <div class="form_container pop-up" id="form_edit_movie_wrap">
        <form id="form_edit_movie" class="pop-up-wrap" method="POST">
            <a href="#" class="closePopup">
                <i class="fas fa-times-circle" title="Cerrar"></i>
            </a>
            <h4>Editar pelicula</h4>
            <input type="hidden" id="idMovie1" name="idMovie1">
            <label for="">Titulo</label> <br>
            <input type="text" id="movieTitle1" name="movieTitle1"> <br>
            <label for="">Genero</label> <br>
            <input type="text" name="movieGender1" id="movieGender1" placeholder="Ej. Accion/Ciencia Ficcion"> <br>
            <label for="">Año publicación</label> <br>
            <input type="text" id="añoPublicacion1" name="añoPublicacion1" placeholder="Ej. 2000"> <br>
            <label for="">Imagen</label> <br>
            <input type="file" accept="image/*" id="movieImage1" name="movieImage"> <br>
            <input type="button" value="Editar" id="editMovie">
        </form>
    </div>
    <header class="main-header">
        <div class="main-header-content">
            <div class="icon">
                <a href="main.php">
                    <img src="<?= constant('URL') ?>public/img/cinemax.png" alt="">
                </a>
            </div>
            <nav class="main-nav-bar">
                <a href="<?= constant('URL') ?>admin"><i class="fas fa-home"></i> Inicio</a>
                <a href="<?= constant('URL') ?>admin/reserva"><i class="fas fa-bookmark"></i> Reservaciones</a>
                <a href="<?= constant('URL') ?>admin/usuario"><i class="fas fa-id-card"></i> Usuarios</a>
                <a href="<?= constant('URL') ?>admin/logout"> <i class="fas fa-power-off"></i> Cerrar sesión</a>
                <a href="#"> <i class="fab fa-gg-circle"></i> <?= $this->session->get('user')['NOMBRE_USUARIO']; ?></a>
            </nav>
        </div>
    </header>
    <div class="main-title">
        <div>
            <i class="far fa-plus-square add-icon" title="Añadir pelicula" id="addMovie"></i>
        </div>
        <h1>Listado de peliculas</h1>
    </div>
    <main class="main-content">
        <section>
            <div class="container" id="movies">

            </div>
        </section>
    </main>
    <script src="<?= constant('URL') ?>public/js/pelicula.js" type="module"></script>
</body>

</html>