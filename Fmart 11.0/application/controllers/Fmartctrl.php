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
        $data['items']=$this->Fmartmodel->products();
        $this->load->view('home',$data);
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
            $encr_p=md5($p);
//             $msg = 'My secret message';
//             $key = 'super-secret-key';

// $encrypted_string = $this->encrypt->encode($msg, $key);
            // $e_pass=$this->encrypt->encode($p);
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
            
                $log=array('email'=>$e,'password'=>$encr_p,'usertype'=>'customer','status'=>1,'approval'=>1);
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
            $encr_p=md5($p);
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
                    
            $log=array('email'=>$e,'password'=>$encr_p,'usertype'=>'dealer','status'=>1,'approval'=>0);
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

    public function shop()
    {
        $data['cat']=$this->Fmartmodel->category();
        $this->load->view('shop',$data);
    }

    public function f_select()
{
    $furn=array();
    $i=0;
    $c_id=$this->input->post('cid');
    // echo json_encode($c_id);
    $result['data']=$this->Fmartmodel->f_select($c_id);
    foreach ($result['data'] as $key)
		{
			$furn[$i]=$key;
			$i++;
		}
		echo json_encode($furn);

}


public function products_list()
{
    if($this->input->post('submit_type'))
    {
        $type_id=$this->input->post('tid');
        $cat_id=$this->input->post('cid');
        $value=array('category_id'=>$cat_id,'type_id'=>$type_id);
        ///select furniture
        $data['furnit']=$this->Fmartmodel->sel_furnit($value);
        ////count furniture
        $data['val']=$this->Fmartmodel->count_f($value);
        $this->load->view('products',$data);
    }
    
}
    public function product_view($fid)
    {
        $data['product']=$this->Fmartmodel->product_details($fid);
        foreach ($data['product'] as $row) 
        {
            $cat_id=$row->category_id;
            $type_id=$row->type_id;
            $material_id=$row->material_id;
        }
        $data['cat']=$this->Fmartmodel->product_cat($cat_id);
        $data['type']=$this->Fmartmodel->product_type($type_id);
        $data['material']=$this->Fmartmodel->product_mat($material_id);

        $data['dimension']=$this->Fmartmodel->product_dim($fid);

        $this->load->view('product_details',$data);
    }

    public function login_check()
    {
        if($this->input->post('login'))
        {
            $e=$this->input->post('email');
            $p=$this->input->post('password'); 
            $encr_p=md5($p);

            $loginresult['login']=$this->Fmartmodel->checklogin($e,$encr_p);
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
                            $data['items']=$this->Fmartmodel->products();
                            $this->load->view('customer/cust_home',$data);                            }
                            else
                            {
                             ?>
                             <script>
                             alert("Invalid/Blocked Login")
                             </script>
                             <?php
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
                            $this->load->view('dealer/dealer_home',$result);

                            }
                            elseif($approval=='0')
                            {
                            //dealer details
                            $this->session->set_userdata('id',$id);
                            $this->session->set_userdata('email',$email);
                            $this->session->set_userdata('password',$pass);
                            $result['user']=$this->Fmartmodel->deal_data($id);
                            $this->load->view('dealer/temp_deal_home',$result);
                        }
                            else                           
                            {
                                $this->session->set_userdata('id',$id);
                                $this->session->set_userdata('email',$email);
                                $this->session->set_userdata('password',$pass);
                                $result['user']=$this->Fmartmodel->deal_data($id);
                                $this->load->view('dealer/temp_deal_home2',$result);                            }
                            
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