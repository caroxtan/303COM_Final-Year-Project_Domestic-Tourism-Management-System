<?php
	include("tourismfy_database.php");
	
//if user click submit button
				if (isset($_POST['submitted'])) {
					//variables declaration
					$place_name = $_POST['place_name'];
					$place_address = $_POST['place_address'];
					$place_phone = $_POST['place_phone'];
					$place_longitude = $_POST['place_longitude'];
					$place_latitude = $_POST['place_latitude'];
					$place_embed = $_POST['place_embed'];
					$place_picture = $_FILES['place_picture']['name'];
					$state_id = $_POST['place_state'];
					
					
					$$place_name = mysqli_real_escape_string($store, $place_name);
					$$place_address = mysqli_real_escape_string($store, $place_address);
					$place_phone = mysqli_real_escape_string($store, $place_phone);
					$place_longitude = mysqli_real_escape_string($store, $place_longitude);
					$place_latitude = mysqli_real_escape_string($store, $place_latitude);
					$place_embed = mysqli_real_escape_string($store, $place_embed);
					$state_id = mysqli_real_escape_string($store, $state_id);
					
					
					//if user did not fill in first name
					if (empty($place_name)) {
						//print error message in script
						echo "<script>alert('Please enter the place name!')</script>";
					}
					
					//if phone number is not in number format
					else if (is_numeric($place_name)) {
						//print error message in script
						echo "<script>alert('Name should be in alphabets!')</script>";
					}
					
					else {
			
					$target = "img/".basename($_FILES['place_picture']['name']);
					
					if (move_uploaded_file($_FILES['place_picture']['tmp_name'], $target)) {
						$msg = "Image uploaded successfully";
					}else{
					$msg = "There was a problem uploading image";
					}
					/*$file = addslashes(file_get_contents($_FILES["book_cover"]["tmp_name"]));
					
					$folder = 'Image/';*/
					
					$place_name = $_POST['place_name'];
					$place_address = $_POST['place_address'];
					$place_phone = $_POST['place_phone'];
					$place_longitude = $_POST['place_longitude'];
					$place_latitude = $_POST['place_latitude'];
					$place_embed = $_POST['place_embed'];
					$place_picture = $_FILES['place_picture']['name'];
					$state_id = $_POST['place_state'];
					//Success combine data and display message
					$query = mysqli_query($store, "INSERT INTO place
						(place_name, place_address, place_phone, place_longitude, place_latitude, place_embed, place_picture, state_id) VALUES
						('$place_name', '$place_address', '$place_phone', '$place_longitude', '$place_latitude', '$place_embed', '$place_picture', '$state_id')");
					if ($query) {
						echo"<script>alert('Place is successfully registered!');
							window.location='adminPanel.php'</script>";
						}
					else{
						echo "<script>alert('Place is not successfully registered!');
						window.location='addPlaces.php'</script>";
					}
				}
				}	
		
	session_start();
	include('adminHeader.php');
?>
	
	<!-- Register Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1>Add Places</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
					
				
                        <form method="post"  action="addPlaces.php" enctype="multipart/form-data">
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="place_name" name="place_name" value= "<?php if(isset($_POST["place_name"])) echo $_POST["place_name"]; ?>" style="text-transform: capitalize;" placeholder="Name" />
                            </div>
							<br />
							<div class="control-group">
                                <input type="text" class="form-control p-4" id="place_address" name="place_address" value= "<?php if(isset($_POST["place_address"])) echo $_POST["place_address"]; ?>" style="text-transform: capitalize;" placeholder="Address" />
                            </div>
							<br />
							<div class="control-group">
                                <input type="text" class="form-control p-4" id="place_phone" name="place_phone" value= "<?php if(isset($_POST["place_phone"])) echo $_POST["place_phone"]; ?>" style="text-transform: capitalize;" placeholder="Phone Number (0461234567/0123456789)" />
                            </div>
							<br />
							<div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="place_longitude" name="place_longitude" value= "<?php if(isset($_POST["place_longitude"])) echo $_POST["place_longitude"]; ?>" placeholder="Longitude"/>
                                </div>
								 <div class="control-group col-sm-6">
                                    <input type="tel" class="form-control p-4" id="place_latitude" name="place_latitude" value= "<?php if(isset($_POST["place_latitude"])) echo $_POST["place_latitude"]; ?>" style="text-transform: capitalize;" placeholder="Latitude" />
                                </div>
                            </div>
							<br />
							<div class="control-group">
                                <input type="text" class="form-control p-4" id="place_embed" name="place_embed" value= "<?php if(isset($_POST["place_embed"])) echo $_POST["place_embed"]; ?>" style="text-transform: capitalize;" placeholder="Embed Link" />
                            </div>
							<br />
							<div class="control-group">
							    <label>Picture:</label>
                                <input type="file" id="place_picture" name="place_picture" value= "<?php if(isset($_POST["place_picture"])) echo $_POST["place_picture"]; ?>" style="text-transform: capitalize;" placeholder="Picture" />
                            </div>
							<br />
							<div class="control-group">
							<label>State:</label>
							<?php
							$query = mysqli_query($store, "SELECT * "
									. "FROM state");
							$count = mysqli_num_rows($query);
							?>
							<?php
							
							if ($count){
								echo "<select name='place_state'>";
								
								while($row = mysqli_fetch_array($query))
                                { 
							       echo"<option value='".$row['state_id']."'>";
								   
								   echo $row['state_name'];
								   
								   echo"</option>";
								}
								echo "</select>";
							}
							
								
							?>
							</div>
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
<?php
	
		include('adminFooter.php');
?>