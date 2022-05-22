<?php
session_start();
include('../constants.php');
include_once('autoload.php');
$check = new connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);
$con = $check->connect();


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
    <link rel="stylesheet" href="../css/slicknav.css">
</head>
<body>
   <div class="sitelogo">
     <img src="../img/logo.png" alt="">
   </div>
    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="brand-logo">
         <img class="brand-logo-img" src="../img/logo.png" alt="">
        </div>
        <ul class="nav-list" id="menu-list-items">
            <li class="list-item"><a href="?home" class="list-link"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
            <li class="list-item dropdown">
               <a href="#" class="list-link"><i class="fa-solid fa-chalkboard-user"></i> Administrator</a>
               <ul class="menu-area">
                  <ul>
                     <h3>My School</h3>
                     <img src="../img/school_img.jpg" alt="">
                  </ul>
                  <ul>
                     <h3>Office work</h3>
                     <li><a href="?admission"><i class="fa-solid fa-chalkboard-user"></i> Admission</a></li>
                     <li><a href="?stuednts_details"><i class="fa-solid fa-magnifying-glass"></i> Student Details</a></li>
                     <li><a href=""><i class="fa-solid fa-users"></i> Staff Management</a></li>
                     <li><a href="?add_removeClasses"><i class="fa-solid fa-circle-nodes"></i> Manage Classes</a></li>
                     <li><a href="?add_removeSection"><i class="fa-solid fa-circle-nodes"></i> Manage Sections</a></li>
                     <li><a href=""><i class="fa-brands fa-gg-circle"></i> Manage Roles</a></li>
                  </ul>
                  <ul>
                     <h3>Fee</h3>
                     <li><a href="?admission"><i class="fa-solid fa-indian-rupee-sign"></i> Pay Fee</a></li>
                     <li><a href=""><i class="fa-solid fa-magnifying-glass-dollar"></i> Check Fee due</a></li>
                     <li><a href=""><i class="fa-solid fa-chart-line"></i> Total income status</a></li>
                  </ul>

                     <!-- Teachers Menu -->
                  <ul>
                     <h3>Teachers Menu</h3>
                     <li><a href=""><i class="fa-solid fa-album-collection-circle-user"></i> Profile</a></li>
                     <li><a href=""><i class="fa-solid fa-magnifying-glass-dollar"></i> Check Fee due</a></li>
                     <li><a href=""><i class="fa-solid fa-clipboard-user"></i> Attendence</a></li>
                     <li><a href=""><i class="fa-solid fa-calendar-lines-pen"></i> Home work</a></li>
                  </ul>
                   <!-- Teachers Menu End -->

               </ul>
            </li>
            
            <!-- <li class="list-item"><a href="" class="list-link"><i class="fa-solid fa-phone-flip"></i> Contact</a></li> -->
            <li class="list-item"><a href="?test" class="list-link"><i class="fa-solid fa-arrow-right-to-bracket"></i> testing</a></li>
            <li class="list-item"><a href="../scripts/php_scripts/logout.php?logout" class="list-link"><i class="fa-solid fa-arrow-right-to-bracket"></i> Logout</a></li>
            <li class="list-item search_form">
            <form action="" method="post" id="search_form">
              <div class="form-group">
                <input type="text" class="form-control" name="search" id="" />
               
              </div>
              <input class="btn-primary" type="button" value="search" id="search_btn">
            </form>
            </li>
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
                    <h2>Admission Form</h2>
                  </div>
                  
                 <input class="form-control" type="hidden" name="admission_no" value="" >
                 <input class="form-control" type="hidden" name="admission_year" value="" >
                 
                  <div class="form-group">
                     <label for="">First Name</label>
                     <input class="form-control" type="text"  placeholder="Enter your first name" name="fname" required>
                  </div>
                  <div class="form-group">
                     <label for="">Last Name</label>
                     <input class="form-control" type="text"  placeholder="Enter your last name" name="lname" required>
                  </div>
                  <div class="form-group">
                     <label for="">Father</label>
                     <input class="form-control" type="text"  placeholder="Enter your father name"  name="father" required>
                  </div>
                  <div class="form-group">
                     <label for="">Mother</label>
                     <input class="form-control" type="text" name="mother"  placeholder="Enter your mother name" required>
                  </div>
                  <div class="form-group">
                     <label for="">Aadhar</label>
                     <input class="form-control" type="number"  placeholder="Ex : 4256xxxxxxxx" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" name="aadhar" required>
                  </div>
                  <div class="form-group">
                     <label for="">Mobile</label>
                     <input class="form-control" type="number" placeholder="Ex : 9999xxxxxx"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" name="mobile" required>
                  </div>
                  <div class="form-group">
                     <label for="">Address</label>
                     <input class="form-control" type="text" placeholder="Enter Permanent Address"  name="address" required>
                  </div>
                  <div class="form-group">
                     <label for="">Previous School</label>
                     <input class="form-control" type="text" placeholder="Enter your school name" name="prevschool" required>
                  </div>
                  <div class="form-group">
                     <label for="">Email</label>
                     <input class="form-control" placeholder="example@domain.com" type="email" name="email" required>
                  </div>
                  <div class="form-group">
                     <label for="">Class</label>
                     <select name="std" id="class_std">
                        <option value="">-Select Class-</option>
                        <?php
                        
                          $rows = $check->fetchAll_rows('class',null,null,'class',$con);
                          while($options = mysqli_fetch_array($rows)){
                             echo "<option value='".$options['class']."'>".$options['class']."</option>";
                          }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                     <label for="">Section</label>
                     <select name="std_section" id="class_std_section">
                        <option value="">-Select Class-</option>
                        <?php
                        
                           $rows = $check->fetchAll_rows('section',null,null,'std_section',$con);
                           while($options = mysqli_fetch_array($rows)){
                              echo "<option value='".$options['std_section']."'>".$options['std_section']."</option>";
                           }
                        ?>
                        
                      </select>
                  </div>
                  <div class="form-group">
                     <label for="">Roll no</label>
                     <input class="form-control" value=""   id="rollno" placeholder="Generates automatically.."  type="number" name="rollno" required>
                  </div>
                  <div class="form-group">
                     <label for="">Profile Image</label>
                     <input class="form-control" type="file" accept="image/jpg,image/jpeg" name="profileImg" required>
                  </div>
                  <div class="form-group">
                     <label for="">Cast Certificate</label>
                     <input class="form-control" type="file" accept="image/jpg,image/jpeg" name="castfile" required>
                  </div>
                  
                  <div class="form-group">
                     <label for="">Aadhar</label>
                     <input class="form-control" type="file" accept="image/jpg,image/jpeg" name="aadharfile" required>
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
                  <!-- Admission Form Ends -->

          <?php  }
           
         //   Adding and removing classes
            if(isset($_GET['add_removeClasses'])){
               ?>
               
               <ul class="manageclass-container">
                  
                <!-- <li class="manageclass-items item-1">
                    <button class="add_cls" id="add_cls" >Add</button>
                </li> -->
                 
                    
                <li class="manageclass-items item-1">
                     <h4>Add and Remove Classes here</h4>
                </li>
                   
               </ul>
               
               <div class="AM-container">
               <div class="list-of-clsses"></div>
                   <form action="" method="post" id="class_form">
                      <div class="form-group">
                           <label for="">Classes :</label>
                           <input type="text" name="class" style="text-transform:uppercase;" class="std_class">
                            <button class="add_cls" id="add_cls">Add</button>
                      </div>
                      <div class="form-group" class="img_loader">
                        <img class="loader" src="../img/loader.gif" />
                     </div>
                      <div class="admission_result"></div>
                   </form>
               </div>
              

              <?php
            }
         // Adding and removing classes Ends

          //   Adding and removing sections
          if(isset($_GET['add_removeSection'])){
            ?>
            
            <ul class="manageclass-container">
               
             <!-- <li class="manageclass-items item-1">
                 <button class="add_cls" id="add_cls" >Add</button>
             </li> -->
              
                 
             <li class="manageclass-items item-1">
                  <h4>Add and Remove Sections here</h4>
             </li>
                
            </ul>
            
            <div class="AM-container">
            <div class="list-of-clsses"></div>
                <form action="" method="post" id="section_form">
                   <div class="form-group">
                        <label for="">Sections:</label>
                        <input type="text" name="std_section" style="text-transform:uppercase;" class="std_class">
                         <button class="add_cls" id="add_cls">Add</button>
                   </div>
                   <div class="form-group" class="img_loader">
                     <img class="loader" src="../img/loader.gif" />
                  </div>
                   <div class="admission_result"></div>
                </form>
            </div>
           

           <?php
         }
      // Adding and removing section Ends
         
         //Student Details 
           if(isset($_GET['stuednts_details'])){
           ?>
              <div class="container-students">
                  <div class="form-studens">
                      <form action="" method="GET">
                          <div class="form-group">
                               <select name="student_details" id="student_details">
                                <option value="">select</option>
                                
                                
                               </select>
                               <input  type="submit" class="" id="search_btn1" value="submit" />
                          </div>
                      </form>
                  </div>
              </div>
           <?php
           }
         // Students Details 



         //  Testing functionality 
           if(isset($_GET['test'])){
           ?>
              <form action="" method="GET">
                 <button type="button" id="test_btn">test</button>
              </form>
              
    
          <?php    
           }
             //  Testing functionality  Ends



          ?>


  

       

    </div>

<!-- Main Container Ends -->

     

    <!-- scripts -->
    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/jquery.slicknav.js"></script>
    <script src="../scripts/main.js"></script>
  
</body>
</html>

<?php    

}
else{

   header('Location:../');

}
?>
