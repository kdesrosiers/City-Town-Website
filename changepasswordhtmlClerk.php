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
  <li><a href="changepasswordhtmlclerk.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
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

<!--  Right Column -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:300px">
		

		<div class="w3-container w3-card w3-white w3-margin-bottom">
		<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-cog fa-fw w3-margin-right w3-xxlarge w3-text-theme"></i>Account settings</h2>
			<b>Change Password</b>
				<form action="changepasswordclerk.php" method="POST">
		<fieldset>
			<legend></legend>

    		
    		Old Password: <input type="password" name="oldpassword" required placeholder=""> <br><br>

    		New Password: <input type="password" name="password" required placeholder=""> <br><br>

    		Re-enter Password: <input type="password" name="password1" required placeholder=""> <br><br>


    		<br><br>

    		<input type="submit" value="Submit">
			<button type="reset" value="Reset">Reset</button> 
		</fieldset>
	</form>
								

	</div>
	
</div>



</div>
</div>
</div>
</body>
</html>