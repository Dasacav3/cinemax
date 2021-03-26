<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/normalize.css">
    <link rel="stylesheet" href="../dist/css/modals.css">
    <title>Reservaciones</title>
</head>

<body>
    <h1>Reserva Cine</h1>
    <form id="form_register" method="POST">
        <input type="hidden" name="idr" id="idr" value="">
        <!-- <label for="">Nombres</label> <br>
        <input type="text" name="nombres" id="nombres"> <br>
        <label for="">Apellidos</label> <br>
        <input type="text" name="apellidos" id="apellidos"> <br>
        <label for="">Edad</label> <br>
        <input type="number" name="edad" id="edad"> <br> -->
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
        </select> <br>
        <label for="">Sala</label> <br>
        <input type="text" name="sala" id="sala"> <br>
        <label for="">Asiento</label> <br>
        <input type="text" name="asiento" id="asiento"> <br>
        <label for="">Fecha</label> <br>
        <input type="date" name="fecha" id="fecha"> <br>
        <label for="">Hora</label> <br>
        <input type="time" name="hora" id="hora"> <br>
        <input type="button" value="Registrar" id=registrar> <br>
    </form>
    <div class="">
        <!-- <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control"> -->
        <table class="table">
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
    </div>
    <form id="form_edit" method="POST">
        <label for="">ID Reserva</label> <br>
        <input type="num" name="reserva1" id="reserva1"> <br>
        <!--<label for="">Apellidos</label> <br>
        <input type="text" name="apellidos" id="apellidos"> <br>
        <label for="">Edad</label> <br>
        <input type="number" name="edad" id="edad"> <br> -->
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
        </select> <br>
        <label for="">Sala</label> <br>
        <input type="text" name="sala1" id="sala1"> <br>
        <label for="">Asiento</label> <br>
        <input type="text" name="asiento1" id="asiento1"> <br>
        <label for="">Fecha</label> <br>
        <input type="date" name="fecha1" id="fecha1"> <br>
        <label for="">Hora</label> <br>
        <input type="time" name="hora1" id="hora1"> <br>
        <input type="button" value="Actualizar" id=modificar> <br>
    </form>
    <script src="../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../../lib/sweetaler2/sweetalert2.min.css">
    <script src="../dist/js/reservas.js"></script>
</body>

</html>