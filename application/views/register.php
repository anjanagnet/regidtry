<!DOCTYPE>
<html>
    <head>
        <title> Register </title>
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../custom/css/style.css">
    </head>
    <body>
        <div class="col-md-4 col-md-offset-4 col-vertical-4">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <div id="messages"></div>
                    <form action="users/register" method="post" id="registerForm">
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control" id="username" name="username" placeholder="anjana_nisal">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="passwordAgain">Password Again</label>
                          <input type="password" class="form-control" id="passwordAgain" name="passwordAgain" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="fname">First Name</label>
                          <input type="text" class="form-control" id="fname" name="fname" placeholder="Eg: Anjana">
                        </div>
                        <div class="form-group">
                          <label for="lname">Last Name</label>
                          <input type="text" class="form-control" id="lname" name="lname" placeholder="Eg: Nisal">
                        </div>
                        <div class="form-group">
                          <label for="contact">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Eg: test@example.com">
                        </div>
                        <div class="form-group">
                          <label for="contact">Contact</label>
                          <input type="text" class="form-control" id="contact" name="contact" placeholder="Eg: 0110852589">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-md">Submit</button>
                    </form>
                    
                </div>
                <div class="panel-footer">
                    Have an Account?? <a href="../">Login</a>
                </div>
            </div>
        </div>  
        
        <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="../custom/js/register.js"></script>
    </body>
</html>