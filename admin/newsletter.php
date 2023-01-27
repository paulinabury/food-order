<?php include('partials/menu.php') ?>

<!-- Main Content Section Start -->
<style>
    * {
        box-sizing: border-box;
        margin: 0;
    }

    h1 {
        font-family: 'Courier New', Courier, monospace;
        font-size: 36px;
        font-weight: bold;
        color: black;
        text-align: left;
    }

    button {
        /* remove default behavior */
        appearance: none;
        -webkit-appearance: none;

        padding: 10px;
        border: none;
        background-color: #3F51B5;
        color: #fff;
        font-weight: 600;
        border-radius: 5px;
        width: 30%;
        transition-duration: 0.4s;
        box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.16);
    }

    #input-text {
        padding: 10px;
        border: 2px solid #eee;
        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
        border-radius: 10px;
        width: 100%;
    }

    select {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
        border: 2px solid #eee;
    }

    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        margin-right: 12px;
        cursor: pointer;
        font-size: 12px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.16);

    }

    /* Hide the browser's default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 12px;
        width: 12px;
        background-color: #eee;
        box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
        border-radius: 1px;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
    }

    button:hover {
        background-color: #626fb9;
        cursor: pointer;
    }

    .content {
        margin: 5%;
        width: 50%;
        border: 1px solid grey;
        padding: 10px;
    }

    .topnav {
        background-color: #333;
        overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
        background-color: #586cf2;
        color: white;
    }

    input[type=range] {
        -webkit-appearance: none;
        margin: 10px 0;
        /* width: 100%; */
    }

    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 12.8px;
        cursor: pointer;
        background: #3b3b3b;
        border-radius: 25px;
        border: 0px solid #000101;
    }

    input[type=range]::-webkit-slider-thumb {
        height: 10px;
        width: 10px;
        border-radius: 10px;
        background: #dad7d7;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: 1.4px;
    }
</style>

<div class="main-content">
    <div class="wrapper">
        <h1>Zapisz się do naszego Newslettera!</h1>
        <br /><br />
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; //Displaing Session login Message
            unset($_SESSION['login']); //Removing Session login Message
        }
        ?>

        <div class="content">
            <form>

                <table>
                    <tr>
                        <!-- <td>Full name:</td> -->
                        <td><input type="text" placeholder="Twoje Imie" id="input-text"></td>
                    </tr>
                    <tr>
                        <!-- <td>Adress:</td> -->
                        <td><input type="email" placeholder="Your Email Adress" id="input-text"><br><br></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cars">
                                <p>Skąd się o nas dowiedziałeś?</p>
                            </label>
                            <select id="cars" name="cars">
                                <option value="">Z Facebook</option>
                                <option value="">Od znajomego</option>
                                <option value="">Z reklamy na YouTube</option>
                                <option value="">Inne</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><br>
                            <label for="spiciness">Jak często chcesz dostawać od nas wiadomości?</label><br>
                            <input type="range" id="spiciness" name="spiciness" min="0" max="10">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Wybierz swój przedział wiekowy:</p>
                            <input type="radio" id="age1" name="age" value="30">
                            <label for="age1">0 - 30</label><br>
                            <input type="radio" id="age2" name="age" value="60">
                            <label for="age2">31 - 60</label><br>
                            <input type="radio" id="age3" name="age" value="100">
                            <label for="age3">61 - 100</label><br><br>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <label class="container">Akceptuje regulamin
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><br><br>
                            <button onclick='confirm("Potwierdź zapis!");'>Zapisz się!</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include('partials/footer.php') ?>