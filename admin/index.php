<?php
session_start();
// include_once('../constants.php');
// // include_once('../scripts/php/db_connect_class.php');
// // include_once('../scripts/php/connect.php');
// include_once('../autoload.php');
// echo "<pre>";
// print_r();
// echo "</pre>";
if(!empty($_SESSION['user_data']['email'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/all.css">
</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="brand-logo">
           Logo
        </div>
        <ul class="nav-list" id="menu-list-items">
            <li class="list-item"><a href="?home" class="list-link"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
            <li class="list-item"><a href="?admission" class="list-link"><i class="fa-solid fa-chalkboard-user"></i> Admission</a></li>
            <li class="list-item"><a href="" class="list-link"><i class="fa-solid fa-users"></i> Staff Management</a></li>
            <!-- <li class="list-item"><a href="" class="list-link"><i class="fa-solid fa-phone-flip"></i> Contact</a></li> -->
            <li class="list-item"><a href="?logout" class="list-link"><i class="fa-solid fa-arrow-right-to-bracket"></i> Logout</a></li>
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
        
        <!-- Home -->
        <div class="">
             
        </div>
        <!-- Home Ends -->

        <!-- Admission Form -->
        <?php if(isset($_GET['admission'])){ ?>
          <div class="Admission">
              <form class="Admission-Form" action="" method="post" enctype="multipart/form-data" >
                  <div class="form-header">
                    <h2>Admission</h2>
                  </div>
                  
                 <input class="form-control" type="hidden" name="admission_no" value="" required>
                 
                  <div class="form-group">
                     <label for="">First Name</label>
                     <input class="form-control" type="text" name="fname" required>
                  </div>
                  <div class="form-group">
                     <label for="">Last Name</label>
                     <input class="form-control" type="text" name="lname" required>
                  </div>
                  <div class="form-group">
                     <label for="">Father</label>
                     <input class="form-control" type="text"  name="father" required>
                  </div>
                  <div class="form-group">
                     <label for="">Mother</label>
                     <input class="form-control" type="text" name="mother" required>
                  </div>
                  <div class="form-group">
                     <label for="">Aadhar</label>
                     <input class="form-control" type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" name="aadhar" required>
                  </div>
                  <div class="form-group">
                     <label for="">Mobile</label>
                     <input class="form-control" type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" name="mobile" required>
                  </div>
                  <div class="form-group">
                     <label for="">Address</label>
                     <input class="form-control" type="text" name="address" required>
                  </div>
                  <div class="form-group">
                     <label for="">Previous School</label>
                     <input class="form-control" type="text" name="prevschool" required>
                  </div>
                  <div class="form-group">
                     <label for="">Email</label>
                     <input class="form-control" type="email" name="email" required>
                  </div>
                  <div class="form-group">
                     <label for="">Profile Image</label>
                     <input class="form-control" type="file" name="profileImg" required>
                  </div>
                  <div class="form-group">
                     <label for="">Cast Certificate</label>
                     <input class="form-control" type="file" name="castfile" required>
                  </div>
                  <div class="form-group">
                     <label for="">Aadhar</label>
                     <input class="form-control" type="file" name="aadharfile" required>
                  </div>
                  <div class="form-group" class="img_loader">
                  <img class="loader" src="../img/loader.gif" />
                  </div>
                  <div class="form-group" style="justify-content:center;">
                     <input class="" type="submit" name="submit" value="submit">
                  </div>
                  <div class="admission_result"></div>
              </form>
          </div>
          <?php  }  ?>
        <!-- Admission Form Ends -->

       

    </div>

<!-- Main Container Ends -->

     

    <!-- scripts -->
    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/main.js"></script>


    <script>
        $(document).ready(function(){
            // hamburger menu toggle
           $(".menu").click(function(){
               $(".nav-list").slideToggle("slow");
           });


      //   saving admission form start
         $(document).on("submit",".Admission-Form",function(e){
            e.preventDefault();
            $('.loader').css('display','block');
            var data = new FormData(this);
            $.ajax({
               url : "../scripts/php_scripts/actions.php",
               method : "POST",
               data : data,
               processData : false,
               contentType : false,
               success : function(data){
                  $('.loader').css('display','none');
                  // var data = JSON.parse(data);
                //  console.log(data);
                $('.admission_result').html("<p>"+data+"</p>");
               }

            });
         });

      // saving admission form Ends

        });
    </script>
    <!-- scripts end -->
</body>
</html>

<?php    
if(isset($_GET['logout'])){
   unset($_SESSION);
   session_destroy();
   header("Location:../");
}
}
else{

   header('Location:../');

}
?>