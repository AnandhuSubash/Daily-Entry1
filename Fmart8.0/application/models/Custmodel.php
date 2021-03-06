<?php 

class  Custmodel extends CI_Model
{
    function category() 
        {
        $query=$this->db->get('f_category');
        return $query->result();
        }


    
    function f_select($c_id)
    {
        $query = $this->db->get_where('f_type', array('category_id' => $c_id));
        return $query->result();

    }

    function cust_data($log_id)
    {
        $query = $this->db->get_where('cust_reg', array('log_id' => $log_id));
        return $query->result();

    }

    function cust_d($log_id)
    {
        $this->db->select('cust_id');
        $this->db->where(array('log_id' => $log_id));
        $query=$this->db->get('cust_reg');
        $res=$query->row();
        $id=substr($res->cust_id,0);
        return $id;

    }

    function sel_furnit($value)
    {
        $query = $this->db->get_where('tbl_furniture', $value);
        return $query->result();
        // $res=$query->result();
        // $num=$query->num_rows();
        // $data=array('res'=>$res,'num'=>$num); 
        // return $data;
        // $data = array();

        // $data['query'] = $this->db->get_where('tbl_furniture', $value);
        // $data['num'] = $data['query']->num_rows();

        // return $data['query'], $data['num'];
    }

    function count_f($value)
    {
        $query = $this->db->get_where('tbl_furniture', $value);
        return $query->num_rows();
    }

    function product($f_id)
    {
        $query = $this->db->get_where('tbl_furniture', array('furniture_id'=>$f_id));
        return $query->result();  
    }

    function product_dim($f_id)
    {
        $query = $this->db->get_where('tbl_dimension', array('furniture_id'=>$f_id));
        return $query->result();  
    }
    function add_cart($data)
    {
        $this->db->insert('tbl_cart',$data);
    }

    function cart($c_id)
    {
        $query = $this->db->get_where('tbl_cart', array('cust_id' => $c_id));
        return $query->result();

    }
///check for same furniture in cart
    function f_in_cart($c_data)
    {
        $query = $this->db->get_where('tbl_cart', $c_data);
        return $query->result();

    }
} 