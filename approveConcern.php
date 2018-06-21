<?php

session_start();

include ("dbConnect.php");
	$result = $conn->query("SELECT * FROM users WHERE userName = '$username'");
	if($result == true)
	{
		$row = $result->fetch_assoc();
		$deptID = $row['dept_ID'];

		$deptName = "SELECT * FROM department WHERE deptID = '$deptID'";
		$result2 = $conn->query($deptName);
		if($result2 == true)
		{
			$row = $result2->fetch_assoc();
			$name = $row['deptName'];

			$newDept = forwarding($name);

			$update = $conn->query("UPDATE feedback SET department = '$newDept' WHERE feedbackID = '1'");
			if($update == true)
			{
				header('Location: viewConcerns.php');
			}
		}
	}


function forwarding($dept)
{
	if($dept == 'Town Clerk')
	{
		$nextDept = 'Police Department';
	}
	if($dept == 'Police Department')
	{
		$nextDept = 'Fire Department';
	}
	if($dept == 'Fire Department')
	{
		$nextDept = '';
	}

	return $nextDept;
}

?>





