<?php
class Dealerctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Dealermodel');
        $this->load->helper('url');
        $this->load->library(array('session','upload'));


    }


    public function deal_temphome2()
    {
        $this->load->view('dealer/temp_deal_home2');
    }

    public function deal_request()
    {
        if($this->input->post('request'))
        {
            $pan=$this->input->post('pan');
            $s_name=$this->input->post('shop_name');
            $state=$this->input->post('state');
            $district=$this->input->post('district');
            $town=$this->input->post('shop_town');
            $place=$this->input->post('shop_place');
            $pincode=$this->input->post('pincode');
            $deal_id=$this->input->post('deal_id');
            $log_id=$this->input->post('log_id');

            $deal_data=array('deal_id'=>$deal_id, 'store_name'=>$s_name, 'town'=>$town, 'place'=>$place, 'district'=>$district,'state'=>$state,'pincode'=>$pincode);
            $this->Dealermodel->approve($log_id);

            $this->Dealermodel->reg($deal_id,$pan);
            $this->Dealermodel->deal_data($deal_data);
            ?>
            <script>
            alert("Requested for Admin approval")
            </script>
            <?php
            $this->deal_temphome2();
           
        }
    }

public function add_furniture()
{
    $this->load->view('dealer/add_furniture');
}

public function sessionin()
    {
    $email = $this->session->userdata('email');
    $passwd = $this->session->userdata('password');
    $log_id=$this->session->userdata('id');


    $loginres['res'] = $this->Dealermodel->checklogin($email,$passwd);

    if( $loginres['res'])
    {
      return(1);
    }
    else 
    {
      return(0);
    }
    }

    
}
?>