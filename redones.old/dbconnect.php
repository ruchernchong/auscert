<?php
	// variables for accessing the database
	// Host for the database, usually this will be localhost (ie. it is hosted in the same place as the rest of your files
	$dbhost = "localhost";
	// Username & password for accessing the database, you can use phpMyAdmin to create users for your database
	$dbuser = "root";
	$dbpass = "";
	// Database to be accessed - replace this with the name you've given to your database
	$dbname = "deco";
	
	$dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if($dbconn->connect_errno > 0){
		die("Unable to connect to database [".$db->connect_error."]");
	}
	// You can output messages to the error log for debugging purposes
	error_log("All ready to go");
?>