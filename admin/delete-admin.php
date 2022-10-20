<?php
//Include constants.php file here
include('../config/constants.php');

//1. Get the ID of Admin to be deleted
$id = $_GET['id'];

//2. create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the query
$res = mysqli_query($conn, $sql);

//Check whether the query executed successfully or not
if ($res == TRUE) {
    //Query executed Successfully and Admin deleted
    //Create Session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";

    //Redirect to Manage-admin.php page
    header('location:'.SITEURL.'admin/manage-admin.php');

} else {
    //Failed to delete Admin
    //Create Session variable to display message
    $_SESSION['delete'] = "<div class='error'>Failed to delete Admin. Try again.</div>";

    //Redirect to Manage-admin.php page
    header('location:'.SITEURL.'admin/manage-admin.php');
}

    //3. redirect to manage-admin page with message (success/error)
