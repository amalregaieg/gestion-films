<?php
	// Initialiser la session
	require('config.php');
	session_start();
	$q="SELECT role FROM users where nom_prenom='".$_SESSION['nom_prenom']."'";
					
	$result = mysqli_query($conn,$q);
	
	while($row = mysqli_fetch_array($result)){
		$userRole = $row['role'];
	}
	
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["nom_prenom"])){
		header("Location: login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Film GUEST| Best Film</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  
	  <!-- Theme style -->
	  <link rel="stylesheet" href="dist/css/adminlte.min.css">
	  <!-- Google Font: Source Sans Pro -->
	  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	   <!-- CSS -->
        <link href="star/style.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href='star/jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
        
	</head>
	<body>
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			  </li>
			  
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
			  
			  <!-- Notifications Dropdown Menu -->
			  <li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
				  <i class="far fa-bell"></i>
				  <span class="badge badge-warning navbar-badge">15</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				  <span class="dropdown-item dropdown-header">15 Notifications</span>
				  <div class="dropdown-divider"></div>
				  <a href="#" class="dropdown-item">
					<i class="fas fa-envelope mr-2"></i> 4 new messages
					<span class="float-right text-muted text-sm">3 mins</span>
				  </a>
				  <div class="dropdown-divider"></div>
				  <a href="#" class="dropdown-item">
					<i class="fas fa-users mr-2"></i> 8 friend requests
					<span class="float-right text-muted text-sm">12 hours</span>
				  </a>
				  <div class="dropdown-divider"></div>
				  <a href="#" class="dropdown-item">
					<i class="fas fa-file mr-2"></i> 3 new reports
					<span class="float-right text-muted text-sm">2 days</span>
				  </a>
				  <div class="dropdown-divider"></div>
				  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			  </li>
			  <!-- Profil Dropdown Menu -->
			  <li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
				  <i class="fas fa-user"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				  <span class="dropdown-item dropdown-header"> <?php echo $_SESSION['nom_prenom']; ?></span>
				  <div class="dropdown-divider"></div>
				  <a href="logout.php" class="dropdown-item">
					<i class="fas fa-sign-out-alt"></i> Déconnexion
				  </a>
				</div>
			  </li>
			</ul>
		</nav>
		<!-- /.navbar -->
		
		 <!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
			  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				   style="opacity: .8">
			  <span class="brand-text font-weight-light">Film GEST</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
			  <!-- Sidebar user panel (optional) -->
			  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
				  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
				  <a href="#" class="d-block"> <?php echo $_SESSION['nom_prenom']; ?></a>
				</div>
			  </div>

			  <!-- Sidebar Menu -->
			  <nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				  <!-- Add icons to the links using the .nav-icon class
					   with font-awesome or any other icon font library -->
				  
				  <?php
				  if($userRole =='employé')
				  {
				  ?>
				  <li class="nav-item">
					<a href="insert.php" class="nav-link">
					  <i class="fas fa-plus"></i>
					  <p>
						Ajouter FILM
					  </p>
					</a>
				  </li>
				  <?php
				  }
				  ?>
				  <li class="nav-item">
					<a href="index.php" class="nav-link">
					  <i class="fas fa-th-list"></i>
					  <p>
						Liste FILM
					  </p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="rating.php" class="nav-link">
					  <i class="fas fa-star"></i>
					  <p>
						Noter FILM
					  </p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="best.php" class="nav-link">
					  <i class="fas fa-thumbs-up"></i>
					  <p>
						Best FILM
					  </p>
					</a>
				  </li>
				</ul>
			  </nav>
			  <!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		