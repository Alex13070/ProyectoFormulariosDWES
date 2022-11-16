<?php

namespace Desde_0\fpdf184;

spl_autoload_register(function ($class) {
    $classPath = "../../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

use Desde_0\Utilidad\Evento;
use PDF_Code128;
require "PDF_Code128.php";

if (file_exists("../Eventos.csv")) {
    $file = file_get_contents( "../Eventos.csv" );

    $array = explode("\n", $file);

    $evento = null;

    if (count($array) > 1) {
        $evento = Evento::fromCSV($array[0]);
    }


    if (!is_null($evento)) {
        pintarPDF($evento);
    }
    else {
        pintarError();
    }
}
else {
    pintarError();
}

function pintarPDF(Evento $evento) {

    // TODO: Hay que meter los datos de evento aqui. En este caso, 
    // Evento va a ser un objeto valido.

    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();

    /*AÑADIR datos DEL EVENTO*/ 
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);

    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Datos del Evento")),0,'C',false);

    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode($evento->getNombreGrupo()),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("Dirección del sitio: Wizink Center"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Aforo: ".$evento->getAforo()),0,'C',false);



    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);
    //DATOS DEL COMPRADOR
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Datos del Comprador")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("Cliente: ".$evento->getNombre()),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Documento: DNI 53740552V"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".$evento->getFecha()),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: ".$evento->getEmail()),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: 603945265"),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("ENTRADA Nº: 1")),1,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);


    /*DATOS DEL EVENTO? */
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("datos especifios")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("Concierto"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Duración del Evento: 2h 30 min"),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(10,5,utf8_decode("Cant."),0,0,'C');
    $pdf->Cell(19,5,utf8_decode("Precio:"),0,0,'C');
    $pdf->Cell(15,5,utf8_decode("Desc."),0,0,'C');
    $pdf->Cell(28,5,utf8_decode("Total"),0,0,'C');

    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);



    /*----------  Detalles de la tabla  ----------*/
    $pdf->MultiCell(0,4,utf8_decode("Entrada a Evento"),0,'C',false);
    $pdf->Cell(10,4,utf8_decode("1"),0,0,'C');
    $pdf->Cell(19,4,utf8_decode($evento->getPrecioEntrada()),0,0,'C');
    $pdf->Cell(19,4,utf8_decode("0"),0,0,'C');
    $pdf->Cell(28,4,utf8_decode($evento->getPrecioEntrada()),0,0,'C');
    $pdf->Ln(5);
    $pdf->MultiCell(0,4,utf8_decode("Apertura de puertas a las 19:30"),0,'C',false);
    $pdf->Ln(7);
    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

        $pdf->Ln(5);

    # Impuestos & totales #
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode($evento->getPrecioEntrada()),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode($evento->getPrecioEntrada()),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL PAGADO"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode($evento->getPrecioEntrada()),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("CAMBIO"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("0"),0,0,'C');

    $pdf->Ln(5);



    $pdf->MultiCell(0,5,utf8_decode("*** Entrada nominativa. Menores de 16 años deben ir acompañados de tutor legal. Queda totalmente prohibida volver hacer un proyecto php***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su compra"),'',0,'C');

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);

    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_1.pdf",true);
        
}

function pintarError() { ?>
    <h1 style="color: red;">Error</h1>
    <p>A&uacute;n no hay datos en el CSV</p>
<?php }


?>