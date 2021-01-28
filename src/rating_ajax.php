
<?php

include "config.php";

$userid = $_POST['user_id'];
$filmsid = $_POST['film_id'];
$rating = $_POST['rating'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntfilms FROM ratings WHERE film_id=".$filmsid." and user_id=".$userid;

$result = mysqli_query($conn,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntfilms'];
if($count == 0){
    $insertquery = "INSERT INTO ratings(user_id,film_id,rating) values(".$userid.",".$filmsid.",".$rating.")";
    mysqli_query($conn,$insertquery);
}else {
    $updatequery = "UPDATE ratings SET rating=" . $rating . " where user_id=" . $userid . " and film_id=" . $filmsid;
    
	mysqli_query($conn,$updatequery);
}


// get average
$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM ratings WHERE film_id=".$filmsid;
$result = mysqli_query($conn,$query) or die(mysqli_error());
$fetchAverage = mysqli_fetch_array($result);
$averageRating = $fetchAverage['averageRating'];

$return_arr = array("averageRating"=>$averageRating);

echo json_encode($return_arr);