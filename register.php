<?php
				
				//align center
				include("tourismfy_database.php");
				
				//if user click submit button
				if (isset($_POST['submitted'])) {
					//variables declaration
					$name = $_POST['name'];
					$email = $_POST['email'];
					$username = $_POST['username'];
					$phone = $_POST['phone'];
					$address = $_POST['address'];
					$password = $_POST['password'];
					$confirmPassword = $_POST['confirmPassword'];
					
					//formatting variables
					$upperP = preg_match('@[A-Z]@', $password);
					$lowerP = preg_match('@[a-z]@', $password);
					$numberP = preg_match('@[0-9]@', $password);
					$charP = preg_match('@[^\w]@', $password);
					
					$name = mysqli_real_escape_string($store, $name);
					$email = mysqli_real_escape_string($store, $email);
					$username = mysqli_real_escape_string($store, $username);
					$phone = mysqli_real_escape_string($store, $phone);
					$address = mysqli_real_escape_string($store, $address);
					$password = mysqli_real_escape_string($store, $password);
					
					
					//if user did not fill in first name
					if (empty($name)) {
						//print error message in script
						echo "<script>alert('Please enter your name!')</script>";
					}
					
					//if phone number is not in number format
					else if (is_numeric($name)) {
						//print error message in script
						echo "<script>alert('Name should be in alphabets!')</script>";
					}
					
					//if user did not fill in e-mail
					else if (empty($email)) {
						//print error message in script
						echo "<script>alert('Please enter your email!')</script>";
					}
					
					//if e-mail format is incorrect
					else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						//print error message in script
						echo "<script>alert('Invalid e-mail format!')</script>";
					}
					
					
					//if user did not fill in username
					else if (empty($username)) {
						//print error message in script
						echo "<script>alert('Please enter your username!')</script>";
					}
					
					//if user did not fill in username
					else if (empty($phone)) {
						//print error message in script
						echo "<script>alert('Please enter your phone number!')</script>";
					}
					
					//if phone number is not in number format
					else if (!is_numeric($phone)) {
						//print error message in script
						echo "<script>alert('Phone number should be in numberic!')</script>";
					}
					
					else if (!preg_match("/^01[0-9]{8}$/", $phone) && !preg_match("/^01[0-9]{9}$/", $phone))
					{
						echo"<script>alert('Invalid phone number!')</script>";
					}
					
					//if user did not fill in password
					else if (empty($address)) {
						//print error message in script
						echo "<script>alert('Please enter your address!')</script>";
					}
					
					//if user did not fill in password
					else if (empty($password)) {
						//print error message in script
						echo "<script>alert('Please set a password!')</script>";
					}
					
					//if password format is incorrect
					else if (!$upperP || !$lowerP || !$numberP || !$charP) {
						//print error message in script
						echo "<script>alert('Invalid password format!')</script>";
					}
					
					//if password length is less than 8 characters
					else if (strlen($password) < 8) {
						//print error message in script
						echo "<script>alert('Password length is too short!')</script>";
					}
					
					//if password length is less than 8 characters
					else if (strlen($password) > 15) {
						//print error message in script
						echo "<script>alert('Password length is too long!')</script>";
					}
					
					//if user did not fill in repeated password
					else if (empty($confirmPassword)) {
						//print error message in script
						echo "<script>alert('Please confirm your password!')</script>";
					}
					
					//if repeated password does not match initial password
					else if (!($confirmPassword == $password)) {
						//print error message in script
						echo "<script>alert('Confirm password does not match password')</script>";
					}
					
					else{
						$sqlUsername="SELECT username FROM user WHERE username='$username'";
						$resultUsername=mysqli_query($store,$sqlUsername);
						$rowUsername=mysqli_fetch_array($resultUsername, MYSQLI_ASSOC);
						
						$sqlEmail="SELECT email FROM user WHERE email='$email'";
						$resultEmail=mysqli_query($store,$sqlEmail);
						$rowEmail=mysqli_fetch_array($resultEmail, MYSQLI_ASSOC);
						
						
						if(mysqli_num_rows($resultUsername)== 1)
						{
							//message when data had record in database
							echo "<script>alert('This username has been taken! Please choose another username')</script>";
						}
						
						else if(mysqli_num_rows($resultEmail)== 1)
						{
							//message when data had record in database
							echo "<script>alert('This email has been registered!')</script>";
						}
						else {
							
							$user_id = uniqid();
							//success store data and display message
							$query = mysqli_query($store, "INSERT INTO user
							(user_role_id, user_status, username, name, email, phone, address, password) VALUES
							(3, 1, '$username', '$name', '$email', '$phone', '$address', MD5('$password'))");
							if ($query)
							{
								echo "<script>alert('Registration successful!');
								window.location='login.php'</script>";
							}
							else {
								echo "<script>alert('Registration unsuccessful!');
								window.location='register.php'</script>";
							}
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
    <h5><b><i class="fa fa-address-card"></i> Register</b></h5>
  </header>

  <div class="w3-container">
   <form action="register.php" method="post">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="username" name="username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>" required />
	
	<label><b>Name</b></label>
    <input type="text" placeholder="Enter Name" id="name" name="name" value= "<?php if(isset($_POST["name"])) echo $_POST["name"]; ?>"required />
	
	<label><b>Address</b></label>
    <input type="text" placeholder="Enter Address" id="address" name="address" value= "<?php if(isset($_POST["address"])) echo $_POST["address"]; ?>" required />
	
	<label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" id="email" name="email" value= "<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" required />
	
	<label><b>Phone</b></label>
    <input type="text" placeholder="Enter Phone Number" id="phone" name="phone" value= "<?php if(isset($_POST["phone"])) echo $_POST["phone"]; ?>" required />

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" name="password" required /><i class="fa fa-eye" id ="eye" style="margin-left: -30px; cursor: pointer;" onclick = "toggle()"></i>
	
	<label><b>Confirm Password</b></label>
	<input type="password" placeholder="Enter Confirm Password" id="confirmPassword" name="confirmPassword" required /><i class="fa fa-eye" id ="eye" style="margin-left: -30px; cursor: pointer;" onclick = "confirmToggle()"></i>
    <button type="submit" name="submitted" value="Register">Register</button>
	<input type="hidden" name="submitted" value="true"/>
	<a href = "login.php" class="link"><font color="blue">Login Here!</font></a>
  </div>

  <div class="container">
    <button type="button" class="cancelbtn"><a href = "login.php" class="link">Cancel</a></button>
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

function confirmToggle() 
{ 
	var temp = document.getElementById("confirmPassword"); 
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