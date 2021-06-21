<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cores - SYS | Lockscreen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
<!--            <a href="<?php echo base_url(); ?>"><b>MedicateAdmin</b>TPA</a>-->
            <a href="<?php echo base_url(); ?>">
                <!--<img src="<?php echo base_url(); ?>assets/images/logo-arabic.png" class="img-responsive" alt="" />-->
                <!--<img src="<?php echo base_url(); ?>assets/images/Logo-English.png" class="img-responsive" alt="" />-->
            </a>
        </div>
        
        <?PHP   $attributes='class="lockscreen-credentials"';
                echo form_open('Login/check',"post"); ?>
        <!-- User name -->
           <!-- uncomment this-->
<!--                <div class="lockscreen-name">
                    <input type="text" name="UserName"class="form-control" placeholder="User Name">
                    
                </div>
           -->
      <!-- START LOCK SCREEN ITEM -->
      
            <div class="lockscreen-item">
                <!-- lockscreen image -->
               
                <!-- /.lockscreen-image -->

                <!-- lockscreen credentials (contains the form) -->
                <div class="lockscreen-name">
                    <input type="text" name="UserName"class="form-control" placeholder="User Name">    
                </div>
           
                <div class="input-group">
                <!--                    <div class="lockscreen-image">
                                        <img src="<?php echo base_url(); ?>style/dist/img/images.png" alt="User Image">
                                    </div>-->
                
                <input  type="password" name="PassWord" class="form-control" placeholder="password">
                    <div class="input-group-btn">
                        <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            <!-- /.lockscreen credentials -->

            </div><!-- /.lockscreen-item -->
        <?PHP echo form_close(); ?>
      
      <div class="lockscreen-footer text-center">
        <strong>Copyright &copy; 2016-2017 <a href="#">Cores Co.</a>.</strong> All rights reserved.
      </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>style/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="<?php echo base_url(); ?>style/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
