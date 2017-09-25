<?php
$backgroundImage = "img/sea.jpg";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Image Carousel </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body {
                background-image:url('<?=$backgroundImage?>');
            }
        </style>
    </head>
    <body>
        <br/> <br/>
        <?php
            if(!isset($imageURLs)) {
             echo "<h2>Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
                
            }
            else 
            {
                //Image Carousel
                for ($i = 0; $i < 5; $i++)
                {
                    //echo "<img src='" . $imageURLs[$i] .
                }
            }
            
                
                
            
            if(isset($_GET['keyword']))
            {
                include 'api/pixabayAPI.php';
               // echo "You searched for " . $_GET['keyword']; 
               $imageURLs = getImageURLs($_GET['keyword']);
               $backgroundImage = $imageURLs[array_rand($imageURLs)];
               //print_r($imageURLs);
               
            }
            

        ?>
        
        <form>
            <input type = "text" name="keyword" placeholder = "Keyword" >
            <input type ="submit" value="Submit"/>
        </form>

        <br/> <br/>

    </body>
</html>