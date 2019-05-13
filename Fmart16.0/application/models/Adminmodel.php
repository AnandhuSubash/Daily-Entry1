<?php 

class  Adminmodel extends CI_Model
{
    
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

    function approve_count($data)
    {
        $result=$this->db->get_where('login',$data);
        return $result->num_rows();
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

    return $query->result();
    }


//     // $query=$this->db->get('f_type');
//     return $query->result();
//     }

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


}

?>