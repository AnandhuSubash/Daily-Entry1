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