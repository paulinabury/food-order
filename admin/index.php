<?php include('partials/menu.php') ?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>

        </br></br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; //Displaing Session login Message
            unset($_SESSION['login']); //Removing Session login Message
        }
        ?>
        </br></br>

        <div class="col-4 text-center">
            <h2>Admin</h2> </br>
            <a href="<?php echo SITEURL; ?>admin/manage-admin.php" class="btn-primary">Manage Admin </a>
            </br></br>
            <a href="<?php echo SITEURL; ?>admin/add-admin.php" class="btn-secondary">Add Admin </a>


        </div>

        <div class="col-4 text-center">

            <h2> Categories</h2></br>
            <a href="<?php echo SITEURL; ?>admin/manage-category.php" class="btn-primary">Manage Category </a>
            </br></br>
            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-secondary">Add Category </a>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php include('partials/footer.php') ?>