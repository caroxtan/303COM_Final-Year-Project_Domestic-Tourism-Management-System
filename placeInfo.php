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
<?php
    $place_id = $_GET['place_id'];
	$query = mysqli_query($store, "SELECT * "
            . "FROM place WHERE place_id =  '{$place_id}'");
    $count = mysqli_num_rows($query);
	
	if ($count > 0)
	{
        while($row = mysqli_fetch_array($query))
        {
		    echo"<h5><b></i> ".$row['place_name']."</b></h5>";
			echo "<a href='reviewList.php?place_id=".$row['place_id']."' class='link'><h5><i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> ".$row['place_rating']." <font color='blue'>(See Reviews)</font></h5></a>";
			echo"<p align='Justify'>".$row['place_description']."</p>";
			echo "<br/>";
			echo"<p><b>Address: </b>".$row['place_address']."</p>";
			
			$website = $row['place_website'];
			if (!empty($website)) {
			echo"<p><b>Website: </b><a href='".$row['place_website']."'><font color='blue'>".$row['place_website']."</font></a></p></a>";
			}
			
			 if(isset($_SESSION['username'])){
			   echo"<a href='review.php?place_id=".$row['place_id']."' class='link'><button><i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> RATE THIS PLACE</button></a>";
		   }
			

          echo "</div>";
		  echo "</div>";
          echo "<div class='w3-twothird'>";
		        echo "<div class='picture'>";
		        echo"<img src='img/".$row['place_picture']."' height='500' style='width:100%' />";
				echo"<div class='top-left'><b>".$row['place_name']."</b></div>";
				echo "<div class='bottom-left'><img src='img/".$row['place_ar']."' width='95' height='95' /><b>&nbsp;<mark style='background-color: white; color: black;'>Scan the QR Code to Learn More about ".$row['place_name']." in AR</mark></b></div>";
				echo "</div>";
				

          echo "</div>";
	 		}
	}
?>
    </div>
  </div>
  
<?php

   include('footer.php');
   
?>
