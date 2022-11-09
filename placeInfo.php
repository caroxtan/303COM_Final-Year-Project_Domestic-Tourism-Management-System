<?php
	 include("tourismfy_database.php");
	 include('header.php');
?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<?php
    $place_id = $_GET['place_id'];
	$query = mysqli_query($store, "SELECT * "
            . "FROM place WHERE place_id =  '{$place_id}'");
    $count = mysqli_num_rows($query);
	echo "<header class='w3-container' style='padding-top:22px'>";
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo"<a href='index.php'><img src='img/Back Arrow.png' height='20' width='20' /></a>";
    }
    else {
	   echo"<a href='index.html'><img src='img/Back Arrow.png' height='20' width='20' /></a>";
    }
	
	if ($count > 0)
	{
        while($row = mysqli_fetch_array($query))
        {
    echo"<h5><b><i class='fa fa-map-marker'></i> ".$row['place_name']."</b></h5>";
    echo"</header>";
       
  ?>
  
   <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
<?php
        echo"<img src='img/".$row['place_picture']."' height='200' style='width:100%' />";

      echo "</div>";
      echo "<div class='w3-twothird'>";
	    echo "<h6><i class='fa fa-star'></i> ".$row['place_rating']."</h6>";
		echo "<h6><b>Description:</b> ".$row['place_description']."</h6>";
	 		}
	}
?>
        
      </div>
    </div>
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