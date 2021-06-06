<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/normalize.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/main.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>lib/fontawesome-5.15.2/css/all.min.css" />
    <script src="<?= constant('URL') ?>lib/fontawesome-5.15.2/js/all.min.js"></script>
    <title>Sistema de reservas cine</title>
</head>

<body>
    <header class="nav-bar">
        <div class="logo">
            <img src="<?= constant('URL') ?>public/img/cinemax.png" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="<?= constant('URL') ?>main"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="#navNosotros"><i class="fas fa-users"></i> Nosotros</a></li>
                <li><a href="#contactoNav"><i class="fas fa-briefcase"></i> Contacto</a></li>
                <li><a href="<?= constant('URL') ?>login"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="welcome-slide">
        <div class="welcome-slide-content">
            <h1 class="welcome-slide__h1">
                Sistema de Reservas Cine <br>
                Cinemax
            </h1>
            <div class="welcome-slide-container">
                <button class="welcome-button"><a href="#navNosotros">Conoce más</a></button>
            </div>
        </div>
    </div>

    <section class="nosotros" id="navNosotros">
        <div class="nosotros-container">
            <div class="nosotros-item">
                <h2>Nosotros</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione debitis iusto ipsum eaque, consequatur maxime? Laudantium eum repellat similique fugit, provident obcaecati consectetur in incidunt, libero mollitia ad doloribus reiciendis?
                </p>
                <div class="nosotros-item | nosotros-item__img">
                    <img src="<?= constant('URL') ?>public/img/online.png" alt="" />
                </div>
            </div>
            <div class="nosotros-item">
                <h2>Misión</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione debitis iusto ipsum eaque, consequatur maxime? Laudantium eum repellat similique fugit, provident obcaecati consectetur in incidunt, libero mollitia ad doloribus reiciendis?
                </p>
                <div class="nosotros-item | nosotros-item__img">
                    <img src="<?= constant('URL') ?>public/img/notes.png" alt="" />
                </div>
            </div>
            <div class="nosotros-item">
                <h2>Visión</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione debitis iusto ipsum eaque, consequatur maxime? Laudantium eum repellat similique fugit, provident obcaecati consectetur in incidunt, libero mollitia ad doloribus reiciendis?
                </p>
                <div class="nosotros-item | nosotros-item__img">
                    <img src="<?= constant('URL') ?>public/img/analitics.png" alt="" />
                </div>
            </div>

        </div>
    </section>

    <section class="contacto" id="contactoNav">
        <div class="contacto-container">
            <form class="contacto-form">
                <h2>Contactanos</h2> <br>
                <p>Nombre</p> <br />
                <input type="text" id="name" required /> <br>
                <p>Correo electronico</p>
                <br />
                <input type="email" name="" id="email" required /> <br />
                <p>Mensaje</p>
                <br />
                <textarea name="" id="message" cols="30" rows="10" required></textarea> <br>
                <input type="submit" value="Enviar" />
            </form>
            <div class="contacto__img">
                <img loading="lazy" src="https://images.pexels.com/photos/3379942/pexels-photo-3379942.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div>
            <p>&copy Todos los derechos reservados | 2021 | Cinemax | Created by @Dasacav3</p>
        </div>
    </footer>

</body>

</html>