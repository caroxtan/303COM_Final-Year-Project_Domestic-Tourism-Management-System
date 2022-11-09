<?php
	 include("tourismfy_database.php");
	 include('header.php');
?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<?php
	echo "<header class='w3-container' style='padding-top:22px'>";
    echo "<h5><b><i class='fa fa-question fa-fw'></i> Random Location Generator</b></h5>";
    echo "</header>";
	
	$latitude = $_GET['lat'];
	$longitude = $_GET['long'];
	
	$query = mysqli_query($store, "SELECT * FROM place WHERE (((acos(sin(($latitude*pi()/180)) * sin((place_latitude*pi()/180)) + cos(($latitude*pi()/180)) * cos((place_latitude*pi()/180)) * cos((($longitude - place_longitude)*pi()/180))))*180/pi())*60*2.133) <= 8 ORDER BY RAND() LIMIT 1");
	
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

            echo "</div>";
            echo "</div>";
		}
	 }
			
       
  ?>
  
	
  </div>
	  <hr>

  
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>