<?php

require "vendor/autoload.php";

//============================================================+
// File name   : example_030.php
// Begin       : 2008-06-09
// Last Update : 2013-05-14
//
// Description : Example 030 for TCPDF class
//               Colour gradients
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
 * @abstract TCPDF - Example: Colour gradients
 * @author Nicola Asuni
 * @since 2008-06-09
 */

// Include the main TCPDF library (search for installation path).
/* require_once('tcpdf_include.php'); */

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Dan Isidrei Musni');
$pdf->SetTitle('Activity 7');
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

// set font
$pdf->SetFont('freesans', 'B', 20);

// --- first page ------------------------------------------

// add a page
$pdf->AddPage();

$pdf->Cell(0, 0, 'Merry Christmas and Happy New Year', 0, 1, 'C', 0, '', 0, false, 'T', 'M');

// set colors for gradients (r,g,b) or (grey 0-200)
$red = array(200, 0, 0);
$blue = array(0, 0, 200);
$yellow = array(200, 200, 0);
$green = array(0, 200, 0);
$white = array(200);
$black = array(0);

$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(200, 255, 255));
$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 1, 'color' => array(200, 255, 255));
$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(200, 255, 255));
$style4 = array('L' => 0,
                'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 200)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 1, 'color' => array(255, 255, 255)),
                'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 1, 'color' => array(200, 200, 0));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(200, 200, 0));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 1, 'color' => array(200, 200, 0));


// first patch: f = 0
$patch_array[0]['f'] = 0;
$patch_array[0]['points'] = array(
    0.00,0.00, 0.33,0.00,
    0.67,0.00, 1.00,0.00, 1.00,0.33,
    0.8,0.67, 1.00,1.00, 0.67,0.8,
    0.33,1.80, 0.00,1.00, 0.00,0.67,
    0.00,0.33);
$patch_array[0]['colors'][0] = array('r' => 212, 'g' => 200, 'b' => 0);
$patch_array[0]['colors'][1] = array('r' => 0, 'g' => 0, 'b' => 200);
$patch_array[0]['colors'][2] = array('r' => 255, 'g' => 255,'b' => 0);
$patch_array[0]['colors'][3] = array('r' => 9, 'g' => 255,'b' => 255);

// second patch - above the other: f = 2
$patch_array[1]['f'] = 2;
$patch_array[1]['points'] = array(
    0.00,1.33,
    0.00,1.67, 0.00,2.00, 0.33,2.00,
    0.67,2.00, 1.00,2.00, 1.00,1.67,
    1.5,1.33);
$patch_array[1]['colors'][0]=array('r' =>255, 'g' => 255, 'b' => 255);
$patch_array[1]['colors'][1]=array('r' => 255, 'g' => 0, 'b' => 255);

// third patch - right of the above: f = 3
$patch_array[2]['f'] = 3;
$patch_array[2]['points'] = array(
    1.33,0.80,
    1.67,1.50, 2.00,1.00, 2.00,1.33,
    2.00,1.67, 2.00,2.00, 1.67,2.00,
    1.33,2.00);
$patch_array[2]['colors'][0] = array('r' => 0, 'g' => 200, 'b' => 200);
$patch_array[2]['colors'][1] = array('r' => 0, 'g' => 0, 'b' => 0);

// fourth patch - below the above, which means left(?) of the above: f = 1
$patch_array[3]['f'] = 1;
$patch_array[3]['points'] = array(
    2.00,0.67,
    2.00,0.33, 2.00,0.00, 1.67,0.00,
    1.33,0.00, 1.00,0.00, 1.00,0.33,
    0.8,0.67);
$patch_array[3]['colors'][0] = array('r' => 0, 'g' => 0, 'b' => 0);
$patch_array[3]['colors'][1] = array('r' => 0, 'g' => 0, 'b' => 200);

$coords_min = 0;
$coords_max = 2;

$pdf->CoonsPatchMesh(10, 45, 190, 200, '', '', '', '', $patch_array, $coords_min, $coords_max);


$pdf->SetLineStyle($style5);
$pdf->StarPolygon(105, 70, 15, 7, 5, 30, 0, 'DF', array('all' => $style7), array(100, 100, 200), 'F', array(200, 200, 200));
$pdf->StarPolygon(140, 70, 9, 8, 5, 30, 1, 'DF', array('all' => $style6), array(100, 100, 200), 'F', array(100, 100, 100));
$pdf->StarPolygon(70, 70, 9, 9, 5, 30, 1, 'DF', array('all' => $style5), array(100, 100, 200), 'F', array(200, 200, 200));
$pdf->StarPolygon(105,225, 15, 7, 5, 30, 0, 'DF', array('all' => $style6), array(100, 100, 200), 'F', array(200, 200, 200));
$pdf->StarPolygon(140, 225, 9, 8, 5, 30, 1, 'DF', array('all' => $style5), array(100, 100, 200), 'F', array(100, 100, 100));
$pdf->StarPolygon(70, 225, 9, 9, 5, 30, 1, 'DF', array('all' => $style7), array(100, 100, 200), 'F', array(200, 200, 200));


$pdf->SetFont('freesans', 'B', 60);
$pdf->SetTextColor(255, 255, 255);
$pdf->MultiCell(150, 0, "Ho ho ho Merry Christmas and Happy New Year", 0, 'C', 0, 1, 30, 95, true, 0);



//Close and output PDF document
$pdf->Output('tcpdf7.pdf');

