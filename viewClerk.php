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
<title>Town's clerk</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
		<div class="w3-right-align"><h4>Town Clerk's Page</h4></div>
	
</div>

<header class="w3-container w3-text-grey">

    <h5><i class="fa fa-user-circle "></i> MY ACCOUNT</h5>

 </header>

 <div class="w3-blue-grey">

<ul>

    <li><a class="active" href="Clerkhtml.php"><i class="fa fa-home"></i> HOME</a></li>
  <li><a href="changepasswordhtmlclerk.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
</ul>
</div>

<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>


			
<div class="w3-content w3-margin-center" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:250px">
	<?php
		session_start();
		if (isset($_SESSION['username']))
		{
			$currUserID = $_SESSION['username'];
			//$formid = $_SESSION['username'];

		}
		else
		{
			$redirect = "login.html";
			header("Location: logout.php");
		}
		include ("dbConnect.php");


		$formid = $_GET['var'];
		$var2 = $_GET['var2'];
	
		$_SESSION['formID'] = $formid;
		echo "Form ID is ".$formid;
		//Create query
		//$formid = $Session["form"];
		//echo $row['formID'];

	
		if($var2==5){
					$sqlEmp2="select *
								from feedback
									where feedbackID = '$formid'  " ;
		//Execute query
		$result2 = $conn->query($sqlEmp2) or die('Could not run query: '.$conn->error);
		 	  $row2 = $result2->fetch_assoc();
				echo "
				<tr>
						<p><td>"."------------------------------"."</td></p>
					<p><td>"."Feedback ID               : ".$row2["feedbackID"]." ". $row["lname"]. "</td></p>
					<p><td>"."UserName                  : ". $row2["userName"]. "</td></p>
					<p><td>"."ConcernType               : ". $row2["concernType"]. "</td></p>
					<p><td>"."Department                : ". $row2["department"]. "</td></p>
					<p><td>"."reason                    : ". $row2["reason"]. "</td></p>
					<p><td>"."Date Submitted            : ". $row2["dateSubmitted"]. "</td></p>
					<p><td>"."status                    : ". $row2["status"]. "</td></p>				
					<p><td>"."<form method='POST' action='concernphpclerk.php'>
		Complete <input type='checkbox' name='complete' id='complete' value='complete'></input>
		Forward <input type='checkbox' name='forward' id='forward' value='forward'></input>
		<input type='hidden' name='varn' value='$formid' />
		<td><select name='dept' id='dept'>
				<option value=''></option>
				<option value='Fire Department'>Fire Department</option>
				<option value='Police Department'>Police Department</option>
				<option value='Town Clerk'>Town Clerk</option>
				<option value='Administrator'>Administrator</option>

			</select>

			<td><button type='submit' name='submit".$no."' value='submit' onclick='postForm()'>Submit</button>
				<br><br>
						</form>
		</fieldset>
	</form>"."</td></p>		
					
					</tr>";

					}
			else{
				$sqlEmp1="select *
						from forms
							where formID = '$formid'  " ;
		//Execute query
		$result = $conn->query($sqlEmp1) or die('Could not run query: '.$conn->error);
		 $row = $result->fetch_assoc();
				echo "
			
				<tr>
					<p><td>"."------------------------------"."</td></p>
					<p><td>"."Name                      : ".$row["fname"]." ". $row["lname"]. "</td></p>
					<p><td>"."Address                   : ". $row["address"]. "</td></p>
					<p><td>"."Alarm Address             : ". $row["AlarmAd"]. "</td></p>
					<p><td>"."Alerting device           : ". $row["AD"]. "</td></p>
					<p><td>"."Type of alarm             : ". $row["TA"]. "</td></p>
					<p><td>"."local ordinance compliance: ". $row["LO"]. "</td></p>
					<p><td>"."Central Station Alarm     : ". $row["CS"]. "</td></p>
					<p><td>"."Alarm Company Name        : ". $row["ACname"]. "</td></p>
					<p><td>"."Alarm Company Address     : ". $row["ACaddress"]. "</td></p>
					<p><td>"."Alarm Company Telephone   : ". $row["ACphone"]. "</td></p>
					<p><td>"."1 Emergancy Contact Name  : ". $row["Ename1"]. "</td></p>
					<p><td>"."1 Emergancy Contact phone : ". $row["Ephone1"]. "</td></p>
					<p><td>"."2 Emergancy Contact Name  : ". $row["Ename2"]. "</td></p>
					<p><td>"."2 Emergancy Contact phone : ". $row["Ephone2"]. "</td></p>
					<p><td>"."3 Emergancy Contact Name  : ". $row["Ename3"]. "</td></p>
					<p><td>"."3 Emergancy Contact phone : ". $row["Ephone3"]. "</td></p>					
					<p><td>
					<p><td>"."<form method='POST' action='viewphpclerk.php'>
		Deny <input type='checkbox' name='deny' id='deny' value='deny'></input>
		Approved <input type='checkbox' name='forward' id='forward' value='forward'></input>
		<input type='hidden' name='varn' value='$formid' />
		<td><select name='dept' id='dept'>
				<option value=''></option>
				<option value='fire'>Fire Department</option>
				<option value='police'>Police Department</option>
				<option value='clerk'>Town Clerk</option>
				<option value='administrator'>Administrator</option>

			</select>

			<td><button type='submit' name='submit".$no."' value='submit' onclick='postForm()'>Submit</button>
				<br><br>
						</form>
		</fieldset>
	</form>"."</td></p>					
					</tr>";
					}



			 
			
					
				
			

		$conn->close();

		?>


	
								

	</div>
	
</div>

			
		<!-- End Right Column -->
</div>
</div>

</body>
</html>
