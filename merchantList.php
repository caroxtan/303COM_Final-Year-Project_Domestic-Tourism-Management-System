<?php
	include("tourismfy_database.php");
	
	if(isset($_POST['activate'])){
            
            $user_id = $_POST['activate'];
            $user_status = 1;
            
            $activate_user = mysqli_query($store, "UPDATE user SET user_status = '{$user_status}' WHERE user_id = '{$user_id}' ");
    }
	
	if(isset($_POST['deactivate'])){
            
            $user_id = $_POST['deactivate'];
            $user_status = 0;
            
            $deactivate_user = mysqli_query($store, "UPDATE user SET user_status = '{$user_status}' WHERE user_id = '{$user_id}' ");
    }
		
	session_start();
	include('adminHeader.php');
	
	$query = mysqli_query($store, "SELECT user_id, username, name, email, phone, address, user_status "
            . "FROM user WHERE user_role_id=2");
    $count = mysqli_num_rows($query);
	
	if ($count > 0)
	{
	   echo "<br/ >";
       echo "<table align = 'center' width = '90%' border ='1'>";
       echo "<tr align = 'center'>";
            //echo"<th align='center'></th>";
            echo"<th align='center'>User ID</th>";
            echo"<th align='center'>Username</th>";
			echo"<th align='center'>Name</th>";
			echo"<th align='center'>Email</th>";
			echo"<th align='center'>Phone</th>";
			echo"<th align='center'>Address</th>";
			echo"<th align='center'>Status</th>";
			echo"<th align='center'>Action</th>";
            
        echo"</tr>";
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
           
                echo"<tr>";
                
                echo"<td align = 'center'><font color = 'black'>{$row['user_id']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['username']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['name']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['email']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['phone']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['address']}</font></td>";
				if ($row['user_status'] == 0) {
					echo "<td align = 'center'><font color='red'>Inactive</font></td>";
				}
				else {
					echo "<td align = 'center'><font color='green'>Active</font></td>";
		        }
				if ($row['user_status'] == 0) {
					echo"<form method = 'post' action = 'merchantList.php'>";
					echo"<td align= 'center'><button name = 'activate' value= ".$row['user_id'].">ACTIVATE</button></td>";
					echo "</form>";
				}
				else{
					echo"<form method = 'post' action = 'merchantList.php'>";
					echo"<td align= 'center'><button name = 'deactivate' value= ".$row['user_id'].">DEACTIVATE</button></td>";
					echo "</form>";
				}
				echo"</tr>";
        }
	}
        echo "</table>";
		
		include('adminFooter.php');
?>