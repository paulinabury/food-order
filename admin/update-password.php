<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Password</h1>
        </br></br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current password">
                    </td>
                </tr>

                <tr>
                    <td>New password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change password" class="btn-secondary">
                    </td>
                </tr>


            </table>
        </form>

    </div>
</div>

<?php
//Check whether the submit button is clicked
if (isset($_POST['submit'])) {
    //1. get the data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //2. check whether the user with current id and curren password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        //check whether data is avaliable
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            //user exists and password can be changed 

    //3. check whether the new password and confirm password match or not
            if ($new_password == $confirm_password) {
                //update the password
                $sql2 = "UPDATE tbl_admin SET 
                    password='$new_password'
                    WHERE id=$id
                ";
                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == TRUE) {
    //4. change password if all above is true
                    //display success message 
                    $_SESSION['change-pwd'] = "<div class='success'> Password changed. </div>";
                    //Redirect to manage-admin page
                    header("location:" . SITEURL . 'admin/manage-admin.php');

                } else {
                    //display error message
                    $_SESSION['change-pwd'] = "<div class='error'> Failed to change password. </div>";
                    //Redirect to manage-admin page
                    header("location:" . SITEURL . 'admin/manage-admin.php');
                }
            } else {
                //redirect to manage admin page with error message
                $_SESSION['pwd-not-match'] = "<div class='error'> Password did not match. </div>";
                //Redirect to manage-admin page
                header("location:" . SITEURL . 'admin/manage-admin.php');
            }
        } else {
            //user does not exists. Set message and redirect
            $_SESSION['user-not-found'] = "<div class='error'> User not found. </div>";
            //Redirect to manage-admin page
            header("location:" . SITEURL . 'admin/manage-admin.php');
        }
    }
}
?>

<?php include('partials/footer.php') ?>