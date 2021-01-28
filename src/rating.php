<?php include 'header.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1 class="m-0 text-dark">Noter FILMS</h1>
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
					$q="SELECT id FROM users where nom_prenom='".$_SESSION['nom_prenom']."'";
					
					$result = mysqli_query($conn,$q);
					
					while($row = mysqli_fetch_array($result)){
						$userid = $row['id'];
					}
					
					$query = "SELECT * FROM films INNER JOIN realisateurs ON films.realisateur_id= realisateurs.id";
					$result = mysqli_query($conn,$query);
					while($row = mysqli_fetch_array($result)){
						$filmsid = $row['id'];
						$titre = $row['titre'];
						$realisateur = $row["nom_prenom"];
						$annee = $row["annee_production"];

						// User rating
						$query = "SELECT * FROM ratings WHERE film_id=".$filmsid." and user_id=".$userid;
						
						$userresult = mysqli_query($conn,$query) or die(mysqli_error());
						$fetchRating = mysqli_fetch_array($userresult);
						$rating = $fetchRating['rating'];

						// get average
						$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM ratings WHERE film_id=".$filmsid;
						$avgresult = mysqli_query($conn,$query) or die(mysqli_error());
						$fetchAverage = mysqli_fetch_array($avgresult);
						$averageRating = $fetchAverage['averageRating'];

						if($averageRating <= 0){
							$averageRating = "No rating yet.";
						}
				?>
						
						<div class="post">
							<h1><a ><?php echo $titre; ?></a></h1>
							<div class="post-text">
								<?php echo "Par ".$realisateur." en ".$annee; ?>
							</div>
							<div class="post-action">
								<!-- Rating -->
								<select class='rating' id='rating_<?php echo $filmsid; ?>' data-id='rating_<?php echo $filmsid; ?>'>
									<option value="1" >1</option>
									<option value="2" >2</option>
									<option value="3" >3</option>
									<option value="4" >4</option>
									<option value="5" >5</option>
								</select>
								<div style='clear: both;'></div>
								Average Rating : <span id='avgrating_<?php echo $filmsid; ?>'><?php echo $averageRating; ?></span>

								<!-- Set rating -->
								<script src="star/jquery-3.0.0.js" type="text/javascript"></script>
								<script type='text/javascript'>
								$(document).ready(function(){
									$('#rating_<?php echo $filmsid; ?>').barrating('set',<?php echo $averageRating; ?>);
								});
								
								</script>
							</div>
						</div>
				<?php
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
<script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');

                    // rating was selected by a user
                    if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");

                        var filmsid = split_id[1];  // filmsid
						var userid=<?php echo $userid; ?>;

                        // AJAX Request
                        $.ajax({
                            url: 'rating_ajax.php',
                            type: 'post',
                            data: {film_id:filmsid,rating:value,user_id:userid},
                            dataType: 'json',
                            success: function(data){
                                // Update average
								
                                var average = data['averageRating'];
								
                                $('#avgrating_'+filmsid).text(average);
							
                            }
                        });
                    }
                }
            });
        });
      
        </script>

