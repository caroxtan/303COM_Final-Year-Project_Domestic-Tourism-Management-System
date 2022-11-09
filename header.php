<?php
	include("tourismfy_database.php");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Tourismfy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
<?php
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo "<span class='w3-bar-item w3-left'><a href='index.php' class='link'><i>Tourismfy</i></a></span>";
  
		echo "<span class='w3-bar-item w3-right'><a href='logout.php' class='link'>Logout</span>";
		echo "</div>";
		
		echo "<nav class='w3-sidebar w3-collapse w3-white w3-animate-left' style='z-index:3;width:300px;' id='mySidebar'><br>";
		  echo "<div class='w3-container w3-row'>";
			echo "<div class='w3-col s9 w3-bar'>";
				echo "Welcome, <strong>".$_SESSION['username']."</strong><br>";
				echo "</div>";
		  echo "</div>";
		  echo "<hr>";
		  echo "<div class='w3-container'>";
			echo "<h5>Dashboard</h5>";
		  echo "</div>";
		  echo "<div class='w3-bar-block'>";
			echo "<a href='#' class='w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black' onclick='w3_close()' title='close menu'><i class='fa fa-remove fa-fw'></i>  Close Menu</a>";
			echo "<a href='index.php' class='w3-bar-item w3-button w3-padding'><i class='fa fa-map-marker fa-fw'></i>  Places in Malaysia</a>";
	}
	else {
	  echo "<span class='w3-bar-item w3-left'><a href='index.html' class='link'><i>Tourismfy</i></a></span>";
	  echo "<span class='w3-bar-item w3-right'><a href='register.php' class='link'>Register</a></span>";
	  echo "<span class='w3-bar-item w3-right'><a href='login.php' class='link'>Login</a></span>";
	echo "</div>";

	echo "<nav class='w3-sidebar w3-collapse w3-white w3-animate-left' style='z-index:3;width:300px;' id='mySidebar'><br>";
	  echo "<div class='w3-container w3-row'>";

		echo "<div class='w3-col s9 w3-bar'>";
		  echo "<span>Welcome, <strong>user</strong></span><br /><br />";
		  echo "<a href='login.php' class='link'><font color='black'><b>Please login to your account!<b></font></a>";
		  echo "</div>";
		  echo "</div>";
		  echo "<hr>";
		  echo "<div class='w3-container'>";
			echo "<h5>Dashboard</h5>";
		  echo "</div>";
		  echo "<div class='w3-bar-block'>";
			echo "<a href='#' class='w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black' onclick='w3_close()' title='close menu'><i class='fa fa-remove fa-fw'></i>  Close Menu</a>";
			echo "<a href='index.html' class='w3-bar-item w3-button w3-padding'><i class='fa fa-map-marker fa-fw'></i>  Places in Malaysia</a>";
	}
?>
			<a href="#" class="w3-bar-item w3-button w3-padding" onclick="getLocation()"><i class="fa fa-bullseye fa-fw"></i>  Nearby Places</a>
			<a href="#" class="w3-bar-item w3-button w3-padding" onclick="getRandLocation()"><i class="	fa fa-question fa-fw"></i>  Random Location Generator</a>
		  </div>
		</nav>
		
		<script>
		var x = document.getElementById("demo");

		function getLocation() {
		  if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		  } else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		  }
		}

		function showPosition(position) {
		  window.location='nearbyPlaces.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
		}
		
		function getRandLocation() {
		  if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showRandPosition);
		  } else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		  }
		}

		function showRandPosition(position) {
		  window.location='randomLocation.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
		}

	</script>