<?php

	$datab_mysql="tourismfy_database"; //Name of database

	//Connect and select the database created
	$store = mysqli_connect("localhost","root","") or die
		("Sorry...Could not select database.");
		
	mysqli_select_db($store, $datab_mysql) or die
		("Sorry..You didn't select the database.");
	
?>