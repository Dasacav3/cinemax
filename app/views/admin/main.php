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
    <script src="<?= constant('URL') ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= constant('URL') ?>node_modules/sweetalert2/dist/sweetalert2.min.css">
    <title>Cinemax - Inicio</title>
</head>

<body id="body">
    <section id="background_secret">
        <svg viewBox="0 0 960 300">
            <symbol id="s-text">
                <text text-anchor="middle" x="50%" y="80%">Cinemax</text>
            </symbol>

            <g class="g-ants">
                <use xlink:href="#s-text" class="text-copy"></use>
                <use xlink:href="#s-text" class="text-copy"></use>
                <use xlink:href="#s-text" class="text-copy"></use>
                <use xlink:href="#s-text" class="text-copy"></use>
                <use xlink:href="#s-text" class="text-copy"></use>
            </g>
        </svg>
        <span class="span"></span>
        <span class="span"></span>
        <span class="span"></span>
        <span class="span"></span>
        <span class="span"></span>
        <span class="span"></span>
        <span class="span"></span>
        <span class="span"></span>
        <span class="span"></span>
        <span class="span"></span>
    </section>
    <section id="text-out">
        Presione la tecla espacio para salir
    </section>
    <div id="contenido_page">
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
                <div id="sidebarIcon">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="icon">
                    <a href="#">
                        <img src="<?= constant('URL') ?>public/img/cinemax.png" alt="">
                    </a>
                </div>
                <nav class="main-nav-bar" id="navbar_responsive">
                    <a href="<?= constant('URL') ?>admin"><i class="fas fa-home"></i> Inicio</a>
                    <a href="<?= constant('URL') ?>admin/reserva"><i class="fas fa-bookmark"></i> Reservaciones</a>
                    <a href="<?= constant('URL') ?>admin/usuario"><i class="fas fa-id-card"></i> Usuarios</a>
                    <a href="<?= constant('URL') ?>admin/logout"> <i class="fas fa-power-off"></i> Cerrar sesión</a>
                    <a href="#" class="user_name"> <i class="fab fa-gg-circle"></i> <?= $this->session->get('user')['NOMBRE_USUARIO']; ?></a>
                    <ul class="submenu">
                        <li id="btn_cursor">Cambiar Cursor</li>
                        <li id="btn_background">Modo secreto</li>
                    </ul>
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
    </div>
    <script src="<?= constant('URL') ?>public/js/pelicula.js" type="module"></script>
    <script src="<?= constant('URL') ?>public/js/modals-toggles.js"></script>
</body>

</html>