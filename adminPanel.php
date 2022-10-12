<?php
	include("tourismfy_database.php");
	session_start();
	include('adminHeader.php');
	
	$query = mysqli_query($store, "SELECT * "
            . "FROM state");
    $count = mysqli_num_rows($query);
	
	if ($count > 0)
	{
	   echo "<br/ >";
       echo "<table align = 'center' width = '90%' border ='1'>";
       echo "<tr align = 'center'>";
            //echo"<th align='center'></th>";
            echo"<th align='center'>State ID</th>";
            echo"<th align='center'>State Name</th>";
            
        echo"</tr>";
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
           
                echo"<tr>";
                
                echo"<td align = 'center'><font color = 'black'>{$row['state_id']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['state_name']}</font></td>";
				echo"</tr>";
        }
	}
        echo "</table>";
		
		include('adminFooter.php');
?>