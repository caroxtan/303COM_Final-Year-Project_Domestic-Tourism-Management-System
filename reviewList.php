<style>
.btn {
  width: auto;
  padding: 10px 18px;
  background-color: #04AA6D;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<?php

   include('header.php');
   
?>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  </header>
  
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
	  <div class="bg-container">
	  
	  <canvas id="ratingChart" style="width:100%;max-width:600px"></canvas>
	  <canvas id="ratingTypeChart" style="width:100%;max-width:600px"></canvas>
	  
	  <center><i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> 5</a><hr/>
	  <i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> <a href="reviewFilter.php?place_id=5" class="link"> 4<hr></a>
	  <i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> 3<hr>
	  <i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> 2<hr>
	  <i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> 1<hr>
	  <mark style='background-color: yellow; color: black;'>Solo</mark><hr>
	  <mark style='background-color: yellow; color: black;'>Couple</mark><hr>
	  <mark style='background-color: yellow; color: black;'>Family</mark><hr>
	  <mark style='background-color: yellow; color: black;'>Friends</mark><hr>
	  <mark style='background-color: yellow; color: black;'>Colleague</mark></center>
	  
	  </div>
	</div>
	<div class='w3-twothird'>
	<div class='bg-container'>
  
<?php
    $place_id = $_GET['place_id'];
	$query = mysqli_query($store, "SELECT review.review_id, review.place_id, user.username AS username, review.review_datetime AS review_datetime, review.review_rating AS review_rating, review.review_type AS review_type, review.review_description AS review_description, review. review_picture AS review_picture FROM review LEFT OUTER JOIN user ON review.user_id=user.user_id WHERE review.place_id =  '{$place_id}' ORDER BY review.review_datetime DESC ");
    $count = mysqli_num_rows($query);

	if ($count > 0)
	{
        while($row = mysqli_fetch_array($query))
        {
	
		  echo "<img src='img/".$row['review_picture']."' height='350' style='width:100%' />";
		  echo "<p align='Justify'><b>".$row['username']."</b> ".$row['review_description']." </p>";
		   echo "<p align='Justify'><i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> ".$row['review_rating']." &nbsp; <mark style='background-color: yellow; color: black;'>".$row['review_type']."</mark></p>";
		   echo "<p align='Justify'>".$row['review_datetime']." </p>";
		   echo"<hr>";
	 	}
			
	}

?>
     </div>
     </div>
    </div>
  </div>
  
<script>
var xValues = ["5", "4", "3", "2", "1"];
var yValues = [0, 2, 0, 1, 0];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("ratingChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Rating"
    }
  }
});

var xValues = ["Solo", "Couple", "Family", "Friends", "Colleague"];
var yValues = [1, 0, 1, 1, 0];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("ratingTypeChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Rating Type"
    }
  }
});
</script>
  
<?php

   include('footer.php');
   
?>
