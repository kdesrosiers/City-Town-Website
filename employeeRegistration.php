<?php 
		session_start();
		if (isset($_SESSION['username']))
		{
			$currUserID = $_SESSION['username'];
			//$formid = $_SESSION['formid'];
		}
		else
		{
			header("Location: logout.php");
		}
?>
		<?php

		include ("dbConnect.php");

$username = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
$passConfirm = filter_var($_POST['passConfirm'], FILTER_SANITIZE_STRING);
$fName = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
$lName = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
$phoneNum = filter_var($_POST['phoneNum'], FILTER_SANITIZE_STRING);
if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phoneNum)) {
	?>
	<script>
	 filter_var($_POST['phoneNum'], FILTER_SANITIZE_STRING);
		alert("Invalid Phone Number");
	</script>  
	<?php
}
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$emailErr = "Invalid email format"; 
}
$deptID = filter_var($_POST['deptID'], FILTER_SANITIZE_STRING);

if(!empty($username) && !empty($password) && !empty($passConfirm) && !empty($fName) && !empty($lName) && !empty($phoneNum) && !empty($email) && !empty($deptID))
{
	if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,50}$/', $password))
	{
		
			$result = $conn->query("SELECT userName, pass FROM users WHERE userName = '$username' AND pass = '$password'");

			if($result->num_rows != 0)
				echo "User information is already used!";
			else
			{
				$securePass = password_hash($password,PASSWORD_DEFAULT, ['cost' => 10]);
				$sql = "INSERT INTO users (userName, pass, fName, lName, email, phoneNumber, dept_ID) VALUES ('$username', '$securePass', '$fName', '$lName', '$email', '$phoneNum', '$deptID')";
				
			}

			if($conn->query($sql))
			{
				echo "You have successfully registered. Welcome to City Town $fName $lName. Please login.";
			}
			else
			{
				echo "Error on INSERT: ".$conn->error;
			}


		
	}

	else
	{
		echo "Passwords do not match or password contains invalid characters";
		die();
	}
}

else
{
	echo "All fields must be filled out";
	die();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<p>
		<a href="login.html">Sign In</a>
	</p>
</body>
</html>