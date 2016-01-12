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
    include_once( 'include/initialization.php' );
    $errors = [ ];
    $message = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

        $uniqid = $_GET["uniqid"];

        $sql = 'SELECT * FROM maillist WHERE uniqid = :uniqid';
        $preparedStatement = $connexion->prepare( $sql );
        $preparedStatement->bindValue( 'uniqid', $uniqid );
        $preparedStatement->execute();
        $user = $preparedStatement->fetch();

        if ( $user ) {
            $sql = 'UPDATE maillist SET subscribed = :subscribed, confirmed = :confirmed WHERE uniqid = :uniqid';
            $preparedStatement = $connexion->prepare( $sql );
            $preparedStatement->bindValue( 'subscribed', 1 );
            $preparedStatement->bindValue( 'confirmed', 1 );
            $preparedStatement->bindValue( 'uniqid', $user["uniqid"] );
            $preparedStatement->execute();

            $message = "Vous êtes maitenant inscrit à la newsletter";

        } else {
            $message = "<p>L'id n'est pas correcte</p>";
        }
        echo "<div class='alert alert-dismissible alert-success'><p><strong>" . $message . "</strong></p></div>";
    }

    ?>
  </div>
</html>
