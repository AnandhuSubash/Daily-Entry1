<?php 

class  Dealermodel extends CI_Model
{
function approve($log_id)
{
    $this->db->set('approval',2);
    $this->db->where('log_id',$log_id);
    $this->db->update('login');
}

 function reg($deal_id,$pan)
 {
    $this->db->set('pan',$pan);
    $this->db->where('deal_id',$deal_id);
    $this->db->update('deal_reg');
 }

function deal_data($deal_data)
{
    $this->db->insert('deal_addr',$deal_data);

}

function checklogin($email,$password)
    {
        $querys=$this->db->get_where('login',array('email'=>$email,'password'=>$password));

        // $query=$this->db->query("select * from login where email='".$email."' and password='".$password."'");
        return $querys->result();
    }

function category() 
    {
    $query=$this->db->get('f_category');
    return $query->result();
    }

function type() 
    {
    $query=$this->db->get('f_type');
    return $query->result();
    }

function material() 
    {
    $query=$this->db->get('tbl_material');
    return $query->result();
    }

function sel_type($cat)
    {
            $querys=$this->db->query("select * from f_type where category_id='".$cat."' ");

        // $querys=$this->db->get_where('f_type',array('category_id'=>$cat));
        return $querys->result();

    }

function img($home)
    {
        $a=array('img'=>$home);
        $this->db->insert('image',$a);
    }

function deal_id($lid)
    {
        $query=$this->db->get_where('deal_reg',array('log_id'=>$lid));
        return $query->result();
    }

function addr_id($deal_id)
    {
        $query=$this->db->get_where('deal_addr',array('deal_id'=>$deal_id));
        return $query->result();
    }

function dimension($dim)
    {
        $this->db->insert('tbl_dimension',$dim);
    }

function add_furniture($fur)
    {
         //insert furniture 
        $this->db->insert('tbl_furniture',$fur);
        $insert_id=$this->db->insert_id();
        return $insert_id;
        
    }

function f_image($img)
    {
         //insert image 
        $this->db->insert('tbl_image',$img);
        
    }

function f_stock($stock)
    {
         //insert image 
        $this->db->insert('tbl_stock',$stock);
        
    }

function image()
    {
        $query=$this->db->query("select image from tbl_furniture");
        return $query->result();

    }


    //update profile
    function update_reg($reg,$did)
    {
        // $this->db->set($reg);
        $this->db->where('deal_id',$did);
        $this->db->update('deal_reg',$reg);
    }

    //update profile
    function update_addr($addr,$addr_id)
    {
        // $this->db->set($addr);
        $this->db->where('addr_id',$addr_id);
        $this->db->update('deal_addr',$addr);
    }

}
?>