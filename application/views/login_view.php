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