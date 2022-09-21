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
						$username = $row['username'];
						if(mysqli_num_rows($result)== 1)
						{
							if ($username == 'admin'){
							$_SESSION['username'] = $username;
							echo "<script>alert('Login successful!');
								window.location='adminPanel.php'</script>";
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
                        <a class="text-primary px-3" href="registerNew.php">
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
                <h3 class="display-4 text-white text-uppercase">Login</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.html">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Login</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Register Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1>Login</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
					
				
                        <form method="post"  action="login.php">
                            <div class="control-group">
                                    <input type="text" class="form-control p-4" id="username" name="username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>" placeholder="Username"/>
                            </div>
							<br />
							<div class="form-row">
                                <div class="control-group col-sm-11">
                                    <input type="password" class="form-control p-4" id="password" name="password" value= "<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>" placeholder="Password" />
                                </div>
                                <div class="control-group col-sm-1">
								<!-- fa fa-eye is icon of the password visible -->
								<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "Toggle()"></i>
                                </div>
                            </div>
							<br />
							<a href = "forgetPassword.php"><small>Forget Password?</small></a>
							<!-- user who don't have the account can press the link to register-->
							&emsp; <a href = "registerNew.php"><small>Register Here!</small></a>
							<br /> <br />
                            <div class="text-center">
								<input class='btn-primary py-3 px-4' type='submit' name='submitted' value='Login'/>
								
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