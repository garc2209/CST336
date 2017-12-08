<?php 
    session_start(); // Start or resume an existing session 
    
    // Set session username and send to simulator
    $_SESSION['username'] = "User";
    $_SESSION['user_type_id'] = 2;
    header("Location: ../../final_project/Simulator/simulator.php"); 
?>