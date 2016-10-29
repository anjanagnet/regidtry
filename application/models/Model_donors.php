<?php

     class Model_Donors extends CI_Model
    {
         function __construct() {
             parent::__construct();
             $status;
         }

         public function donorRegister(){
             $date = date("Y/m/d");
             if($this->session->userdata('logged_in') === true){
                 $status=1;
             }
             else{
                 $status = 5;
             }
             
             $insert_data = array(
                'nic'                => $this->input->post('nic'),
                'fName'              => $this->input->post('fname'),
                'mName'              => $this->input->post('mname'),
                'lName'              => $this->input->post('lname'),
                'dob'                => $this->input->post('dob'),
                'gender'             => $this->input->post('gender'),
                'addressLine1'       => $this->input->post('address1'),
                'addressLine2'       => $this->input->post('address2'),
                'city'               => $this->input->post('city'),
                'email'              => $this->input->post('email'), 
                'telephone_1'        => $this->input->post('telephone1'),
                'telephone_2'        => $this->input->post('telephone2'),
                'gramasevakaDevision'=> $this->input->post('gramasevakadevision'),
                'gramasevakaNo'      => $this->input->post('gramasevakanumber'),
                'devisionalSecratary' =>$this->input->post('divisional'),
                'district'           => $this->input->post('division'),
                'province'           => $this->input->post('province'),
                'CR_fName'           => $this->input->post('cr_fname'),
                'CR_lName'           => $this->input->post('cr_lname'),
                'CR_addressLine1'    => $this->input->post('cr_address1'),
                'CR_addressLine2'    => $this->input->post('cr_address2'),
                'CR_city'            => $this->input->post('cr_city'),
                'CR_NIC'             => $this->input->post('cr_nic'),
                'CR_relationship'    => $this->input->post('cr_relationship'),
                'CR_telephone_1'     => $this->input->post('cr_telephone1'),
                'CR_telephone_2'     => $this->input->post('cr_telephone2'),
                'CR_regDate'         => $date,
                'status'             => $status    
            );
            $this->db->insert('donors',$insert_data); 
         }
         
         public function searchName($fname=null, $lname=null){
            
            $sql = "SELECT id,fName,lName,nic,status FROM donors WHERE fName=? AND lName=?";
            $query = $this->db->query($sql, array($fname,$lname));
            $result = $query->result_array();
            return $result;
         }
         public function searchFirstName($fname=null){
            
            $sql = "SELECT id,fName,lName,nic,status FROM donors WHERE fName=?";
            $query = $this->db->query($sql, array($fname));
            $result = $query->result_array();
            return $result;
         }
         
         public function searchSecondName($lname=null){
            
            $sql = "SELECT id,fName,lName,nic,status FROM donors WHERE lName=?";
            $query = $this->db->query($sql, array($lname));
            $result = $query->result_array();
            return $result;
         }

         public function getDonorDetails($id=null){
             $sql = "SELECT * FROM donors WHERE id=?";
//             $sql = "SELECT donors.id,donors.nic,donors.fName,donors.mName,donors.lName,donors.dob,donors.gender,donors.email,donors.addressLine1,donors.addressLine2,donors.city,donors.telephone_1,donors.telephone_2,donors.gramasevakaDevision,donors.gramasevakaNo,donors.devisionalSecratary,donors.district,donors.CR_fName,donors.CR_lName,donors.CR_addressLine1,donors.CR_addressLine2,donors.CR_city,donors.CR_NIC,donors.CR_relationship,donors.CR_telephone_1,donors.CR_telephone_2,donors.CR_regDate,donors.status,districts.id,districts.districtName FROM donors D LEFT JOIN districts B ON D.district=B.districtName";
             $query = $this->db->query($sql, array($id));
             $result = $query->row_array();
             return $result;
         }
         
         public function getDonorByNIC($nic = null){
             $sql = "SELECT *FROM donors WHERE nic=?";
             $query = $this->db->query($sql, array($nic));
             $result = $query->row_array();
             return $result;
         }
         
         public function searchAvailability($status = null){
             $sql = "SELECT id,fName,lName,nic,status FROM donors WHERE status=?";
             $query = $this->db->query($sql, array($status));
             $result = $query->result_array();
             return $result;
         }
         
         public function searchDistrict($district=null){
             $sql = "SELECT id,fName,lName,nic,status FROM donors WHERE district=?";
             $query = $this->db->query($sql, array($district));
             $result = $query->result_array();
             return $result;
         }
         
         public function getStatus(){
             $sql = "SELECT * FROM status";
             $query = $this->db->query($sql);
             $result = $query->result();
             return $result;
         }
         
         public function updateDonorStatus($id = null,$status = null){
             if($id and $status){     
                $update_data = array('status'=>$status);
                $this->db->where('id',$id);
                $query = $this->db->update('donors',$update_data);

             }
         }

         
     }

