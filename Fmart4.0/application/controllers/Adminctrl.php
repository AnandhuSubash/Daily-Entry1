<?php
class Adminctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Fmartmodel');
        $this->load->helper('url');
        $this->load->library(array('session','upload'));

    }


    //customer list in admin page
    public function cust_list()
    {
        $cust['list']=$this->Fmartmodel->cus_list();
        $this->load->view('admin/cust_list',$cust);
    }
    //dealer list in admin page

    public function deal_list()
    {
        $deal['list']=$this->Fmartmodel->deal_list();
        $this->load->view('admin/dealer_list',$deal);
    }

    public function deal_block()
    {
        if($this->input->post('block'))
        {
            $log_id=$this->input->post('logid');
            // $status=$this->input->post('status');
            $this->Fmartmodel->deal_block($log_id);
            $this->deal_list();
        }
        else
        {
            $log_id=$this->input->post('logid');
            // $status=$this->input->post('status');
            $this->Fmartmodel->deal_unblock($log_id);
            $this->deal_list();
        }
    }

    //dealer approval by admin
    public function deal_approval()
    {
        $dealers['list']=$this->Fmartmodel->deal_list();
        $this->load->view('admin/deal_approval',$dealers);
    }

    public function approve()
    {  
        $id=$this->input->post('logid');
        $this->Fmartmodel->approve($id);
        $this->deal_approval();
        

    }
    public function admin_home1()
    {
        $this->load->view('admin/admin_home');
    }

       public function approve_count()
    {
        $data=array('usertype'=>'dealer','approval'=>2);
        $approve_val=$this->Fmartmodel->approve_count($data);
        return $approve_val;
    }


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

    public function category()
    {
       
        $category['data']=$this->Fmartmodel->category();
        $this->load->view('admin/category',$category);
    }
//delete furniture category
    public function del_cat()
    {
        if($this->input->post('delete'))
        {
        $id=$this->input->post('logid');
        $this->Fmartmodel->del_cat($id);
        $this->category();

        }
    }


//add furniture category

    public function add_cat()
    {
        if($this->input->post('add_cat'))
        {
            $name=$this->input->post('category');
            $value=array('name'=>$name);
            $this->Fmartmodel->add_cat($value);
            $this->category();
        }
    }

//list furniture type

    public function type()
    {
        $data['type']=$this->Fmartmodel->type();
        $data['category']=$this->Fmartmodel->category();

        $this->load->view('admin/type',$data);
    }


    //delete furniture type
    public function del_type()
    {
        if($this->input->post('delete'))
        {
        $id=$this->input->post('typeid');
        $this->Fmartmodel->del_type($id);
        $this->type();

        }
    }


    //add furiture type
    public function add_type()
    {
        if($this->input->post('add_type'))
        {
            $cat=$this->input->post('category');
            
                   
            $cat_id=$this->Fmartmodel->cat_id($cat);
            foreach($cat_id as $row)
            {
                $type=$this->input->post('type');
                $cat_id=$row->category_id;
                $val=array('category_id'=>$cat_id, 't_name'=>$type);
                $this->Fmartmodel->add_type($val);
                
                    
            }
            $this->type(); 
         
        }  
    }

    public function material()
    {
        $material['data']=$this->Fmartmodel->material();
        $this->load->view('admin/material',$material);

    }

    public function del_material()
    {
        if($this->input->post('delete'))
        {
        $id=$this->input->post('material_id');
        $this->Fmartmodel->del_material($id);
        $this->material();

        }
    }


    public function add_material()
    {
        if($this->input->post('add_material'))
        {
            $name=$this->input->post('material');
            $value=array('material'=>$name);
            $this->Fmartmodel->add_material($value);
            $this->material();
        }
    }

    public function img()
    {
        $this->load->view('admin/img');
    }

    public function up()
    {
        
        $homeimg=$this->input->post('img');
        $homeimg= time().$_FILES['img']['name'];
        $path='../Fmart/images/home/';
        move_uploaded_file($_FILES['img']['tmp_name'],$path.$homeimg);
        $this->Fmartmodel->img($homeimg);

    }
}

?>