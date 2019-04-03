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
		$query=$this->db->get();

        return $query->result();

    }
    function deal_list()
    {
        $this->db->select('*')->from('deal_reg')->join('login', 'login.log_id = deal_reg.log_id');
		$query=$this->db->get();

        return $query->result();

    }

    function approve($id)
    {
        $this->db->set('approval',1);
        $this->db->where('log_id',$id);
        $this->db->update('login');
    }

    function approve_count($data)
    {
        $result=$this->db->get_where('login',$data);
        return $result->num_rows();
    }
    function deal_block($id)
    {
        $this->db->set('status',0);
        $this->db->where('log_id',$id);
        $this->db->update('login');
    }

    function deal_unblock($id)
    {
        $this->db->set('status',1);
        $this->db->where('log_id',$id);
        $this->db->update('login');
    }

    function category() 
        {
        $query=$this->db->get('f_category');
        return $query->result();
        }

    function add_cat($value)
     {
     $this->db->insert('f_category',$value);
     }

    function del_cat($id)
    {
        $this->db->where('category_id',$id);
        $this->db->delete('f_category');
    }

    function type() 
    {
    $this->db->select('*')->from('f_type')->join('f_category', 'f_category.category_id = f_type.category_id');
    $query=$this->db->get();

    // $query=$this->db->get('f_type');
    return $query->result();
    }

    function del_type($id)
    {
        $this->db->where('type_id',$id);
        $this->db->delete('f_type');
    }
}

?>