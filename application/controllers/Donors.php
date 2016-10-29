<?php
class Donors extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model('model_locations');
        $this->load->model('model_donors');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function registerDonor(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'nic',
                'label' => 'National Identity Card Number',
                'rules' => 'required'
            ),
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'mname',
                'label' => 'Middle Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'dob',
                'label' => 'Date of Birth',
                'rules' => 'required'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ),
            array(
                'field' => 'address1',
                'label' => 'Address Line 1',
                'rules' => 'required'
            ),
            array(
                'field' => 'address2',
                'label' => 'Address Line 2',
                'rules' => 'required'
            ),
            array(
                'field' => 'city',
                'label' => 'City',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'telephone1',
                'label' => 'Telephone Home',
                'rules' => 'required|integer'
            ),
            array(
                'field' => 'telephone2',
                'label' => 'Telephone Mobile',
                'rules' => 'required|integer'
            ),
            array(
                'field' => 'gramasevakadevision',
                'label' => 'Gramasevaka Devision',
                'rules' => 'required'
            ),
            array(
                'field' => 'gramasevakanumber',
                'label' => 'Gramasevaka Devision Number',
                'rules' => 'required|integer'
            ),
            array(
                'field' => 'divisional',
                'label' => 'Divisional Secretary Area',
                'rules' => 'required'
            ),
            array(
                'field' => 'division',
                'label' => 'Division',
                'rules' => 'required'
            ),
            array(
                'field' => 'province',
                'label' => 'Province',
                'rules' => 'required'
            ),
            array(
                'field' => 'cr_fname',
                'label' => 'First Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'cr_lname',
                'label' => 'Last Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'cr_address1',
                'label' => 'Address Line 1',
                'rules' => 'required'
            ),
            array(
                'field' => 'cr_address2',
                'label' => 'Address Line 2',
                'rules' => 'required'
            ),
            array(
                'field' => 'cr_city',
                'label' => 'City',
                'rules' => 'required'
            ),
            array(
                'field' => 'cr_nic',
                'label' => 'National Identity Card Number',
                'rules' => 'required'
            ),
            array(
                'field' => 'cr_relationship',
                'label' => 'Relationship',
                'rules' => 'required'
            ),
            array(
                'field' => 'cr_telephone1',
                'label' => 'Telephone',
                'rules' => 'required|integer'
            ),
            array(
                'field' => 'cr_telephone2',
                'label' => 'Mobile',
                'rules' => 'required|integer'
            )
            
        );
        $this->form_validation->set_rules($validate_data);
     //   $this->form_validation->set_message('is_unique','The {field} already exists');
        $this->form_validation->set_message('integer','The {field} must be number');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $this->model_donors->donorRegister();
            
            $validator['success'] = true;
            $validator['messages'] = 'Successfully Registered the Donor';
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    public function searchByName(){

        $errors = array();
        $data   = array();
        
//        $fname=$this->input->post('fname');
//        $lname=$this->input->post('lname');
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        
        if($fname and $lname){
            $data['donorNames']=$this->model_donors->searchName($fname,$lname);
        }
        elseif($fname and $lname==null){
            $data['donorNames']=$this->model_donors->searchFirstName($fname);
        }
        elseif($lname and $fname==null){
            $data['donorNames']=$this->model_donors->searchSecondName($lname);
        }
        elseif ($fname==null AND $lname==null) {
            //$errors['noData'] = 'At least one field is required';
            $data['donorNames'] = "Please Enter at least one Name";
        }
        
        echo json_encode($data['donorNames']);

    }
    
    public function searchByNIC(){
        $nic = $_POST['nic'];
        
        $errors = array();
        $data   = array();
        
        if($nic){
            $dataNIC=$this->model_donors->getDonorByNIC($nic);
            
            echo json_encode($dataNIC);
        }
    }
    
    public function searchByAvailability(){
        $status = $_POST['status'];
        
        if($status){
            $dataAvailability = $this->model_donors->searchAvailability($status);
            
            echo json_encode($dataAvailability);
        }
    }
    
    public function searchByDistrict(){
        $district = $_POST['division'];
        
        if($district){
            $dataDistrict = $this->model_donors->searchDistrict($district);
            
            echo json_encode($dataDistrict);
        }
    }
    
    public function updateStatus(){
        $id = $_GET['getID'];
        $status = $_GET['status'];
//        echo $id;
//        echo $status;
        $this->model_donors->updateDonorStatus($id,$status);
        redirect('searchDistrict');

    }
    
    public function acceptDonor($id = null){
//        $validator = array('success'=>false, 'messages'=>array());
//        $this->model_users->acceptEachUser($username);
        if($id){                
                $this->model_donors->updateDonorStatus($id,1);
        }
        redirect('donorRequests');
       // echo json_encode($validator);
    }
    
    
    

}

