<?php
// Vérifier si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Récupérer les données JSON envoyées depuis le script JavaScript
	$requestData = json_decode(file_get_contents('php://input'), true);

	// Vérifier si l'ID étudiant est présent dans les données envoyées
	if (isset($requestData['id_etu'])) {
		// Récupérer l'ID étudiant
		$id_etu = $requestData['id_etu'];

		// Connexion à la base de données PostgreSQL
		$db = DB::getInstance();

		try {
			$resultat = $db->selectEtudiant($id_etu);

			echo json_encode($resultat);
		} catch (PDOException $e) {
			die("Erreur lors de l'exécution de la requête: " . $e->getMessage());
		}
	} else {
		// Si l'ID étudiant n'est pas présent dans les données envoyées, renvoyer une erreur
		http_response_code(400);
		echo json_encode(array('error' => 'ID étudiant non fourni'));
	}
} else {
	// Si la méthode de la requête n'est pas POST, renvoyer une erreur
	http_response_code(405);
	echo json_encode(array('error' => 'Méthode non autorisée'));
}
?>
