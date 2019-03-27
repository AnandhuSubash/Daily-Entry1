<?php 

class  Fmartmodel extends CI_Model
{
   
    function cust_log($log)
    {
        //insert user details into login tbl
        $this->db->insert('login',$log);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }
        
    

    function cust_reg($reg)
    {
         //insert user details into registration tbl
        $this->db->insert('cust_reg',$reg);
       
    }
    function deal_log($log)
    {
         //insert dealer details into login tbl
        $this->db->insert('login',$log);
        $insert_id=$this->db->insert_id();
        return $insert_id;
        
    }

    function deal_reg($reg)
    {
        //insert dealer details into registration tbl
        $this->db->insert('deal_reg',$reg);
       
    }

    function show($email)
    {
        $query=$this->db->query("select * from login where email='".$email."'");
        return $query->result();
    }

    function checklogin($email,$password)
    {
        $querys=$this->db->get_where('login',array('email'=>$email,'password'=>$password));

        // $query=$this->db->query("select * from login where email='".$email."' and password='".$password."'");
        return $querys->result();
    }

    function loguser($email,$password)
    {
        $query=$this->db->get_where('login',array('email'=>$email,'password'=>$password));
        return $query->result();
    }
//logged customer details
    function userarray($email)
    {       
        $query=$this->db->query("select `log_id` from login where email='".$email."'");

        // $query=$this->db->query("select log_id from login where email='".$email."'");
        // $query2=$this->db->get_where('cust_reg',array('log_id'=>$query));
        return $query->result();
    }

    //logged-in user details from registration table
    function regdata($logid)
    {
        $query2=$this->db->query("select * from deal_reg where log_id='".$logid."'");
        // get_where('cust_reg',array('log_id'=>$logid));
        return $query->result();

    }

    function deal_data($log_id)
    {
        $query=$this->db->get_where('deal_reg',array('log_id'=>$log_id));
        return $query->result();
    }

    function cust_data($log_id)
    {
        $query=$this->db->get_where('cust_reg',array('log_id'=>$log_id));
        return $query->result();
    }
   
    //select all customers for admin page
    function cus_list()
    {
        $this->db->select('*')->from('cust_reg')->join('login', 'login.log_id = cust_reg.log_id');
        // $this->db->join('cust_reg','login.log_id=cust_reg.log_id','inner');
		$query=$this->db->get();

        // $query=$this->db->query("select * from cust_reg");
        return $query->result();

    }
    function deal_list()
    {
        $this->db->select('*')->from('deal_reg')->join('login', 'login.log_id = deal_reg.log_id');
        // $this->db->join('cust_reg','login.log_id=cust_reg.log_id','inner');
		$query=$this->db->get();

        // $query=$this->db->query("select * from cust_reg");
        return $query->result();

    }
}

?>