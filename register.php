<?php
include_once('include/initialization.php');
$errors = array();
if(!empty($_POST)){
	if(empty($_POST['mail'])){
		$errors['mail'] = "Merci d'entrer votre adresse mail !";
	}else if(mailExists($connexion, $_POST['mail'])){
		$errors['mail'] = 'Cette adresse email est déjà dans notre base de donnée';
	}

	if(empty($errors)){
		$sql = 'INSERT INTO maillist(mail, date, confirmed, subscribed, uniqid)
		VALUES(:mail, :date, :subscribed, :confirmed, :uniqid)';

		$uniqid = uniqid();
		$date = date("Y-m-d H:i:s");

		$preparedStatement = $connexion->prepare($sql);
		$preparedStatement->bindValue('mail',($_POST['mail']));
		$preparedStatement->bindValue('date', $date);
		$preparedStatement->bindValue( 'confirmed', 0 );
		$preparedStatement->bindValue( 'subscribed', 'NO' );
		$preparedStatement->bindValue( 'uniqid', $uniqid );

		if($preparedStatement->execute()){

			$sujet = "Confirmation inscription newsletter";
      $destinataire = $_POST['mail'];
			$link = "http://kevinschroeder.fr/mailing/confirm.php?uniqid=".$uniqid;
			$message = "Merci de confirmer votre inscription à la newsletter à cette adresse : " . $link ;

      $result = mail($destinataire, $sujet, $message);

	     if ($result) {
	       redirectTo('congrats.php');
	     } else {
	       die("Erreur lors de l'envoi");
	     }
		}
	}
}

?>


<!doctype html>
<html class="no-js" lang="fr">
<head>
		<meta charset="UTF-8">
		<title>Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic,900' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css" />
		<link rel="stylesheet" href="static/main.css" media="all">
</head>
</head>
<body>
	<section class="main container">
	    <header class="with-navigation">
	  	   <h1>Vous souhaitez recevoir notre newsletter ?</h1>
	  	   <ul>
					 <div class="row">
						 <a href="login.php" class="btn btn-primary right">Administration</a>
					 </div>
	       </ul>
	  	</header>

	  	<div class="content">
	  		<?php foreach($errors as $error): ?>
				<div class="alert alert-dismissible alert-danger"><?php echo $error; ?></div>
				<?php endforeach; ?>

		  <form method="post" action="">

				<div class="form-group">
		      <label for="inputMail" class="col-lg-2 control-label">Email</label>
		      <div class="col-lg-10">
		        <input type="email" class="col-lg-8 form-control" name="mail" id="inputMail" placeholder="Votre email">
		      </div>
		    </div>

				<div class="form-group">
					<div class="col-lg-10">
		      	<input type="submit" name="valider" class="col-lg-8 btn btn-primary" />
					</div>
		    </div>

		  </form>
		</div>
	</section>
</body>
</html>
