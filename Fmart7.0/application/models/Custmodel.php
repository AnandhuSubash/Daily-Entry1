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
} 