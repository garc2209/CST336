<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

 <link rel="stylesheet" type="text/css" href="css/styles.css">
 <link href="https://fonts.googleapis.com/css?family=Modak" rel="stylesheet">
 <title> </title>
</head>

<body>
<?php 
   // define variables and set to empty values
   $nameErr = $ageErr = $heroErr = $somErr = "";
   $name = $age = $sHero = $something =  "";
   $error=true;
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //error checking
   if (empty($_POST["name"])) 
   {
   $nameErr = "Name is required";
   }
   else {
   $_SESSION["name"]=$_POST["name"];
   }
   if(empty($_POST["age"]))
   {
   $ageErr="Age is required";
   }
   else
   {
   $_SESSION["age"]=$_POST["age"];
   }
   if(empty($_POST["sHero"]))
   {
   $candidateErr="Super Hero is required";
   }
   else
   {
   $_SESSION["sHero"]=$_POST["sHero"];
   }
   for($i=0;$i<5;$i++)
   {
   if(empty($_POST["merch".$i]))
   {
   $somErr="Must select something to purchase is required";
   }
   else 
   {
    $_SESSION["merch".$i]=$_POST["merch".$i];
   }
   }
   }
   if(empty($_POST["sub"]))
   {
    $somErr="must select something to purchase is required";
   }
   else 
   {
     $_SESSION["sub"]=$_POST["sub"];
   }
//if all the keys exist go ahead to the next page
   if( array_key_exists("name",$_SESSION)&&array_key_exists("age",$_SESSION)&&array_key_exists("sHero",$_SESSION) )
   {
     for($i=1;$i<5;$i++) 
     {
      if(array_key_exists("merch".$i,$_SESSION)||array_key_exists("sub",$_SESSION))
      {
       $error=false;
      }
     }
   }
   ?>
 <div id="body">
  <div id="header">
   <h1>Official Superhero Merchandise</h1>

   <div id="img">
    <img class="png" src="img/theater.jpg">
   </div>
  </div>
  <div id="form">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
   
    <div id="personInfo">
     <label>Enter your name</label>
     <input STYLE="border:2px solid black; background-color:#C6D9F0;"type="text" name="name" value=<?php echo$_SESSION['name'];?>>
     <?php echo $nameErr;?><br>
     <label>Enter your age</label>
     <input STYLE="border:2px solid black; background-color:#C6D9F0;" type="text" name="age" size="3" maxlength="3"value=<?php echo$_SESSION['age'];?>>
    </div>
    <div id="hero">
     
     <label>Select your Favorite Supehero!</label>
     <SELECT NAME="sHero">
      <OPTION SELECTED value=<?php echo $_SESSION['sHero'];?>>
       <OPTION value="Batman"> Batman
        <OPTION value="Flash"> Flash
         <OPTION value="Wonder Woman"> Wonder Woman
         <OPTION value="Other candidate"> Other Heros
      
     </SELECT>
     <?php echo $heroErr;?>
    </div>
    <div id="merch">
     <p>Merchandise</p>
     
     <input  type="checkbox" name="merch1" value="Mug ($15)"> Mug ($15)
     <?php echo $somErr;?>
     <br>
     <input type="checkbox" name="merch2" value="Cap ($20)"> Cap ($20)
     <br>
     <input type="checkbox" name="merch3" value="Tote Bag ($10)"> Tote Bag ($10)
     <br>
     <input type="checkbox" name="merch4" value="Pin ($5)"> Pin ($5)
     <br>
     <p>Comic Book Subscription ($10 per month)</p>
    </div>
    <div>

    </div>
    <div id="month">
     <input type="radio" name="sub" value="1 month DC & Marvel Comic Book Subscription ($10)"> 1 months
     <input type="radio" name="sub" value="3 month DC & Marvel Comic Book Subscription ($30)"> 3 month
     <input type="radio" name="sub" value="6 month DC & Marvel Comic Book Subscription ($60)"> 6 month
     <input type="radio" name="sub" value="12 month DC & Marvel Comic Book Subscription ($120)"> 12 month
     <br>
    </div>
   
   <div id="button">
     <input id="buyNow" name="form" type="image" src="img/b-icon.png" alt="submit">
     <h2><span>Buy Now!</span></h2>
    
   </div>
   <div id="buddy">
       <img id="buddy" src="img/buddy_verified.png">
   </div>

   </form>
  </div>
 </div>
</body>

<footer>
    
      
</footer>


</html>

<?php
if(!$error)
   {
   header('location:confirmation.php');
        exit();
   }
 
?>