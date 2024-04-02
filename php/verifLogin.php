<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

session_start();

$login = $_POST['login'];
$mdp   = $_POST['mdp'];

header('Location: salut' + $login + $mdp);

if(verifLogMdp($login, $mdp))
{
	$_SESSION['login'] = $login;
	$_SESSION['droit'] = getDroit($login);

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
	if($login == "user" || $login == "admin")
		return true;

	return false;
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
?>