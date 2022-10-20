<?php include('partials/menu.php') ?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage category</h1>

        <br /><br />

        <!--Message to display when query executed successfully after adding category to db -->
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        ?>
        <br><br>

        <!-- Button to add Admin -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category </a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php

            //query to all categories from database
            $sql = "SELECT * FROM tbl_category";

            //execute query
            $res = mysqli_query($conn, $sql);

            //count rows
            $count = mysqli_num_rows($res);
            $sn = 1;
            //check whether we hava data in database
            if ($count > 0) {
                //we have data in database
                //get the data from database and display
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?>.</td>
                        <td><?php echo $title ?></td>


                        <td>
                            <?php
                            //check whether image name is avaliable
                            if ($image_name != "") {
                                //display the image
                            ?>

                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" width="100px">

                            <?php
                            } else {
                                //display the message
                                echo "<div class='error'/>Image not found.</div>";
                            }
                            ?>
                        </td>

                        <td><?php echo $featured ?></td>
                        <td><?php echo $active ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                //we dont have data in database
                //We will display the message inside table 
                ?>

                <tr>
                    <td colspan="6">
                        <div class="error">Category Not Found.</div>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>

    </div>
</div>
<!-- Main Content Section End -->

<?php include('partials/footer.php') ?>