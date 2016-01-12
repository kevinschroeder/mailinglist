<?php
  include_once('include/initialization.php');
  $user = getConnectedUser($connexion);


  if(empty($user)){
    redirectTo('login.php');
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
    <a class="btn btn-primary margin" href="index.php">Retour</a>
    <?php
      $reponse = $connexion->query('SELECT id, mail, subscribed FROM maillist ORDER BY ID');
    ?>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Subscribed</th>
          <th>Edit</th>

        </tr>
      </thead>
    <?php
      while ($donnees = $reponse->fetch())
      {
        echo '<tr"><td>' . htmlspecialchars($donnees['id']) . '</td><td>' . htmlspecialchars($donnees['mail']). '</td><td>' . htmlspecialchars($donnees['subscribed']) .'<td><a style="font-size: 16px" href="#">Éditer</td></tr>';
      }
    ?>
    </table>

    <?php $reponse->closeCursor(); ?>
    <br>
  </div>
</html>
