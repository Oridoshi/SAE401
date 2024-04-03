<?php
session_start();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Récupérer les données JSON envoyées dans la requête POST
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$login = $data['login'];
$mdp = $data['mdp'];

if(verifLogMdp($login, $mdp))
{
	echo json_encode(true);
	exit();
}
else
{
	echo json_encode(false);
	exit();
}

function verifLogMdp($login, $mdp)
{
	if(!isLoginOK($login))
	{
		return false;
	}
	else
		if(!isMotDePasseCryptOK($login, $mdp))
		{
			return false;
		}

	return true;
}

function getDroit($login)
{
	if($login == 'admin'){return 2;}
	if($login == 'user'){return 1;}
	return 0;
}

function isLoginOK($login) : bool
{
	return $login == "user" || $login == "admin";
}

function isMotDePasseCryptOK($login, $mdp) : bool
{
	$hashMapMdp = array(
		"user"  => password_hash("user" , PASSWORD_DEFAULT),
		"admin" => password_hash("admin", PASSWORD_DEFAULT)
	);

	stripslashes($mdp);
	htmlentities($mdp);
	trim        ($mdp);

	return password_verify($mdp, $hashMapMdp[$login]);
}