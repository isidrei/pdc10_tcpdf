<?php

require "vendor/autoload.php";

//============================================================+
// File name   : example_033.php
// Begin       : 2008-06-24
// Last Update : 2013-05-14
//
// Description : Example 033 for TCPDF class
//               Mixed font types
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Mixed font types
 * @author Nicola Asuni
 * @since 2008-06-24
 */

// Include the main TCPDF library (search for installation path).
/* require_once('tcpdf_include.php'); */

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Dan isidrei Musni');
$pdf->SetTitle('Activity 5');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set default font subsetting mode
$pdf->setFontSubsetting(false);

$pdf->SetFont('aefurat', 'B', 20);

$pdf->Write(0, 'Memorable Quotes', '', 0, 'C', 1, 0, false, false, 0);

$pdf->Ln(10);

$pdf->SetFont('dejavusansi', '', 20);

$pdf->MultiCell(80, 0, "It is foolish to fear what we have yet to see and know. - Itachi\n", 1, 'J', 0, 1, '', '', true, 0);

$pdf->Ln(2);

$pdf->SetFont('courier', '', 20);

$pdf->MultiCell(80, 0, "HARD WORK IS WORTHLESS FOR THOSE THAT DONT BELIEVE IN THEMSELVES. - Naruto\n", 1, 'J', 0, 1, '', '', true, 0);

$pdf->Ln(2);

$pdf->SetFont('freesans', '', 20);

$pdf->MultiCell(80, 0, "A SMILE IS THE EASIEST WAY OUT OF A DIFFICULT SITUATION. - Sakura.\n", 1, 'J', 0, 1, '', '', true, 0);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('five-display-favorite-quotes.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+