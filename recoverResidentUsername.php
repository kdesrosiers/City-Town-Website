<?php
include ("dbConnect.php");

$fName = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
$lName = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

if(!empty($fName) && !empty($lName) && !empty($email))
{
    /*
    echo $fName;
    echo "<br>";
    echo "<br>";
    echo $lName;
    echo "<br>";
    echo "<br>";
    echo $email;
    */

    $string = "";

    $result = $conn->query("SELECT * FROM users WHERE fName = '$fName' AND lName = '$lName' AND email = '$email'");
    if($result->num_rows == 0)
    	echo "That user does not exist";

    $row = $result->fetch_assoc();

    $string = "Username: ".$row['userName'];

    echo $string;

    $conn->close();

    $result->free();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Recover Username</title>
</head>
<body>
	<p>
		<a href="login.html">Sign In</a>
	</p>
</body>
</html>