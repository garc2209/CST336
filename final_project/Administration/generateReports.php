<?php
session_start();
if (!isset($_SESSION['username'])) {  // Checks whether user has logged in
    header("Location: ../../final_project/index.php");
}
if ($_SESSION['user_type_id'] != 1) {   // Checks whether user is an admin
    header("Location: ../../final_project/index.php");
}
include '../../final_project/SQLFunctions.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <div id = "wrapper">
    <title>Weapon Reports</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- Include JQuery and JS functions -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../../final_project/Javascript.js" ></script>
  </head>

<body>
  <div class="container">
    <header>
      <h1>Database Reports</h1>
    </header>
    
        <!-- Welcome user --->
        <div class="form-inline" id="welcomeDiv">
         <strong> Welcome, <?=$_SESSION['username']?>! </strong>
        <button type="button" class="btn btn-warning" id="logoutButton">Logout</button>
        <button type="button" class="btn btn-info" id="returnButton">Return to Management</button>
        </div>
        <br /><br />
        <div id="generateButtonsDiv">
        <button type="button" class="btn btn-primary" id="slotCountButton">Show Total Equipment per Slot</button>
        <button type="button" class="btn btn-primary" id="avgStrengthButton">Show Average Strength by Slot</button>
        </div>
        <div id="reportDiv"></div>
  </div>
  </div>
    <footer>
    
    </footer>
  
  <script>
  // Define logout button behavior
  $("#logoutButton").click(function(){
   window.location.href = "../../final_project/Login/logout.php";
  });
  
  // Define return button behavior
  $("#returnButton").click(function(){
   window.location.href = "manageEquipment.php";
  });
  
  // Define report 1 button behavior
  $("#slotCountButton").click(function(){
    $('#reportDiv').empty(); // Clear previous data
    
    // Use AJAX to retrieve data from server
    jQuery.ajax({
    type: "POST",
    url: "getReport1.php",
    dataType: 'json',
    success: function(data)
    {
      // Append data received as JSON to table
      $('#reportDiv').append("<br><table class='table table-sm table-hover' id='myTable'><tr><th><legend>Slot</legend></th><th><legend>Slot Name</legend></th><th><legend>Total</legend></th></tr>");
      for (i = 0; i < 4; i++)
      {
        var slotNum = data[i]['slot'];
        var total = data[i]['total'];
          
        // Determine slot name
        var slotName;
        switch(Number(data[i]['slot'])) {
        case 1:
            slotName = "Main Hand";
            break;
        case 2:
            slotName = "Helm";
            break;
        case 3:
            slotName = "Armor";
            break;
        case 4:
            slotName = "Leggings";
            break;
        default:
            slotName = "";
        } 
           $('#myTable').append("<tr><td>" + slotNum + "</td><td>" + slotName + "</td><td>" + total + "</td></tr>");
      }
      $('#reportDiv').append("</table>");
    }
  });
  });
  
  // Define report 2 button behavior
  $("#avgStrengthButton").click(function(){
    $('#reportDiv').empty(); // Clear previous data
    
    // Use AJAX to retrieve data from server
    jQuery.ajax({
    type: "POST",
    url: "getReport2.php",
    dataType: 'json',
    success: function(data)
    {
      // Append data received as JSON to table
      $('#reportDiv').append("<br><table class='table table-sm table-hover' id='myTable'><tr><th><legend>Slot</legend></th><th><legend>Slot Name</legend></th><th><legend>Average Strength</legend></th></tr>");
      for (i = 0; i < 4; i++)
      {
        var slotNum = data[i]['slot'];
        var avgStr = data[i]['value'];
          
        // Determine slot name
        var slotName;
        switch(Number(data[i]['slot'])) {
        case 1:
            slotName = "Main Hand";
            break;
        case 2:
            slotName = "Helm";
            break;
        case 3:
            slotName = "Armor";
            break;
        case 4:
            slotName = "Leggings";
            break;
        default:
            slotName = "";
        } 
           $('#myTable').append("<tr><td>" + slotNum + "</td><td>" + slotName + "</td><td>" + avgStr + "</td></tr>");
      }
      
    }
  });
  });
  </script>  
</body>
</html>