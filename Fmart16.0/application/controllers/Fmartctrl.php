<?php       
class Fmartctrl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Fmartmodel');
        $this->load->model('Custmodel');
        $this->load->model('Dealermodel');
        $this->load->model('Adminmodel');
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
                $reg=array('log_id'=>$log_id,'fname'=>$fn,'lname'=>$ln,'mobile'=>$m,'house'=>NULL,'town'=>NULL,'place'=>NULL,'district'=>NULL,'state'=>NULL,'pincode'=>NULL,'addr_status'=>0);
            
            
                
                $this->Fmartmodel->cust_reg($reg);
                
                ?>
            <script>
            alert("Registration successful");
            </script>
                <?php              
            $this->login;                
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
                }
                else
                {
                    
            $log=array('email'=>$e,'password'=>$encr_p,'usertype'=>'dealer','status'=>1,'approval'=>0);
            $log_id=$this->Fmartmodel->deal_log($log);
            $reg=array('log_id'=>$log_id,'fname'=>$fn,'lname'=>$ln,'mobile'=>$m,'pan'=>NULL);                   
            $this->Fmartmodel->deal_reg($reg);
           
            ?>
            <script>
            alert("Registration successful");
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
                            $f_id=$this->session->userdata('f_id');
                            if(!$f_id)
                                {
                                    $data['items']=$this->Fmartmodel->products();
                                    $this->load->view('customer/cust_home',$data);  

                                }
                            else
                                {
                                    $log_id=$this->session->userdata('id');
                                    $c_id=$this->Custmodel->cust_d($log_id);

                                    $f_data=$this->session->userdata('f_data');
                                    $name= $this->session->userdata['f_data']['f_name'];
                                    $quantity= $this->session->userdata['f_data']['quantity'];
                                    $price= $this->session->userdata['f_data']['price'];
                                    $img= $this->session->userdata['f_data']['image'];
                                    $rate= $this->session->userdata['f_data']['rate'];

                                    //check in cart
                                    $c_data=array('furniture_id'=>$f_id,'cust_id'=>$c_id);
                                    $cart_data=$this->Custmodel->f_in_cart($c_data);
                                    if($cart_data)
                                        {
                                            ?>
                                            <script>
                                            alert("item is Already in the cart");
                                            </script>
                                            <?php                                
                                        }
                                    else
                                        {
                                            $data=array('furniture_id'=>$f_id,'cust_id'=>$c_id,'quantity'=>$quantity,'price'=>$price,'image'=>$img,'rate'=>$rate,'name'=>$name);
                                            $this->Custmodel->add_cart($data);
                                            $this->session->unset_userdata('f_id');
                                            $this->session->unset_userdata('f_data');
                                            ?>
                                            <script>
                                            alert("Added to cart");
                                            </script>
                                            <?php                                
                                        }

                                    
                                    $data['items']=$this->Fmartmodel->products();
                                    $this->load->view('customer/cust_home',$data);  

                                }
                                                    
                            }
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
                            $result['state']=$this->Fmartmodel->state();
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
        $value=array('category_id'=>$cat_id,'type_id'=>$type_id,'status'=>1);
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
//add product detailsin session when user is not loggedin
public function add_to_cart()
{
    $f_id=$this->input->post('f_id');
    $f_name=$this->input->post('f_name');
    $image=$this->input->post('image');
    $price=$this->input->post('price');
    $rate=$this->input->post('rate');
    $quantity=$this->input->post('quantity');
$f_data=array(
    'f_name' => $f_name,
    'image' => $image,
    'price' => $price,
    'rate' => $rate,
    'quantity' => $quantity
);

    $id=$this->session->userdata('id');
    if(!$id)
    {
        $this->session->set_userdata('f_data',$f_data);
        $this->session->set_userdata('f_id',$f_id);
        $this->login();
    }

}
public function cart_count()
{
    $log_id=$this->session->userdata('id');
    $c_id=$this->Custmodel->cust_d($log_id);
    $count=$this->Fmartmodel->cart_count($c_id);
    return $count;
}
    public function approve_count()
    {
        $data=array('usertype'=>'dealer','approval'=>2);
        $approve_val=$this->Adminmodel->approve_count($data);
        return $approve_val;
    }

    
    public function quotation()
    {
        $data['cat']=$this->Custmodel->category();
        $this->load->view('fmart_quote',$data);
    }
    //search furnture based on quotation
    public function search_quotation()
    {
        if($this->input->post('search'))
        {
            $res=1; 
            $cat=$this->input->post('category');
            $type=$this->input->post('type');
            $height=$this->input->post('height');
            $width=$this->input->post('width');
            $depth=$this->input->post('depth');
            $data['products']=$this->Custmodel->search_quotation($cat,$type,$height,$width,$depth);
            if(!$data['products'])
            {
                $res=0;        
            }
            $data['res']=$res;
            $this->load->view('fmart_quote_items',$data);
        }
    }

    public function sel_type()
    {
        $type=array();
            $i=0;
          $category=$this->input->post('category');
        $cat['data']=$this->Dealermodel->sel_type($category);
        foreach($cat['data'] as $row)
        {
            $t_id=$row->type_id;
            $name=$row->t_name;
            $type[$i]['id']=$t_id;
            $type[$i]['name']=$name;
            $i++;
        }
        echo json_encode($type);
    
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

  function check()
  {
      $id=$this->session->userdata('id');
      if(!$id)
      {
          echo "null";
      }
      else
      {
          echo "success";
      }
     
}
   

}

?>