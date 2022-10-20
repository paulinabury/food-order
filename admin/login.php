<?php include('../config/constants.php') ?>

<html>

<head>
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <div class="login">
        <h1 class="text-center">Login</h1></br></br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; //Displaing Session login Message
            unset($_SESSION['login']); //Removing Session login Message
        }
        if(isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        </br></br>

        <!-- Login form starts here -->

        <form action="" method="POST" class="text-center">
            Username:</br>
            <input type="text" name="username" placeholder="Username"></br></br>
            Password:</br>
            <input type="password" name="password" placeholder="Password"></br></br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>
        </br>
        <!-- Login form ends here -->

        <p class="text-center">Created by - Paulina Bury</p>
    </div>

</body>

</html>

<?php
//check if submit button is clicked or not
if (isset($_POST['submit'])) {
    //Process loging
    //1. Get the data from login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //SET COOKIE
    if (isset($_POST['submit'])) {
        $cookie_name = $_POST['username'];
        $cookie_value = $_POST['password'];
        setcookie($cookie_name, $cookie_value);
        if (!isset($_COOKIE[$cookie_name])) {
            echo "Cookie named '" . $cookie_name . "' is not set!";
        } else {
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
    }

    //2. sql query to check whether the user exists
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3. Execute the query
    $res = mysqli_query($conn, $sql);

    //4. Count rows to check if user exists
    $count = mysqli_num_rows($res);

    if($count == 1) {
        //user exists
        $_SESSION['login'] = "<div class='success'>Login successfull.</div>"; 
        $_SESSION['user'] = $username; //to check if user is logged in or not and logout will unset it

        //redirect to home page/Dashboard
        header('location:'.SITEURL.'admin/');
    } else {
        //user does not exists
        $_SESSION['login'] = "<div class='error text-center'>Wrong user name or password.</div>"; 
        //redirect to home page/Dashboard
        header('location:'.SITEURL.'admin/login.php');
    }
}
?>