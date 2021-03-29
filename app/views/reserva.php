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
    <script src="./../../lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./../../lib/sweetaler2/sweetalert2.min.css">
    <script src="https://kit.fontawesome.com/ef5bd2f060.js" crossorigin="anonymous"></script>
    <title>Reservaciones</title>
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
                <a href="./main.php"><i class="fas fa-film"></i> Inicio</a>
                <a href="./usuario.php"><i class="fas fa-user"></i> Usuarios</a>
                <a href="./logout.php"> <i class="fas fa-power-off"></i> Cerrar sesión</a>
            </nav>
        </div>
    </header>
    <div class="form_container pop-up" id="pop_up_add">
        <form id="form_register" class="pop-up-wrap" method="POST">
            <a href="#" id="closePopup-add" class="closePopup"><i class="fas fa-times-circle"></i></a>
            <h4>Registrar reserva</h4>
            <label for="">Pelicula</label> <br>
            <select name="pelicula" id="pelicula">
                <option value=""></option>
                <option value="1">Godzilla vs. Kong</option>
                <option value="2">Tom y Jerry</option>
                <option value="3">Los Croods 2</option>
                <option value="4">Harry Potter y la Orden del Fénix</option>
                <option value="5">Up : una aventura de altura</option>
                <option value="6">Monster Hunter: la cacería comienza</option>
                <option value="7">Resident Evil 5: la venganza</option>
                <option value="8">Sonic la película</option>
                <option value="9">Soul</option>
                <option value="10">El increíble castillo vagabundo</option>
                <option value="11">Avengers Endgame</option>
                <option value="12">Misterio a bordo</option>
            </select> <br>
            <label for="">Sala</label> <br>
            <input type="text" name="sala" id="sala"> <br>
            <label for="">Asiento</label> <br>
            <input type="text" name="asiento" id="asiento"> <br>
            <label for="">Fecha</label> <br>
            <input type="date" name="fecha" id="fecha"> <br>
            <label for="">Hora</label> <br>
            <input type="time" name="hora" id="hora"> <br>
            <input type="submit" value="Registrar" id=registrar> <br>
            <input type="reset" value="Limpiar" onclick=''> <br>
            <hr>
            <div class="warnings" id="alertas"></div> <br>
        </form>
    </div>
    <div class="main-content">
        <h1 class="title">Reservaciones</h1>
        <div class="datatable-container">
            <div class="header-tools">
                <div class="tools">
                    <ul>
                        <li>
                            <span><input type="checkbox" name="" id="" /></span>
                        </li>
                        <li>
                            <button id="abrirPopup-add" class="add"><i class="fas fa-plus-circle"></i></button>
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
                        <th>ID RESERVA</th>
                        <th>ID PELICULA</th>
                        <th>ID CLIENTE</th>
                        <th>SALA</th>
                        <th>ASIENTO</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="reservas">

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
            <h4>Editar reserva</h4>
            <label for="">ID Reserva</label> <br>
            <input type="num" name="reserva1" id="reserva1" readonly> <br>
            <label for="">Pelicula</label> <br>
            <select name="pelicula1" id="pelicula1">
                <option value=""></option>
                <option value="1">Godzilla vs. Kong</option>
                <option value="2">Tom y Jerry</option>
                <option value="3">Los Croods 2</option>
                <option value="4">Harry Potter y la Orden del Fénix</option>
                <option value="5">Up : una aventura de altura</option>
                <option value="6">Monster Hunter: la cacería comienza</option>
                <option value="7">Resident Evil 5: la venganza</option>
                <option value="8">Sonic la película</option>
                <option value="9">Soul</option>
                <option value="10">El increíble castillo vagabundo</option>
                <option value="11">Avengers Endgame</option>
                <option value="12">Misterio a bordo</option>
            </select> <br>
            <label for="">Sala</label> <br>
            <input type="text" name="sala1" id="sala1"> <br>
            <label for="">Asiento</label> <br>
            <input type="text" name="asiento1" id="asiento1"> <br>
            <label for="">Fecha</label> <br>
            <input type="date" name="fecha1" id="fecha1"> <br>
            <label for="">Hora</label> <br>
            <input type="time" name="hora1" id="hora1"> <br>
            <label for="">Estado</label> <br>
            <select name="estado1" id="estado1">
                <option value=""></option>
                <option value="Activa">Activa</option>
                <option value="Completada">Completada</option>
                <option value="Cancelada">Cancelada</option>
            </select> <br>
            <input type="button" value="Actualizar" id=modificar> <br>
            <input type="reset" value="Limpiar"> <br>
        </form>
    </div>
    <script src="dist/js/reservas.js"></script>
    <script src="dist/js/modals-toggles.js"></script>
</body>

</html>