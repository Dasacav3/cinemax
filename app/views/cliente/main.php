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
    <header class="main-header">
        <div class="main-header-content">
            <div class="icon">
                <a href="#">
                    <img src="<?= constant('URL') ?>public/img/cinemax.png" alt="">
                </a>
            </div>
            <nav class="main-nav-bar">
                <a href="<?= constant('URL') ?>cliente"><i class="fas fa-home"></i> Inicio</a>
                <a href="<?= constant('URL') ?>cliente/reserva"><i class="fas fa-bookmark"></i> Reservaciones</a>
                <a href="<?= constant('URL') ?>cliente/logout"> <i class="fas fa-power-off"></i> Cerrar sesión</a>
                <a href="#"> <i class="fab fa-gg-circle"></i> <?= $this->session->get('user')['NOMBRE_USUARIO']; ?></a>
            </nav>
        </div>
    </header>
    <div class="main-title">
        <h1>Listado de peliculas</h1>
    </div>
    <main class="main-content">
        <section>
            <div class="container" id="movies">

            </div>
        </section>
    </main>
    <script src="<?= constant('URL') ?>public/js/pelicula2.js" type="module"></script>
</body>

</html>