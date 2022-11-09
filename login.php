<?php
				
				//align center
				include("tourismfy_database.php");
				//start session
				session_start();
				//if user click submit button
				if (isset($_POST['submitted'])) {
					//variables declaration
					$username = $_POST['username'];
					$password = $_POST['password'];
					$valid=true;
					
					//formatting variables
					$upperP = preg_match('@[A-Z]@', $password);
					$lowerP = preg_match('@[a-z]@', $password);
					$numberP = preg_match('@[0-9]@', $password);
					$charP = preg_match('@[^\w]@', $password);
					
					$username = mysqli_real_escape_string($store, $username);
					$password = mysqli_real_escape_string($store, $password);
					
					
					//if user did not fill in username
					if (empty($username)) {
						//print error message in script
						echo "<script>alert('Please enter your username!')</script>";
					}
					
					//if user did not fill in password
					else if (empty($password)) {
						//print error message in script
						echo "<script>alert('Please enter your password!')</script>";
					}
					
					
					else if($valid){
						$sql="SELECT * FROM user WHERE username='$username' AND password=MD5('$password') "; 
						$result=mysqli_query($store,$sql);
						$row=mysqli_fetch_array($result);
						$user_role_id = $row['user_role_id'];
						if(mysqli_num_rows($result)== 1)
						{
							if ($user_role_id == 1){
							$_SESSION['username'] = $username;
							echo "<script>alert('Login successful!');
								window.location='adminPanel.php'</script>";
								return true;
							}
							else if ($user_role_id == 2){
								$_SESSION['username'] = $username;
								echo "<script>alert('Login successful!');
								window.location='merchantPanel.php'</script>";
								return true;
							}
							else{
								$_SESSION['username'] = $username;
							echo "<script>alert('Login successful!');
								window.location='index.php'</script>";
								return true;
							}
						
						}else {
						    echo "<script>alert('Wrong username/password combination.');
						    window.location='login.php'</script>";
							return false;
						}
					
					}
				}
				
				include('header.php');
?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-address-card"></i> Login</b></h5>
  </header>

  <div class="w3-container">
   <form action="login.php" method="post">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="username" name="username" required />

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" name="password" required /><i class="fa fa-eye" id ="eye" style="margin-left: -30px; cursor: pointer;" onclick = "toggle()"></i>
    <button type="submit" name="submitted" value="Login">Login</button>
	<input type="hidden" name="submitted" value="true"/>
	 <a href = "register.php" class="link"><font color="blue">Register Here!</font></a>
  </div>

  <div class="container">
    <button type="button" class="cancelbtn"><a href = "index.html" class="link">Cancel</a></button>
    <span class="psw"><a href="forgetPassword.php" class="link">Forget Password?</a></span>
  </div>
</form>
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

// Change the type of input to password or text 
function toggle() 
{ 
	var temp = document.getElementById("password"); 
	if (temp.type === "password")
	{ 
		temp.type = "text"; 
	} 
	else 
	{ 
		temp.type = "password"; 
	} 
} 
</script>

</body>
</html>