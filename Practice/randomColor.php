<!DOCTYPE html>
<html>
    <head>
        
        <title> Random Backgroud Color </title>
        <meta charset="utf-8"/>
        
        <style type="text/css">
            body {
                
                /*background-color:rgba(15,20,240,1);*/
                
                
                <?php
                
                   // $red = rand(0,255);
                //    $blue = rand(0,255);
                  //  $green = rand(0,255);
                //    $alpha = rand(0,255)/255;
                    
                    echo "background-color: rgba(".rand(0,250).",".rand(0,250).",".rand(0,250).",".(rand(0,250)/255).");"
                ?>
            }
            
            h1 { 
             <?php
                
                   // $red = rand(0,255);
                //    $blue = rand(0,255);
                  //  $green = rand(0,255);
                //    $alpha = rand(0,255)/255;
                    
                    echo "color: rgba(".rand(0,250).",".rand(0,250).",".rand(0,250).",".(rand(0,250)/255).");"
                ?>
                
            }
        </style>
        
        
    </head>
    <body>
<h1>Welcome!</h1>
    </body>
</html>