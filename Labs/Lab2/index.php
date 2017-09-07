<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
       <?php
        $randomValue1 = rand(0,2);
        displaySymbol(randomValue1);
        $randomValue2 = rand(0,2);
        displaySymbol(randomValue2);
        $randomValue3 = rand(0,2);
        displaySymbol(randomValue3);
       
       
       function displaySymbol($randomValue)
       {
           
           if($randomValue == 0)
        {
            echo '<img src="img/seven.png" alt="seven" title="Seven" width="70" />';
        }
        else if ($randomValue== 1) 
        {
            echo '<img src="img/cherry.png" alt="cherry" title="Cherry" width="70" />';    
        }
        else 
        {
            echo '<img src="img/lemon.png" alt="lemon" title="Lemon" width="70" />';
        }
        
       }
       
       ?>
    </body>
</html>