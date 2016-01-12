<?php
include_once('include/initialization.php');
$user = getConnectedUser($connexion);


if(empty($user)){
  redirectTo('register.php');
}

?>

<!doctype html>
<html class="no-js" lang="fr">
<head>
		<meta charset="UTF-8">
		<title>Index</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic,900' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css" />
		<link rel="stylesheet" href="static/main.css" media="all">
</head>
<body>
  <div class="container">
    <?php
    echo "<h1>Vous êtes sur la panneau d'administration : " . $user['login'] . "</h1>";
    ?>
    <br>
    <a class="btn btn-primary" href="gestion.php">Gérer les utilisateurs</a>

    <a class="btn btn-primary"  href="#">Envoyer un email</a>
    <a class="btn btn-danger right margin"  href="logout.php">Déconnexion</a>
  </div>
</html>
