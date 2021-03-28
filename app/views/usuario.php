<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="dist/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="dist/css/normalize.css">
    <link rel="stylesheet" href="dist/css/datatable.css">
    <link rel="stylesheet" href="dist/css/main.css">
    <script src="https://kit.fontawesome.com/ef5bd2f060.js" crossorigin="anonymous"></script>
    <title>Usuarios</title>
</head>

<body>
    <header class="main-header">
        <div class="main-header-content">
            <div class="icon">
                <a href="main.php">
                    <img src="./dist/img/cinemax.png" alt="">
                </a>
            </div>
            <nav class="main-nav-bar">
                <a href="./main.php"><i class="fas fa-film"></i> Inicio</a>
                <a href="./reserva.php"><i class="fas fa-user"></i> Reservaciones</a>
                <a href="./login.php"> <i class="fas fa-power-off"></i> Cerrar sesión</a>
            </nav>
        </div>
    </header>
    <div class="main-content">
        <h1 class="title">Gestión de usuarios</h1>
        <div class="datatable-container">
            <div class="header-tools">
                <div class="tools">
                    <ul>
                        <li>
                            <span><input type="checkbox" name="" id="" /></span>
                        </li>
                    </ul>
                </div>
                <div class="search">
                    <input type="text" class="search-input" id="search_input" />
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
                <tbody id="users">

                </tbody>
            </table>
            <div class="footer-tools">
                <div class="list-items">
                    Mostrar
                    <select name="n-entries" id="n-entries" class="n-entries">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                    entradas
                </div>
                <div class="pages">
                    <ul>
                        <li><span class="active">1</span></li>
                        <li><button>2</button></li>
                        <li><button>3</button></li>
                        <li><button>4</button></li>
                        <li><button>...</button></li>
                        <li><button>9</button></li>
                        <li><button>10</button></li>
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
    <script src="./../../lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./../../lib/sweetaler2/sweetalert2.min.css">
    <script src="dist/js/usuarios.js"></script>
    <script src="dist/js/modals-toggles.js"></script>
</body>

</html>