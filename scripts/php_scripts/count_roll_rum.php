<?php
include('../../constants.php');
include_once('autoload.php');

$count_roll_numbers = new connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);
$connect = $count_roll_numbers->connect();
$_GET['admission_year'] = date('Y');

$rows = $count_roll_numbers->fetchAll_rows('admission',$_GET,'and',null,$connect);


if($rows == "false"){
    echo 0;
}
else{
    $count = mysqli_num_rows($rows);
    echo $count;
}

 
?>

