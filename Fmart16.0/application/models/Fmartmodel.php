<?php 

class  Fmartmodel extends CI_Model
{
   
    public function products()
    {
        $query=$this->db->get_where('tbl_furniture',array('status'=>1));
        return $query->result();
    }

    public function product_details($fid)
    {
        $query=$this->db->get_where('tbl_furniture',array('furniture_id'=>$fid));
        return $query->result();
    }

    function product_dim($f_id)
    {

        $query = $this->db->get_where('tbl_dimension', array('furniture_id'=>$f_id));
        return $query->result();  
    }

    function product_cat($c_id)
    {
        $this->db->select('c_name');
        $this->db->where(array('category_id' => $c_id));
        $query=$this->db->get('f_category');
        $res=$query->row();
        $c_name=substr($res->c_name,0);
        return $c_name; 
    }

    function product_type($t_id)
    {
        $this->db->select('t_name');
        $this->db->where(array('type_id' => $t_id));
        $query=$this->db->get('f_type');
        $res=$query->row();
        $t_name=substr($res->t_name,0);
        return $t_name; 
    }
    function product_mat($m_id)
    {  
        $this->db->select('material');
        $this->db->where(array('material_id' => $m_id));
        $query=$this->db->get('tbl_material');
        $res=$query->row();
        $material=substr($res->material,0);
        return $material; 
    }
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


    function category() 
    {
    $query=$this->db->get('f_category');
    return $query->result();
    }

    function img($home)
    {
        $a=array('img'=>$home);
        $this->db->insert('image',$a);
    }

    function f_select($c_id)
    {
        $query = $this->db->get_where('f_type', array('category_id' => $c_id));
        return $query->result();

    }

    function sel_furnit($value)
    {
        $query = $this->db->get_where('tbl_furniture', $value);
        return $query->result();
    }

    function count_f($value)
    {
        $query = $this->db->get_where('tbl_furniture', $value);
        return $query->num_rows();
    }

    function cart_count($c_id)
    {
        $query=$this->db->get_where('tbl_cart',array('cust_id'=>$c_id));
        return $query->num_rows();
    }
    function state()
    {
        $query=$this->db->get('tbl_state');
        return $query->result();
    }

    function sel_district($s_id)
    {
            $querys=$this->db->query("select * from tbl_district where sid='".$s_id."' ");

        // $querys=$this->db->get_where('f_type',array('category_id'=>$cat));
        return $querys->result();

    }
    function view_state($s_id)
    {
        $this->db->select('sname');
        $this->db->where(array('id' => $s_id));
        $query=$this->db->get('tbl_state');
        $res=$query->row();
        $name=substr($res->sname,0);
        return $name;
    }

    function view_district($d_id)
    {
        $this->db->select('dname');
        $this->db->where(array('did' => $d_id));
        $query=$this->db->get('tbl_district');
        $res=$query->row();
        $name=substr($res->dname,0);
        return $name;
    }



}

?>