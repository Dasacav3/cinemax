<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./app/views/dist/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./app/views/dist/css/normalize.css">
    <link rel="stylesheet" href="./app/views/dist/css/main.css">
    <script src="https://kit.fontawesome.com/ef5bd2f060.js" crossorigin="anonymous"></script>
    <title>Sistema de reservas cine</title>
</head>

<body>
    <header class="nav-bar">
        <div class="logo">
            <img src="./app/views/dist/img/cinemax.png" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#navNosotros">Nosotros</a></li>
                <li><a href="#contactoNav">Contacto</a></li>
                <li><a href="./app/views/login.php">Iniciar sesión</a></li>
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
                    <img src="./app/views/dist/img/online.png" alt="" />
                </div>
            </div>
            <div class="nosotros-item">
                <h2>Misión</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione debitis iusto ipsum eaque, consequatur maxime? Laudantium eum repellat similique fugit, provident obcaecati consectetur in incidunt, libero mollitia ad doloribus reiciendis?
                </p>
                <div class="nosotros-item | nosotros-item__img">
                    <img src="./app/views/dist/img/notes.png" alt="" />
                </div>
            </div>
            <div class="nosotros-item">
                <h2>Visión</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione debitis iusto ipsum eaque, consequatur maxime? Laudantium eum repellat similique fugit, provident obcaecati consectetur in incidunt, libero mollitia ad doloribus reiciendis?
                </p>
                <div class="nosotros-item | nosotros-item__img">
                    <img src="./app/views/dist/img/analitics.png" alt="" />
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
                <img src="https://images.pexels.com/photos/3379942/pexels-photo-3379942.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
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