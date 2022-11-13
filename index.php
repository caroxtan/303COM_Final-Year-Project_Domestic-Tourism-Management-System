<?php

   include('header.php');
   
?>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  </header>
<?php
  $query = mysqli_query($store, "SELECT * FROM state");
	
	$count = mysqli_num_rows($query);
	echo "<div class='w3-row-padding'>";
	
	if ($count > 0)
	 {
        while($row = mysqli_fetch_array($query))
        {
			echo "<div class='w3-third w3-container w3-margin-bottom'>";
			echo "<a href='placeList.php?state_id=".$row['state_id']."' class='link'>";
			echo"<img src='img/".$row['state_picture']."' style='width:100%' height='175' class='w3-hover-opacity'>";
            echo "<div class='w3-container w3-white'>";
            echo "<p><b>".$row['state_name']."</b></p></a>";
            echo "</div>";
            echo "</div>";
		}
	 }
	 echo "</div>";
?>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
	     <div class="bg-container">
		  <center><img src="img/Malaysia.png" width="200" height="100"/></center>
		  <p align="Justify">Malaysia is a country in Southeast Asia that has 13 states (Johor, Kedah, Kelantan, Melaka, Negeri Sembilan, Pahang, Perak, Perlis, Penang, Selangor, Sabah and Sarawak) and 3 federal territories (Kuala Lumpur, Putrajaya and Labuan).</p>

		  What is Malaysia known for?

		   <p align="Justify"><i class="fa fa-check-circle" style="color:green"></i>Iconic 88-floor skyscraper building, Petronas Twin Towers in Kuala Lumpur</p>

		   <p align="Justify"><i class="fa fa-check-circle" style="color:green"></i>Beautiful wildlife, beaches and rainforests</p>

		   <p align="Justify"><i class="fa fa-check-circle" style="color:green"></i>Delicious Malaysian dishes such as Nasi Lemak, Laksa and Roti Canai</p>

		   <p align="Justify"><i class="fa fa-check-circle" style="color:green"></i>Attractive tourist spots</p>

		   <p align="Justify"><i class="fa fa-check-circle" style="color:green"></i>Mix of Malay, Chinese, Indian and European cultural influences</p>
		</div>
      </div>
      <div class="w3-twothird">
	   <img src="img/Welcome to Malaysia.jpg" width="815" height="272"/>
        <img src="img/Malaysia Map.jpg" width="815" />
      </div>
    </div>
  </div>
  
<?php

   include('footer.php');
   
?>
