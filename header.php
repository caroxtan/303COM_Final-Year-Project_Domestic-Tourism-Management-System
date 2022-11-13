<?php
	include("tourismfy_database.php");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="img/Icon.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <span class="w3-bar-item w3-left"><a href="index.php" class="link"><img src="img/Logo.png" width="70"/></a></span>
  <span class="w3-bar-item w3-left"><a href="index.php" class="link">Home</a></span>
  <span class="w3-bar-item w3-left"><a href="places.php" class="link">Explore Malaysia</a></span>
  <span class="w3-bar-item w3-left"><a href="#" class="link" onclick="getLocation()">Nearby Places</a></span>
  <span class="w3-bar-item w3-left"><a href="#" class="link" onclick="getRandLocation()">Random Location Generator</a></span>
  <span class="w3-bar-item w3-left"><a href="hotel.php" class="link">Hotels</a></span>
  
<?php
   if(isset($_SESSION['username'])){
	   $username = $_SESSION['username'];
	   echo "<span class='w3-bar-item w3-right'><a href='logout.php' class='link'>Logout</a></span>";
	   echo "<span class='w3-bar-item w3-right'>$username</span>";
   }
   else{
	   echo "<span class='w3-bar-item w3-right'><a href='register.php' class='link'>Register</a></span>";
	   echo "<span class='w3-bar-item w3-right'><a href='login.php' class='link'>Login</a></span>";
   }
  ?>
</div>

<script>

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