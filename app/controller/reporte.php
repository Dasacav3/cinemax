<?php

class Reporte extends Controller
{

    private $fechaInicio;
    private $fechaFin;

    public function __construct()
    {
        parent::__construct();
    }


    public function generarReporte()
    {
        $today = date('Y-m-d h:i:s A');
        $codigo = strtotime($today);
        $strToday = settype($today, "string");

        $this->fechaInicio = $_POST['fecha_inicio'];
        $this->fechaFin = $_POST['fecha_final'];
        $this->reservas = $_POST['reservas'];
        $reservasData = $this->model->reporteReservas(['fecha_inicio' => $this->fechaInicio, 'fecha_final' => $this->fechaFin]);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L'
        ]);

        $plantilla =  $this->model->plantilla($reservasData, $this->fechaFin, $this->fechaInicio, $today);

        $css = file_get_contents(constant('URL') . "public/css/pdf.css");

        $mpdf->SetTitle("Reporte reservaciones");
        $mpdf->SetAuthor("Dasacav3");
        $mpdf->SetHTMLFooter("
        <footer class='footer'>
            <p>© Todos los derechos reservados | Cinemax 2021</p>
        </footer>");

        $mpdf->WriteHTML($css, 1);
        $mpdf->WriteHTML($plantilla, 2);

        $mpdf->Output('public/reportes/Reporte-Reserva-' . $codigo . '.pdf', 'F');
        echo ('public/reportes/Reporte-Reserva-' . $codigo . '.pdf');
    }
}
