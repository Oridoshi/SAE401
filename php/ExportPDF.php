<?php // Inclure la bibliothèque TCPDF
require_once('tcpdf/tcpdf.php');

// Créer une nouvelle instance de TCPDF
$pdf = new TCPDF();

// Paramètres du document PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Auteur');
$pdf->SetTitle('Avis de poursuite d\'étude');
$pdf->SetSubject('Sujet du document');
$pdf->SetKeywords('Mots-clés, PDF, Exemple');

// Ajouter une page
$pdf->AddPage();

// Écrire du texte
$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 10, 'Hello World', 0, 1, 'C');

// Sortie du document (le nom par défaut est 'document.pdf')
$pdf->Output('document.pdf', 'D');

?>
