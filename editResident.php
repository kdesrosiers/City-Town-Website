<?php
	session_start();
	if (isset($_SESSION['username']))
		{
			$currUserID = $_SESSION['username'];
		}
		else
		{
			$redirect = "login.html";
			header("Location: logout.php");
		}
?>

<?php

	include ("dbConnect.php");

			
			$fName = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
			$lName = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
			$phoneNum = filter_var($_POST['phoneNum'], FILTER_SANITIZE_STRING);
			$cellNum = filter_var($_POST['cellNum'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
			$Address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		
			
			if(isset($currUserID)) 
			{
				$sqlEmp=("select * 
							from users 
								where userName='$currUserID' ");
				$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);
				$sql=("UPDATE users 
							Set fName = '" .$fName. "', lName = '" .$lName. "', email = '" .$email. "', phoneNumber = '" .$phoneNum. "', cellNumber = '" .$cellNum. "', address = '" .$Address. "' WHERE userName ='$currUserID' ");						
				if ($conn->query($sql) == TRUE ) 
				{
			    	echo "Personal information updated successfully";
					$redirect = "FrontendHome.php";
					header('Location:'.$redirect);
			   
				} 
				else 
				{
			   		echo "Error: " . $sql . "<br>" . $conn->error;
				}
		
			}
		
			
			else{
				echo "User does not exist";
			}
			
		$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<p>
		<a href="FrontendHome.php">Home</a>
	</p>
</body>
</html>	