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
    <script src="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.all.min.css">
    <title>Cinemax - Reservaciones</title>
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
                <a href="<?= constant('URL') ?>admin"><i class="fas fa-home"></i> Inicio</a>
                <a href="<?= constant('URL') ?>admin/reserva"><i class="fas fa-bookmark"></i> Reservaciones</a>
                <a href="<?= constant('URL') ?>admin/usuario"><i class="fas fa-id-card"></i> Usuarios</a>
                <a href="<?= constant('URL') ?>admin/logout"> <i class="fas fa-power-off"></i> Cerrar sesión</a>
                <a href="#"> <i class="fab fa-gg-circle"></i> <?= $this->session->get('user')['NOMBRE_USUARIO']; ?></a>
            </nav>
        </div>
    </header>
    <div class="main-content">
        <h1 class="title">Reservaciones</h1>
        <div class="datatable-container">
            <div class="header-tools">
                <div class="tools">
                    <ul>
                        <li>
                            <button class="btn_generar" id="reporteReserva"><i class="fas fa-plus-circle"></i> Generar reporte</button>
                        </li>
                    </ul>
                </div>
                <div class="search">
                    <input type="text" class="search-input" id="search_input" placeholder="Busqueda" />
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
            <input type="date" min="<?php echo date("Y-m-d"); ?>" name="fecha1" id="fecha1"> <br>
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

    <div id="reporte_reserva_container" class="pop-up form-modal">
        <form id="reporte_reserva" class="pop-up-wrap" method="POST">
            <a href="#" class="closePopup closePopup-add"><i class="fas fa-times-circle"></i></a>
            <h4 class="form-title">Rango de reporte reservas</h4>
            <div class="form-fields">
                <input type="hidden" value="reservas" name="reservas">
                <div>
                    <label for="">Fecha inicio</label> <br />
                    <input type="date" name="fecha_inicio" id="fecha_inicio_reserva"> <br>
                </div>
                <div>
                    <label for="">Fecha final</label> <br />
                    <input type="date" name="fecha_final" id="fecha_final_reserva">
                </div>
            </div>
            <input type="button" value="Generar" id="generarReporteReserva" />
        </form>
    </div>

    <script src="<?= constant('URL') ?>public/js/reservas.js" type="module"></script>
    <script src="<?= constant('URL') ?>public/js/modals-toggles.js"></script>
</body>

</html>