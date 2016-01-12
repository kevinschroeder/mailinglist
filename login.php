<?php
include_once('include/initialization.php');
if($user = getConnectedUser($connexion)){
	redirectTo('index.php');
}

$errors = array();

if(!empty($_POST)){
	if(empty($_POST['login'])){
		$errors['login'] = 'Le login est obligatoire';
	}

	if(empty($_POST['password'])){
		$errors['password'] = 'Le password est obligatoire';
	}

	if(empty($errors)){
		$sql = 'SELECT * FROM user WHERE login = :login';
		$preparedStatement = $connexion->prepare($sql);
		$preparedStatement->bindValue(':login', $_POST['login']);
		$preparedStatement->execute();
		$user = $preparedStatement->fetch();
		if(!empty($user)
		&& password_verify($_POST['password'], $user['hash'])){
			$_SESSION['user_secret'] = $user['secret'];
			$userLogin = $user["login"];
			$connexion->exec("UPDATE user SET connected = 'connecte' WHERE login = '$userLogin'");
			redirectTo('index.php');
		}
	}
}
?>


<!doctype html>
<html class="no-js" lang="fr">
<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic,900' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css" />
		<link rel="stylesheet" href="static/main.css" media="all">
</head>
<body>
	<section class="main container">
    <header class="with-navigation">
  	   <h1>Connexion administration</h1>
  	</header>

  	<div class="content container">

			<?php foreach($errors as $error): ?>
				<div class="alert error"><?php echo $error; ?></div>
			<?php endforeach; ?>

			<div class="alert alert-dismissible alert-info">
			  <strong>Info: </strong> Connectez-vous en mode admin avec : <i>"admin"</i>, <i>"admin"</i>.
			</div>

			<h4></h4>

		  <form method="post" action="">
				<div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Login</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" name="login" id="inputEmail" placeholder="Email">
		      </div>
		    </div>

				<div class="form-group">
		      <label for="inputPass" class="col-lg-2 control-label">Password</label>
		      <div class="col-lg-10">
		        <input type="password" class="form-control" name="password" id="inputPass" placeholder="Password">
		      </div>
		    </div>
				<div class="form-group">
					<div class="form-group">
						<div class="col-lg-10">
		      		<input type="submit" class="btn btn-primary col-lg-2" name="envoyer" />
						</div>
					</div>
		    </div>

		  </form>
		</div>
	</section>
</body>
</html>
