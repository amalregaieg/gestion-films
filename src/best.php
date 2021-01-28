<?php include 'header.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1 class="m-0 text-dark">Best Films</h1>
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
				 <table id="produitTable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Titre </th>
							<th>Genre</th>
							<th>Réalisateur</th>
							<th>Année production</th>
							<th>Acteurs</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$field5name='';
						$query = "SELECT * FROM films f 
								JOIN realisateurs r ON r.id = f.realisateur_id 
								JOIN ratings P ON f.id = P.film_id 
								GROUP By P.film_id 
								ORDER BY P.rating DESC  ";
						if ($result = $conn->query($query)) {
							while ($row = $result->fetch_assoc()) {
								$field1name = $row["titre"];
								$field2name = $row["genre"];
								$field3name = $row["nom_prenom"];
								$field4name = $row["annee_production"];
								$query1="select * from films f ,acteurs a,films_acteurs fa where f.id =fa.films_id and a.id= fa.acteurs_id and f.id=".$row["id"];
								if ($result1 = $conn->query($query1)) {
									
								while ($row2 = $result1->fetch_assoc()) {
								 $field5name.= $row2["nom_prenom"];
								}
								}
								
								echo '<tr> 
										  <td><a href="show.php?id='.$row['id'].'" alt="show">'.$field1name.'</a></td>
										  <td>'.$field2name.'</td> 
										  <td>'.$field3name.'</td> 
										  <td>'.$field4name.'</td> 
										  <td>'.$field5name.'</td> 
									  </tr>';
								$field5name='';
							}
							$result->free();
						} 
						?>
					</tbody>
				</table>
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

