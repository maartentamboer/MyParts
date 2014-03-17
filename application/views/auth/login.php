<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>MyParts</title>

   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/jquery.dynatable.css') ?>" rel="stylesheet">
   <style type="text/css">
   body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
   </style>
  </head>
<body>


<div class="container">


<?php echo form_open("auth/login", $formlook);?>
<div id="infoMessage text-center"><?php echo $message;?></div>
    <h2 class="form-signin-heading"><?php echo lang('login_heading');?></h2>
    <p><?php //echo lang('login_subheading');?></p>
    <?php echo form_input($identity);?>

    <?php echo form_input($password);?>

  <p>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
    Remember me
  </p>


  <p><?php echo form_submit($submitbtn, lang('login_submit_btn'));?></p>
<p class='text-center'><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
<?php echo form_close();?>


</div>
</body>