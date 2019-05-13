<?php 

class  Custmodel extends CI_Model
{
    function category() 
        {
        $query=$this->db->get('f_category');
        return $query->result();
        }


        public function products()
    {
        $query=$this->db->get_where('tbl_furniture',array('status'=>1));
        return $query->result();
    }
    
    function f_select($c_id)
    {
        $query = $this->db->get_where('f_type', array('category_id' => $c_id));
        return $query->result();

    }

    function cust_profile($cust_id)
    {
        $query = $this->db->get_where('cust_reg', array('cust_id' => $cust_id));
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

    function cust_profile_status($log_id)
    {
        $this->db->select('addr_status');
        $this->db->where(array('log_id' => $log_id));
        $query=$this->db->get('cust_reg');
        $res=$query->row();
        $id=substr($res->addr_status,0);
        return $id;

    }
    function update_profile($c_id,$value)
    {
        $this->db->set($value);
        $this->db->where(array('cust_id'=>$c_id));
        $this->db->update('cust_reg');
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

    function del_cart($item)
    {
        $this->db->where($item);
        $this->db->delete('tbl_cart');
    }
    function cart($c_id)
    {
        $query = $this->db->get_where('tbl_cart', array('cust_id' => $c_id));
        return $query->result();

    }

    function cart_count($c_id)
    {
        $query=$this->db->get_where('tbl_cart',array('cust_id'=>$c_id));
        return $query->num_rows();
    }
///check for same furniture in cart
    function f_in_cart($c_data)
    {
        $query = $this->db->get_where('tbl_cart', $c_data);
        return $query->result();

    }
    function update_cart($f_id,$cust_id,$quantity,$rate)
    {
        $this->db->set(array('quantity'=>$quantity,'rate'=>$rate));
        $this->db->where(array('furniture_id'=>$f_id,'cust_id'=>$cust_id));
        $this->db->update('tbl_cart');

    }

    function search_quotation($cat,$type,$height,$width,$depth)
    {
       
        $this->db->select('*')->from('tbl_furniture')->join('tbl_dimension', 'tbl_dimension.furniture_id = tbl_furniture.furniture_id');
        $this->db->where('category_id',$cat);
        $this->db->where('type_id',$type);
        $this->db->where('height<=',$height);
        $this->db->where('width<=',$width);
        $this->db->where('depth<=',$depth);
        $this->db->where('status=',1);
        $query=$this->db->get();
        // $query=$this->db->query("select furniture_id from tbl_dimension where height<='".$height."' AND width<='".$width."' AND depth<='".$depth."'");
        return $query->result();

    }
} 
?>