<?php

class db_connect_class{
    protected $host_name;
    protected $user_name;
    protected $password;
    protected $db_name;
 
    function __construct($host=null,$user=null,$pass=null,$db=null){
        $this->host_name = $host ;
        $this->user_name = $user ;
        $this->password = $pass ;
        $this->db_name = $db ;
    } 
}
?>
 