<?php
session_start();
if (!isset($_SESSION['username'])) {  // Checks whether user has logged in
    
    header("Location: ../../final_project/index.php");
}
include '../../final_project/SQLFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
     <div id = "wrapper">

    <title>DC Universe Weapon Selector</title>

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
      <h1>DC Universe Weapons Selector </h1>
    </header>
  
    <!-- Welcome user --->
    <div class="form-inline" id="welcomeDiv">
     <strong> Welcome, <?=$_SESSION['username']?>! </strong>
    <button type="button" class="btn btn-warning" id="logoutButton">Logout</button>
  </div>
  
  <!-- Create table to display equipment --->
  <div id="dataDisplay"><br>
    <table class="table table-border" id="rpgTable">
      <thead>
        <tr>
          <form action="#" id="rpgForm">
          <th>Select Weapon: <?php populateDropdown(1, "weapon"); ?></th>
          <th>Select Helm: <?php populateDropdown(2, "helm"); ?></th>
          <th>Select Armor:<?php populateDropdown(3, "armor"); ?></th>
          <th>Select Leggings: <?php populateDropdown(4, "leggings"); ?></th>
          </form>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="weaponImageTD">Weapon Image</td>
          <td id="helmImageTD">Helm Image</td>
          <td id="armorImageTD">Armor Image</td>
          <td id="leggingsImageTD">Leggings Image</td>
        </tr>
        <tr>
          <td id="weaponPrimaryTD">Weapon Primary Stat</td>
          <td id="helmPrimaryTD">Helm Primary Stat</td>
          <td id="armorPrimaryTD">Armor Primary Stat</td>
          <td id="leggingsPrimaryTD">Leggings Primary Stat</td>
        </tr>
        <tr>
          <td id="weaponStaminaTD">Weapon Stamina</td>
          <td id="helmStaminaTD">Helm Stamina</td>
          <td id="armorStaminaTD">Armor Stamina</td>
          <td id="leggingsStaminaTD">Leggings Stamina</td>
        </tr>
      </tbody>
    </table>
    
    <!-- Create UI buttons-->
    <br><button type="button" class="btn btn-success" id="statsButton">Update Stats</button>
    <a href="#" id="showHide"> Show/Hide Stats </a>
    <div class="stats" style="display:none;"></div>
  
    </div>
    
  </div>

    <footer>

    </footer>
  </div>
  
  <script>
  // Initialize stat variables
  var strength = 0;
  var agility = 0;
  var intelligence = 0;
  var stamina = 0;
  
  // Workaround variables
  var savedStrength = 0;
  var savedAgility = 0;
  var savedIntelligence = 0;
  var savedStamina = 0;
  
  // Load initial info on page load
  window.onload = function() 
  {
    // Get user type and append a manage button if user is an admin
    var userTypeId = "<?php echo $_SESSION['user_type_id']; ?>";
    if (userTypeId == 1)
    {
      var manageAppend = '<button type="button" class="btn btn-info" id="manageButton" onclick="manageRedirect()">Manage Database</button>';
      $("#welcomeDiv").append(manageAppend);  // Use this syntax to append; welcomeDiv.append(manageAppend) appends String literally
    }
    
    populateEquipment();
  }
  
  // Update equipment information on button click
  $("#statsButton").click(function(){
    $(".stats").hide(); // Hide stats
    populateEquipment();
    savedStrength = strength;
    savedAgility = agility;
    savedIntelligence = intelligence;
    savedStamina = stamina;
  strength = 0;
  agility = 0;
  intelligence = 0;
  stamina = 0;
  });
  
  // Show or hide stats
  $("#showHide").click( function(){ 
    $(".stats").slideToggle(); 
  });
  
 
  // Define logout button behavior
  $("#logoutButton").click(function(){
   window.location.href = "../../final_project/Login/logout.php";
  });
  
  // Define manage button behavior
  function manageRedirect()
  {
    window.location.href = "../../final_project/Administration/manageEquipment.php";
  }
  </script>  
</body>
</div>
</html>