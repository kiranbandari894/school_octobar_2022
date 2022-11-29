<?php
// error_reporting(E_ALL);
header("Cache-Control: no-cache");
session_start();
include_once('constants.php');
include_once('autoload.php');
$connection = new connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);
$connect = $connection->connect();
if(isset($_POST['submit'])){
   
    $username = $_POST['email'];
    $password = md5($_POST['password']);
   
    $res = $connection->check_user("users",$username,$password,$connect);
    if($res == "false"){
        header("Location:error_pages/no_user.php");
    }else{
       if($res['user_type'] == "admin"){
         $_SESSION['user_data'] = $res;  
         header('Location:admin/?home');
       }
      
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/slicknav.css">
</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="brand-logo">
           Logo
        </div>
        <ul class="nav-list" id="menu-list-items">
            <li class="list-item"><a href="index.php" class="list-link"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
            <li class="list-item"><a href="" class="list-link"><i class="fa-solid fa-circle-info"></i> About Us</a></li>
            <li class="list-item"><a href="" class="list-link"><i class="fa-solid fa-phone-flip"></i> Contact</a></li>
            <li class="list-item"><a href="?login" class="list-link"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a></li>
        </ul>
        <div class="menu">
           <div class="menu-line"></div>
           <div class="menu-line"></div>
           <div class="menu-line"></div>
        </div>
    </nav>
    <!-- Navbar Ends -->
    

    <!-- Main Container -->
    <div class="container">

       <!-- Notifications -->
        <div class="notification">
           <marquee behavior="" direction="">This is testing text for Notification</marquee>
        </div>
        <!-- Notifications End -->

        <h1>Kiran Kumar</h1>
        <!-- Slider -->
          <!-- <div class="slider-outer">
          <i class="fa-solid fa-circle-chevron-left prev"></i>
            <div class="slider-inner">
                <div class="slider-item">
                    <img src="img/1.jpg" alt="" class="active">
                    <img src="img/2.jpg" alt="">
                    <img src="img/3.jpg" alt="">
                </div>
            </div>
          <i class="fa-solid fa-circle-chevron-right next"></i>
          </div> -->
        <!-- Slider End -->
 
    <!-- Login form start -->
     <?php if(isset($_GET['login'])){ ?> 
    <div class="form-block">
        <form class="login_form" action="" method="post">
            <div class="form-group">
                <label class="input-title" for="">User Name</label>
                <input class="form-control" type="text" name="email" placeholder="example@gmail.com">
            </div>
            <div class="form-group">
                <label class="input-title"  for="">Password</label>
                <input class="form-control" type="password" placeholder="************" name="password" required>
            </div>
            <div class="form-group">
              
                <input type="submit" name="submit">
            </div>
        </form>
    </div>
     <?php }  ?> 
  <!-- Login form Ends -->
    </div>

<!-- Main Container Ends -->

     

    <!-- scripts -->
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/jquery.slicknav.js"></script>
    <script src="scripts/main.js"></script>
    

    <script>
        $(document).ready(function(){
            // hamburger menu toggle
        //    $(".menu").click(function(){
        //        $(".nav-list").slideToggle("slow");
        //    });
        $('.nav-list').slicknav();
        });
    </script>
    <!-- scripts end -->
</body>
</html>