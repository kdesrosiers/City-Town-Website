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


	$approve = $_POST['approve'];
	$deny = $_POST['deny'];
	$dept = $_POST['dept'];
	$forward = $_POST['forward'];
	//$formid = $_POST['formID'];
	$var = $_POST['varn'];


	if($deny != NULL)
	{

		$result = $conn->query("UPDATE forms SET curdepartment = NULL WHERE formID = '$var'");
		
	}
	if($forward == 'forward' && $dept == 'police')
	{

	$result3 = $conn->query("UPDATE forms SET police = 1 WHERE formID = '$var'");

		$result = $conn->query("UPDATE forms SET curdepartment = '$dept' WHERE formID = '$var'");
	}
		if($forward == 'forward' && $dept == 'administrator')
	{

	$result3 = $conn->query("UPDATE forms SET police = 1 WHERE formID = '$var'");

		$result = $conn->query("UPDATE forms SET curdepartment = '$dept' WHERE formID = '$var'");
	}
	if($forward == 'forward' && $dept == 'fire')
	{
		$result3 = $conn->query("UPDATE forms SET police = 1 WHERE formID = '$var'");


		$result = $conn->query("UPDATE forms SET curdepartment = '$dept' WHERE formID = '$var'");
	}
	if($forward == 'forward' && $dept == 'clerk')
	{
		$result3 = $conn->query("UPDATE forms SET police = 1 WHERE formID = '$var'");


		$result = $conn->query("UPDATE forms SET curdepartment = '$dept' WHERE formID = '$var'");
	}
	if($forward != NULL && $deny != NULL)
	{

		$forward = NULL;
		//$approve = NULL;
		$deny = NULL;

	

	$result = $conn->query("UPDATE forms SET fire = 1, clerk = 1, police = 1 WHERE formID = '$formID'");
}



			$alogin = "policehtml.php";

			header('Location:'.$alogin);
?>
