<?php 
require_once("DBConnection.php"); 
include("functions.php");
session_start();
?>

<?php

 	if (isset($_POST['login'])) {
	 	if (!empty($_POST['username']) && !empty($_POST['password'])) {
	 		$username = mysqli_real_escape_string($conn,$_POST['username']);
	 		$pass = mysqli_real_escape_string($conn,$_POST['password']);

            $login = login($username,$pass,$conn);          
	 	}
	 	else{
		 	echo "Required All fields!";
		} 	
 	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Online Leave Application</title>
    <style>
        #invalidMsg{
            display:none;
        }
    </style>
</head>
     

<body>

    <!-- header -->
    <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
         <h4>Sign in</h4>
                <hr>
                <form method="POST" class="loginForm">
                <div class="alert alert-danger" id="invalidMsg">
                    <?php      
                        if(isset($_POST['login'])){
                            if($login == false)
                                echo "<script type='text/javascript'>document.getElementById('invalidMsg').style.display = 'block';</script>";
                                echo "Invalid Username or Password";
                        }
                        else
                            echo "";
                    ?>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="username" name="username" placeholder="Enter RollNo" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password"
                            required>
                    </div>
                    <input type="submit" class="btn btn-success" name="login" value="Log In">
                </form>
            </div>
            <!-- rightComponent ends -->
        </div>
    </div>
</body>
</html>

<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
?>