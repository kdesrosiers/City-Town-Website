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
<title>Police Department</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<style>
html,body,h1,h2,h3,h4,h5,p4 {font-family: "Quicksand", sans-serif}
#myProgress{
	margin-right:100px;
	 width: 100%;
	 background-color: #ddd;
	 }
#myBar{
width: 0%;
height: 20px;
backgorund-color: green;}

p4{
font-size:35px;
color: #0000b3; }
.w3-text-theme-d2 {color:#024575 !important}
</style>
<body class="w3-theme-l5">
<!-- Top Bar -->
<div class="w3-bar  w3-theme w3-large" >
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
		<div class="w3-right-align"><p4>Police Department Page</p4></div>
	
</div>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:60px">    
	<!-- The Grid -->
	<div class="w3-row">
	
		<!-- Left Column -->
		<div class="w3-col m3">
			<!-- Profile -->
			<div class="w3-card w3-round w3-white">
				<div class="w3-container">
				 <h4 class="w3-center">My Profile</h4>
				
				 <p><a class="active" href="policehtml.php"><i class="fa fa-home w3-button w3-medium w3-block w3-theme-l1 w3-left-align"> HOME</i></a></p>
				
				
				<p><a href="viewConcernspolice.php"><i  class="fa fa-question w3-button w3-block w3-theme-l1 w3-left-align"> CONCERNS</i></a></p>
				 <p><a href="accountsettings.php"><i class="fa fa-cog w3-button w3-block w3-theme-l1 w3-left-align">ACCOUNT SETTINGS</i></a></p>
				</div>
			</div>
			<br>

			
			
			<!-- Open Cases --> 

			
		
		<!-- End Left Column -->
		</div>	<!-- Middle Column -->
		<div class="w3-col m7">
		
			<div class="w3-row-padding">
				<div class="w3-col m12">
					<div class="w3-card w3-round w3-white">
						<div class="w3-container w3-padding">
							<h6 class="w3-opacity">Search for Cases</h6>
							<form method="get" action="processConcern.php">
							<p contenteditable="true" class="w3-border w3-padding" type= "text" name= "case"></p>
							<button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Search</button> 
						</div>
						
					</div>
		<div class="w3-row">
	<div class="w3-col m12" >	
		<div class="w3-content w3-margin-top">
			
		<div class="w3-row-padding ">
  
<!--<div class="w3-twothird" style="margin-left:200px">-->


  <?php

  include ("dbConnect.php");


  $sql = 'SELECT * FROM feedback WHERE status != "complete" AND department = "Police Department"';
  $query = mysqli_query($conn, $sql);

  if(!$query)
  {
    die('SQL Error: ' . mysqli_error($conn));
  }

  ?>

  <table class="w3-table-all w3-hoverable w3-card" name="table" id="table" >
    <thead>
      <tr>
        <th>Feedback ID</th>
        <th>Username</th>
        <th>Type</th>
        <th>Department</th>
        <th>Explanation</th>
        <th>Date Submitted</th>
        <th>Status</th>
        <th>Complete</th>
        <th>Forward</th>
        <th>Forwarding Department</th>
        <th>Submit</th>
      </tr>
    </thead>

    <tbody>

      <form action="processConcern.php" method="POST">

    <?php
    

    $no = 0;


    while($row = mysqli_fetch_array($query))
    {

      $rows[] = $row['feedbackID'];

      echo '<tr>';
      echo '<td>';
      echo $row['feedbackID'];
      echo '</td>';

      echo '<td>';
      echo $row['userName'];
      echo '</td>';

      echo '<td>';
      echo $row['concernType'];
      echo '</td>';

      echo '<td>';
      echo $row['department'];
      echo '</td>';

      echo '<td>';
      echo $row['reason'];
      echo '</td>';

      echo '<td>';
      echo $row['dateSubmitted'];
      echo '</td>';

      echo '<td>';
      echo $row['status'];
      echo '</td>';

      echo "<td>";
      echo "<input type='checkbox' name='complete' id='complete' value='".$no."'/>";
      echo "</td>";

      echo "<td>";
      echo "<input type='checkbox' name='forward' id='forward' value='".$no."'/>";
      echo "</td>";

      echo "<td>";
      echo "<select name='select' id='depts'>";
      echo "<option value = ></option>";
      echo "<option value = 'Fire Department'>Fire Department</option>";
      echo "<option value = 'Police Department'>Police Department</option>";
      echo "<option value = 'Town Clerk'>Town Clerk</option>";
      echo "<option value = 'Town Administrator'>Town Administrator</option>";
      echo "</td>";


      echo "<td>";
      echo "<input type='submit' name='submit".$no."' value='submit' onclick='post()'></a>";
      echo "</td>";
    
      echo "</tr>";

      

      $no++;
    }
    //print_r($rows);

    $query->free();

    ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<div id="result"></div>
<p id="demo"></p>
<p id="demo2"></p>



<script>

function post()
{
  var a = <?php echo json_encode($rows); ?>;
  //alert(a);
  var hr = new XMLHttpRequest();
  var url = "processConcern.php";

  var complete = document.getElementById("complete").value;

  var forward = document.getElementById("forward").value;
  var dept = document.getElementById("depts").value;
  //document.getElementById("demo").innerHTML = dept;

  if(forward != null && complete != null)
  {
    alert("Pick one option");
    forward = null;
    complete = null;
  }

  var vars = "complete="+complete+"&forward="+forward+"&dept="+dept+"&ID="+a[forward];

  //alert(vars);

  hr.open("POST", url, true);

  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  hr.onreadystatechange = function()
  {
    if(hr.readyState == 4 && hr.status == 200)
    {
      var return_data = hr.responseText;
      document.getElementById("demo").innerHTML = return_data;
    }
  }
  hr.send(vars);
  document.getElementById("result").innerHTML = "processing...";
}


</script> 
</div>
</div>
</div>
</body>
</html>