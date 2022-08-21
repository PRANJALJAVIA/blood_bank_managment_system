<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db_connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
   
    $sql = "Select * from blood_bank where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
    }
    else{
        $showError = "Invalid Credentials";
    }
}

// $login = false;
// $error = false;
// session_start();
// include 'db_connection.php';

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(isset($_POST['username'])) {
//         $user = $_POST['username'];
//     }

//     if(isset($_POST['password'])) {
//         $password = $_POST['password'];
//     }

//     $sql = "SELECT * FROM blood_bank WHERE username='$user' AND password = '$password' ";
//     $result = mysqli_query($conn, $sql);
//     $check = mysqli_fetch_array($result);
//     if (isset($check)) {
//         header("Location: welcome.php");
//         $_SESSION['username'] = $_POST['username'];
//         $login = true;
//     } 
//     else{
//         $error = true;
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>login</title>

    <style>
        /* navigation bar */
        body {
            margin: 0;
        }

        .topnav {
            overflow: hidden;
            background-color: #e3f2fd;
        }
    
        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
    
        .topnav a:hover {
            background-color: black;
            color: white;
        }
        
        .topnav a.active {
            background-color: black;
            color: white;
        }
        
        .topnav .icon {
            display: none;
        }
        
        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
                float: right;
                display: block;
            }
        }
            
        @media screen and (max-width: 600px) {
            .topnav.responsive {position: relative;}
            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: center;
            }
        }

        /* for column of form */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .column {
            float: left;
            width: 100%;
            margin-top: 2%;
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

        .form {
            background-color: #e3f2fd;
        }

        input[type=text]{
            margin-top: 2%;
            margin-bottom: 2%;
            border-bottom-style: solid;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;
            background-color: #e3f2fd;
        }

        input[type=number]{
            margin-top: 2%;
            margin-bottom: 2%;
            border-bottom-style: solid;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;
            background-color: #e3f2fd;
        }

        input[type=email]{
            margin-top: 2%;
            margin-bottom: 2%;
            border-bottom-style: solid;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;
            background-color: #e3f2fd;
        }

        input[type=submit]{
            margin-top: 2%;
            background-color: #2C3333;
            color: white;
            border-radius: 2px;
            border-style: double;
            border-color: #2C3333;
            border-width: 10px;
        }

        input[type=password]{
            margin-top: 2%;
            margin-bottom: 2%;
            border-bottom-style: solid;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;
            background-color: #e3f2fd;
        }

        select {
            margin-top: 2%;
            margin-bottom: 2%;
        }

        .form-0 {
            border-style: solid;
            border-radius: 2%;
            border-color: black;
            border-width: 2px;
            margin-top: 5%;
            margin-left: 35%;
            margin-right: 35%; 
            padding-bottom: 1%;
            padding-top: 2%;
            background-color: #e3f2fd;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            /* justify-content: center;
            /* align-items: center; */
        }

        .footer {
            background-color: black;
            padding: 10px;
            text-align: center;
            margin-top: 10%;
            color:white;
        }
    </style>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <a href="welcome.php">Home</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign up</a>
        <!-- <a href="about_us.php">About us</a> -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <?php 
    if($login == true){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> You are logged in.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
    
    if($showError == true){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error! </strong> Invalid Credentials. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
    ?>

    <script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    </script>

    <div class="row">
        <div class="form-0">
            <h2><center>Login</center></h2>
            <div class="column">
                <center><img src="blood_donation.gif" alt="blood_donation" style="border-radius: 3%; border-style: solid; border-color: black;"></center>
            </div>

            <div class="column">
                <center>
                    <div class="form">
                        <form action="/blood_bank/login.php" method="POST">
                            <label for="username">User Name:</label>
                            <input type="text" placeholder="Enter your name" id="username" name="username" required><br>

                            <!-- <label for="email">Email:</label>
                            <input type="email" placeholder="Enter your email id" id="email" name="email" required><br> -->

                            <label for="password">Password:</label>
                            <input type="password" placeholder="Enter your Password" id="password" name="password" required><br>


                            <input type="submit" value="Login" name="submit">

                            <p>Not created account, please <a href="signup.php">Sign up.</a></p>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Made by: Pranjal Javia</p>
        <p>
            <i class="bi bi-c-circle"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
                <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512Z"/>
            </svg>
            Pranjal Javia 2022
        </p>
    </div>
</body>
</html>

