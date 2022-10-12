<?php
	include("tourismfy_database.php");
	session_start();
	
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
							(2, 1, '$username', '$name', '$email', '$phone', '$address', MD5('$password'))");
							if ($query)
							{
								echo "<script>alert('Registration successful!');
								window.location='index.php'</script>";
							}
							else {
								echo "<script>alert('Registration unsuccessful!');
								window.location='merchant.php'</script>";
							}
						}
					
					}
				}
				
				include('header.php');
?>

	
	<!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Apply for Merchant</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Apply for Merchant</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
	
	<!-- Register Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1>Apply for Merchant</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
					
				
                        <form method="post"  action="merchant.php">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" name="name" value= "<?php if(isset($_POST["name"])) echo $_POST["name"]; ?>" style="text-transform: capitalize;" placeholder="Name"/>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email" name="email" value= "<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" placeholder="Email"/>
                                </div>
                            </div>
							<br />
							<div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="username" name="username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>" placeholder="Username"/>
                                </div>
								 <div class="control-group col-sm-6">
                                    <input type="tel" class="form-control p-4" id="phone" name="phone" value= "<?php if(isset($_POST["phone"])) echo $_POST["phone"]; ?>" style="text-transform: capitalize;" placeholder="Phone Number (0123456789)" />
                                </div>
                            </div>
							<br />
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="address" name="address" value= "<?php if(isset($_POST["address"])) echo $_POST["address"]; ?>" style="text-transform: capitalize;" placeholder="Address" />
                            </div>
							<br />
							 <div class="form-row">
                                <div class="control-group col-sm-11">
                                     <input type="password" class="form-control p-4" id="password" name="password" value= "<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" placeholder="Password"/>
                                </div>
                                <div class="control-group col-sm-1">
								<!-- fa fa-eye is icon of the password visible -->
								<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "Toggle()"></i>
                                </div>
                            </div>
							<br />
							 <div class="form-row">
                                <div class="control-group col-sm-11">
                                    <input type="password" class="form-control p-4" id="confirmPassword" name="confirmPassword" value= "<?php if(isset($_POST["confirmPassword"])) echo $_POST["confirmPassword"]; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" placeholder="Confirm Password" />
                                </div>
                                <div class="control-group col-sm-1">
								<!-- fa fa-eye is icon of the password visible -->
								<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "ConfirmToggle()"></i>
                                </div>
                            </div>
							<br />
							<br /> <br />
                            <div class="text-center">
								<input class='btn-primary py-3 px-4' type='submit' name='submitted' value='Apply'/>
								
								<input type='hidden' name='submitted' value='true'/>
								&emsp;
								<a class='btn-primary py-3 px-4' href='index.html'>Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">TOURISM</span>FY</h1>
                </a>
            </div>
            
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">TOURISMY</a>. All Rights Reserved.</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>