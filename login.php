<?php

			    include('header.php');
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
   
?>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  </header>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
	  <form action="login.php" method="post">
	   <div class="container">
		<label><b>Username</b></label>
		<input type="text" placeholder="Enter Username" id="username" name="username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>" required />

		<label><b>Password</b></label>
		<input type="password" placeholder="Enter Password" id="password" name="password" value= "<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>" required /><i class="fa fa-eye" id ="eye" style="margin-left: -30px; cursor: pointer;" onclick = "toggle()"></i>
		<button type="submit" name="submitted" value="Login">Login</button>
		<input type="hidden" name="submitted" value="true"/>
		 <a href = "register.php" class="link"><font color="blue">Register Here!</font></a>
	  </div>

	  <div class="container">
		<button type="button" class="cancelbtn"><a href = "index.php" class="link">Cancel</a></button>
		<span class="psw"><a href="forgetPassword.php" class="link"><font color="blue">Forget Password?</font></a></span>
	  </div>
	</form>
      </div>
      <div class="w3-twothird">
		<div class="picture">
        <img src="img/Kek Lok Si.jpg" width="815" height="395" />
		<div class="top-left"><b>Kek Lok Si Temple</b></div>
		<div class="bottom-left"><img src="img/Kek Lok Si QR Code.png" width="95" height="95" /><b>&nbsp;<mark style="background-color: white; color: black;">Scan the QR Code to Learn More about Kek Lok Si Temple in AR</mark></b></div>
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
