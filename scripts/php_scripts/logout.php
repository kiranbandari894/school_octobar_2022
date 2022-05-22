<?php
 //   Logout start
 if(isset($_GET['logout'])){
    unset($_SESSION);
    session_destroy();
    header("Location:../../");
 }
 // Logout Ends

?>