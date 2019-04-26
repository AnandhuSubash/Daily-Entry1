<?php 

class  Custmodel extends CI_Model
{
    function category() 
        {
        $query=$this->db->get('f_category');
        return $query->result();
        }

    // function f_select($c_id)
    // {
    //     $query=$this->db->get_where('f_type',array('category_id'=>$c_id));
    //     return $query->result();
    // }

    
    function f_select($c_id)
{
        $querys=$this->db->query("select * from f_type where category_id='".$c_id."' ");

    // $querys=$this->db->get_where('f_type',array('category_id'=>$cat));
    return $querys->result();

}
} 