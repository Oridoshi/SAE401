<?php // Inclure la bibliothèque TCPDF
header("Access-Control-Allow-Origin: *");
// Autoriser les méthodes HTTP spécifiées (GET, POST, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
// Autoriser les en-têtes spécifiés
header("Access-Control-Allow-Headers: Content-Type");
// Indiquer que cette réponse peut être mise en cache pendant 3600 secondes (1 heure)
header("Access-Control-Max-Age: 3600");
// Indiquer le type de contenu de la réponse (dans ce cas, un fichier PDF)
header("Content-Type: application/pdf");

require_once './tcpdf/tcpdf.php';
require_once './tcpdf/config/tcpdf_config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'creerPDF' && isset($_POST['parametre'])) {
	$pdf_content = creerPDF($_POST['parametre']);
    
    // Envoyer le PDF en tant que réponse HTTP
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="document.pdf"');
    header('Content-Length: ' . strlen($pdf_content));
	echo $_POST['parametre'];
}

function creerPDF($doc){
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Auteur');
    $pdf->SetTitle('Avis de poursuite d\'étude');
    $pdf->AddPage();
//    $html = file_get_contents($doc);
    $pdf->writeHTML($doc, true, false, true, 0, true);

    $result = $pdf->Output('document.pdf', 'F');

	return $result;
}
