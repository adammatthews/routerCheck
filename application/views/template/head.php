<!DOCTYPE html>
<html>
  <head>
    <?php if(!empty($refresh)){?>
    <meta http-equiv="refresh" content="<?php echo $refresh?>;URL='<?php echo $_SERVER['PHP_SELF'];?>'">
    <?php };?>
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="http://www.nova-itsolutions.com/favicon.ico">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('bootstrap/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('bootstrap/css/routerCheck.css');?>" rel="stylesheet" media="screen">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">
 $(document).ready(function () {
$("[data-toggle='tooltip']").tooltip('triger: hover');
});
</script>
  </head>

  <body>

<div class="container-fluid">
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">
        <img src="http://www.nova-itsolutions.com/gui/images/logo.png" width="100px"/> routerCheck
    </a>
    <span style="float:right; margin-top:20px;">
      Logged in as 
    <?php 
    $user = $this->ion_auth->user()->row();
    echo $user->first_name.' '.$user->last_name;
    ?>
  </span>
    <ul class="nav">
      <!--<li class="active"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>-->
    </ul>
  </div>
</div> 