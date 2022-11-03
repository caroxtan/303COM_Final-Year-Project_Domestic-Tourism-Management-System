<style>
.rating {
display: flex;
flex-direction: row-reverse;
justify-content: center;
}

.rating > input{
 display:none;
}

.rating > label {
position: relative;
width: 1.1em;
font-size: 10vw;
color: #FFD700;
cursor: pointer;
}

.rating > label::before{
content: "\2605";
position: absolute;
opacity: 0;
}

.rating > label:hover:before,
.rating > label:hover ~ label:before {
opacity: 1 !important;
}

.rating > input:checked ~ label:before{
opacity:1;
}

.rating:hover > input:checked ~ label:before{ 
opacity: 0.4;
 }
</style>


<?php
	include("tourismfy_database.php");
	session_start();
	
	$username = $_SESSION['username'];
	
	//if user click submit button
				if (isset($_POST['submitted'])) {
					//variables declaration
					$place_id = $_POST['place_id'];
					$rating = $_POST['rating'];
					$description = $_POST['description'];
					$picture = $_FILES['picture']['name'];
					
					
					$place_id = mysqli_real_escape_string($store, $place_id);
					$username = mysqli_real_escape_string($store, $username);
					$rating = mysqli_real_escape_string($store, $rating);
					$description = mysqli_real_escape_string($store, $description);
					
					
					//if user did not fill in first name
					if (empty($rating)) {
						//print error message in script
						echo "<script>alert('Please enter your rating!')</script>";
					}
					
					else{
						
						$target = "img/".basename($_FILES['picture']['name']);
					
						if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {
							$msg = "Image uploaded successfully";
						}else{
						$msg = "There was a problem uploading image";
						}
						
						date_default_timezone_set("Asia/Kuala_Lumpur");
					    $datetime = date('Y-m-d H:i:sa');
						
						$place_id = $_POST['place_id'];
						$rating = $_POST['rating'];
						$description = $_POST['description'];
						$picture = $_FILES['picture']['name'];
						/*$file = addslashes(file_get_contents($_FILES["book_cover"]["tmp_name"]));
						
						$folder = 'Image/';*/
						
							//success store data and display message
							$query = mysqli_query($store, "INSERT INTO review
							(place_id, username, rating, description, picture, datetime) VALUES
							('$place_id', '$username', '$rating', '$description', '$picture', '$datetime')");
							if ($query)
							{
								echo "<script>alert('Review accepted!');
								window.location='index.php'</script>";
							}
							else {
								echo "<script>alert('Review declined!');
								window.location='review.php'</script>";
							}
						}
					
					}
				
				
				include('header.php');
?>

	
	<!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Review</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Review</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
	
	<!-- Register Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1>Review</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
						
	<?php
	
	$place_id = $_GET['place_id'];
	
	//select all user data from database
	$sql = "SELECT * FROM place WHERE place_id = '$place_id'";
	$result = mysqli_query($store, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	//receive data
	$place_name = $row['place_name'];
	
	?>
	
				
                        <form method="post"  action="review.php" enctype="multipart/form-data">
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="place_name" name="place_name" value= "<?php echo $place_name ?>" style="text-transform: capitalize;" placeholder="Place Name" readonly />
                            </div>
							<br />
							<div class="control-group">
                                <div class="rating">
  
								  <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
								  <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
								  <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
								  <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
								  <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>

								</div>
                            </div>
							<br />
							<div class="control-group">
                                <input type="text" class="form-control p-4" id="description" name="description" value= "<?php if(isset($_POST["description"])) echo $_POST["description"]; ?>" placeholder="Description" />
                            </div>
							<br />
							<div class="control-group">
							    <label>Picture:</label>
                                <input type="file" id="picture" name="picture" value= "<?php if(isset($_POST["picture"])) echo $_POST["picture"]; ?>" style="text-transform: capitalize;" placeholder="Picture" />
                            </div>
							<?php
								echo "<input type='hidden' id='place_id' name='place_id' value='$place_id' />";
							?>
							<br /> <br />
                            <div class="text-center">
								<input class='btn-primary py-3 px-4' type='submit' name='submitted' value='Submit'/>
								
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
		function showRangeValueRating(val){
			document.getElementById('rate').value=val
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
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>