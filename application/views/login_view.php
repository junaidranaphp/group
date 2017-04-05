<!doctype html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- Apple devices fullscreen -->
<meta names="apple-mobile-web-app-status-bar-style"
	content="black-translucent" />

<title>FLAT - Basic forms</title>

<!-- Bootstrap -->
<link rel="stylesheet"
	href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
<!-- jQuery UI -->
<link rel="stylesheet"
	href="<?php echo base_url('assets/css/plugins/jquery-ui/jquery-ui.min.css')?>">
<!-- Theme CSS -->
<link rel="stylesheet"
	href="<?php echo base_url('assets/css/style.css')?>">
<!-- Color CSS -->
<link rel="stylesheet"
	href="<?php echo base_url('assets/css/themes.css')?>">
<link rel="stylesheet"
	href="<?php echo base_url('assets/css/mystyle.css')?>">


<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>

<!-- Nice Scroll -->
<script
	src="<?php echo base_url('assets/js/plugins/nicescroll/jquery.nicescroll.min.js')?>"></script>
<!-- imagesLoaded -->
<script
	src="<?php echo base_url('assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js')?>"></script>
<!-- jQuery UI -->
<script
	src="<?php echo base_url('assets/js/plugins/jquery-ui/jquery-ui.js')?>"></script>
<!-- Touch enable for jquery UI -->
<script
	src="<?php echo base_url('assets/js/plugins/touch-punch/jquery.touch-punch.min.js')?>"></script>
<!-- slimScroll -->
<script
	src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<!-- Bootbox -->
<script
	src="<?php echo base_url('assets/js/plugins/bootbox/jquery.bootbox.js')?>"></script>

<!-- Theme framework -->
<script src="<?php echo base_url('assets/js/eakroko.min.js')?>"></script>
<!-- Theme scripts -->
<script src="<?php echo base_url('assets/js/application.min.js')?>"></script>
<!-- Just for demonstration -->
<script src="<?php echo base_url('assets/js/demonstration.min.js')?>"></script>

<!--[if lte IE 9]>
                <script src="<?php echo base_url('assets/js/plugins/placeholder/jquery.placeholder.min.js')?>"></script>
                <script>
                        $(document).ready(function() {
                                $('input, textarea').placeholder();
                        });
                </script>
                <![endif]-->

<!-- Favicon -->
<link rel="shortcut icon"
	href="<?php echo base_url('assets/img/favicon.ico')?>" />
<!-- Apple devices Homescreen icon -->
<link rel="apple-touch-icon-precomposed"
	href="<?php echo base_url('assets/img/apple-touch-icon-precomposed.png')?>" />

</head>

<body class='login'>
	<div class="wrapper">
		<h1>
			<a href="index.html">
				<img src="<?php echo base_url('assets/img/logo-big.png')?>" alt="" class='retina-ready' width="184" height="61"></a>
		</h1>
		<div class="login-body">
			<?php echo "<h3>" . validation_errors() . "</h3>"; ?>
            <h2>SIGN IN</h2>
			<form action="verifylogin" method='post' class='form-validate' id="login-form" accept-charset="utf-8">            
             
				<div class="form-group">
					<div class="email controls">
						<input type="text" name='username' id='username' placeholder="User name" class='form-control' data-rule-required="true">
					</div>
				</div>
				<div class="form-group">
					<div class="pw controls">
						<input type="password" name="password" id='password' placeholder="Password" class='form-control' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<div class="remember">
						<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember">
						<label for="remember">Remember me</label>
					</div>
					<input type="submit" value="Sign me in" class='btn btn-primary'>
				</div>
			</form>
			<div class="forget">
				<a href="#">
					<span>Forgot password?</span>
				</a>
			</div>
		</div>
	</div>