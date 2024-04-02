<?php // Inclure la bibliothèque TCPDF
require_once('./tcpdf/tcpdf.php');

require_once('tcpdf/config/tcpdf_config.php');


//$html = file_get_contents('test.html');
//echo $html;
$doc = $_POST['document'];
function creerPDF($doc){
	// Créer une nouvelle instance de TCPDF
	$pdf = new TCPDF();


	// Paramètres du document PDF
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Auteur');
	$pdf->SetTitle('Avis de poursuite d\'étude');

	// Ajouter une page
	$pdf->AddPage();

	$html = file_get_contents($doc);
	$pdf->writeHTML($html, true, false, true,0, true);

	$pdf->Output('document.pdf', 'D');
}