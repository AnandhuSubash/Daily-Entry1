<?php 

class  Fmartmodel extends CI_Model
{
    function register($fname,$lname,$mobile,$email,$password)
    {

    //   $query_l="insert into login values ('','$email','$password','0','')";
    //   $this->db->query($query_l);

    // //   $logid="select log_id from login where email='$email' and password='$password'";
    //   $query_r="insert into cust_reg values('','$fname', '$lname', '$mobile')";
    // $id= $this->db->insert_id();
    //   $this->db->query($query_r);
      
   
    }
    function cust_log($log)
    {
        $this->db->insert('login',$log);
        
    }

    function cust_reg($reg)
    {
        $this->db->insert('cust_reg',$reg);
    }
  
}

?>