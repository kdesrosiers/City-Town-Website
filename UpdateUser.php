<?php
session_start();
include ("dbConnect.php");

$comfirmationPage = "alogin.php";
		
		$username = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
		$newpass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
		$comfpass = filter_var($_POST['passConfirm'], FILTER_SANITIZE_STRING);
	
		
		if($newpass==$comfpass) 
		{
			$sqlEmp=("select * 
						from users 
							where userName='$username' ");
			$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);
			$hashPass1 = password_hash($comfpass, PASSWORD_DEFAULT, ['cost' => 10]);
			$sql=("UPDATE users 
						Set pass = '" .$hashPass1.
							"' WHERE userName ='$username' ");					
			if ($conn->query($sql) == TRUE ) 
			{
			} 
			else 
			{
		   		echo "Error: " . $sql . "<br>" . $conn->error;
			}
	
		}
	
		
		else{
			echo "Passwords don't match";
		}
			$alogin = "alogin.php";

			header('Location:'.$alogin);
	$conn->close();
?>
