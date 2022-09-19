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
							//success store data and display message
							$query = mysqli_query($store, "INSERT INTO user
							(name, email, username, phone, address, password) VALUES
							('$name', '$email', '$username', '$phone', '$address', '$password')");
							if ($query)
							{
								echo "<script>alert('Registration successful!');
								window.location='index.html'</script>";
							}
							else {
								echo "<script>alert('Registration unsuccessful!');
								window.location='registerNew.php'</script>";
							}
						}
					
					}
				}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TRAVELER - Free Travel Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>tourismfy@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="login.php">
                           <p>Login</p>
                        </a>
                        <a class="text-primary px-3" href="register.php">
                            <p>Register</p>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">TOURISM</span>FY</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
	
	<!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Register</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.html">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Register</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Register Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1>Register</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
					
				
                        <form method="post"  action="registerNew.php">
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
							<div class="control-group">
                                <input type="password" class="form-control p-4" id="password" name="password" value= "<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" placeholder="Password"/>
                            </div>
							<br />
							<div class="control-group">
                                 <input type="password" class="form-control p-4" id="confirmPassword" name="confirmPassword" value= "<?php if(isset($_POST["confirmPassword"])) echo $_POST["confirmPassword"]; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" placeholder="Confirm Password" />
                            </div>
							<br />
                            <div class="text-center">
								<input class='btn-primary py-3 px-4' type='submit' name='submitted' value='Register'/>
								
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
						<script> 
						// Change the type of input to password or text 
							function Toggle() 
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
							
							function ConfirmToggle() 
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>