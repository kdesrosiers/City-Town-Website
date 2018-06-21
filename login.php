<?php

session_start();

include ("dbConnect.php");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if(!empty($_POST['username']))
{
	if(!empty($_POST['password']))
	{
		$result = $conn->query("SELECT * FROM users WHERE userName = '$username'");

		if($result == true)
		{
			
			
			$row = $result->fetch_assoc();
			$_SESSION['username'] = $row['userName'];
			$hashPass = $row["pass"];
			#echo $hashPass;
			
			#echo "<br>";
			#echo $securePass;
			$deptID = $row['dept_ID'];
			$result2 = password_verify($password, $hashPass);
			#echo $result2;

			//get different departments pages for backend
			
			//$sql = "SELECT deptName FROM department where deptID = '$deptID'";

			function one($deptID, $result2)
			{

				if($result2 == true && $deptID == NULL)
				{
					$redirect = "FrontendHome.php";
				}
				if($result2 == true && $deptID == 1)
				{
					$redirect = "Policehtml.php";
				}
				if($result2 == true && $deptID == 2)
				{
					$redirect = "Firehtml.php";
				}
				if($result2 == true && $deptID == 3)
				{
					$redirect = "clerkhtml.php";
				}
				if($result2 == true && $deptID == 18)
				{
					$redirect = "alogin.php";
				}
				if($result2 == false)
				{
					$redirect = "invalidpassword.html";
				}
				return $redirect;

			}

			$redirect = one($deptID, $result2);
			
			header('Location:'.$redirect);


		}

		$result->free();
		$conn->close();
		
	}
	else
	{
		//echo "Invalid password";
		die();
	}
}
else
{
	//echo "Invalid Username";
	die();
}

?>

<script>
funtion alert()
{
	alert("Invalid login information");
}
</script>