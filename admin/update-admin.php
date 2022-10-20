<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        </br></br>

        <!-- Get details of current Admin -->
        <?php
        //1. Get the ID of selected Admin
        $id = $_GET['id'];

        //2. Create sql query to get the details 
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //check if query is executed
        if ($res == TRUE) {
            //check whether the data is avaliable
            $count = mysqli_num_rows($res);

            //check whether we have admin data or not
            if ($count == 1) {
                //Get the details
                $row = mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                //Redirect to manage-admin.php page
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value=<?php echo $full_name; ?>></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input type="text" name="username" value=<?php echo $username; ?>></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php') ?>

<?php
//Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    //Get all the values from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //Create sql query to update admin
    $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id' 
    ";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        //Admin updated
        $_SESSION['update'] = "<div class='success'>Admin updated successfully. </div>";
        //Redirect to manage-admin page
        header("location:" . SITEURL . 'admin/manage-admin.php');

    } else {
        //Failed to update Admin
        $_SESSION['update'] = "<div class='error'>Failed to update Admin. Try Again. </div>";
    }
}


?>