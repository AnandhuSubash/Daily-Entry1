<?php
class Custctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Fmartmodel');
        $this->load->model('Custmodel');

        $this->load->helper('url');
        $this->load->library(array('session','upload'));

    }

    public function login()
    {
        $this->load->view('login');
    }
    public function cust_home1()
    {
        $this->load->view('customer/cust_home');
    }

    public function product()
    {
      
        $f_id=$this->input->post('fid');
        $deal_id=$this->input->post('deal_id');
        $data['product']=$this->Custmodel->product($f_id);
        $this->load->view('customer/product_details',$data);

        
    }

    public function cart()
    {
        $this->load->view('customer/cart');
    }

public function shop()
    {
        $data['cat']=$this->Custmodel->category();
        $this->load->view('customer/shop',$data);
    }

public function products_list()
{
    if($this->input->post('submit_type'))
    {
        $type_id=$this->input->post('tid');
        $cat_id=$this->input->post('cid');
        $value=array('category_id'=>$cat_id,'type_id'=>$type_id);
        ///select furniture
        $data['furnit']=$this->Custmodel->sel_furnit($value);
        ////count furniture
        $data['val']=$this->Custmodel->count_f($value);
        $this->load->view('customer/products',$data);
    }
    
}

public function f_select()
{
    $furn=array();
    $i=0;
    $c_id=$this->input->post('cid');
    // echo json_encode($c_id);
    $result['data']=$this->Custmodel->f_select($c_id);
    foreach ($result['data'] as $key)
		{
			$furn[$i]=$key;
			$i++;
		}
		echo json_encode($furn);

}
     //setting session value to each page
     function sessionin()
     {
         $email = $this->session->userdata('email');
         $passwd = $this->session->userdata('password');
         $log_id=$this->session->userdata('id');
 
         $loginres['res'] = $this->Fmartmodel->checklogin($email,$passwd);
 
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