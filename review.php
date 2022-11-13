<style>
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>

<?php

				   include('header.php');
   
					if (isset($_POST['submitted'])) {
					//variables declaration
					$place_id = $_POST['place_id'];
					$review_rating = $_POST['review_rating'];
					$review_type = $_POST['review_type'];
					$review_description = $_POST['review_description'];
					$review_picture = $_FILES['review_picture']['name'];
					
					$place_id = mysqli_real_escape_string($store, $place_id);
					$review_rating = mysqli_real_escape_string($store, $review_rating);
					$review_type = mysqli_real_escape_string($store, $review_type);
					$review_description = mysqli_real_escape_string($store, $review_description);
					
					
					if (empty($review_rating)) {
						//print error message in script
						echo "<script>alert('Please choose your rating!')</script>";
					}
					else if (empty($review_type)){
						//print error message in script
						echo "<script>alert('Please choose your review type!')</script>";
					}
					
					else{
						
						$target = "img/".basename($_FILES['review_picture']['name']);
					
						if (move_uploaded_file($_FILES['review_picture']['tmp_name'], $target)) {
							$msg = "Image uploaded successfully";
						}else{
						$msg = "There was a problem uploading image";
						}
						
						date_default_timezone_set("Asia/Kuala_Lumpur");
					    $review_datetime = date('Y-m-d H:i:sa');
					
						$username = $_SESSION['username'];
	
						//select all user data from database
						$sql = "SELECT * FROM user WHERE username = '$username'";
						$result = mysqli_query($store, $sql);
						$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
						
						//receive data
						$user_id = $row['user_id'];
						
						$place_id = $_POST['place_id'];
						$review_rating = $_POST['review_rating'];
						$review_type = $_POST['review_type'];
						$review_description = $_POST['review_description'];
						$review_picture = $_FILES['review_picture']['name'];
						/*$file = addslashes(file_get_contents($_FILES["book_cover"]["tmp_name"]));
						
						$folder = 'Image/';*/
						
							//success store data and display message
							$query = mysqli_query($store, "INSERT INTO review
							(place_id, user_id, review_rating, review_type, review_description, review_picture, review_datetime) VALUES
							('$place_id', '$user_id', '$review_rating', '$review_type','$review_description', '$review_picture', '$review_datetime')");
							
							
							if ($query)
							{
								$query2 = mysqli_query($store, "SELECT AVG(review_rating) FROM review WHERE place_id =  '{$place_id}'");
								
								$count2 = mysqli_num_rows($query2);
								
								if ($count2)
								{ 
									while($row2 = mysqli_fetch_array($query2))
									{
										$avg = round($row2['AVG(review_rating)'],2);
									}
								}
								
								$update_rating = mysqli_query($store, "UPDATE place SET place_rating = '{$avg}' WHERE place_id = '{$place_id}' ");
								
								echo "<script>alert('Review accepted!');
								window.location='places.php'</script>";
							}
							else {
								echo "<script>alert('Review declined!');
								window.location='review.php'</script>";
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
	  <?php
		$place_id = $_GET['place_id'];
	  ?>
	  <form method="post"  action="review.php" enctype="multipart/form-data">
			<div class="container">
			<div class="rate">
  
				<input type="radio" name="review_rating" value="5" id="5"><label for="5">☆</label>
				<input type="radio" name="review_rating" value="4" id="4"><label for="4">☆</label>
				<input type="radio" name="review_rating" value="3" id="3"><label for="3">☆</label>
				<input type="radio" name="review_rating" value="2" id="2"><label for="2">☆</label>
				<input type="radio" name="review_rating" value="1" id="1"><label for="1">☆</label>

			</div>
			
			<label><b>Who Did You Go With?</b></label>

			<select name="review_type" id="review_type" name="review_type">
			  <option value="Solo">Solo</option>
			  <option value="Couple">Couple</option>
			  <option value="Family">Family</option>
			  <option value="Friends">Friends</option>
			  <option value="Colleagues">Colleagues</option>
			</select><br /><br />
			
			<label><b>Description</b></label>
			<input type="text" placeholder="Enter Description" id="review_description" name="review_description" value= "<?php if(isset($_POST["review_description"])) echo $_POST["review_description"]; ?>" required /><br /><br />
			
			<label><b>Picture:</b></label>
            <input type="file" id="review_picture" name="review_picture" value= "<?php if(isset($_POST["review_picture"])) echo $_POST["review_picture"]; ?>" placeholder="Picture" required /><br /><br />
			
			<?php
				echo "<input type='hidden' id='place_id' name='place_id' value='$place_id' />";
			?>
			
			<button type="submit" name="submitted" value="Submit">Submit</button>
			<input type="hidden" name="submitted" value="true"/>
			</div>
			
			<div class="container">
			<?php
			echo"<button type='button' class='cancelbtn'><a href='placeInfo.php?place_id=$place_id' class='link'>Cancel</a></button>"
			?>
		  </div>
		</form>
		</div>
			
<?php
	$query = mysqli_query($store, "SELECT * "
            . "FROM place WHERE place_id =  '{$place_id}'");
    $count = mysqli_num_rows($query);
	
	if ($count > 0)
	{
        while($row = mysqli_fetch_array($query))
        {
			

          echo "<div class='w3-twothird'>";
		        echo "<div class='picture'>";
		        echo"<img src='img/".$row['place_picture']."' height='500' style='width:100%' />";
				echo"<div class='top-left'><b>".$row['place_name']."</b></div>";
				echo "<div class='bottom-left'><img src='img/".$row['place_ar']."' width='95' height='95' /><b>&nbsp;<mark style='background-color: white; color: black;'>Scan the QR Code to Learn More about ".$row['place_name']." in AR</mark></b></div>";
				echo "</div>";
				

          echo "</div>";
	 		}
	}
?>
    </div>
  </div>
  
<?php

   include('footer.php');
   
?>
