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
    
    <!--Adding donorHeader navbar-->
<?PHP
    require_once 'donorHeader.php';
?>
    <!--end-->
    
<div class="wrapper">
	

    <div class="main-panel">



        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6 col-md-7">
                        <div id="messagesSearch"></div>
                        <div class="card" id='nameForm'>
                            <div class="header">
                                <h4 class="title">Search By District</h4>
                            </div>
                            
                            <div class="content">
                                
                                <form action="donors/searchByDistrict" method="post" id="searchDistrictForm">
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group border-input">
                                                <label for="gender">Choose District</label>
                                                <select class="form-control border-input" id="division" name="division">
                                                    <?php 
                                                      foreach($locationsDistrict as $district) {?>
                                                          <option value="<?php echo $district->districtName ?>"><?php echo $district->districtName ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="text-right">
                                        <!--<button type="submit" class="btn btn-info btn-fill btn-wd">Search</button>-->
                                        
                                        <input id="button" type="submit"  value="Search Donor"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                </form>
                                 
                                
                            </div>
                        
                        </div>
                    </div>
                </div>
                
                
                <div class="row" id="resultForm">
                    <div class="hidden" id='needHide'>
                    <div class="col-lg-10 col-md-7">
                        <div id="messagesSearch"></div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Search Results</h4>
                            </div>
                            <div class="content">
                                <div id="form_input"></div>
                                <div id="form_output"></div>
                                
                                <div class="content table-responsive table-full-width">
                                <table id="tableDonor" class="table table-striped">
                                    <thead>
                                        <th>Donor ID</th>
                                    	<th>First Name</th>
                                    	<th>Last Name</th>
                                    	<th>NIC</th>
                                        <th>Status</th>
                                        <th></th>
                                        
                                    </thead>
                                    <tbody></tbody>    
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>         

                    

                </div>
            </div>    
                    
            
            <!--This content displays after pressing view donor button--> 
            <div id="thirdContent" class="hidden">
                <div class="row">

                    <div class="col-lg-10 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Donor Details</h4>
                            </div>
                            <div class="content">
                                <div id="messages"></div>
                                
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                               <div class="form-group">
                                                   <li class="list-group-item list-group-item-info"><h5><b>Donor Information</b></h5></li>
                                               </div> 
                                               <div class="form-group">
                                                   <li class="list-group-item list-group-item-info" id="insertStatus"><b>Donor status: </b></li>
                                               </div>  
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                    <form class="form-inline" action="donors/updateStatus" id="changeStatusForm">
                                
                                        <div class="row">
                                            <input type="hidden" id="getID" name="getID" value="">
                                            <div class="col-md-10">
                                                <label for="division"><b>Change Donor Status</b> </label>
                                                <div class="hidden" id="insertID"></div>
                                                   
                                                <select class="form-control border-input" name="status" id="status" value=""> 
                                                            <?php 
                                                              foreach($donorStatus as $status) {?>
                                                                  <option value="<?php echo $status->id ?>"><?php echo $status->name ?></option>
                                                            <?php } ?>
                                                </select>
                                                <button type="submit" onclick="">Update</button>

                                            </div>    
                                        </div>
                                        
                                    </form>    
                            </div>
                                
                                    <table id="insertData" class="table table-striped">
                                    
                                        <tbody>
                                            
                                        </tbody>    
                                    </table>    
                                    
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                               <div class="form-group">
                                                   <li class="list-group-item list-group-item-info"><h5><b>Information of a close Relation</b></h5></li>
                                               </div> 
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <table id="insertData2" class="table table-striped">
                                    
                                        <tbody>
                                            
                                        </tbody>    
                                    </table>      
                                        
                            </div>
                                
                            
                            </div>
                        </div>
                    </div> 


                </div>
        
        </div>
        



    </div>
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
        
        <script src="../custom/js/searchDistrict.js"></script>
        
        
        
        

</html>
