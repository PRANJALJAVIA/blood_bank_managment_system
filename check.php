<?php
session_start();
$num = 0;
$sql = NULL;
$result = NULL;
$row = NULL;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db_connection.php';
    $blood_group = $_POST["blood_group"];

    $sql = "SELECT username, email, age, gender, city, pincode, state FROM blood_bank WHERE blood_group = '$blood_group'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Welcome - <?php $_SESSION['username']?> </title>

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

        input[type=submit]{
            margin-top: 1%;
            margin-bottom: 3%;
            background-color: #2C3333;
            color: white;
            border-radius: 2px;
            border-style: double;
            border-color: #2C3333;
            border-width: 10px;
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
    </style>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <a href="#username">
            <i class="bi bi-person-circle"></i>Hey <?php echo $_SESSION['username'] ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
        </a>
        <a href="welcome.php">Home</a>
        <!-- <a href="login.php">Login</a>
        <a href="signup.php">Sign up</a> -->
        <a href="check.php">Check Availability</a>
        <!-- <a href="about_us.php">About us</a> -->
        <a href="logout.php">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

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

    <form action="/blood_bank/check.php" method="POST">
        <center>
        <label for="blood_group" style="border-style: solid; border-color: #2C3333; background-color: #2C3333; color: white; border-radius: 2px;">Select blood group: </label>
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
        </center>

        <center><input type="submit" value="Check Availability" name="submit"></center>
    </form>

    <table class="table" style="background-color: #e3f2fd; border-style: solid; border-color: #2C3333;">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">City</th>
                <th scope="col">Pincode</th>
                <th scope="col">State</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if($num > 0){
                $temp = 0;
                while($row = mysqli_fetch_array($result)){
                    $temp++;
            ?>
            <tr>
                <td> <?php echo $temp ?> </td>
                <td> <?php echo $row['username'] ?> </td>
                <td> <?php echo $row['email'] ?> </td>
                <td> <?php echo $row['age'] ?> </td>
                <td> <?php echo $row['gender'] ?> </td>
                <td> <?php echo $row['city'] ?> </td>
                <td> <?php echo $row['pincode'] ?> </td>
                <td> <?php echo $row['state'] ?> </td>
            </tr>
            <?php
                }
            }
            else{
                ?>
                <tr>
                    <td colspan="6">Sorry, no blood availabele for choosen group</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>


