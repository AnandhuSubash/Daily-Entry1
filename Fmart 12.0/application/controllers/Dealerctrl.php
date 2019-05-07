<?php
class Dealerctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Dealermodel');
        $this->load->model('Fmartmodel');       
        $this->load->helper('url');
        $this->load->library(array('session','upload'));


    }

    public function login()
    {
        $this->load->view('login');
    }

    public function deal_home()
    {
        $this->load->view('dealer/dealer_home');
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
    $data['type']=$this->Dealermodel->type();
    $data['category']=$this->Dealermodel->category();
    $data['material']=$this->Dealermodel->material();

    $this->load->view('dealer/add_furniture',$data);
}

public function add()
{ 
    if($this->input->post('add'))
    {
    $cat=$this->input->post('category');
    $type=$this->input->post('type');
    $name=$this->input->post('name');
    $material=$this->input->post('material');
    $height=$this->input->post('height');
    $width=$this->input->post('width');
    $depth=$this->input->post('depth');
    $weight=$this->input->post('weight');
    $price=$this->input->post('price');
    $quantity=$this->input->post('quantity');
    $desc=$this->input->post('description');
    $lid=$this->input->post('lid');
    $homeimg=$this->input->post('image1');
    // $deal_id=$this->input->post('did');

    //////add image
    $homeimg= time().$_FILES['image1']['name'];
    $path='../Fmart/images/home/';
    move_uploaded_file($_FILES['image1']['tmp_name'],$path.$homeimg);
    // $this->Dealermodel->img($homeimg);


    //////fetch dealer id from dealer table
    $data=$this->Dealermodel->deal_id($lid);
        foreach($data as $row)
        {   
            
            $did=$row->deal_id;
            
        }
    $furniture=array('deal_id'=>$did,'category_id'=>$cat,'type_id'=>$type,'material_id'=>$material,'name'=>$name,'price'=>$price,'description'=>$desc,'image'=>$homeimg);
    $fid=$this->Dealermodel->add_furniture($furniture);
    // $img=array('f_id'=>$fid,'image'=>$homeimg);
    $stock=array('f_id'=>$fid,'number'=>$quantity);

    $dim=array('furniture_id'=>$fid,'height'=>$height,'width'=>$width,'depth'=>$depth,'weight'=>$weight);
    // $this->Dealermodel->f_image($img);
    $this->Dealermodel->f_stock($stock);

    $data=$this->Dealermodel->dimension($dim);
    ?>
    <script> alert("Added successfully"); </script>
    <?php
    $this->deal_home();
    }
}

public function profile()
{
    $log_id=$this->session->userdata('id');
    $data['reg']=$this->Dealermodel->deal_id($log_id);
    foreach($data['reg'] as $row)
        {
            $deal_id=$row->deal_id;
        }
    $data['addr']=$this->Dealermodel->addr_id($deal_id);
    foreach ($data['addr'] as $row) {
        $state_id=$row->state;
        $district_id=$row->district;
    }
    $data['state']=$this->Dealermodel->view_state($state_id);
    $data['district']=$this->Dealermodel->view_district($district_id);
 
    $this->load->view('dealer/profile',$data);
}


public function furniture()
{
    $log_id=$this->session->userdata('id');
    $data['reg']=$this->Dealermodel->deal_id($log_id);
    foreach($data['reg'] as $row)
        {
            $deal_id=$row->deal_id;
        }
    $data['furniture']=$this->Dealermodel->furniture($deal_id);
    $this->load->view('dealer/furnitures',$data);

}


public function update_profile()
{
if($this->input->post('update'))
    {
    $did=$this->input->post('deal_id');
    $addr_id=$this->input->post('addr_id');
    $fn=$this->input->post('fname');
    $ln=$this->input->post('lname');
    $mob=$this->input->post('mobile'); 
    $pan=$this->input->post('pan');
    $store=$this->input->post('store');
    $town=$this->input->post('town');
    $place=$this->input->post('place');
    $dist=$this->input->post('district');
    $state=$this->input->post('state'); 
    $pin=$this->input->post('pincode'); 



    $reg=array('fname'=>$fn,'lname'=>$ln,'mobile'=>$mob,'pan'=>$pan);
    $addr=array('deal_id'=>$did,'store_name'=>$store,'town'=>$town,'place'=>$place,'district'=>$dist,'state'=>$state,'pincode'=>$pin);
        $this->Dealermodel->update_reg($reg,$did);
        $this->Dealermodel->update_addr($addr,$addr_id);
        ?>
        <script>alert("Profile updated");</script>
        <?php
        $this->deal_home();      
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

public function deal_id()
{
    $lid=$this->session->userdata('id');
    $data=$this->Dealermodel->deal_id($lid);
    foreach($data as $row)
    {   
        
        $did=$row->deal_id;
        
    }
    return $did;
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

    // public function image()
    // {
    //     $data['img']=$this->Dealermodel->image();
    
    //     $this->load->view('dealer/image',$data);
    // }
    



}
?>