<?php
class Custctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Fmartmodel');
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