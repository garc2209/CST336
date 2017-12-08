<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Create User</title>

    <!-- Bootstrap core CSS -->
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../../final_project/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <!-- Creates account creation form -->
      <form class="form-signin" method="post" action="createAccountProcess.php">
        <h2 class="form-signin-heading">Create Account</h2>
        
        <?php
        session_start();
        
        // Prints error message if username is taken
        if(isset($_SESSION['errorMessage']))
        {
          echo $_SESSION['errorMessage'];
          $_SESSION['errorMessage'] = null;
        }
        ?>
        
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="createAccount" name="createAccountForm">Create User</button>
        <p><a href="../../final_project/index.php">Return to Login Page<br></a>
      </form>

    </div> <!-- /container -->


   
  </body>
</html>