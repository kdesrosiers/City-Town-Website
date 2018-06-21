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
  include ("dbConnect.php");
  $sql1 = "SELECT userID FROM users WHERE userName='$currUserID'";
  $result1 = $conn->query($sql1) or die('Could not run query: '.$conn->error); 
  $row = $result1->fetch_assoc();
  $userr_ID = $row['userID'];
  $sql = "SELECT * FROM forms WHERE user_ID='$userr_ID'";
  $query = mysqli_query($conn, $sql);

  if(!$query)
  {
    die('SQL Error: ' . mysqli_error($conn));
  }
?>
  

<div class="container" style="margin-top:35px">
  <div class="form-group pull-right">
    <input type="text" id="formSearch" name="formSearch" class="search form-control" placeholder="Search forms..."/>
  </div>
    <table class="w3-table-all w3-hoverable w3-card" id="forms_table" style="overflow-y:auto">
      <h1>My Forms</h1>
      <thead>
      <tr>
        <th>Case ID</th>
        <th>Form Type</th>
        <th>Submission Date</th>
        <th>status</th>
        <th>Current Department</th>
        <th>Progress</th>
        <th>view</th>
      </tr>
    </thead>

      <?php
      
      while($row = mysqli_fetch_array($query))
    {
      echo "<tr>";
    $ID =$row['formID'];
      $rows[] = $row['formID'];

      $sql2 = "SELECT police, fire, clerk, administrator FROM forms WHERE formID= $ID";
    $result2 = $conn->query($sql2) or die('Could not run query: '.$conn->error); 
    $row2 = $result2->fetch_assoc();
    $total = $row2['police']+$row2['fire']+$row2['clerk']+$row2['administrator'];



      echo '<td>';
      $userID= $row['user_ID'];
      $sql1 = "SELECT userName FROM users WHERE userID= '$userID'";
    $result1 = $conn->query($sql1) or die('Could not run query: '.$conn->error); 
    $row1 = $result1->fetch_assoc();
    $userName = $row1['userName'];

      echo $row['formID'];
      echo '</td>';

      echo '<td>';
      $type = $row['type_ID'];
    $sql5 = "SELECT formtype FROM typeOfForm WHERE typeID = $type";
    $result5 = $conn->query($sql5) or die('Could not run query: '.$conn->error); 
    $row5 = $result5->fetch_assoc();
    $formtype = $row5['formtype'];

      echo $formtype;
      $department = $row['curdepartment'];
      
      echo '</td>';

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
      } 
      echo '</td>';

      echo '<td>';
      echo $department;
      echo '</td>';


    $total = ($total*25);
    
    
        echo '<td>';
     echo  "      <div class='w3-card w3-round w3-white w3-hide-small'>
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
        echo '<td>';
        echo "<a class='active' href='viewForm.php?var=$ID '>View</a>";
        echo '</td>';
    echo '</td></tr>';


    }
    $query->free();
    ?>
    </table>
  </div>
</div>
</div>
</div>
</div>
<!-- End form table -->

<!-- Concern table -->

<div class="w3-content w3-margin-center" style="max-width:1400px;">
<div class="w3-row-padding">
  
<div class="w3-twothird" style="margin-left:300px;">

  <?php

  include ("dbConnect.php");

  $sql = "SELECT * FROM feedback WHERE userName='$currUserID'";
  $result = $conn->query($sql) or die('Could not run query: '.$conn->error);

  if(!$query)
  {
    die('SQL Error: ' . mysqli_error($conn));
  }
?>
  

<div class="container" style="margin-top:125px">
  <div class="form-group pull-right">
    <input type="text" id="concernSearch" name="concernSearch" class="search form-control" placeholder="Search concerns..."/>
  </div>
    <table class="w3-table-all w3-hoverable w3-card" id="concerns_table" style="overflow-y:auto">
      <h1>My Concerns</h1>
      <thead>
      <tr>
        <th>Feedback ID</th>
        <th>Submission Date</th>
        <th>Current Department</th>
        <th>Status</th>
        <th>view</th>
      </tr>
    </thead>

      <?php
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
        <td><?php echo $row["feedbackID"]; ?></td>
        <td><?php echo $row["dateSubmitted"]; ?></td>
        <td><?php echo $row["department"]; ?></td>
        <td><?php echo $row["status"]; ?></td>
        <td><?php     $ID =$row['feedbackID']; echo "<a class='active' href='viewForm.php?var=$ID&var2=5'>View</a>"; ?></td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>
</div>
</div>
</div>
</div>
<!-- End concern table -->
</body>
</html>

<!--jQuery-->
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





