<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="msapplication-tap-highlight" content="no">
<meta name="description" content="MateRio is a responsive Admin Template based on Material Design by Google.">
<meta name="keywords" content="materialize, admin template, dashboard template, responsive admin template,">
<title>Sistem Informasi Beasiswa - Login</title>

<link href="<?php echo base_url()?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
<link href="<?php echo base_url()?>assets/css/plugins/prism.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo base_url()?>assets/css/plugins/simplebar.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo base_url()?>assets/css/assistance.css" type="text/css" rel="stylesheet" media="screen">
<style type="text/css">
html,
body{
    height: 100%;
}
main {
    padding: 0 !important;
}
.form-header {
    padding: 12px 24px 12px 12px;
}
.form-header .col{
	height:64px;
}
.form-body {
    padding: 12px 24px;
}
</style>
</head>

<body>

<!-- Main Start -->
<main class="valign-wrapper">
  <div class="container valign">

	<!--  Tables Section-->
      <div id="login" class="row">
	  <!-- <h1 class="thin">Login</h1> -->
    <div class="col s12 m8 l6 offset-m2 offset-l3 card-panel">
      <form class="login-form">
        <div class="row primary-color form-header">
          <div class="col s4">
            <img src="<?php echo base_url();?>imgs/admin-logo-full.svg" alt="logo" class="logo responsive-img-height">
          </div>
		  <div class="col s8 right-align">
            <h4 class="light white-text">Login</h4>
          </div>
        </div>
		<div class="form-body">
        <div class="row">
          <div class="input-field col s12">
            <i class="mdi-social-person prefix"></i>
            <input id="username" type="text" class="validate">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="mdi-action-lock prefix"></i>
            <input id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <a href="index-2.html" class="btn-large waves-effect waves-light col s12">Login</a>
          </div>
        </div>
        <div class="row">
          <div class="col s6">
            <p class="margin medium-small"><a href="register.html">Register Now!</a></p>
          </div>
          <div class="col s6">
              <p class="margin right-align medium-small"><a href="reset-password.html">Forgot password?</a></p>
          </div>
        </div>
	  </div>
      </form>
    </div>
  </div>
  </div>

</main>
<!-- Main End -->


<!-- jQuery Library -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bin/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url()?>assets/js/bin/jquery-2.1.4.min.js"><\/script>'); }</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bin/plugins/prism.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bin/plugins/simplebar.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bin/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bin/initialize.js"></script>

</body>
</html>
