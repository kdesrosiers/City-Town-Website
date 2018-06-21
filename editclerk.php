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
?>

<!DOCTYPE html>
<html>
<title>Town Clerk</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Quicksand", sans-serif}
.w3-theme-d1{background-color:#024575 !important}

#myProgress{
	margin-right:100px;
	 width: 100%;
	 background-color: #ddd;
	 }
#myBar{
width: 0%;
height: 20px;
backgorund-color: green;}
ul {
    list-style-type: none;
    margin: 9px;
    padding: 0;
    width: 200px;
    background-color: #f7f7f7;
    height: 100%;
    position: fixed;
    overflow: auto;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   
}

li a {
    display: block;
    color:#666666;
    padding: 16px 4px;
    text-decoration: none;
}

li a.active {
    background-color:#024575;
    color: white;
}

li a:hover:not(.active) {
    background-color: #024575 ;
    color: white;
}
</style>
<body class="w3-theme-l5">
<!-- Top Bar -->
<div class="w3-bar w3-theme-d1 w3-theme w3-large" >
		<span> Welcome, <?php echo $currUserID;?> <a href="logout.php"><b>(logout)</b></a></span>

 	 <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
	<span class="w3-bar-item w3-text-theme-d2 w3-left"></span>
</div>
<!-- End of Top Bar -->

<!-- Name and Date -->

<div class="w3-col s8 w3-bar w3-text-grey" style="margin-left:5px">
			<b><p id="time"></p></b>
		</div>
<!-- End  -->
<!-- Javascript for date -->
<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
<!-- End  -->

<div>
		<div class="w3-right-align"><h4>Town Clerk Page</h4></div>
	
</div>


<header class="w3-container w3-text-grey">

    <h5><i class="fa fa-user-circle "></i> MY ACCOUNT</h5>

 </header>



<ul>

    <li><a class="active" href="Clerkhtml.php"><i class="fa fa-home"></i> HOME</a></li>
  <li><a href="accountsettingsclerk.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
</ul>
</div>

<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
			
			
<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>
<!-- End  -->

<?php
	session_start();
	if (isset($_SESSION['username']))
		{
			$currUserID = $_SESSION['username'];
		}
		else
		{
			$redirect = "login.html";
			header("Location: logout.php");
		}
?>

<?php

	include ("dbConnect.php");

			
			$fName = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
			$lName = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
			$phoneNum = filter_var($_POST['phoneNum'], FILTER_SANITIZE_STRING);
			$cellNum = filter_var($_POST['cellNum'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
			$Address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		
			
			if(isset($currUserID)) 
			{
				$sqlEmp=("select * 
							from users 
								where userName='$currUserID' ");
				$result = $conn->query($sqlEmp) or die('Could not run query: '.$conn->error);
				$sql=("UPDATE users 
							Set fName = '" .$fName. "', lName = '" .$lName. "', email = '" .$email. "', phoneNumber = '" .$phoneNum. "', cellNumber = '" .$cellNum. "', address = '" .$Address. "' WHERE userName ='$currUserID' ");						
				if ($conn->query($sql) == TRUE ) 
				{
			    	echo "<p><b><center>Personal information updated successfully!</center></b></p>";
					$redirect = "accountsettingclerk.php";
					header('Location:'.$redirect);
			   
				} 
				else 
				{
			   		echo "Error: " . $sql . "<br>" . $conn->error;
				}
		
			}
		
			
			else{
				echo "User does not exist";
			}
			
		$conn->close();
?>
	

</body>
</html>
