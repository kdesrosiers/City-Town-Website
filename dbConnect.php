<?php
	$host = "localhost";
	//$host = "localhost:8888";
	//$host = "localhost:8889";
	//$host = "localhost:3306";
	$dbusername = "root";
	$dbpassword = "root";
	$dbname = "CT_Users";

	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

	if(mysqli_connect_error())
	{
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	//echo "Connected successfully";
	?>