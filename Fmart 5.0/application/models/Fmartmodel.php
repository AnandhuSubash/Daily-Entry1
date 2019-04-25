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


    ///////////####################******ADMIN*******###########


   
    //select all customers for admin page
    function cus_list()
    {
        $this->db->select('*')->from('cust_reg')->join('login', 'login.log_id = cust_reg.log_id');
		$query=$this->db->get();

        return $query->result();

    }

        //select all dealers for admin page

    function deal_list()
    {
        $this->db->select('*')->from('deal_reg')->join('login', 'login.log_id = deal_reg.log_id');
		$query=$this->db->get();

        return $query->result();

    }


    //approve dealers
    function approve($id)
    {
        $this->db->set('approval',1);
        $this->db->where('log_id',$id);
        $this->db->update('login');
    }


    //approval count
    function approve_count($data)
    {
        $result=$this->db->get_where('login',$data);
        return $result->num_rows();
    }


    //block dealers
    function deal_block($id)
    {
        $this->db->set('status',0);
        $this->db->where('log_id',$id);
        $this->db->update('login');
    }

    //unblock dealers

    function deal_unblock($id)
    {
        $this->db->set('status',1);
        $this->db->where('log_id',$id);
        $this->db->update('login');
    }

    //list category
    function category() 
        {
        $query=$this->db->get('f_category');
        return $query->result();
        }

    //add category
    function add_cat($value)
     {
     $this->db->insert('f_category',$value);
     }

    //delete category
    function del_cat($id)
    {
        $this->db->where('category_id',$id);
        $this->db->delete('f_category');
    }

    function f_type() 
    {
    $query=$this->db->get('f_type');
    return $query->result();
    }
    //list type
    function type() 
    {
    $this->db->select('*')->from('f_type')->join('f_category', 'f_category.category_id = f_type.category_id');
    $query=$this->db->get();

    return $query->result();
    }


    //delete type
    function del_type($id)
    {
        $this->db->where('type_id',$id);
        $this->db->delete('f_type');
    }


    //add type
    function add_type($val)
    {
        $this->db->insert('f_type',$val);
    }



    function cat_id($cat)
    {

        $this->db->select("category_id");
        $this->db->from("f_category");
        $this->db->where('c_name',$cat);
        $query = $this->db->get();
        return $query->result();

    }

//lists material
    function material() 
    {
    $query=$this->db->get('tbl_material');
    return $query->result();
    }

//delete material

    function del_material($id)
    {
        $this->db->where('material_id',$id);
        $this->db->delete('tbl_material');
    }

//add material

    function add_material($val)
    {
        $this->db->insert('tbl_material',$val);
    }

    function img($home)
    {
        $a=array('img'=>$home);
        $this->db->insert('image',$a);
    }

}

?>