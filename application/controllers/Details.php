<?php

class Details extends MY_Controller
{
    public function index(){
        
    }

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_locations');
        $this->load->model('model_donors');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function getDonor($id = null){
        $id = $_POST['id'];
        $data['donorDetails']=$this->model_donors->getDonorDetails($id);

        echo json_encode($data['donorDetails']);
    }
    
    
    
    
    
}

