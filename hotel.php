<?php

   include('header.php');
   
?>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  </header>
<?php
	$query = mysqli_query($store, "SELECT * FROM place WHERE category_id=2 ORDER BY place_rating DESC");
	
	$count = mysqli_num_rows($query);
	echo "<div class='w3-row-padding'>";
	
	if ($count > 0)
	 {
        while($row = mysqli_fetch_array($query))
        {
			echo "<div class='w3-third w3-container w3-margin-bottom'>";
			echo "<a href='placeInfo.php?place_id=".$row['place_id']."' class='link'>";
			echo"<img src='img/".$row['place_picture']."' style='width:100%' height='175' class='w3-hover-opacity'>";
            echo "<div class='w3-container w3-white'>";
            echo "<p><b>".$row['place_name']."</b></p></a>";
            echo "<p><i class='fa fa-star' style='font-size:16px; color: #ffe338;'></i> ".$row['place_rating']."</p>";
            echo "</div>";
            echo "</div>";
		}
	 }
	 echo "</div>";
	 
?>


<?php

   include('footer.php');
   
?>
