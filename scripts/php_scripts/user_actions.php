<?php

include('../../constants.php');
include_once('autoload.php');

$insert_obj = new connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);
$connect = $insert_obj->connect();
 
$data = $_POST;
if($output = $insert_obj->single_insert_data("class",$data,$connect) == "success"){
        echo "Successfully Inserted...";
}elseif($insert_obj->single_insert_data("class",$data,$connect) == "false"){
    echo "Class already exist..";  

}else{
    echo $insert_obj->single_insert_data("class",$data,$connect);
}
// print_r($_POST);

?>