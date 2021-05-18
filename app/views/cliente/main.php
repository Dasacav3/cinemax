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
                <a href="main.php">
                    <img src="<?= constant('URL') ?>public/img/cinemax.png" alt="">
                </a>
            </div>
            <nav class="main-nav-bar">
                <a href="<?= constant('URL') ?>cliente"><i class="fas fa-home"></i> Inicio</a>
                <a href="<?= constant('URL') ?>cliente/reserva"><i class="fas fa-bookmark"></i> Reservaciones</a>
                <a href="<?= constant('URL') ?>cliente/logout"> <i class="fas fa-power-off"></i> Cerrar sesión</a>
                <a href="#"> <i class="fab fa-gg-circle"></i> <?= $this->session->get('user')['NOMBRE_USUARIO'];?></a>
            </nav>
        </div>
    </header>
    <div class="main-title">
        <h1>Peliculas destacadas</h1>
    </div>
    <main class="main-content">
        <section>
            <div class="container">
                <div class="card card-1">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>01</h2>
                    </div>
                </div>
                <div class="card card-2">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>02</h2>
                    </div>
                </div>
                <div class="card card-3">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>03</h2>
                    </div>
                </div>
                <div class="card card-4">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>04</h2>
                    </div>
                </div>
                <div class="card card-5">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>05</h2>
                    </div>
                </div>
                <div class="card card-6">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>06</h2>
                    </div>
                </div>
                <div class="card card-7">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>07</h2>
                    </div>
                </div>
                <div class="card card-8">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>08</h2>
                    </div>
                </div>
                <div class="card card-9">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>09</h2>
                    </div>
                </div>
                <div class="card card-10">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>10</h2>
                    </div>
                </div>
                <div class="card card-11">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>11</h2>
                    </div>
                </div>
                <div class="card card-12">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <div class="content">
                        <h2>12</h2>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>