<?php
	// connecting the database
	$conn = new PDO('sqlite:basic_database.db');//"temp" needs to be changed for the name of the database
	//Setting connection attributes
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//Query for creating reating the member table in the database if not exist yet.
	
	
?>