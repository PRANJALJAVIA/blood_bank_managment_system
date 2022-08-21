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

        /* .column img {
            width: 25%;
            height: 5%;
        } */

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }
    </style>
</head>
<?php
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
?>
    <body>
        <div class="topnav" id="myTopnav">
            <!-- <a href="#username">
                <i class="bi bi-person-circle"></i>Hey <?php echo $_SESSION['username'] ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a> -->
            <a href="welcome.php">Home</a>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign up</a>
            <!-- <a href="check.php">Check Availability</a> -->
            <a href="about_us.php">About us</a>
            <!-- <a href="logout.php">Log out</a> -->
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

        <div class="row">
            <div class="column">
                <center><img src="pranjal.jpeg" style="border-radius: 100%; border-color: black" ></center>
            </div>
        </div>
</body>
<?php
}
?>
</html>


