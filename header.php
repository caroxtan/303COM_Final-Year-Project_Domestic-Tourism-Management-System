<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourismfy</title>
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
                        echo"<p><i class='fa fa-envelope mr-2'></i><a href='mailto:tourismfy@gmail.com'>tourismfy@gmail.com</a></p>";
                        echo"<p class='text-body px-3'>|</p>";
                        echo "<p><i class='fa fa-phone-alt mr-2'></i><a href='tel:+6046123456'>+6046123456</p>";
                    echo"</div>";
                echo"</div>";
                echo"<div class='col-lg-6 text-center text-lg-right'>";
                    echo"<div class='d-inline-flex align-items-center'>";
							//display username with session
							echo"<a class='text-primary px-3' href=''><p>";
                            echo   $_SESSION['username'] ;
                        echo"</p></a>";
                        echo"<a class='text-primary px-3' href='logout.php'>";
                            echo"<p>Log Out</p>";
                        echo"</a>";
                echo"</div>";
				
				echo "</div>";
        echo "</div>";
    echo"</div>";
				
				echo "<div class='container-fluid position-relative nav-bar p-0'>";
				echo "<div class='container-lg position-relative p-0 px-lg-3' style='z-index: 9;'>";
					echo "<nav class='navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5'>";
						echo"<a href='index.php' class='navbar-brand'>";
							echo"<h1 class='m-0 text-primary'><span class='text-dark'>TOURISM</span>FY</h1>";
						echo"</a>";
						echo"<button type='button' class='navbar-toggler' data-toggle='collapse' data-target='#navbarCollapse'>";
							echo"<span class='navbar-toggler-icon'></span>";
						echo"</button>";
						echo"<div class='collapse navbar-collapse justify-content-between px-3' id='navbarCollapse'>";
							echo "<div class='navbar-nav ml-auto py-0'>";
								echo "<a href='index.php' class='nav-item nav-link active'>Home</a>";
								echo"<a href='merchant.php' class='nav-item nav-link active'>Apply for Merchant</a>";
							echo "</div>";
						echo "</div>";
					echo "</nav>";
				echo "</div>";
			echo "</div>";
		
				}
					else{
				
                echo"<div class='col-lg-6 text-center text-lg-left mb-2 mb-lg-0'>";
                    echo "<div class='d-inline-flex align-items-center'>";
                        echo"<p><i class='fa fa-envelope mr-2'></i><a href='mailto:tourismfy@gmail.com'>tourismfy@gmail.com</a></p>";
                        echo"<p class='text-body px-3'>|</p>";
                        echo "<p><i class='fa fa-phone-alt mr-2'></i><a href='tel:+6046123456'>+6046123456</p>";
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
				
			echo "</div>";
        echo "</div>";
    echo"</div>";
				
				echo "<div class='container-fluid position-relative nav-bar p-0'>";
					echo "<div class='container-lg position-relative p-0 px-lg-3' style='z-index: 9;'>";
						echo "<nav class='navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5'>";
							echo"<a href='index.php' class='navbar-brand'>";
								echo"<h1 class='m-0 text-primary'><span class='text-dark'>TOURISM</span>FY</h1>";
							echo"</a>";
							echo"<button type='button' class='navbar-toggler' data-toggle='collapse' data-target='#navbarCollapse'>";
								echo"<span class='navbar-toggler-icon'></span>";
							echo"</button>";
							echo"<div class='collapse navbar-collapse justify-content-between px-3' id='navbarCollapse'>";
								echo "<div class='navbar-nav ml-auto py-0'>";
									echo "<a href='index.php' class='nav-item nav-link active'>Home</a>";
								echo "</div>";
							echo "</div>";
						echo "</nav>";
					echo "</div>";
				echo "</div>";
				

				}
				?>;
    <!-- Topbar End -->
