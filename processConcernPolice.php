<?php

$complete = $_POST['complete'];
$forward = $_POST['forward'];
$dept = $_POST['dept'];
$ID = $_POST['feedbackID']

echo $complete;
echo $forward;
echo $dept;
echo $ID;

/*include ("dbConncect.php");

if($complete != NULL)
{
  $result = $conn->query("UPDATE feedback SET status = 'complete' WHERE feedbackID = '$ID'");
}


if($forward != NULL && $dept != '')
{
  $result2 = $conn->query("UPDATE feedback SET department = '$dept', status = 'under review' WHERE feedbackID = '$ID'");
}

if($forward != null && $complete != null)
  {
    $forward = null;
    $complete = null;
  }

header('Location: Policehtml.php');
}
*/
?>