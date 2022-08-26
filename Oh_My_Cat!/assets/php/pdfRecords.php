<?php 
    require_once 'conexionBDAdministrativa.php';
    session_start();
    require_once('../library/TCPDF-main/examples/tcpdf_include.php');
    $idMascota = $_GET['idMascota'];
    $sentencia = $bd->query("SELECT A.idExpediente, B.Nombre, C.Nombre AS Veterinario, A.Fecha_Consulta, A.Diagnostico, A.Tratamiento FROM persona C JOIN veterinario D ON C.cedula = D.Persona_cedula JOIN expediente A ON D.Persona_cedula = A.idVeterinario JOIN mascota B ON A.nombreMascota = B.Nombre WHERE B.Nombre = '$idMascota';");
    $expediente = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $nombre = $expedientes = $veterinario = $fecha = $diagnostico = $tratamiento = "";

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetAuthor('Jonathan Rivera Vasquez');
    foreach ($expediente as $dato) {
        $pdf->SetTitle('Expediente de ' . $nombre = $dato->Nombre);
    }
    $pdf->SetHeaderData(PDF_HEADER_LOGO, 10, 'Oh My Cat!');
    $pdf->setFooterData(array(0,64,0), array(0,64,128));

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    $pdf->setFontSubsetting(true);

    $pdf->SetFont('helvetica', '', 11, '', true);

    $pdf->AddPage();

    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

    $html = '
        <style>
            h1{
                font-family: Arial, Helvetica, sans-serif;
        }   
        </style>
        <h1>Expediente</h1>
        <h3>Reporte de expediente de la mascota</h3>
        <br><br>
    ';

    $html.='
        <style>
            table {
                border-collapse: collapse;
                margin-top: 100px;
            }
            th{
                vertical-align:middle;
            }
            table, th, td {
                border: 1px solid black;
            }
            table > tr > th {
                font-weight: bold; 
                text-align: center;
                vertical-align: middle;
                color: black;
                height: 40px;
            }
            table > tr > td {
                font-weight: bold; 
                text-align: center;
                color: black;
                height: 40px;
            }
        </style>
        
        <table>
            <tr>
                <th>ID Expediente</th>
                <th>Veterinario</th>
                <th>Fecha de consulta</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
            </tr>';

            foreach ($expediente as $dato) {
                // $expediente = $dato->idExpediente;  
                $html.= 
                '<tr>
                    <td scope="row">' . $dato->idExpediente  . '</td>
                    <td>'. $dato->Veterinario . '</td>
                    <td>' . $dato->Fecha_Consulta . '</td>
                    <td>' . $dato->Diagnostico . '</td>
                    <td>' . $dato->Tratamiento . '</td>
                 </tr>';
            }

            $html.=' 
            </table>';     

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    $pdf->Output('example_001.pdf', 'I');

?>