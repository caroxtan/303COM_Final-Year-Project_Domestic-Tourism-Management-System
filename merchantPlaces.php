<?php
	include("tourismfy_database.php");
	
	if(isset($_POST['approve'])){
            
            $place_id = $_POST['approve'];
            $application_status = 1;
            
            $approve_place = mysqli_query($store, "UPDATE place SET application_status = '{$application_status}' WHERE place_id = '{$place_id}' ");
    }
	
	if(isset($_POST['reject'])){
            
            $place_id = $_POST['reject'];
            $application_status = 2;
            
            $reject_place = mysqli_query($store, "UPDATE place SET application_status = '{$application_status}' WHERE place_id = '{$place_id}' ");
    }
	
	if(isset($_POST['undo'])){
            
            $place_id = $_POST['undo'];
            $application_status = 0;
            
            $reject_place = mysqli_query($store, "UPDATE place SET application_status = '{$application_status}' WHERE place_id = '{$place_id}' ");
    }
		
	session_start();
	include('adminHeader.php');
	
	$query = mysqli_query($store, "SELECT place_id, user_id, username, category_id, place_name, place_description, place_address, place_phone, place_longitude, place_latitude, place_embed, place_picture, state_id, application_status "
            . "FROM place WHERE user_role_id=2");
    $count = mysqli_num_rows($query);
	
	if ($count > 0)
	{
	   echo "<br/ >";
       echo "<table align = 'center' width = '90%' border ='1'>";
       echo "<tr align = 'center'>";
            //echo"<th align='center'></th>";
            echo"<th align='center'>User ID</th>";
            echo"<th align='center'>Username</th>";
			echo"<th align='center'>Place Picture</th>";
			echo"<th align='center'>Place Name</th>";
			echo"<th align='center'>Place Description</th>";
			echo"<th align='center'>Place Address</th>";
			echo"<th align='center'>Place Phone</th>";
			echo"<th align='center'>Category ID</th>";
			echo"<th align='center'>State ID</th>";
			echo"<th align='center'>360 AR View</th>";
			echo"<th align='center'>Status</th>";
			echo"<th align='center'>Action</th>";
			
            
        echo"</tr>";
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
           
                echo"<tr>";
                
                echo"<td align = 'center'><font color = 'black'>{$row['user_id']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['username']}</font></td>";
				echo"<td align = 'center'><font color = 'black'><img width='100' height='100' src='img/".$row['place_picture']."' /></font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['place_name']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['place_description']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['place_address']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['place_phone']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['category_id']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['state_id']}</font></td>";
				echo"<td align = 'center'><font color = 'black'><iframe src='".$row['place_embed']."' width='200' height='200' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe></font></td>";
				if ($row['application_status'] == 0) {
					echo "<td align = 'center'><font color='blue'>Pending</font></td>";
				}
				else if ($row['application_status'] == 1) {
					echo "<td align = 'center'><font color='green'>Approved</font></td>";
		        }
				else {
					echo "<td align = 'center'><font color='red'>Rejected</font></td>";
		        }
				
				if ($row['application_status'] == 0) {
					echo"<form method = 'post' action = 'merchantPlaces.php'>";
					echo"<td align= 'center'><button color='green' name = 'approve' value= ".$row['place_id'].">Approve</button>
					<br/><br />
					<button color='red' name = 'reject' value= ".$row['place_id'].">Reject</button>
					</td>";
					echo "</form>";
				}
				else{
					echo"<form method = 'post' action = 'merchantPlaces.php'>";
					echo"<td align= 'center'><button name = 'undo' value= ".$row['place_id'].">Undo</button>
					</td>";
					echo "</form>";
				}
				echo"</tr>";
        }
	}
	
        echo "</table>";
		
		include('adminFooter.php');
?>