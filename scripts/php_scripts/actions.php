<?php
include('../../constants.php');
include_once('autoload.php');
// echo json_encode($_POST);
$insert_obj = new connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);
$connect = $insert_obj->connect();
// admission start
$data = $_POST;
foreach($_FILES as $value=>$file){
  //  print_r($file);
  $image_name = $file['name'];
  $data[$value] = $image_name;
}
if($insert_obj->insert_data("admission",$data,$connect) == "success"){
 
   foreach($_FILES as $value=>$file){

    $image_name = $file['name'];
    $img_tmp_name =$file['tmp_name'];

    $directory = '../../img/documents/';
    $file_name = $directory.$image_name;

    move_uploaded_file($img_tmp_name,$file_name);
    $insert_obj->compress_img($file_name,500,$connect);
   }
   echo "Admission has successfully created.";
}elseif($insert_obj->insert_data("admission",$data,$connect) == "false"){
    echo "Admission already exist with same Aadhar No.";
}else{
    echo "Something went wrong...not inserted";
}
// admission end
?>
