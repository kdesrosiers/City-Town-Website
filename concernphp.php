<?php
  session_start();
  if (isset($_SESSION['username']))
  {
    $currUserID = $_SESSION['username'];
  }
  else
  {
    header("Location: logout.php");
  }
$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "CT_Users";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error())
{
	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}


	$complete = $_POST['complete'];
	$dept = $_POST['dept'];
	$forward = $_POST['forward'];
	//$formid = $_POST['formID'];
	$var = $_POST['varn'];

	if($complete != NULL)
	{
		$result = $conn->query("UPDATE feedback SET status = 'Complete' WHERE feedbackID = '$var'");
		
		$result1 = $conn->query("UPDATE feedback SET department = NULL WHERE feedbackID = '$var'");


	}
	if($forward == 'forward' && $dept == 'Police Department')
	{


		$result = $conn->query("UPDATE feedback SET department = '$dept' WHERE feedbackID = '$var'");
	}
		if($forward == 'forward' && $dept == 'Administrator')
	{

		$result = $conn->query("UPDATE feedback SET department = '$dept' WHERE feedbackID = '$var'");
	}
	if($forward == 'forward' && $dept == 'Fire Department')
	{
		$result = $conn->query("UPDATE feedback SET department = '$dept' WHERE feedbackID = '$var'");

	}
	if($forward == 'forward' && $dept == 'Town Clerk')
	{
		$result = $conn->query("UPDATE feedback SET department = '$dept' WHERE feedbackID = '$var'");

	}
	if($forward != NULL && $complete != NULL)
	{

		$forward = NULL;
		//$approve = NULL;
		$deny = NULL;

	}



			$alogin = "alogin.php";

			header('Location:'.$alogin);
?>
