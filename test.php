<?php
include('constants.php');
include_once('autoload.php');
$check = new connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);
$con = $check->connect();
echo json_encode($_POST);
// // $json_array = array();
// // $rows =  $check->fetchAll_rows('admission',['aadhar'=>'9999999999'],"and",$con) ;
// //  if($rows == "false"){
// //      echo json_encode(["message"=>"Sorry, No Data found...."]);
// //  }else{
// //     while($row = mysqli_fetch_assoc($rows)){
// //         $json_array[] = $row;
// //     }
    
// //     echo json_encode($json_array);
// //  }
// echo $check->single_insert_data('section',['std_section'=>'A'],$con);
// echo $rows;
 
?>