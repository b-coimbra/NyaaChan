<?php
	$Host = "localhost";
	$Username = "root";
	$Password = "";
	$DataBase = "nyaachan";

	// Create connection
	$Connection = mysqli_connect($Host, $Username, $Password);
	
	// Select DataBase
	mysqli_select_db($Connection,$DataBase);
?>