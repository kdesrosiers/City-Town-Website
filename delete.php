<?php
session_start();

$comfirmationPage = "comfirmpasschange.html";

		include ("dbConnect.php");
		
		$username = filter_var($_GET['user'], FILTER_SANITIZE_STRING);
	
		
		if(isset($username)) 
		{
			$sqlEmp=("select * 
						from users 
							where userName='$username' ");
			$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);
			$sql=("DELETE FROM users WHERE username='".$username."'");					
			if ($conn->query($sql) == TRUE ) 
			{
			} 
			else 
			{
		   		echo "Error: " . $sql . "<br>" . $conn->error;
			}
	
		}
	
		
		else{
			echo "User does not exist";
		}
		$alogin = "alogin.php";

			header('Location:'.$alogin);	

	$conn->close();

?>

