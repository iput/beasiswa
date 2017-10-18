<?php
$bulan = array(
    '01'=>'Januari',
    '02'=>'Februari',
    '03'=>'Maret',
    '04'=>'April',
    '05'=>'Mei',
    '06'=>'Juni',
    '07'=>'Juli',
    '08'=>'Agustus',
    '09'=>'September',
    '10'=>'Oktober',
    '11'=>'November',
    '12'=>'Desember',
);
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
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
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).a
$this->load->library('Pdf');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor("$pendaftar->namalengkap");
$pdf->SetTitle("$pendaftar->pendaftarnim\t$pendaftar->namabea");
$pdf->SetSubject('Bukti Pendaftaran');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 0, 0), array(0, 0, 0));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

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
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Set some content to print


$html = '<h2 align="center">Bukti Formulir Pendaftaran Beasiswa '.$pendaftar->namabea.' </h2>
<table>
	
		<tr><td>NIM </td><td>: '.$pendaftar->pendaftarnim.' </td> </tr>
		<tr><td>NAMA </td><td>: '.$pendaftar->namalengkap.'</td> </tr>
		<tr><td>JURUSAN </td><td>: '.$pendaftar->jurusan.'</td> </tr>
		<tr><td>SEMESTER </td><td>: '.$pendaftar->semester.'</td> </tr>
		<tr><td>SKS </td><td>: '.$pendaftar->sks.'</td> </tr>
		<tr><td>IPK </td><td>: '.$pendaftar->ipk.'</td> </tr>
		<tr><td>TTL </td><td>: '.$pendaftar->tempatLahir.', '.$pendaftar->tgl.'</td> </tr>
		<tr><td>ALAMAT ASAL</td><td>: '.$pendaftar->alamatlengkap.'</td> </tr>
		<tr><td>ALAMAT MALANG</td><td>: '.$pendaftar->alamatmalang.'</td> </tr>
		<tr><td>TELP</td><td>: '.$pendaftar->telp.'</td></tr>';

        foreach ($kategori as $r){

        $html .='<tr><td>'.$r->skor.'</td><td>: '.$r->nama.'</td> </tr>';
        }


$html .='</table>';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$html2 =
    '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<table cellspacing="3" cellpadding="4">
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Malang, '.date("d").'-'.$bulan[date("m")].'-'.date("Y").'<br>Pemohon,</td>
	</tr>
	<tr>
		<td></td>
		<td rowspan="2" colspan="2"><br /><br /></td>
		<td rowspan="2" colspan="2"><br /><br /></td>
	</tr>
	<tr>
		<td></td>
		
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>'.$pendaftar->namalengkap.'<br>NIM. '.$pendaftar->pendaftarnim.'</td>
	</tr>
</table>';
$pdf->writeHTML($html2, true, false, true, false, '');
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output("'.$pendaftar->pendaftarnim+_+$pendaftar->namabea.'.pdf", 'I');

//============================================================+
// END OF FILE
//============================================================+
