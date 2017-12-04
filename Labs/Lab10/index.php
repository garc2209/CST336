
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet"> 



<script>
    $(document).ready(function()
    {
        $("img").on("click", function()
        {
            if($("#focus").length != 0 ){
                
                $("#focus").attr('id', '');
            }   
            
            $(this).attr('id','focus');
        });
        
    });
    
    
</script>


<style>
    #focus {
        width: 400px;
        height: 400px;
    }
</style>




    </head>
    <body>
 <style>
        body{
            background-color:black;
            color: white;
            font-family: 'Inconsolata', monospace;
        }
          h2
          {
                margin-left: 350px;
          }
                      
             #wrapper
            {
                width: 1000px;
            
            	margin: 0px auto;
            
            	border-radius: 25px;
            
            	background-color: black;
            
            	padding: 20px;
            	
            	border-style: solid;
            	 border-width: 5px;
            }

          
          
          
        </style>
    <div id = "wrapper"> 
    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" /> 
        
        <input type="submit" value="Upload File!" />

    </form>
 

<?php
echo"File Size :" . $_FILES['myFile']['size'] ."<br><br>";
if($_FILES['myFile']['size'] > 100000000){
       echo " <br> <h2> Image Too Big </h2>";
   // header('Location:index.php');
   
}
else{
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/". $_FILES["myFile"]["name"] );
    
    $files = scandir("gallery/",1);
    for($i =0; $i < count($files)-2 ; $i++){
        echo "<img src='gallery/". $files[$i] . "' width='50' class='pics'>";
    }
}

?>

</div>

    </body>
</html>