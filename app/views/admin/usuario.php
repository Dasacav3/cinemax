<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/normalize.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/main.css">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/datatable.css">
    <script src="https://kit.fontawesome.com/ef5bd2f060.js" crossorigin="anonymous"></script>
    <script src="<?= constant('URL') ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= constant('URL') ?>node_modules/sweetalert2/dist/sweetalert2.min.css">
    <title>Cinemax - Usuarios</title>
</head>

<body>
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
                <a href="#"> <i class="fab fa-gg-circle"></i> <?= $this->session->get('user')['NOMBRE_USUARIO']; ?></a>
            </nav>
        </div>
    </header>
    <div class="main-content">
        <h1 class="title">Gestión de usuarios</h1>
        <div class="datatable-container">
            <div class="header-tools">
                <div class="tools">
                    <ul>
                    </ul>
                </div>
                <div class="search">
                    <input type="text" class="search-input" id="search_input" placeholder="Busqueda" />
                </div>
            </div>
            <table class="datatable">
                <thead>
                    <tr>
                        <th>ID USUARIO</th>
                        <th>NOMBRE USUARIO</th>
                        <th>CLAVE</th>
                        <th>TIPO USUARIO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="table_elements">

                </tbody>
            </table>
            <div class="footer-tools">
                <div class="pages">
                    <ul>
                        <div class="pagenumbers" id="pagination"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="form_container pop-up" id="pop_up_edit">
        <form id="form_edit" class="pop-up-wrap" method="POST">
            <a href="#" id="closePopup-edit" class="closePopup"><i class="fas fa-times-circle"></i></a>
            <h4>Editar usuario</h4>
            <label for="">ID usuario</label> <br>
            <input type="num" name="id_user" id="id_user" readonly> <br>
            <label for="">Nombre usuario</label> <br>
            <input type="text" name="user" id="user"> <br>
            <label for="">Clave</label> <br>
            <input type="text" name="pass" id="pass"> <br>
            <label for="">Tipo usuario</label> <br>
            <select name="tipo" id="tipo">
                <option value=""></option>
                <option value="Cliente">Cliente</option>
                <option value="Administrador">Administrador</option>
            </select> <br>
            <input type="button" value="Actualizar" id="modificar"> <br>
            <input type="reset" value="Limpiar"> <br>
        </form>
    </div>
    <script src="<?= constant('URL') ?>public/js/usuarios.js" type="module"></script>
    <script src="<?= constant('URL') ?>public/js/modals-toggles.js"></script>
</body>

</html>