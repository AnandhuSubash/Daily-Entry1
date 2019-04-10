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


}
?>