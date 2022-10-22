<?php include('partials/menu.php') ?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage admin</h1>
        <br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaing Session Add Message
            unset($_SESSION['add']); //Removing Session Add Message
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete']; //Displaing Session Delete Message
            unset($_SESSION['delete']); //Removing Session Delete Message
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update']; //Displaing Session update Message
            unset($_SESSION['update']); //Removing Session update Message
        }

        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found']; //Displaing Session update password Message
            unset($_SESSION['user-not-found']); //Removing Session update password Message
        }

        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match']; //Displaing Session not match password Message
            unset($_SESSION['pwd-not-match']); //Removing Session not match password Message
        }

        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd']; //Displaing Session not match password Message
            unset($_SESSION['change-pwd']); //Removing Session not match password Message
        }
        ?>

        <br /><br /><br />
        <!-- Button to add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin </a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Actions</th>
            </tr>

            <?php
            //Query to get all admins
            $sql = "SELECT * FROM tbl_admin";
            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if ($res == TRUE) {
                //count rows to check whether if we have data in db
                $count = mysqli_num_rows($res); //function to get all the rows in db

                $sn = 1; //create variable and assign the value

                //check the number of rows
                if ($count > 0) {
                    //we have data in db
                    while ($rows = mysqli_fetch_assoc($res)) {
                        //using while loop to get all the data from db
                        //And while loop will execute as long as we have data in db

                        //get individual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //display the values in our table
            ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>

            <?php
                    }
                } else {
                    //We do not have data in db

                }
            }
            ?>

        </table>
    </div>
</div>
<!-- Main Content Section End -->

<?php include('partials/footer.php') ?>