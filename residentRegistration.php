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
$cellNum = filter_var($_POST['cellNum'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$Address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
$secQuest = filter_var($_POST['secQuestAns'], FILTER_SANITIZE_STRING);


if(!empty($username) && !empty($password) && !empty($passConfirm) && 
	!empty($fName) && !empty($lName) && !empty($phoneNum) && !empty($email) &&
	!empty($Address) && !empty($secQuest)) 
{
	if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,50}$/', $password))
	{
			$result = $conn->query("SELECT userName, pass FROM users WHERE userName = '$username' AND pass = '$password'");


			if($result->num_rows != 0)
				echo "User information is already used!";
			else
			{
			
				$securePass = password_hash($password,PASSWORD_DEFAULT, ['cost' => 10]);
                $sql = "INSERT INTO users (userName, pass, fName, lName, secQuest, email, phoneNumber, cellNumber, address) VALUES ('$username', '$securePass', '$fName', '$lName', '$secQuest', '$email', '$phoneNum', '$cellNum', '$Address')";
			}

			if($conn->query($sql))
			{
			

				echo "You have successfully registered. Welcome to City Town $fName $lName. Please login."; 
			}
			else
			{
			

				//echo "Error: ".$sql."<br>".$conn->error;
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
	echo "All required fields must be filled out";
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