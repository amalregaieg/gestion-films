<?php
include "config.php";
if(isset($_POST['save']))
{	 
	 $titre = $_POST['titre'];
	 $genre = $_POST['genre'];
	 $annee = $_POST['annee'];
	 $realisateur = $_POST['realisateur'];
	 $acteurs = $_POST['acteurs'];
	
	 $sql = "INSERT INTO films (titre,genre,annee_production,realisateur_id)
	 VALUES ('$titre','$genre','$annee','$realisateur')";
	 if($conn->query($sql) === TRUE) {
	 $last_id = $conn->insert_id;
	 if ($acteurs){
		 foreach($acteurs as $key => $value){

			   // print_r($acteurs );die;

			 $sql = "INSERT INTO films_acteurs (films_id,acteurs_id)
			VALUES ('$last_id','$value')";
		 }
	 }}
  
	 if (mysqli_query($conn, $sql)) {
		header("Location: index.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>