<?php

class Users extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('model_users');
    }
    
    public function register(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|matches[passwordAgain]'
            ),
            array(
                'field' => 'passwordAgain',
                'label' => 'Password Again',
                'rules' => 'required'
            ),
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'required|integer'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('is_unique','The {field} already exists');
        $this->form_validation->set_message('integer','The {field} must be number');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $this->model_users->register();
            
            $validator['success'] = true;
            $validator['messages'] = 'Successfully Registered, Wait for the account activation';
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    public function login(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|callback_validate_username'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $login = $this->model_users->login();
            $user  = $this->model_users->getUserById($login);
            $level = $user['level'];
            
            if($login == "deact"){
                $validator['success'] = false; 
                $validator['messages'] = 'Your account has not been activated yet';
            }
            else{
            
                if($login){

                    $this->load->library('session');

                    $newdata = array(
                        'user_id'     => $login,
                        'user_level'  => $level,
                        'logged_in'   => TRUE
                    );

                    $this->session->set_userdata($newdata);

                    $validator['success'] = true;
                    // admin level
                    if($level == 1){
                        $validator['messages'] = 'index.php/dashboardAdmin';
                    }
                    else{
                        $validator['messages'] = 'index.php/dashboard';
                    }


                }
                else{
                    $validator['success'] = false;
                    $validator['messages'] = 'Incorrect username/ password combination';
                }
            }
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    public function validate_username(){
        $username = $this->model_users->validate_username();
        if ($username == true){
            return true;
        }
        else{
            $this->form_validation->set_message('validate_username', 'The {field} does not exist');
            return false;
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        header('location: ../../');
    }
    
    public function update(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'lname',
                'label' => 'Last Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $this->load->library('session');
            $this->load->model('model_users');
            $userId = $this->session->userdata('user_id');
            $update = $this->model_users->update($userId);
            
            if($update){            
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Updated';
                
            }
            else{
                $validator['success'] = false;
                $validator['messages'] = 'Incorrect username/ password combination';
            }
            
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    public function username_exists(){
        $this->load->library('session');
        $userId = $this->session->userdata('user_id');
        $username_exists = $this->model_users->usernameExists($userId);
        
        if($username_exists === false){
            return true;
        }
        else{
            $this->form_validation->set_message('username_exists','The {field} value already exists');
            return false;
        }
    }
    
    public function changepassword(){
        $validator = array('success'=>false, 'messages'=>array());
        
        $validate_data = array(
            array(
                'field' => 'currentpassword',
                'label' => 'Current Password',
                'rules' => 'required|callback_validCurrentPassword'
            ),
            array(
                'field' => 'newpassword',
                'label' => 'New Password',
                'rules' => 'required|matches[passwordagain]'
            ),
            array(
                'field' => 'passwordagain',
                'label' => 'Password Again',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        
        if($this->form_validation->run() === true){
            $this->load->library('session');
            
            $userId = $this->session->userdata('user_id');
            $changepassword = $this->model_users->changePassword($userId);
            
            if($changepassword){            
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Updated';
                
            }
//            else{
//                $validator['success'] = false;
//                $validator['messages'] = 'Incorrect username/ password combination';
//            }
            
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    public function validCurrentPassword(){
        $this->load->library('session');
        $userId = $this->session->userdata('user_id');
        $password_exists = $this->model_users->validCurrentPassword($userId);
        
        if($password_exists === true){
            return true;
        }
        else{
            $this->form_validation->set_message('validCurrentPassword','The {field} value is invalid');
            return false;
        }
    }
    
    public function acceptUser($username = null){
        $validator = array('success'=>false, 'messages'=>array());
//        $this->model_users->acceptEachUser($username);
        if($username){                
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Accepted';
                $this->model_users->acceptEachUser($username);
        }
        redirect('request');
       // echo json_encode($validator);
    }
    
    public function rejectUser($username = null){
         $validator = array('success'=>false, 'messages'=>array());
      //  $this->model_users->rejectEachUser($username);
        if($username){                
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Rejected';
                $this->model_users->rejectEachUser($username);
        }
        redirect('request');
        //echo json_encode($validator);
    }

   
    public function registerDonorOutside(){
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
            $this->model_donors->donorRegisterOutside();
            
            $validator['success'] = true;
            $validator['messages'] = 'You have been registered successfully, Please submit the printed form to the authority';
        }
        else{
            $validator['success'] = false;
            foreach ($_POST as $key=>$value){
                $validator['messages'][$key] = form_error($key);
            }
        }
        
        
        
        echo json_encode($validator);
        
          
        
    }
    
}





















