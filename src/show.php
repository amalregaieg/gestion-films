<?php include 'header.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1 class="m-0 text-dark">Détail FILM</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
			
		  </div><!-- /.col -->
		</div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<!-- COLOR PALETTE -->
			<div class="card card-default color-palette-box col-md-12">
			  
			  <div class="card-body">
				 
					
						<?php
						$field5name='';
						$idurl = $_GET['id'];
						$query = "SELECT * FROM films f INNER JOIN realisateurs r ON f.realisateur_id= r.id where f.id=".$idurl;
						if ($result = $conn->query($query)) {
							while ($row = $result->fetch_assoc()) {
								$field1name = $row["titre"];
								$field2name = $row["genre"];
								$field3name = $row["nom_prenom"];
								$field4name = $row["annee_production"];
								$query1="select * from films f ,acteurs a,films_acteurs fa where f.id =fa.films_id and a.id= fa.acteurs_id and f.id=".$row["id"];
								if ($result1 = $conn->query($query1)) {
									
								while ($row2 = $result1->fetch_assoc()) {
								 $field5name.= $row2["nom_prenom"].' / ';
								}
								}
								echo '<h1>'.$field1name.'</h1>
								 <div class="post-text">
									Film :'.$field2name.' Par '.$field3name.' en '.$field4name.' 
								</div>
								<div class="post-text">
									Acteurs :'.$field5name.' 
								</div>';
							}
							$result->free();
						} 
						?>
					
			  </div>
			</div>

							  
							  
		</div><!-- /.row (main row) -->
	  <!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>			
<?php include 'footer.php';?>

