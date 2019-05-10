<?php
class Custctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Fmartmodel');
        $this->load->model('Custmodel');
        $this->load->model('Dealermodel');


        $this->load->helper('url');
        $this->load->library(array('session','upload'));

    }

    public function login()
    {
        $this->load->view('login');
    }
    public function cust_home1()
    {
        $data['items']=$this->Custmodel->products();
        $this->load->view('customer/cust_home',$data);
    }

    public function product()
    {
        $log_id=$this->session->userdata('id');
        $c_id=$this->Custmodel->cust_d($log_id);
        $f_id=$this->input->post('fid');
        $c_data=array('furniture_id'=>$f_id,'cust_id'=>$c_id);
        $cart_data=$this->Custmodel->f_in_cart($c_data);
        if($cart_data)
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        $deal_id=$this->input->post('deal_id');
        $data['flag']=$flag;
        $data['product']=$this->Custmodel->product($f_id);
        $data['dimension']=$this->Custmodel->product_dim($f_id);
        $this->load->view('customer/product_details',$data);

        
    }

    public function add_cart()
    {

        if($this->input->post('add'))
        {
            $f_id=$this->input->post('f_id');
            $deal_id=$this->input->post('deal_id');
            $cust_id=$this->input->post('cust_id');
            $quantity=$this->input->post('quantity');
            $name=$this->input->post('name');
            $img=$this->input->post('image');
            $price=$this->input->post('price');
            $rate=$this->input->post('price');

            $c_data=array('furniture_id'=>$f_id,'cust_id'=>$cust_id);
            $cart_data=$this->Custmodel->f_in_cart($c_data);
            if($cart_data)
            {
               ?>
               <script>
               alert("already added in cart");
               </script>
               <?php
                $this->cart();            
            }
            else
            {
                $data=array('furniture_id'=>$f_id,'cust_id'=>$cust_id,'quantity'=>$quantity,'price'=>$price,'image'=>$img,'rate'=>$rate,'name'=>$name);
                $this->Custmodel->add_cart($data);
                ?>
                <script>
                alert("Added to cart");
                </script>
                <?php
                $this->cart();            
            }
            
        }
        else
        {
        $this->cart();
        }
    }



public function cart()
{
    $log_id=$this->session->userdata('id');
    $c_id=$this->Custmodel->cust_d($log_id);
    $data['cart']=$this->Custmodel->cart($c_id);
    $this->load->view('customer/cart',$data);
}


public function update_cart()
{
    $furn=array();
    $i=0;
    $f_id=$this->input->post('f_id');
    $quantity=$this->input->post('q');
    $price=$this->input->post('price');
    $rate=$price*$quantity;
    $cust_id=$this->input->post('cust_id');
    $this->Custmodel->update_cart($f_id,$cust_id,$quantity,$rate);
    $result['data']=$this->Custmodel->cart($cust_id);
    $s=0;
    foreach ($result['data'] as $key)
		{
            $rate=$key->rate;
            $s=$s+$rate;
			$furn[$i]=$key;
			$i++;
		}
		echo json_encode($s);  
}
//delete from cart
public function delete_cart($fid)
{
    $log_id=$this->session->userdata('id');
    $c_id=$this->Custmodel->cust_d($log_id);
    $item=array('furniture_id'=>$fid,'cust_id'=>$c_id);
    $this->Custmodel->del_cart($item);
    $this->cart();
}

//total items in cart
public function cart_count()
{
    $log_id=$this->session->userdata('id');
    $c_id=$this->Custmodel->cust_d($log_id);
    $count=$this->Custmodel->cart_count($c_id);
    return $count;
}

public function profile_status()
{
    $log_id=$this->session->userdata('id');
    $pro_status=$this->Custmodel->cust_profile_status($log_id);  
    return $pro_status;
}
public function checkout()
{
    if($this->input->post('checkout'))
    {
        $pro_status=$this->input->post('pro_status');
        if($pro_status==0)
        {
            ?>
            <script>
            alert("Profile not completed");
            </script>
            <?php
            $this->profile();

        }
        else
        {

        $cust_id=$this->input->post('cust_id');
        $total=$this->input->post('total');
        $data['cust']=$this->Custmodel->cust_profile($cust_id);
        foreach ($data['cust'] as $row)
            {
                $s_id=$row->state;
                $dist_id=$row->district;
            }
        $data['state_name']=$this->Fmartmodel->view_state($s_id);
        $data['dist_name']=$this->Fmartmodel->view_district($dist_id);
        $data['total']=$total;
        $this->load->view('customer/checkout',$data);
        }
    }
}

public function profile()
{
    $log_id=$this->session->userdata('id');
    $cust_id=$this->Custmodel->cust_d($log_id);
    $data['cust']=$this->Custmodel->cust_profile($cust_id);
    foreach ($data['cust'] as $row)
    {
        $s_id=$row->state;
        $dist_id=$row->district;
    }
    $data['state_name']=$this->Fmartmodel->view_state($s_id);
    $data['dist_name']=$this->Fmartmodel->view_district($dist_id);
    $data['states']=$this->Fmartmodel->state();
    $this->load->view('customer/profile',$data);
}

public function sel_district()
{
    $type=array();
        $i=0;
      $state_id=$this->input->post('state');
    $dist['data']=$this->Fmartmodel->sel_district($state_id);
    foreach($dist['data'] as $row)
    {
        $did=$row->did;
        $name=$row->dname;
        $type[$i]['id']=$did;
        $type[$i]['name']=$name;
        $i++;
    }
    echo json_encode($type);

}
public function update_profile()
{
    if($this->input->post('update'))
    {
        $fn=$this->input->post('fnames');
        $ln=$this->input->post('lnames');
        $mob=$this->input->post('mobiles');
        $house=$this->input->post('h_names');
        $town=$this->input->post('towns');
        $place=$this->input->post('places');
        $state=$this->input->post('states');
        $dist=$this->input->post('districts');
        $pin=$this->input->post('pincodes');
        $cust_id=$this->input->post('custid');
        $value=array('fname'=>$fn,'lname'=>$ln,'mobile'=>$mob,'house'=>$house,'town'=>$town,'place'=>$place,'district'=>$dist,'state'=>$state,'pincode'=>$pin,'addr_status'=>1);
        $this->Custmodel->update_profile($cust_id,$value);
        ?>
        <script>
        
        alert("profile updated");
        </script>
        <?php
        $this->profile();
    }
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

public function product_view($fid)
{
        $log_id=$this->session->userdata('id');
        $c_id=$this->Custmodel->cust_d($log_id);
        $f_id=$this->input->post('fid');
        $c_data=array('furniture_id'=>$f_id,'cust_id'=>$c_id);
        $cart_data=$this->Custmodel->f_in_cart($c_data);
        if($cart_data)
        {
            $flag=1;
        }
        else
        {
            $flag=0;
        }
        $deal_id=$this->input->post('deal_id');
        $data['flag']=$flag;
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

        $this->load->view('customer/product_details',$data);
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

public function cust_id()
{
    $log_id=$this->session->userdata('id');
    $data['cust']=$this->Custmodel->cust_data($log_id);
    foreach($data['cust'] as $row)
    {
        $c_id=$row->cust_id;
    }
    return $c_id;
}

public function quotation()
{
    $data['cat']=$this->Custmodel->category();
    $this->load->view('customer/quote',$data);
}
//search furnture based on quotation
public function search_quotation()
{
    if($this->input->post('search'))
    {
        $cat=$this->input->post('category');
        $type=$this->input->post('type');
        $height=$this->input->post('height');
        $width=$this->input->post('width');
        $depth=$this->input->post('depth');
        $data['items']=$this->Custmodel->search_quotation($height,$width,$depth);
        if($data['items'])
        {
            echo "s";

        }
        else
        {
            echo "f";
        }
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