<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="dist/css/style.css" />
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['nom_prenom'])){
	$nom_prenom = stripslashes($_REQUEST['nom_prenom']);
	$nom_prenom = mysqli_real_escape_string($conn, $nom_prenom);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE nom_prenom='$nom_prenom' and password='".hash('md5', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['nom_prenom'] = $nom_prenom;
	    
		
	    header("Location: index.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title"><a href="https://waytolearnx.com/">Film GEST</a></h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="nom_prenom" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>