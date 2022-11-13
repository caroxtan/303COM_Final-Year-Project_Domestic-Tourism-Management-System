<?php

			    include('header.php');
			    //if user click submit button
				if (isset($_POST['submitted'])) {
					//variables declaration
					$username = $_POST['username'];
					$password = $_POST['password'];
					$confirmPassword = $_POST['confirmPassword'];
					
					//formatting variables
					$upperP = preg_match('@[A-Z]@', $password);
					$lowerP = preg_match('@[a-z]@', $password);
					$numberP = preg_match('@[0-9]@', $password);
					$charP = preg_match('@[^\w]@', $password);
					
					
					//if user did not fill in username
				   if (empty($username)) {
						//print error message in script
						echo "<script>alert('Please enter your username!')</script>";
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
						$sql="SELECT username FROM user WHERE username='$username'";
						$result=mysqli_query($store,$sql);
						$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
						if(mysqli_num_rows($result)== 1)
						{
							mysqli_query($store, "UPDATE user set password=MD5('" . $_POST["password"] . "') WHERE username='" . $_POST["username"] . "'");
							echo"<script>alert('Password successfully changed!');
							window.location='login.php'</script>";
						}
						else{
							echo"<script>alert('Username not found!')</script>";
						}
					
					}
				}
   
?>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  </header>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
	  <form action="forgetPassword.php" method="post">
	   <div class="container">
		<label><b>Username</b></label>
		<input type="text" placeholder="Enter Username" id="username" name="username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>" required />

		<label><b>Password</b></label>
		<input type="password" placeholder="Enter Password" id="password" name="password" value= "<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>" required /><i class="fa fa-eye" id ="eye" style="margin-left: -30px; cursor: pointer;" onclick = "toggle()"></i>
		
		<label><b>Confirm Password</b></label>
		<input type="password" placeholder="Enter Confirm Password" id="confirmPassword" name="confirmPassword" required /><i class="fa fa-eye" id ="eye" style="margin-left: -30px; cursor: pointer;" onclick = "confirmToggle()"></i>
		<button type="submit" name="submitted" value="Reset Password">Reset Password</button>
		<input type="hidden" name="submitted" value="true"/>
	  </div>

	  <div class="container">
		<button type="button" class="cancelbtn"><a href = "login.php" class="link">Cancel</a></button>
	  </div>
	</form>
      </div>
      <div class="w3-twothird">
		<div class="picture">
        <img src="img/The Top.jpg" width="815" height="456" />
		<div class="top-left"><b>The Top Penang, Theme Park Penang</b></div>
		<div class="bottom-left"><img src="img/The Top QR Code.png" width="95" height="95" /><b>&nbsp;<mark style="background-color: white; color: black;">Scan the QR Code to Learn More about The Top Penang, Theme Park Penang in AR</mark></b></div>
		</div>
      </div>
    </div>
  </div>
  
<script>
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


<?php

   include('footer.php');
   
?>
