<?php
date_default_timezone_set("Asia/kolkata");
class connect extends db_connect_class{
  private $con ;
  private $table;
  private $user_input;

  protected function connect_connection(){
      $this->con = mysqli_connect($this->host_name,$this->user_name,$this->password,$this->db_name);
     return $this->con;
  }
//   first connect to connection 
  public function connect(){
     return  $this->connect_connection();
  }
// Check user exist or not 
public function check_user($table,$username,$password,$connection){
    $this->con = $connection; 
    $query = "SELECT * FROM users where email='$username' and password='$password'";
    $run_query = mysqli_query($this->con,$query);
    if(mysqli_num_rows($run_query) > 0 ){
        return mysqli_fetch_array($run_query);
    }else{
        return "false";
    }
}

// check record user exist or not
public function check_user_exist($table=null,$input_data=null,$connection=null){
    $this->table = $table;
    $this->user_input = $input_data;
    $this->con = $connection;
    $query = "SELECT * FROM $this->table where aadhar='$this->user_input'";
    $run_query = mysqli_query($this->con,$query);
    if(mysqli_num_rows($run_query) > 0){
      return "true";
    }else{
      return "false";
    }
}
//   insert data
  public function insert_data($table,array $form_data,$connection){
      $this->con = $connection;
      $form_data['admission_no'] = "ADM".substr($form_data['aadhar'],7,12).date('dmY');
     
      $this->table = $table;
      $this->user_input = $form_data['aadhar'];
      $res = $this->check_user_exist($this->table,$this->user_input,$this->con);
      if($res == "true"){
        return "false";
      }
      else{
         $key_values = implode(',',array_keys($form_data));
         $ins_values = implode("','",array_values($form_data));
        $insert_query =  "INSERT INTO $table ($key_values) values ('$ins_values')";
        $run = mysqli_query($this->con,$insert_query);
        if($run){
          return "success";
          
        }else{
          return "fail";
        }
      }
  }

// Compress and resize image
public function compress_img($file,$max_resolution,$connection){
     if(file_exists($file)){
         $original_image = imagecreatefromjpeg($file);
        //  resolution 
         $original_width = imagesx($original_image);
         $original_height = imagesy($original_image);
        //  decrease width first
        $ratio = $max_resolution/$original_width ;
        $new_width = $max_resolution;
        $new_height = $original_height*$ratio ;

        if($new_height > $max_resolution){
            $ratio = $max_resolution/$original_height;
            $new_height = $max_resolution;
            $new_width =  $original_width*$ratio; 
        }

        if($original_image){
            $new_image = imagecreatetruecolor($new_width,$new_height);
            imagecopyresampled($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
            imagejpeg($new_image,$file,50);
        }
     }
}


  public function __destruct(){
    mysqli_close($this->con);
  }

}
?>