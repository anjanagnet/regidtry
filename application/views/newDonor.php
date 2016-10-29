<!doctype html>
<html lang="en">
    <?php 
        $level = $this->session->userdata('user_level');        
    ?>
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php echo $title ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/bootstrap/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="../assets/bootstrap/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/bootstrap/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../assets/bootstrap/themify-icons.css" rel="stylesheet">
    <?php 
            if($level == 1){ 
                include("adminSlideBar.php");
                include("adminHeader.php"); 
                
            }
            else{
                include("header.php");
            }
    ?>
</head>
<body>

<div class="wrapper">
	

    <div class="main-panel">



        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-10 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Register New Donor</h4>
                            </div>
                            <div class="content">
                                <div id="messages"></div>
                                <form action="donors/registerDonor" method="post" id="donorRegisterForm">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                               <div class="form-group">
                                                   <li class="list-group-item list-group-item-info"><h5><b>Donor Information</b></h5></li>
                                               </div> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="nic">National Identity Card Number</label>
                                                <input type="text" class="form-control border-input" id="nic" name="nic" placeholder="Eg: 852125456V">
                                                
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" class="form-control border-input" id="fname" name="fname" placeholder="Eg: Samantha">                                                                                                                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="mname">Middle Name</label>
                                                <input type="text" class="form-control border-input" id="mname" name="mname" placeholder="Eg: Kumara">   
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input type="text" class="form-control border-input" id="lname" name="lname" placeholder="Eg: Silva">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" class="form-control border-input" id="dob" name="dob" placeholder="Eg: 2016/05/20">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group border-input">
                                                <label for="gender">Gender</label>
                                                <select class="form-control border-input" id="gender" name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="address1">Address Line 1</label>
                                                <input type="text" class="form-control border-input" id="address1" name="address1" placeholder="Eg: No. 52/1, jaya Mawatha">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="address2">Address Line 2</label>
                                                <input type="text" class="form-control border-input" id="address2" name="address2" placeholder="Eg: wijayapura">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control border-input" id="city" name="city" placeholder="Eg: Rajagiriya">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control border-input" id="email" name="email" placeholder="Eg: silva@testmail.com">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="telephone1">Telephone Home</label>
                                                <input type="number" class="form-control border-input" id="telephone1" name="telephone1" placeholder="Eg: 0118526520">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="telephone2">Telephone Mobile</label>
                                                <input type="number" class="form-control border-input" id="telephone2" name="telephone2" placeholder="Eg: 0795258741">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="gramasevakadevision">Gramasevaka Devision</label>
                                                <input type="text" class="form-control border-input" id="gramasevakadevision" name="gramasevakadevision" placeholder="Eg: kolonnawa">                                                                         
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">                                                                         
                                                <label for="gramasevakanumber">Gramasevaka Devision Number</label>
                                                <input type="number" class="form-control border-input" id="gramasevakanumber" name="gramasevakanumber" placeholder="Eg: 10563">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="divisional">Divisional Secretary Area</label>
                                                <input type="text" class="form-control border-input" id="divisional" name="divisional" placeholder="Eg: Dehiwala">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="division">Division</label>
                                                <select class="form-control border-input" id="division" name="division">
                                                    <?php 
                                                      foreach($locationsDistrict as $district) {?>
                                                          <option value="<?php echo $district->districtName ?>"><?php echo $district->districtName ?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="province">Province</label>
                                                <select class="form-control border-input" id="province" name="province">
                                                    <?php 
                                                      foreach($locationsProvince as $province) {?>
                                                          <option value="<?php echo $province->provinceName ?>"><?php echo $province->provinceName ?></option>
                                                      <?php } ?>
                                                </select>  
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                               <div class="form-group">
                                                   <li class="list-group-item list-group-item-info"><h5><b>Information of a close Relation</b></h5></li>
                                               </div> 
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_fname">First Name</label>
                                                <input type="text" class="form-control border-input" id="cr_fname" name="cr_fname" placeholder="Eg: Sumanasiri">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_lname">Last Name</label>
                                                <input type="text" class="form-control border-input" id="cr_lname" name="cr_lname" placeholder="Eg: Perea">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_address1">Address Line 1</label>
                                                <input type="text" class="form-control border-input" id="cr_address1" name="cr_address1" placeholder="Eg: No:45, Temple Road">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_address2">Address Line 2</label>
                                                <input type="text" class="form-control border-input" id="cr_address2" name="cr_address2" placeholder="Eg: Nawala Road">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_city">City</label>
                                                <input type="text" class="form-control border-input" id="cr_city" name="cr_city" placeholder="Eg: Nugegoda">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_nic">National Identity Card Number</label>
                                                <input type="text" class="form-control border-input" id="cr_nic" name="cr_nic" placeholder="Eg: 257852147V">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_relationship">Relationship</label>
                                                <input type="text" class="form-control border-input" id="cr_relationship" name="cr_relationship" placeholder="Eg: Brother">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_telephone1">Telephone</label>
                                                <input type="number" class="form-control border-input" id="cr_telephone1" name="cr_telephone1" placeholder="Eg: 0118545652">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="cr_telephone2">Mobile</label>
                                                <input type="number" class="form-control border-input" id="cr_telephone2" name="cr_telephone2" placeholder="Eg: 0795214522">
                                            </div>
                                        </div>
                                    </div>
                                                                                                       
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" >Register Donor</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>


<!--        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>-->

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../assets/jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../assets/jquery/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="../assets/jquery/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="../assets/jquery/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/jquery/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="../assets/jquery/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/jquery/demo.js"></script>
        
    <!--Validations-->

        <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="../custom/js/donorRegister.js"></script>

</html>
