<?php include 'header.php';
if($userRole =='employé'){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1 class="m-0 text-dark">Ajouter FILM</h1>
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
				<form method="post" action="process.php">
					<div class="form-group">
					  <label>Titre</label>
					  <input type="text" class="form-control" placeholder="Enter ..." name="titre">
					</div>
					<div class="form-group">
					  <label>Genre</label>
					  <input type="text" class="form-control" placeholder="Enter ..." name="genre">
					</div>
					<div class="form-group">
					  <label>Réalisateur</label>
					  <select class="form-control" name="realisateur">
						<?php
						$query = "SELECT * FROM realisateurs ";
						if ($result = $conn->query($query)) {
							while ($row = $result->fetch_assoc()) {
								echo("<option value='".$row['id']."'>".$row['nom_prenom']."</option>");
							}
						}
						?>
					  </select>
					</div>
					<div class="form-group">
					  <label>Acteurs</label>
					  <select multiple="" class="form-control" name="acteurs[]">
					  <?php
						$query = "SELECT * FROM acteurs ";
						if ($result = $conn->query($query)) {
							while ($row = $result->fetch_assoc()) {
								echo("<option value='".$row['id']."'>".$row['nom_prenom']."</option>");
							}
						}
						?>
					  </select>
					</div>
					<div class="form-group">
					  <label>Année Production</label>
					  <input type="text" class="form-control" placeholder="Enter ..." name="annee">
					</div>
					<input type="submit" class="btn btn-block btn-success btn-flat" name="save" value="Success">
				</form>
				
			  </div>
			</div>

							  
							  
		</div><!-- /.row (main row) -->
	  <!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>			
<?php  include 'footer.php';}?>

