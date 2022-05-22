<?php
date_default_timezone_set("Asia/kolkata");
class connect extends db_connect_class{
  private $con ;
  private $table;
  private $user_input;
  private $count;
  private $std;
  private $res;
  private $query;
  private $total_count;
  private $whre_values;
 

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
    $this->table = $table;
    $query = "SELECT * FROM users where email='$username' and password='$password'";
    $run_query = mysqli_query($this->con,$query);
    if(mysqli_num_rows($run_query) > 0 ){
        return mysqli_fetch_array($run_query);
    }else{
        return "false";
    }
}
// This method used to fetch all the rows in the table with where or without where condition
public function fetchAll_rows($table=null,array $values=null,$operator=null,$orderby=null,$con){
  $this->table = $table;
  $this->con = $con;
  // $this->std = $class;
  // $this->section = $section;
  $Collectin_values = [];

  if(empty($values) || $values == null && empty($operator) || $operator == null){
    if(empty($orderby) || $orderby == null){
      $this->query = "SELECT * FROM  $this->table";   
    }else{
      $this->query  = "SELECT * FROM  $this->table ORDER BY $orderby ";
    }
    $run_query = mysqli_query($this->con, $this->query);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
      return $run_query ;
    }else{
      return "No data found...";
    } 
  }else{
    
     if(array_count_values($values) == 1){
         $this->whre_values =  implode(" ",$values);
     }
     else{
      foreach($values as $key=>$value){
        array_push($Collectin_values,"$key='$value'");
      }
    
       $this->whre_values =  implode(" $operator ",$Collectin_values);
     }
  //     return $whre_values;
      $query = "SELECT * FROM  $this->table where $this->whre_values ";
      $run_query = mysqli_query($this->con,$query);
      $count = mysqli_num_rows($run_query);
      if($count > 0){
        return $run_query ;
      }else{
        return "false";
      }
  }

}
// check record user exist or not
public function check_user_exist($table=null,$key_val,$input_data=null,$connection=null){
    $this->table = $table;
    $this->user_input = $input_data;
    $this->con = $connection;
    $query = "SELECT * FROM $this->table where $key_val='$this->user_input'";
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
      $form_data['admission_year'] = date('Y');
      $this->table = $table;
      $this->user_input = $form_data['aadhar'];
      $res = $this->check_user_exist($this->table,'aadhar',$this->user_input,$this->con);
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
public function Count_table_rows($table,$count=null,$connection){
  $this->table = $table;
  $this->con = $connection;
  $this->count = $count;
  $query = "SELECT * FROM $this->table";
  $run = mysqli_query($this->con,$query);
  $count_rows = mysqli_num_rows($run) ;
  return $count_rows;

}
// Single value insert 
 public function single_insert_data($table,array $form_data,$connection){
   $this->con = $connection;
   $this->table = $table;
   if(array_key_exists('class',$form_data)){
      $this->user_input = $form_data['class'];
      $this->res = $this->check_user_exist($this->table,'class',$this->user_input,$this->con);
    }else{
      $this->user_input = $form_data['std_section'];
      $this->res = $this->check_user_exist($this->table,'std_section',$this->user_input,$this->con);
    }
    
 
   if($this->res == "true"){
    return "false";
   }else{
    
    if(array_key_exists('class',$form_data)){ 
      $this->total_count = $this->Count_table_rows('class',"",$this->con);
    }else{
      $this->total_count = $this->Count_table_rows('section',"",$this->con);
    }
    
    if($this->total_count >= 13){
      return "Only allows 13 entries [ nursary - 10th ] ";
    }else{
      $key_values = strtoupper(implode(' ',array_keys($form_data)));
      $ins_values = strtoupper(implode(" ",array_values($form_data)));
      $insert_query =  "INSERT INTO $table ($key_values) values ('$ins_values')";
      $run = mysqli_query($this->con,$insert_query);
      if($run){
        return "success";
        
      }else{
        return "fail";
      }
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