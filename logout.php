<?php
include_once('include/initialization.php');
$user = getConnectedUser($connexion);

$isconnected = $connexion->query('SELECT login FROM user WHERE connected="connecte"');

$userLogin = $user["login"];
$connexion->exec("UPDATE user SET connected = 'deconnecte' WHERE login = '$userLogin'");

$_SESSION['user_secret'] = null;
redirectTo('index.php');

?>
