<?php

			    include('header.php');
			   
			    //if user click submit button
				if (isset($_POST['submitted'])) {
					//variables declaration
					$name = $_POST['name'];
					$email = $_POST['email'];
					$username = $_POST['username'];
					$phone = $_POST['phone'];
					$password = $_POST['password'];
					$confirm_password = $_POST['confirm_password'];
					
					//formatting variables
					$upperP = preg_match('@[A-Z]@', $password);
					$lowerP = preg_match('@[a-z]@', $password);
					$numberP = preg_match('@[0-9]@', $password);
					$charP = preg_match('@[^\w]@', $password);
					
					$name = mysqli_real_escape_string($store, $name);
					$email = mysqli_real_escape_string($store, $email);
					$username = mysqli_real_escape_string($store, $username);
					$phone = mysqli_real_escape_string($store, $phone);
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
					else if (empty($confirm_password)) {
						//print error message in script
						echo "<script>alert('Please confirm your password!')</script>";
					}
					
					//if repeated password does not match initial password
					else if (!($confirm_password == $password)) {
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
							
							date_default_timezone_set("Asia/Kuala_Lumpur");
					        $datetime_created = date('Y-m-d H:i:sa');
						
							//success store data and display message
							$query = mysqli_query($store, "INSERT INTO user
							(user_role_id, user_status, username, name, email, phone, datetime_created, password) VALUES
							(3, 1, '$username', '$name', '$email', '$phone', '$datetime_created', MD5('$password'))");
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
   
?>


<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  </header>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
	  <form action="register.php" method="post">

		  <div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" id="username" name="username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>" required />
			
			<label><b>Name</b></label>
			<input type="text" placeholder="Enter Name" id="name" name="name" value= "<?php if(isset($_POST["name"])) echo $_POST["name"]; ?>"required />
			
			<label><b>Email</b></label>
			<input type="email" placeholder="Enter Email (e.g. abc@gmail.com)" id="email" name="email" value= "<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" required />
			
			<label><b>Phone</b></label>
			<input type="tel" placeholder="Enter Phone Number (e.g. 0123456789)" id="phone" name="phone" value= "<?php if(isset($_POST["phone"])) echo $_POST["phone"]; ?>" required />

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" id="password" name="password" value= "<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required /><i class="fa fa-eye" id ="eye" style="margin-left: -30px; cursor: pointer;" onclick = "toggle()"></i>
			<p><font color="red">At Least 8 Characters (1 Lowercase Letter [a-z], 1 Capital Letter [A-Z], 1 Number [0-9], 1 Symbol [e.g. @/^] )</font></p>
			
			<label><b>Confirm Password</b></label>
			<input type="password" placeholder="Enter Confirm Password" id="confirm_password" name="confirm_password" value= "<?php if(isset($_POST["confirm_password"])) echo $_POST["confirm_password"]; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required /><i class="fa fa-eye" id ="eye" style="margin-left: -30px; cursor: pointer;" onclick = "confirmToggle()"></i>
			<button type="submit" name="submitted" value="Register">Register</button>
			<input type="hidden" name="submitted" value="true"/>
			<a href = "login.php" class="link"><font color="blue">Login Here!</font></a>
		  </div>

		  <div class="container">
			<button type="button" class="cancelbtn"><a href = "login.php" class="link">Cancel</a></button>
		  </div>
		</form>
      </div>
      <div class="w3-twothird">
	    <div class="picture">
        <img src="img/Petronas Twin Towers.jpg" width="815" height="815" />
		<div class="top-left"><b>Petronas Twin Towers</b></div>
		<div class="bottom-left"><img src="img/Petronas Twin Towers QR Code.png" width="95" height="95" /><b>&nbsp;<mark style="background-color: white; color: black;">Scan the QR Code to Learn More about Petronas Twin Towers in AR</mark></b></div>
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

function confirmToggle() 
{ 
	var temp = document.getElementById("confirm_password"); 
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
