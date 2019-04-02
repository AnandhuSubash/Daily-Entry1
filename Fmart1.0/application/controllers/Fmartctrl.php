<?php       
class Fmartctrl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Fmartmodel');

    }
    public function login()
    {
        $this->load->view('login1');
    }

    public function home()
    {
        $this->load->view('home');
    }

    public function register_cust()
    {
        $this->load->view('register');
        if($this->input->post('register'))
        {
            $fn=$this->input->post('fname');
            $ln=$this->input->post('lname');
            $m=$this->input->post('mobile');
            $e=$this->input->post('email');
            $p=$this->input->post('password');

            $log=array('email'=>$e,'password'=>$p,'usertype'=>0,'status'=>0);
            $reg=array('fname'=>$fn,'lname'=>$ln,'mobile'=>$m,'house'=>NULL,'town'=>NULL,'place'=>NULL,'district'=>NULL,'state'=>NULL,'pincode'=>NULL,'email'=>$e,'password'=>$p);
         

            $this->Fmartmodel->cust_log($log);
            $this->Fmartmodel->cust_reg($reg);
            echo "success";
        }
    }


    public function register_deal()
    {
        $this->load->view('register');
        if($this->input->post('register'))
        {
            $fn=$this->input->post('fname');
            $ln=$this->input->post('lname');
            $m=$this->input->post('mobile');
            $e=$this->input->post('email');
            $p=$this->input->post('password');

            // $userdata=array('fname'=>$fn,'lname'=>$ln,'mobile'=>$m);
            $log=array('email'=>$e,'password'=>$p,'usertype'=>0,'status'=>0);
            $reg=array('fname'=>$fn,'lname'=>$ln,'mobile'=>$m,'house'=>NULL,'town'=>NULL,'place'=>NULL,'district'=>NULL,'state'=>NULL,'pincode'=>NULL,'email'=>$e,'password'=>$p);
         

            $this->Fmartmodel->cust_log($log);
            $this->Fmartmodel->cust_reg($reg);
            echo "success";
        }
    }
}




?>