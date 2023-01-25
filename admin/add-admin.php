<?php include('partials/menu.php') ?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /><br />
        <?php
        if (isset($_SESSION['add'])) { //Checking whether Session is set or not
            echo $_SESSION['add']; //Displaing Session Message
            unset($_SESSION['add']); //Removing Session Message
        }
        ?>
        <br /><br />
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Your Name"></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php
//Process the value from form and save it in Database
//Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    // Button clicked

    //1. Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with md5

    //2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    //3. Execute the sql query and save data in the database
    $res = mysqli_query($conn, $sql) or die(mysqli_error()); //Result of query execution

    //4. Check whether the data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data inserted
        //Create a Session Variable to display message
        $_SESSION['add'] = "<div class='success'>Admin added successfully.</div>";
        //Redirect page to Manage Admin
        header("location:" . SITEURL . 'admin/manage-admin.php');
    } else {
        //Failed to insert the data
        //Create a Session Variable to display message
        $_SESSION['add'] = "<div class='error'>Failed to add Admin.</div>";
        //Redirect page to Add Admin
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}
?>