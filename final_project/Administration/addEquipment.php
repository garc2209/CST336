<?php
session_start();
if (!isset($_SESSION['username'])) {  // Checks whether user has logged in
    header("Location: ../../final_project/index.php");
}
if ($_SESSION['user_type_id'] != 1) {   // Checks whether user is an admin
    header("Location: ../../final_project/index.php");
}
include '../../final_project/SQLFunctions.php'; 
 
if (isset($_GET['addForm'])) {  // Admin submitted the Add Form
    
    $sql = "INSERT INTO equipment (name, equipment_slot_id) VALUES (:name, :equipment_slot_id)";
    $namedParameters = array();
    $namedParameters[':name'] = $_GET['name'];
    $namedParameters[':equipment_slot_id'] = $_GET['equipment_slot_id'];
    $conn = getDatabaseConnection('final_project');    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    

    <title>Add Equipment</title>

    <!-- Bootstrap core CSS -->
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- Include JQuery and JS functions -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../../final_project/Javascript.js" ></script>
  </head>
<div id = "wrapper" >
<body>
  <div class="container">
    <header>
      <h1>Add Equipment</h1>
    </header>
    
    <!-- Welcome user --->
    <div class="form-inline" id="welcomeDiv">
     <strong> Welcome, <?=$_SESSION['username']?>! </strong>
    <button type="button" class="btn btn-warning" id="logoutButton">Logout</button>
    <button type="button" class="btn btn-info" id="returnButton">Return to Management</button>
  </div id="addDiv">
    <br /><br />
      <form>
          <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name:</label>
              <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" id="name"/> <br />
              </div>
          </div>
          <div class="form-group row">
              <label for="equipment_slot_id" class="col-sm-2 col-form-label">Equipment Slot:</label>
              <div class="col-sm-10">
          <select name="equipment_slot_id" class="form-control" id="equipment_slot_id">
               <option value="1">Main Hand</option>
               <option value="2">Helm</option>
               <option value="3">Armor</option>
               <option value="4">Leggings</option>
                    </select>
                </div>
            </div>
          <br />
          <input type="submit" id="addButton" class="btn btn-success" value="Add Equipment" name="addForm" />
          
          <!-- Echo add message -->
          <?php
          if (isset($_GET['addForm'])) { echo "<br><br><h4>Record has been added!</h4>";}
          ?>
    </div>
    </form>
  </div>

    <footer>

    </footer>
  </div>
  
  <script>
  // Define logout button behavior
  $("#logoutButton").click(function(){
   window.location.href = "../../final_project/Login/logout.php";
  });
  
  // Define return button behavior
  $("#returnButton").click(function(){
   window.location.href = "manageEquipment.php";
  });
  </script>  
</body>
</div>
</html>