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

</style>
</head>
<body style="overflow:hidden;">


<div class="w3-bar  w3-theme w3-large">
  	<span> Welcome, <?php echo $currUserID;?> <a href="logout.php"><b>(logout)</b></a></span>
				
 	 <span class="w3-bar-item w3-text-theme-d2 w3-right">City Town</span>
	<span class="w3-bar-item w3-text-theme-d2 w3-left"></span>
</div>



<div class="w3-col s8 w3-bar w3-text-grey" style="margin-left:5px">
	<b><p id="time"></p></b>
</div>




<header class="w3-container w3-text-grey">

    <h5><b><i class="fa fa-user-circle "></i> ADMINISTRATIVE ACCOUNT</b></h5>


  </header>



<ul>

  	<li><a class="active" href="alogin.php"><i class="fa fa-home"></i> HOME</a></li>
	<li><a href="deleteUser.php"><i class="fa fa-question"></i>  DELETE USER</a></li>
	<li><a href="updatePW.php"><i class="fa fa-cog"></i>  UPDATE PASSWORD</a></li>
</ul>



<script>
var d = new Date();
document.getElementById("time").innerHTML = d.toDateString();
</script>

<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:215px">
		
		<?php

		include ("dbConnect.php");

		$sql = "SELECT * FROM feedback";
		$query = mysqli_query($conn, $sql);

		if(!$query)
		{
			die('SQL Error: ' . mysqli_error($conn));
		}

		?>

<div class="container" style="margin-top:35px">
<div class="form-group pull-right">
	<input type="text" id="concernSearch" name="concernSearch" class="search form-control" placeholder="Search here..."/>
</div>
	<table class="w3-table-all w3-hoverable w3-card" id="concerns_table" style="overflow-y:auto; overflow-x:auto">
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
				<th>view</th>

			</tr>
		</thead>
		<form action="viewphp.php" method="POST">

		<?php
		$no = 0;
		while($row = mysqli_fetch_array($query))
		{
			$ID = $row['feedbackID'];
		?>
		<tr>
			<td><?php echo $row["feedbackID"]; ?></td>
			<td><?php echo $row["userName"]; ?></td>
			<td><?php echo $row["concernType"]; ?></td>
			<td><?php echo $row["department"]; ?></td>
			<td><?php echo $row["reason"]; ?></td>
			<td><?php echo $row["dateSubmitted"]; ?></td>
			<td><?php echo $row["status"]; ?></td>
			<td><?php echo "<a class='active' href='view.php?var=$ID&var2=5'>View</a>"; ?></td>
		</tr>
		<?php
		$no++;
		}
		$query->free();

		?>
	</table>
	</div>
</form>
</div>
</div>
</div>



<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:215px">
		
		<?php

		include ("dbConnect.php");

		$sql = "SELECT * FROM forms";
		$query = mysqli_query($conn, $sql);

		if(!$query)
		{
			die('SQL Error: ' . mysqli_error($conn));
		}

		?>

<div class="container" style="margin-top:125px">
	<div class="form-group pull-right">
		<input type="text" id="formSearch" name="formSearch" class="search form-control" placeholder="Search here..."/>
	</div>
	<table class="w3-table-all w3-hoverable w3-card" id="forms_table" style="overflow-y:auto; overflow-x:auto">
		<h1>Forms</h1>
		<thead>
			<tr>
				<th>Form ID</th>
				<th>Username</th>
				<th>Form Type</th>
				<th>Date Submitted</th>
				<th>Case Status</th>
				<th>Current Department</th>
				<th>Case Progress</th>
				<th>View</th>
			</tr>
		</thead>
		<form action="viewphp.php" method="POST">

   <?php
    

    $no = 0;


    while($row = mysqli_fetch_array($query))
    {
	  $formid =$row['formID'];
      $rows[] = $row['formID'];

      $sql2 = "SELECT police, fire, clerk, administrator FROM forms WHERE formID= $formid";
	  $result2 = $conn->query($sql2) or die('Could not run query: '.$conn->error); 
 	  $row2 = $result2->fetch_assoc();
 	  $total=1;
 	  $total = $row2['police']+$row2['fire']+$row2['clerk']+$row2['administrator'];


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
      $department = $row['curdepartment'];


      echo '<td>';
      echo $row['submitDate'];
      echo '</td>';

	  	

      echo '<td>';
       if($total!=4 && $department!=NULL){
      echo "Pending";
      }
      if($department==NULL){
      echo "Denied";
      }
      if($total==4 && $department!=NULL){
      echo"Approved";
      }      echo '</td>';
            echo '<td>';
      echo $department;
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
      echo "<a class='active' href='view.php?var=$formid'>View</a>";
      echo "</td>";

    
 	  
	  //$total = 100;
 	  
/*<div class='w3-container w3-content' style='max-width:1400px;margin-top:80px'>    
			<!-- The Grid -->
			<div class='w3-row'>
     		<br>
     		<div class='w3-container w3-center w3-round-xlarge w3-teal' style='width: '$total''>
     		<\\
     		
     		
     						<p>Case #4590</p>
					<div class="w3-light-grey w3-round-xlarge w3-small">
					<div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:0%">
					<div class="w3-center w3-text-white"id="myBar">0%</div>
				</div>
				</div> */



                 echo "</tr>";
/*
           echo "<script>
	function move(){
	var elem= document.getElementById('myBar');
	var width = 50;
	var id =setInterval(frame,10);
	function frame(){
		if(width>= 50){
			clearInterval(id);
			}
			else{
			width++;
			elem.style.width = width + '%';
			elem.innerHTML = width *1 + '%';}
			}
			}
		</script>";	  
	  */
	  
	  
	  
	  

           
           
           
           
           /*
           
           echo "<script>
	function move(){
	var elem= document.getElementById('myBar');
	var width = 20;
	var id =setInterval(frame,10);
	function frame(){
		if(width>= $total * 33.333334){
			clearInterval(id);
			}
			else{
			width++;
			elem.style.width = width + '%';
			elem.innerHTML = width *1 + '%';}
			}
			}
		</script>";
		
		//$sql3 = "UPDATE forms
		//			SET Police = 1
		//				WHERE user_ID= '$userID';"
 */

     // $no++;


      $no++;
    }
    //print_r($rows);

    $query->free();

    ?>	</table>
	</div>
</form>
</div>
</div>
</div>

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


</body>
</html>

<!--jQuery-->


<!-- javascript -->
