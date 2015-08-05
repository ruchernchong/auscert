<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<?php
	//Insert database connection stuff here
	
	// Include the script for dealing with database connection
	include("dbconnect.php");

	// Declare variable for the SQL query to be run
	$query = "";
	
	// Query for information
	$query = "SELECT `username` FROM `members` WHERE 1";
	if($query != ""){
		if(!$result = $dbconn->query($query)){
			die("There was an error running the query [".$db->error."]");
		}
	}
	$row = $result->fetch_assoc();
	$user = $row['username']
?>

<html>
	<head>
		<title>Database Connectivity Test</title>
		<link rel="stylesheet" href="css/style.css" type="css/text/css">
    </script>
	</head>
	<body>
		<div id="content">
			<h1>Database Connectivity Test</h1>
			<p>This code is testing our ability to connect to the database and pull information from it. TODO: Store information in the database.</p>
			<p>Your username: <?php echo $user; ?></p>
	</body>
</html>