<?php
	include("tourismfy_database.php");
	session_start();
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
			<?php
				  if(isset($_SESSION['username'])){
					
					 echo"<div class='col-lg-6 text-center text-lg-left mb-2 mb-lg-0'>";
                    echo "<div class='d-inline-flex align-items-center'>";
                        echo"<p><i class='fa fa-envelope mr-2'></i>tourismfy@gmail.com</p>";
                        echo"<p class='text-body px-3'>|</p>";
                        echo "<p><i class='fa fa-phone-alt mr-2'></i>+012 345 6789</p>";
                    echo"</div>";
                echo"</div>";
                echo"<div class='col-lg-6 text-center text-lg-right'>";
                    echo"<div class='d-inline-flex align-items-center'>";
							
							echo"<a class='text-primary px-3' href=''><p>";
                            echo   $_SESSION['username'] ;
                        echo"</p></a>";
                        echo"<a class='text-primary px-3' href='logout.php'>";
                            echo"<p>Log Out</p>";
                        echo"</a>";
                echo"</div>";
				}
					else{
				
                echo"<div class='col-lg-6 text-center text-lg-left mb-2 mb-lg-0'>";
                    echo "<div class='d-inline-flex align-items-center'>";
                        echo"<p><i class='fa fa-envelope mr-2'></i>tourismfy@gmail.com</p>";
                        echo"<p class='text-body px-3'>|</p>";
                        echo "<p><i class='fa fa-phone-alt mr-2'></i>+012 345 6789</p>";
                    echo"</div>";
                echo"</div>";
                echo"<div class='col-lg-6 text-center text-lg-right'>";
                    echo"<div class='d-inline-flex align-items-center'>";
                        echo"<a class='text-primary px-3' href='login.php'>";
                           echo"<p>Login</p>";
                        echo"</a>";
                        echo"<a class='text-primary px-3' href='registerNew.php'>";
                            echo"<p>Register</p>";
                        echo"</a>";
                echo"</div>";
				}
				?>
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
                        <a href="adminPanel.html" class="nav-item nav-link active">Home</a>
						 <a href="Add Places.php" class="nav-item nav-link active">Add Places</a>
                    </div>
		
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


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