
 <?php
    function years($startyear, $endyear) {
        
    $yearsum = 0;
    
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

     $count = 0;
    for ($i = $startyear; $i<=$endyear; $i = $i +4)
    {   
        $symbol = $zodiac[$count];
        echo "Year " . $i;
        if ($i == 1776)
        {
        echo " USA Indepedence";
        }
        if ($i%100== 0)
        {
            echo " HAPPY NEW CENTURY";
        }
        
        $yearsum = $yearsum + $i;
        
        echo "<br/>";
        
        echo "<img src='zodiac/$symbol.png', width=100>";
        
        $count=$count +1;
        
        if($count == 12)
        {
            $count = 0;
        }
        
    }
    return $yearsum;
        
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title> CHinese Zodiac </title>
    </head>
    
    <header> <h1>Chinese Zodiac List</h1></header>
    
    <body>
      <?php
      
       $sum = years(1900, 2000);
      
        echo "<li> $sum </li>";
      
      ?>
      
    </body>
</html>