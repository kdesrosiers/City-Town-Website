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
<title>Fire Department</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

<body class="w3-text-theme-d1">
<!-- Top Bar -->
<div class="w3-bar w3-theme-d1 w3-large" >

		<span> Welcome, <?php echo $currUserID;?> <a href="logout.php"><b>(logout)</b></a></span>

 	 <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
	<span class="w3-bar-item w3-text-theme-d1 w3-left"></span>
	
</div>
<!--<div class="w3-bar w3-theme w3-large">
<span clas="w3-bar-item w3-text-theme-d1 w3-left">
 Welcome, <?php echo $currUserID;?> <a href="logout.php"><b>(logout)</b></a></span>
</div>-->
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
		<div class="w3-right-align"><h4>Fire Department Page</h4></div>
	
</div>

<header class="w3-container w3-text-theme-d1">

    <h5><i class="fa fa-user-circle "></i> MY ACCOUNT</h5>

 </header>

 <div class="w3-theme-d1">

<ul>

    <li><a class="active" href="Firehtml.php"><i class="fa fa-home"></i> HOME</a></li>
  <li><a href="changepasswordhtmlfire.php"><i class="fa fa-cog"></i>  ACCOUNT SETTINGS</a></li>
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

		include ("dbConnect.php");

		$sql = "SELECT * FROM feedback WHERE department = 'Fire Department'";
		$query = mysqli_query($conn, $sql);

		if(!$query)
		{
			die('SQL Error: ' . mysqli_error($conn));
		}

		?>

<div class="container" style="margin-top:35px">
<div class="form-group pull-right">
	<input type="text" id="concernSearch" name="concernSearch" class="search form-control" placeholder="Search concerns..."/>
</div>
	<table class="w3-table-all w3-hoverable w3-card" id="concerns_table" style="overflow-y:auto">
		<h1>Concerns</h1>
		<thead>
			<tr>
				<th>Feedback ID</th>
				<th>Username</th>
				<th>Type</th>
				<th>Department</th>
				<th>Elaboration</th>
				<th>Date Submitted</th>
				<th>Status</th>
				<th>View</th>
			</tr>
		</thead>


		<?php
		$no = 0;
		while($row = mysqli_fetch_array($query))
		{
			$ID = $row['feedbackID'];
			$rows2[] = $row['feedbackID'];
		?>
		<tr>
			<td><?php echo $row["feedbackID"]; ?></td>
			<td><?php echo $row["userName"]; ?></td>
			<td><?php echo $row["concernType"]; ?></td>
			<td><?php echo $row["department"]; ?></td>
			<td><?php echo $row["reason"]; ?></td>
			<td><?php echo $row["dateSubmitted"]; ?></td>
			<td><?php echo $row["status"]; ?></td>
			<td><?php echo "<a class='active' href='viewfire.php?var=$ID&var2=5'>View</a>"; ?></td>
		</tr>
		<?php
		$no++;
		}
		$query->free();

		?>
	</table>
	</div>

</div>
</div>
</div>

		
<div class="w3-content w3-margin-top " style="max-width:1400px">
			
<div class="w3-row-padding ">
	<div class="w3-twothird" style="margin-left:250px">
  
<!--<div class="w3-twothird" style="margin-left:200px">-->


  <?php

  include ("dbConnect.php");

  $sql = "SELECT * FROM forms where curdepartment = 'fire'";
  $query = mysqli_query($conn, $sql);

  if(!$query)
  {
    die('SQL Error: ' . mysqli_error($conn));
  }

  ?>
<!--<div class="w3-container" style="margin-left:-40px">
	<div class="w3-ul w3-round" style="width:50%"> -->



<div class="container" style="margin-top:100px">
	<div class="form-group pull-right">
		<input type="text" id="formSearch" name="formSearch" class="search form-control" placeholder="Search forms..."/>
	</div>
	<table class="w3-table-all w3-hoverable w3-card" id="forms_table" style="overflow-y:auto; overflow-x:auto">
		<p><h1>Forms</h1>
    <thead>
      <tr>
				<th>Case ID</th>
				<th>Username</th>
				<th>Type</th>
				<th>Date Submitted</th>
				<th>Status</th>
				<th>Progress</th>
				<th>View</th>
      </tr>
    </thead>

    <tbody>


 		<?php
		

		$no = 0;


		while($row = mysqli_fetch_array($query))
		{
		echo "<tr>";
	  	$formid =$row['formID'];
		$rows[] = $row['formID'];

			$sql2 = "SELECT police, fire, clerk, Administrator FROM forms WHERE formID= $formid";
	  $result2 = $conn->query($sql2) or die('Could not run query: '.$conn->error); 
 	  $row2 = $result2->fetch_assoc();
 	  $total = $row2['police']+$row2['fire']+$row2['clerk']+row2['Administrator'];


 	  echo '<td>';
			echo $row['formID'];
			echo '</td>';


			echo '<td>';
			$userID= $row['user_ID'];
			$sql1 = "SELECT userName FROM users WHERE userID= '$userID'";
	  $result1 = $conn->query($sql1) or die('Could not run query: '.$conn->error); 
 	  $row1 = $result1->fetch_assoc();
 	  $userName = $row1['userName'];

			echo $userName;
			echo '</td>';

			echo '<td>';
			$sql5 = "SELECT formtype FROM forms, typeOfForm WHERE forms.user_ID= '$userID' AND  typeOfForm.typeID = forms.type_ID";
	  $result5 = $conn->query($sql5) or die('Could not run query: '.$conn->error); 
 	  $row5 = $result5->fetch_assoc();
 	  $formtype = $row5['formtype'];

			echo $formtype;
			echo '</td>';

			echo '<td>';
			echo $row['submitDate'];
			echo '</td>';

	  	
		    $department = $row['curdepartment'];

			echo '<td>';
       if($total!=4 && $department!=NULL){
      echo "Pending";
      }
      if($department==NULL){
      echo "Denied";
      }
      if($total==4 && $department!=NULL){
      echo"Approved";
      } 
			echo '</td>';
 	  $total = ($total*25);
 	  	  echo '<td>';
		 echo  "			<div class='w3-card w3-round w3-white w3-hide-small'>
						<div class='w3-light-grey w3-round w3-small'>
						<div id='myProgress'>
						<div class='w3-container w3-center w3-round w3-teal' style='width:$total%'>
						
						<div class='w3-center w3-text-white' id='myBar'>$total%</div>
						</div>
					</div>
					</div>
</div>
				</div>
			</div>
			"
				;
	  echo '</td>';

	  echo "<td>";
			echo "<a class='active' href='viewfire.php?var=$formid'>View</a>";
			echo "</td>";

 	   echo "</tr>";


			$no++;
		}

		$query->free();

		?>
</tbody>
</table>

</div>
			</div>
</div>
				</div>
			</div>
			
			<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>


		
	
<div id="result"></div>
<p id="demo"></p>
<p id="demo2"></p>



<script>
$(document).ready(function(){
  $('#formSearch').keyup(function(){
    search_table($(this).val());
  });

  function search_table(value)
  {
    $('#forms_table tr').each(function(){
      var found = 'false';
      $(this).each(function(){
        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
        {
          found = 'true'; 
        }
      });
      if(found == 'true')
      {
        $(this).show();
      }
      else
      {
        $(this).hide();
      }
    });
  }
});
</script>

<script>
$(document).ready(function(){
  $('#concernSearch').keyup(function(){
    search_table($(this).val());
  });

  function search_table(value)
  {
    $('#concerns_table tr').each(function(){
      var found = 'false';
      $(this).each(function(){
        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
        {
          found = 'true'; 
        }
      });
      if(found == 'true')
      {
        $(this).show();
      }
      else
      {
        $(this).hide();
      }
    });
  }
});
</script>





</div>
</div>
</div>
</body>
</html>