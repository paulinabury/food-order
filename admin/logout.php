<?php 
    //include contstants.php for SITEURL
    include('../config/constants.php');

    //1. Kill the session
    session_destroy(); //unsets $_SESSION['user']

    //2. Redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>