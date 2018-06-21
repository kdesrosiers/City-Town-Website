
<!DOCTYPE html>
<html lang="en">
<head>
  <title>City Town</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
  body{font-family: 'Quicksand', sans-serif;}
  .w3-theme {color:#fff !important;background-color:#024575 !important}

  .w3-text-theme-d1 {color:#024575 !important}
  .w3-text-theme-d2 {color:#e9f5ff !important}
  .w3-hover-text-theme-d1 {color: #e9f5ff !important}
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

h1{
    align-text:left;
}

table {
  border: 2px solid black;
  background-color: #e6e6e6;
}

th {
  border-bottom: 5px solid #000;
}

td {
  border-bottom: 2px solid #000;
}

</style>
</head>
<body style="overflow:hidden;">

<!-- Top Bar -->
<div class="w3-bar  w3-theme w3-large" >
    <span> Welcome, <?php echo $currUserID;?> <a href="logout.php">(logout)</a></span>

   <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
  <span class="w3-bar-item w3-text-theme-d2 w3-left"></span>
</div>
<!-- End of Top Bar -->

<!-- Name and Date -->

<div class="w3-col s8 w3-bar w3-text-grey" style="margin-left:5px">
      <p id="time"></p>
    </div>
<!-- End  -->

<!-- Left Column -->
<header class="w3-container w3-text-grey">

    <h5><i class="fa fa-user-circle "></i> MY ACCOUNT</h5>

 </header>

<ul>

    <li><a class="active" href="frontendhome.php"><i class="fa fa-home"></i> HOME</a></li>
  <li><a href="Form.php"> <i class="fa fa-credit-card-alt"></i> START FORM</a></li>
  <li><a href="cityTownConcerns.php"><i class="fa fa-question"></i>  MY CONCERNS</a></li>
  <li><a href="changepasswordHTML.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
</ul>

<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>

<!-- Form table -->

<div class="w3-content w3-margin-center" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:300px;">

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
					</tr>";
					}



			 
			
					
				
			

		$conn->close();

		?>
				<br><br>
		</fieldset>
	</form>
								

	</div>
	
</div>

			
		<!-- End Right Column -->
</div>
</div>

</body>
</html>
