<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function view($page = 'index')
        {   
            $this->load->model('model_locations');
            $this->load->model('model_donors');
            $data['locationsDistrict']= $this->model_locations->getDistricts();
            $data['locationsProvince']= $this->model_locations->getProvinces();
            $data['donorStatus']= $this->model_donors->getStatus();
            if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter
            
            if($page == 'index'){
                $this->loggedIn();
            }
            elseif ($page == 'register') {
                $this->loggedRegisterIn();
            }
            elseif($page == 'newDonorOutside'){
                $this->loggedRegisterIn2();
                
            }
            else{
                $this->notLoggedIn();
                
                $this->load->library('session');
                
                $this->load->model('model_users');
//                $this->load->model('model_locations');
                $this->load->model('model_donors');
                
                $data['userData']         = $this->model_users->fetchUserData($this->session->userdata('user_id'));
                $data['userReq']          = $this->model_users->acceptUser();
                $data['donorReq']         = $this->model_users->getPendingDonors();
//                $data['locationsDistrict']= $this->model_locations->getDistricts();
//                $data['locationsProvince']= $this->model_locations->getProvinces();
//                $data['donorDetails']     = $this->session->flashdata('item');
//                $data['donorDetailsNIC']     = $this->session->flashdata('detailsNIC');
                
            }
            
            $this->load->view($page, $data);

        }

}
