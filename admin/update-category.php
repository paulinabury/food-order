<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>

        <!-- Get details of current Category -->
        <?php
        //1. Get the ID of selected Category
        $id = $_GET['id'];

        //2. Create sql query to get the details
        $sql = "SELECT * FROM tbl_category WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //check if query is executed
        if ($res == TRUE) {
            //check whether the data is avaliable
            $count = mysqli_num_rows($res);

            //check whether we have category data or not
            if ($count == 1) {
                //Get the details
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {
                header('location:' . SITEURL . 'category/manage-category.php');
            }
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" value=<?php echo $title ?>></td>
                </tr>
                <tr>
                    <td>Image name: </td>
                    <td><input type="file" name="image" value=<?php echo $image_name ?>></td>
                </tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value=<?php echo $featured ?>> Yes
                    <input type="radio" name="featured" value=<?php echo $active ?>> No
                </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php') ?>