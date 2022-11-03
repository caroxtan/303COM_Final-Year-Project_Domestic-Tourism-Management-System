<?php

include("tourismfy_database.php");
session_start();

include('header.php');
?>


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
			
<?php


    $place_id = $_GET['place_id'];
	$query = mysqli_query($store, "SELECT * "
            . "FROM place WHERE place_id =  '{$place_id}'");
    $count = mysqli_num_rows($query);		
	
   /* $query2 = mysqli_query($store, "SELECT AVG(rating) FROM review WHERE place_id =  '{$place_id}'");	
	$query3 = mysqli_query($store, "SELECT * FROM review WHERE place_id =  '{$place_id}' ORDER BY rating DESC");
    $count = mysqli_num_rows($query);
	$count2 = mysqli_num_rows($query2);
	$count3 = mysqli_num_rows($query3);
	
	if ($count2)
	{ 
        while($row2 = mysqli_fetch_array($query2))
        {
			echo(round($row2['AVG(rating)'],2));
		}
	}
	
	echo "<br /><br />";*/
	
	if ($count > 0)
	{
        while($row = mysqli_fetch_array($query))
        {
				echo "<h3 class='display-4 text-white text-uppercase'>".$row['place_name']."</h3>";
				?>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <?php
                    echo "<p class='m-0 text-uppercase'>".$row['place_name']."</p>";
	}
}

					?>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
	<?php

	$query2 = mysqli_query($store, "SELECT * "
            . "FROM place WHERE place_id =  '{$place_id}'");	
    $count2 = mysqli_num_rows($query2);
	?>
	
			    <div class="container py-5">
				<div class="row align-items-center">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="mb-4">
						
	<?php
						
	if ($count2 > 0)
	{
        while($row2 = mysqli_fetch_array($query2))
        {
           
							/*echo"<h6 class='text-primary text-uppercase' style='letter-spacing: 5px;'>".$row['place_name']."</h6>";*/
							
							echo"<h1 class='text-white'><span class='text-primary'>".$row2['place_name']."</span></h1>";
							
						echo "</div>";
						echo "<p align='justify'>".$row2['place_description']."</p>";
						
						echo "<ul class='list-inline'>";
							echo"<li class='py-2'><i class='fa fa-location-arrow text-primary mr-3'></i>".$row2['place_address']."</li>";
							echo"<li class='py-2'><i class='fa fa-phone text-primary mr-3'></i>".$row2['place_phone']."</li>";
							?>
						</ul>
					</div>
					<div class="col-lg-5">
						<div class="card border-0">
						<?php
						 echo "<img width='450' height='400' src='img/".$row2['place_picture']."' />";
						 ?>
						</div>
					</div>
				</div>
				<br /><br />
					<?php
					echo"<h6 class='text-primary text-uppercase' style='letter-spacing: 5px;'>360 AR View</h6>";
					echo "<br />";
					echo"<iframe src='".$row2['place_embed']."' width='1115' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
					  }
					}
					?>
			</div>
			
			   <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Top Reviews</h6>
            </div>
            <div class="row pb-3">
			
			<?php
			$query3 = mysqli_query($store, "SELECT * FROM review WHERE place_id =  '{$place_id}' ORDER BY rating DESC LIMIT 3");
		   $count3 = mysqli_num_rows($query3);
			if ($count3 > 0)
		{
			while($row3 = mysqli_fetch_array($query3))
			{
	?>
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog-item">
                        <div class="position-relative">
						<?php
                            echo "<img img width='350' height='235' src='img/".$row3['picture']."' />";
							echo "<div class='blog-date'>";
                                echo"<h6 class='text-white text-uppercase'>".$row3['rating']." <i class='fa fa-star'></i></h6>";
                            echo"</div>";
						?>
							
                        </div>
                        <div class="bg-white p-4">
                            <div class="d-flex mb-2">
							    <?php
                                echo"<p class='text-primary text-uppercase text-decoration-none'>".$row3['username']."</p>";
                                echo"<span class='text-primary px-2'>|</span>";
                                echo"<p class='text-primary text-decoration-none'>".$row3['datetime']."</p>";
								
                            echo "</div>";
                            echo substr($row3['description'],0,30); echo"...";
							?>
                        </div>
                    </div>
                </div>
				<?php
			}
		}
		?>

            </div>
        </div>
    </div>


    <!-- Packages End -->

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