<!DOCTYPE html>
<html lang="en">
  <head>
  

    <title>DC Universe Weapon Selecotr</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <!-- Creates login form -->
      <form class="form-signin" method="post" action="../final_project/Login/loginProcess.php">
        <h2 class="form-signin-heading">DC Weapons Admin Login</h2>
        
        <?php
        session_start();
        
        // Prints error message if there was an incorrect login
        if(isset($_SESSION['errorMessage']))
        {
          echo $_SESSION['errorMessage'];
          $_SESSION['errorMessage'] = null;
        }
        ?>
        
        <label for="inputUsername" class = "sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="login" name="loginForm">Sign in</button>
        <p><a href="../final_project/Login/createAccount.php">Create Account<br></a>
        <a href="../final_project/Login/guestLogin.php">Continue as Guest</a></p>
      </form>

    </div> 


  </body>
</html>