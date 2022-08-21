<?php
$showAlert = false;
$temp = false;
$temp2 = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db_connection.php';
    
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $blood_group = $_POST["blood_group"];
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $pincode = mysqli_real_escape_string($conn, $_POST["pincode"]);
    $state = mysqli_real_escape_string($conn, $_POST["state"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($conn, $_POST["cpassword"]);
    $exist = false;

    // $pass = password_hash($password, PASSWORD_BCRYPT);
    // $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $same_email = "SELECT * FROM blood_bank WHERE email = '$email' ";
    $email_query = mysqli_query($conn, $same_email);

    $email_count = mysqli_num_rows($email_query);

    if($email_count > 0){
        $temp2 = true;
    }
    else{
        if(($password == $cpassword) && $exist == false){
            $sql = "INSERT INTO `blood_bank` (`username`, `age`, `gender`, `email`, `blood_group`, `city`, `pincode`, `state`, `password`, `dt`, `cpassword`) VALUES ('$username', '$age', '$gender', '$email', '$blood_group', '$city', '$pincode', '$state', '$password', current_timestamp(), '$cpassword')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        }
        else if($password != $cpassword){
            $showAlert = true;
            $temp = true;
       }
    }
}

// session_start();
// include 'db_connection.php';

// $showAlert = false;
// $showError = false;
// $exists = false;

// if($_SERVER["REQUEST_METHOD"] == "POST") {

//     if(isset($_POST['username'])) {
//         $username = $_POST['username'];
//     }

//     if(isset($_POST['age'])) {
//         $age = $_POST['age'];
//     }

//     if(isset($_POST['email'])) {
//         $email = $_POST['email'];
//     }

//     if(isset($_POST['blood_group'])) {
//         $blood_group = $_POST['blood_group'];
//     }

//     if(isset($_POST['city'])) {
//         $city = $_POST['city'];
//     }

//     if(isset($_POST['pincode'])) {
//         $pincode = $_POST['pincode'];
//     }

//     if(isset($_POST['state'])) {
//         $state = $_POST['state'];
//     }
    
//     if(isset($_POST['password'])) {
//         $password = $_POST['password'];
//         $pass = password_hash($password, PASSWORD_BCRYPT);
//     }
    
//     if(isset($_POST['cpassword'])) {
//         $cpassword = $_POST['cpassword'];
//         $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
//     }

//     $sql = "SELECT * FROM blood_bank WHERE email='$email'";
//     $result = mysqli_query($conn, $sql);
//     $num = mysqli_num_rows($result);

//     if($num == 0){
//         if(($password == $cpassword) && $exists == false) {
//             $sql = "INSERT INTO `blood_bank` (`username`, `age`, `email`, `blood_group`, `city`, `pincode`, `state`, `password`, `cpassword`) VALUES ('$username', '$age', '$email', '$blood_group', '$city', '$pincode', '$state', '$pass', '$cpass')";

//             $result = mysqli_query($conn, $sql);
//             $_SESSION['username'] = $_POST['username'];
//             if ($result) {
//                 $showAlert = true;
//             }
//         }
//         else {
//             $showError = "Passwords do not match";
//         }
//     }

//     if ($num > 0) {
//         $exists = "Username not available";
//     }

//     if ($showAlert) {

//         header("Location: welcome.php");
//     }
    
//     if ($showError) {

//         echo $showError;
//         header("Location: welcome.php");
//         exit;
//     }
    
//     if ($exists) {
//         echo $exists;
//         header("Location: welcome.php");
//         exit;    
//     }
//     
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>sign up</title>

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

        input[type=submit]{
            margin-top: 2%;
            background-color: #2C3333;
            color: white;
            border-radius: 2px;
            border-style: double;
            border-color: #2C3333;
            border-width: 10px;
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
        <a href="#home">Home</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign up</a>
        <!-- <a href="about_us.php">About us</a> -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <?php 
    if($showAlert && $temp == false){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Your account is created successfully. Now you can login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }

    if($showAlert && $temp){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Fail! </strong> Password do not match. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }

    if($temp2){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Fail! </strong> User have already created account. Please log into your account or change your mobile number and again create new account.
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
            <h2><center>Sign up</center></h2>
            <div class="column">
                <center><img src="blood_donation.gif" alt="blood_donation" style="border-radius: 3%; border-style: solid; border-color: black;"></center>
            </div>

            <div class="column">
                <center>
                    <div class="form">
                        <form action="/blood_bank/signup.php" method="POST">
                            <label for="username">User Name:</label>
                            <input type="text" placeholder="Enter your name" id="username" name="username" required><br>

                            <label for="age">Your age:</label>
                            <input type="number" placeholder="Enter your age" id="age" name="age" required><br>

                            <label for="gender">Your Gender:</label>
                            <select name="gender" id="gender">
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="others">others</option>
                            </select><br>

                            <label for="email">Your email id:</label>
                            <input type="email" placeholder="Enter your email id" id="email" name="email"><br>

                            <label for="blood_group">Choose your blood group: </label>
                            <select name="blood_group" id="blood_group">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select><br>

                            <label for="city">City:</label>
                            <input type="text" placeholder="Enter your city name" id="city" name="city" required><br>
                            
                            <label for="pincode">Pincode:</label>
                            <input type="number" placeholder="Enter pincode" id="pincode" name="pincode" required><br>

                            <label for="state">State:</label>
                            <input type="text" placeholder="Enter your state" id="state" name="state" required><br>

                            <label for="password">Creat new Password:</label>
                            <input type="password" placeholder="Create new Password" id="password" name="password" required><br>

                            <label for="cpassword">Confirm Password:</label>
                            <input type="password" placeholder="Confirm your Password" id="password" name="cpassword" required><br>

                            <input type="submit" value="Sign up" name="submit">

                            <p>Already have an account, please <a href="login.php">Login.</a></p>
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

