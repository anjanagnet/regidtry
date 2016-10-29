<!DOCTYPE html>
<html>
    <?php 
        $level = $this->session->userdata('user_level');        
    ?>
    <head>
        <title> <?php echo $title ?> </title>
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="../custom/css/style.css">
        <?php 
            if($level == 1){ 
                include("adminSlideBar.php");  
            }
            else{
                include("header.php");
            }
        ?>
    </head>
    <body>
<!--        <nav class="navbar navbar-default">
        <div class="container-fluid">
           Brand and toggle get grouped for better mobile display 
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <a class="navbar-brand" href="dashboard">Dashboard</a>
          </div>

           Collect the nav links, forms, and other content for toggling 
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="profile">Profile</a></li>
                  <li><a href="setting">Settings</a></li>
                  <li><a href="users/logout">Logout</a></li>                  
                </ul>
              </li>
            </ul>
          </div> /.navbar-collapse 
        </div> /.container-fluid 
        </nav>-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Edit Profile Details</div>
                        <div class="panel-body">
                            
                            <div id="messages"></div>
                            <form action="users/update" method="post" id="updateUserForm">
                                <div class="form-group">
                                  <label for="username">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $userData['username'] ?>">
                                  
                                </div>
                                <div class="form-group">
                                  <label for="fname">First Name</label>
                                  <input type="text" class="form-control" id="fname" name ="fname" placeholder="First Name" value="<?php echo $userData['fname'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="lname">Last Name</label>
                                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo $userData['lname'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="text" id="email" name="email" placeholder="email" value="<?php echo $userData['email'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="contact">Contact</label>
                                  <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="<?php echo $userData['contact'] ?>">
                                </div>
                                
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Change Password</div>
                        <div class="panel-body">
                            <div id="passwordmessages"></div>
                            <form action="users/changepassword" method="post" id="changepasswordForm">
                                <div class="form-group">
                                  <label for="currentpassword">Current Password</label>
                                  <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Current Password" >
                                  
                                </div>
                                <div class="form-group">
                                  <label for="newpassword">New Password</label>
                                  <input type="password" class="form-control" id="newpassword" name ="newpassword" placeholder="New Password" >
                                </div>
                                <div class="form-group">
                                  <label for="passwordagain">Password Again</label>
                                  <input type="password" class="form-control" id="passwordagain" name="passwordagain" placeholder="Password Again" >
                                </div>
                                
                                
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>       
        <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="../custom/js/setting.js"></script>
    </body>
</html>























