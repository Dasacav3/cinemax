<?php

class ReporteModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function reporteReservas($data)
    {
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_final = $data['fecha_final'];

        try{
            $query = $this->db->connect()->prepare("SELECT reserva.ESTADO_RESERVACION, reserva.ID_RESERVA, pelicula.TITULO_PELICULA, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, reserva.FECHA_RESERVACION, reserva.HORA_RESERVACION, reserva.NUMERO_SALA, reserva.CODIGO_ASIENTO FROM reserva INNER JOIN cliente ON reserva.ID_CLIENTE = cliente.ID_CLIENTE INNER JOIN pelicula ON reserva.ID_PELICULA = pelicula.ID_PELICULA WHERE FECHA_RESERVACION >= '$fecha_inicio' AND FECHA_RESERVACION <= '$fecha_final'");
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            return $e->getMessage();
        }

        return $resultado;
    }

    public function plantilla($reservas,$fecha_final,$fecha_inicio,$today)
    {
        $plantilla="
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
        </head>
        <body>
            <div class='container'>
                <header class='header'>
                    <div class='header_img_container'>
                        <img class='header_img' src='http://localhost/cinemax/public/img/favicon.png' />
                    </div>
                    <h1 class='header_title'>Reporte Reservaciones Cine</h1>
                </header>
                <main>
                    <p>Fecha de creación: ".$today."</p>
                    <p>Conteo de reservaciones: ".count($reservas)."</p>
                    <p class='periodo'>Período: (".$fecha_inicio.") | (".$fecha_final.")</p>
                    <table class='tabla'>
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>ID</th>
                                <th>Pelicula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Sala</th>
                                <th>Asiento</th>
                            </tr>
                        </thead>
                        <tbody>";
                        foreach ($reservas as $dat){
                        $plantilla .= "
                                <tr>
                                    <td>" . $dat['ESTADO_RESERVACION'] . "</td>
                                    <td>" . $dat['ID_RESERVA'] . "</td>
                                    <td>" . $dat['TITULO_PELICULA'] . "</td>
                                    <td>" . $dat['NOMBRE_CLIENTE'] . "</td>
                                    <td>" . $dat['APELLIDO_CLIENTE'] . "</td>
                                    <td>" . $dat['FECHA_RESERVACION'] . "</td>
                                    <td>" . $dat['HORA_RESERVACION'] . "</td>
                                    <td>" . $dat['NUMERO_SALA'] . "</td>
                                    <td>" . $dat['CODIGO_ASIENTO'] . "</td>  
                                </tr>";
                        }        
                        $plantilla .= "</tbody>
                    </table>
                </main>
            </div>
        </body>
        </html>";
        return $plantilla;
    }
}
