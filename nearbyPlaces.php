<?php
	include("tourismfy_database.php");
	session_start();
				
	include('header.php');
?>

	
	<!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Nearby Places</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Nearby Places</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
	<?php
	
	$latitude = $_GET['lat'];
	$longitude = $_GET['long'];
	
	$query = mysqli_query($store, "SELECT * FROM place WHERE (((acos(sin(($latitude*pi()/180)) * sin((place_latitude*pi()/180)) + cos(($latitude*pi()/180)) * cos((place_latitude*pi()/180)) * cos((($longitude - place_longitude)*pi()/180))))*180/pi())*60*2.133) <= 8");

     $count = mysqli_num_rows($query);
	
	 echo "<div class='container-fluid py-5'>";
				echo"<div class='container pt-5 pb-3'>";
					echo "<div class='row'>";
	
	 if ($count > 0)
	 {
        while($row = mysqli_fetch_array($query))
        {
           
                /*echo $row['place_name'];
				echo "<br />";
                echo $row['place_address'];
				echo "<br />";
				echo $row['place_phone'];
				echo "<br />";
				echo"<iframe src='".$row['place_embed']."' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
				echo "<br /><br />";
				echo "<img width='500' height='400' src='img/".$row['place_picture']."' />";*/
						echo "<div class='col-lg-4 col-md-6 mb-4'>";
							echo "<div class='package-item bg-white mb-2'>";
								echo "<img width='350' height='235' src='img/".$row['place_picture']."' />";
							
								echo "<div class='p-4'>";
								echo $row['place_name'];
									echo "<div class='border-top mt-4 pt-4'>";
										echo"<div class='d-flex justify-content-between'>";
											/*echo"<h6 class='m-0'><i class='fa fa-star text-primary mr-2'></i>4.5 <small>(250)</small></h6>";
											echo "<a href=''>Book</a>";*/
											echo "<a href='review.php?place_id=".$row['place_id']."'>Rate</a>";
										echo "</div>";
									echo"</div>";
								echo "</div>";				
							echo "</div>";
						echo "</div>";
				}
			}
			
			?>

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