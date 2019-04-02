<?php       
class Fmartctrl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Fmartmodel');
        $this->load->helper('url');
        $this->load->library(array('session','upload'));

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
            $result=$this->Fmartmodel->show($e);
            if($result)
                {
                    ?>
                <script>
                alert("Existing email");
                </script>
                <?php
                }
                else
                {

                $log=array('email'=>$e,'password'=>$p,'usertype'=>'customer','status'=>1,'approval'=>1);
                $log_id=$this->Fmartmodel->cust_log($log);
                $reg=array('log_id'=>$log_id,'fname'=>$fn,'lname'=>$ln,'mobile'=>$m,'house'=>NULL,'town'=>NULL,'place'=>NULL,'district'=>NULL,'state'=>NULL,'pincode'=>NULL);
            

                
                $this->Fmartmodel->cust_reg($reg);
                
                ?>
            <script>
            alert("Registration successful")
            </script>
                <?php
                
                // return redirect('/Fmartctrl/login');
                }
        }
    }


    public function register_deal()
    {
        $this->load->view('register_dealer');
        if($this->input->post('register'))
        {
            $fn=$this->input->post('fname');
            $ln=$this->input->post('lname');
            $m=$this->input->post('mobile');
            $e=$this->input->post('email');
            $p=$this->input->post('password');
            $result=$this->Fmartmodel->show($e);
            if($result)
                {
                    ?>
                <script>
                alert("Existing email");
                </script>
                <?php
                $this->register_deal();
                // $this->Fmartctrl->login;
                // redirect('/Fmartctrl/login');
                }
                else
                {
                    
            $log=array('email'=>$e,'password'=>$p,'usertype'=>'dealer','status'=>1,'approval'=>0);
            $log_id=$this->Fmartmodel->deal_log($log);
            $reg=array('log_id'=>$log_id,'fname'=>$fn,'lname'=>$ln,'mobile'=>$m,'pan'=>NULL);                   
            $this->Fmartmodel->deal_reg($reg);
           
            ?>
            <script>
            alert("Registration successful")
            </script>
                <?php
                
                }
        }
    }

// 
    public function login()
    {
        $this->load->view('login');
    }

    public function login_check()
    {
        if($this->input->post('login'))
        {
            $e=$this->input->post('email');
            $p=$this->input->post('password'); 
            $loginresult['login']=$this->Fmartmodel->checklogin($e,$p);
            if($loginresult['login'])
            {

                foreach($loginresult['login'] as $row)
                {
                    $id=$row->log_id;
                    $email=$row->email;
                    $pass=$row->password;
                    $usertype=$row->usertype;
                    $status=$row->status;
                    $approval=$row->approval;

                    if($status==1)
                    {   
                        if($usertype=='customer')
                        {
                            if($approval=='1')
                            {
                            //customer details
                            $this->session->set_userdata('id',$id);
                            $this->session->set_userdata('email',$email);
                            $this->session->set_userdata('password',$pass);
                            $result['user']=$this->Fmartmodel->cust_data($id);
                            // $this->load->view('cust_home',$result);
                            echo "cust_home";
                            }
                            else
                            {
                                echo "not approved";
                            }
                        }
                    
                        elseif($usertype=='dealer')
                        {
                            if($approval=='1')
                            {
                            //dealer details
                            $this->session->set_userdata('id',$id);
                            $this->session->set_userdata('email',$email);
                            $this->session->set_userdata('password',$pass);
                            $result['user']=$this->Fmartmodel->deal_data($id);
                            echo "dealer home";
                            }
                            else
                            {
                                echo "temp home";
                            }
                            // $this->load->view('dealer_home',$result);
                        }
                        else
                        {
                            
                            //admin details
                            $this->session->set_userdata('id',$id);
                            $this->session->set_userdata('email',$email);
                            $this->session->set_userdata('password',$pass);
                            $this->load->view('admin/admin_home');
                        }
                    }
                    else
                    {
                    ?>
                        <script>
                        alert("Invalid user")
                        
                        </script>
                    <?php 
                    $this->login();
                    }
                }
                

            }
            else
            {
                // $this->session->set_flashdata('error','Invalid username or password');
                ?>
                <script>
                alert("Invalid email or password!")
                </script>
                <?php
                $this->login();
            }
        }
    }

    public function approve_count()
    {
        $data=array('usertype'=>'dealer','approval'=>2);
        $approve_val=$this->Fmartmodel->approve_count($data);
        return $approve_val;
    }

    



  
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->home();
    }


    //setting session value to each page
    function sessionin()
    {
        $email = $this->session->userdata('email');
        $passwd = $this->session->userdata('password');

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