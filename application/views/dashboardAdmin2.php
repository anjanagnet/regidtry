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
            include("adminHeader.php"); }
                 
         
            else{ 
            include("header.php");}
        ?>
        
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Kidney donation registry</h1>
                        <p>...</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
    </body>
</html>