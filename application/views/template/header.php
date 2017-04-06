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

<body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">FLAT</a> <a href="#" class="toggle-nav"
				rel="tooltip" data-placement="bottom" title="Toggle navigation"> <i
				class="fa fa-bars"></i>
			</a>
			<ul class='main-nav'>
				<li><a href="index.html"> <span>Dashboard</span></a></li>
				<?php
				//create the top menu from the menu config
				foreach ($this->config->item('menu') as $key => $menu){							
					echo "<li " . ( ($this->template->get_active_menu() == $key) ? 'class="active"' : '' ). ">" ;					
					echo "<a href=\"".base_url()."{$menu[0]['url']}\" data-toggle=\"dropdown\" class=\"dropdown-toggle\"> <span>{$menu[0]['title']}</span><span class=\"caret\"></span></a>";
					echo "<ul class=\"dropdown-menu\">";
					for ($i = 1; $i < count($menu); $i++){
						echo "<li " . ( ($this->template->get_active_submenu() == $menu[$i]['title']) ? 'class="active"' : '' ) . ">";
						echo "<a href=\"".base_url()."{$menu[$i]['url']}\">{$menu[$i]['title']}</a></li>";
					}
					echo "</ul>";

				}
				?>					
			</ul>
			<div class="user">
				<ul class="icon-nav">
					<li class='dropdown'><a href="#" class='dropdown-toggle'
						data-toggle="dropdown"> <i class="fa fa-envelope"></i> <span
							class="label label-lightred">4</span>
					</a>
						<ul class="dropdown-menu pull-right message-ul">
							<li><a href="#"> <img
									src="<?php echo base_url('assets/img/demo/user-1.jpg')?>"
									alt="">
									<div class="details">
										<div class="name">Jane Doe</div>
										<div class="message">Lorem ipsum Commodo quis nisi ...</div>
									</div>
							</a></li>
							<li><a href="#"> <img
									src="<?php echo base_url('assets/img/demo/user-2.jpg')?>"
									alt="">
									<div class="details">
										<div class="name">John Doedoe</div>
										<div class="message">Ut ad laboris est anim ut ...</div>
									</div>
									<div class="count">
										<i class="fa fa-comment"></i> <span>3</span>
									</div>
							</a></li>
							<li><a href="#"> <img
									src="<?php echo base_url('assets/img/demo/user-3.jpg')?>"
									alt="">
									<div class="details">
										<div class="name">Bob Doe</div>
										<div class="message">Excepteur Duis magna dolor!</div>
									</div>
							</a></li>
							<li><a href="components-messages.html" class='more-messages'>Go
									to Message center <i class="fa fa-arrow-right"></i>
							</a></li>
						</ul></li>

					<li class="dropdown sett"><a href="#" class='dropdown-toggle'
						data-toggle="dropdown"> <i class="fa fa-cog"></i>
					</a>
						<ul class="dropdown-menu pull-right theme-settings">
							<li><span>Layout-width</span>
								<div class="version-toggle">
									<a href="#" class='set-fixed'>Fixed</a> <a href="#"
										class="active set-fluid">Fluid</a>
								</div></li>
							<li><span>Topbar</span>
								<div class="topbar-toggle">
									<a href="#" class='set-topbar-fixed'>Fixed</a> <a href="#"
										class="active set-topbar-default">Default</a>
								</div></li>
							<li><span>Sidebar</span>
								<div class="sidebar-toggle">
									<a href="#" class='set-sidebar-fixed'>Fixed</a> <a href="#"
										class="active set-sidebar-default">Default</a>
								</div></li>
						</ul></li>
					<li class='dropdown colo'><a href="#" class='dropdown-toggle'
						data-toggle="dropdown"> <i class="fa fa-tint"></i>
					</a>
						<ul class="dropdown-menu pull-right theme-colors">
							<li class="subtitle">Predefined colors</li>
							<li><span class='red'></span> <span class='orange'></span> <span
								class='green'></span> <span class="brown"></span> <span
								class="blue"></span> <span class='lime'></span> <span
								class="teal"></span> <span class="purple"></span> <span
								class="pink"></span> <span class="magenta"></span> <span
								class="grey"></span> <span class="darkblue"></span> <span
								class="lightred"></span> <span class="lightgrey"></span> <span
								class="satblue"></span> <span class="satgreen"></span></li>
						</ul></li>
					<li class='dropdown language-select'><a href="#"
						class='dropdown-toggle' data-toggle="dropdown"> <img
							src="<?php echo base_url('assets/img/demo/flags/us.gif')?>"
							alt=""> <span>US</span>
					</a>
						<ul class="dropdown-menu pull-right">
							<li><a href="#"> <img
									src="<?php echo base_url('assets/img/demo/flags/br.gif')?>"
									alt=""> <span>Brasil</span>
							</a></li>
							<li><a href="#"> <img
									src="<?php echo base_url('assets/img/demo/flags/de.gif')?>"
									alt=""> <span>Deutschland</span>
							</a></li>
							<li><a href="#"> <img
									src="<?php echo base_url('assets/img/demo/flags/es.gif')?>"
									alt=""> <span>España</span>
							</a></li>
							<li><a href="#"> <img
									src="<?php echo base_url('assets/img/demo/flags/fr.gif')?>"
									alt=""> <span>France</span>
							</a></li>
						</ul></li>
				</ul>
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown">John Doe
						<img
						src="<?php echo base_url('assets/img/demo/user-avatar.jpg')?>"
						alt="">
					</a>
					<ul class="dropdown-menu pull-right">
						<li><a href="more-userprofile.html">Edit profile</a></li>
						<li><a href="#">Account settings</a></li>
                                                <li><a href="<?php echo base_url('logout')?>">Sign out</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>