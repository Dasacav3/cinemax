<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./dist/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./dist/css/normalize.css">
    <link rel="stylesheet" href="./dist/css/main.css">
    <link rel="stylesheet" href="./dist/css/movie_cards.css">
    <script src="https://kit.fontawesome.com/ef5bd2f060.js" crossorigin="anonymous"></script>
    <script src="../../lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.all.min.css">
    <title>Cinemax - Inicio</title>
</head>
<?php
session_start();

$sesion = $_SESSION['datos'];


if ($sesion == null || $sesion = '') {
?>
    <script>
        Swal.fire({
            icon: "error",
            title: "El acceso esta prohibido",
            showConfirmButton: false,
            timer: 1500,
        }).then(
                function() {
                    window.location = '../views/login.php';
                }
            );
    </script>
<?php
    die();
}

?>
<body>
    <header class="main-header">
        <div class="main-header-content">
            <div class="icon">
                <a href="main.php">
                    <img src="./dist/img/cinemax.png" alt="">
                </a>
            </div>
            <nav class="main-nav-bar">
                <a href="./reserva.php"><i class="fas fa-bookmark"></i> Reservaciones</a>
                <a href="./usuario.php"><i class="fas fa-user"></i> Usuarios</a>
                <a href="./logout.php"> <i class="fas fa-power-off"></i> Cerrar sesión</a>
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