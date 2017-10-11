<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title> </title>
</head>

<body>
    <div id="body">   
    <?php
        
        $_POST["name"]=$_SESSION["name"];
        
        $_POST["age"]=$_SESSION["age"];
        $_POST["sHero"]=$_SESSION["sHero"];
        
        $_POST["sub"]=$_SESSION["sub"];
            if(empty($_POST["name"]))
                {
                    $_POST["name"]="client name";
                }
            if(empty($_POST["sHero"]))
                {
        
        
                    $_POST["sHero"]="super hero";
        
        
        
                }
        
        
        echo'<div id="body">';
        echo'<div id="cName">';
        echo 'Dear '.$_POST["name"].',<br>';
        echo'</div>';

        
        
        echo'<div id="support">';
        
        echo 'Thanks for chooseing your favorite hero: '.$_POST["sHero"].'<br>';
        echo'</div>';
        
        
        echo'<div id="order">';
        echo 'Your order these products: <br><br>';
        
        echo'</div>';

        $total=0;

        echo'<div id="items">';

            for($i=0;$i<5;$i++)

                {
                    $_POST["merch".$i]=$_SESSION["merch".$i];

                        if(empty($_POST["merch".$i]))
                         {
        
                           }
                        else {
                            echo $_POST["merch".$i].'<br>';

                            //just get numbers from merch string
                            $str = $_POST["merch".$i];
                            $number =$number+ preg_replace("/[^0-9]/", '', $str);
                            }


                                     }
                    echo $_POST["sub"].'<br>';

                    //get value of subscripition


                    $str=$_POST["sub"];
        
        
                    $num=preg_replace("/[^0-9]/", '', $str);
                    if(strlen($num)==5)
        
        
                    {
                      $num= substr($num, 2);  
                    }
                    else{
                    $num= substr($num, 1);
                    }


                    $total = $total+$num;
        
                    $total=$total+$number;
                    echo"</div>";
                    echo'<div id="total">';
        
        
        
                    echo "Total: $". $total;
                    echo"</div>";
                    echo'</div>';
                    ?>
                    
                    </div>
   </body>
</html>


<?php



// remove all session variables
session_unset();
// destroy the session
session_destroy(); 
?>


</html>

