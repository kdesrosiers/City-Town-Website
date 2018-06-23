<?php

session_start();

date_default_timezone_set("America/New_York");

$feedback = $_POST['feedback'];
$department = $_POST['department'];
$explain = filter_var($_POST['explain'], FILTER_SANITIZE_STRING);
$user = $_SESSION['username'];
$now = date("D d M Y g:i:s");


if($feedback == "----" || $department == "----" || empty($explain))
{
	header('Location: cityTownConcerns.php');
	echo "Please fill out all fields";
}

else
{
	include ("dbConnect.php");
		$concern = "INSERT INTO feedback (userName, concernType, department, reason, dateSubmitted, status) VALUES ('$user', '$feedback', '$department', '$explain', '$now', 'Under Review')";
		if($conn->query($concern))
		{
			//echo "Thank you for your submission ".$_SESSION['username']."";
			header('Location: FrontendHome.php');
			echo "Thank you for your submission $user.";
					
		}

		//$concern->free();
		//$conn->close();
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<p>
		<a href="cityTownConcerns.php">Concerns Page</a>
	</p>
</body>
</html>