<?php

$deny = $_POST['deny'];
$forward = $_POST['forward'];
$dept = $_POST['dept'];
$formID = $_POST['formID'];

//echo $complete;
//echo $forward;
//echo $dept;

include ("dbConnect.php");
echo $formID;
echo $dept;
echo $forward;

  if($deny != NULL)
  {
   // $result = $conn->query("UPDATE feedback SET status = 'complete' WHERE feedbackID = '$ID'");
    $result2 = $conn->query("UPDATE forms SET Curdepartment = 'NULL' WHERE formID = '$formID'");

  }

  if($forward != NULL && $dept != '')
  {
    $result = $conn->query("UPDATE forms SET fire = 1 WHERE formID = '$formID'");

    $result2 = $conn->query("UPDATE forms SET Curdepartment = '$dept' WHERE formID = '$formID'");

  }

  header('Location: Firehtml.php');


?>