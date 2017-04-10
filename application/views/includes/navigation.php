	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">Team Group</a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation">
				<i class="fa fa-bars"></i>
			</a>
			<ul class='main-nav'>
				<li class='active'>
					<a href="index.html">
						<span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Properties</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="forms-basic.html">List Properties</a>
						</li>
						<li>
							<a href="forms-extended.html">Advanced Search</a>
						</li>
						<li>
							<a href="forms-validation.html">Add new</a>
						</li>						
					</ul>
				</li>
				<li>
					<?php $menu = getMenu('clients_top'); ?>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span><?php echo $menu[0]['title']?></span>
						<span class="caret"></span>
					</a>					
					<ul class="dropdown-menu">
						<?php
							for ($i=1; $i < count($menu); $i++){
								echo "<li><a href='{$menu[$i]['url']}'>{$menu[$i]['title']}</a>";
							}					
						?>
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Email</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="tables-basic.html">Basic tables</a>
						</li>
						<li>
							<a href="tables-advanced.html">Advanced tables</a>
						</li>
						<li>
							<a href="tables-large.html">Large tables</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Tasks</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="plugins-charts.html">Charts</a>
						</li>
						<li>
							<a href="plugins-calendar.html">Calendar</a>
						</li>
						<li>
							<a href="plugins-filemanager.html">File manager</a>
						</li>
						<li>
							<a href="plugins-filetrees.html">File trees</a>
						</li>
						<li>
							<a href="plugins-elements.html">Editable elements</a>
						</li>
						<li>
							<a href="plugins-maps.html">Maps</a>
						</li>
						<li>
							<a href="plugins-dragdrop.html">Drag &amp; Drop widgets</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Calendar</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="more-error.html">Error pages</a>
						</li>
						<li class='dropdown-submenu'>
							<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Shop</a>
							<ul class="dropdown-menu">
								<li>
									<a href="more-shop-list.html">List view</a>
								</li>
								<li>
									<a href="more-shop-product.html">Product view</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="more-pricing.html">Pricing tables</a>
						</li>
						<li>
							<a href="more-faq.html">FAQ</a>
						</li>
						<li>
							<a href="more-invoice.html">Invoice</a>
						</li>
						<li>
							<a href="more-userprofile.html">User profile</a>
						</li>
						<li>
							<a href="more-searchresults.html">Search results</a>
						</li>
						<li>
							<a href="more-login.html">Login</a>
						</li>
						<li>
							<a href="more-locked.html">Lock screen</a>
						</li>
						<li>
							<a href="more-email.html">Email templates</a>
						</li>
						<li>
							<a href="more-blank.html">Blank page</a>
						</li>
						<li class='dropdown-submenu'>
							<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Blog</a>
							<ul class="dropdown-menu">
								<li>
									<a href="more-blog-list.html">List big image</a>
								</li>
								<li>
									<a href="more-blog-list-small.html">List small image</a>
								</li>
								<li>
									<a href="more-blog-post.html">Post</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<?php $menu = getMenu('settings_top'); ?>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Settings</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php
							for ($i=1; $i < count($menu); $i++){
								echo "<li><a href='".base_url()."{$menu[$i]['url']}'>{$menu[$i]['title']}</a>";
							}					
						?>
					</ul>
				</li>
			</ul>
			<div class="user">
				<ul class="icon-nav">
					<li class='dropdown'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown">
							<i class="fa fa-envelope"></i>
							<span class="label label-lightred">4</span>
						</a>
						<ul class="dropdown-menu pull-right message-ul">
							<li>
								<a href="#">
									<img src="img/demo/user-1.jpg" alt="">
									<div class="details">
										<div class="name"><?php echo $session['name']  ?></div>
										<div class="message">
											Lorem ipsum Commodo quis nisi ...
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/user-2.jpg" alt="">
									<div class="details">
										<div class="name"><?php echo $session['name']  ?></div>
										<div class="message">
											Ut ad laboris est anim ut ...
										</div>
									</div>
									<div class="count">
										<i class="fa fa-comment"></i>
										<span>3</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/user-3.jpg" alt="">
									<div class="details">
										<div class="name">Bob Doe</div>
										<div class="message">
											Excepteur Duis magna dolor!
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="components-messages.html" class='more-messages'>Go to Message center
									<i class="fa fa-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown sett">
						<a href="#" class='dropdown-toggle' data-toggle="dropdown">
							<i class="fa fa-cog"></i>
						</a>
						<ul class="dropdown-menu pull-right theme-settings">
							<li>
								<span>Layout-width</span>
								<div class="version-toggle">
									<a href="#" class='set-fixed'>Fixed</a>
									<a href="#" class="active set-fluid">Fluid</a>
								</div>
							</li>
							<li>
								<span>Topbar</span>
								<div class="topbar-toggle">
									<a href="#" class='set-topbar-fixed'>Fixed</a>
									<a href="#" class="active set-topbar-default">Default</a>
								</div>
							</li>
							<li>
								<span>Sidebar</span>
								<div class="sidebar-toggle">
									<a href="#" class='set-sidebar-fixed'>Fixed</a>
									<a href="#" class="active set-sidebar-default">Default</a>
								</div>
							</li>
						</ul>
					</li>
					<li class='dropdown colo'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown">
							<i class="fa fa-tint"></i>
						</a>
						<ul class="dropdown-menu pull-right theme-colors">
							<li class="subtitle">
								Predefined colors
							</li>
							<li>
								<span class='red'></span>
								<span class='orange'></span>
								<span class='green'></span>
								<span class="brown"></span>
								<span class="blue"></span>
								<span class='lime'></span>
								<span class="teal"></span>
								<span class="purple"></span>
								<span class="pink"></span>
								<span class="magenta"></span>
								<span class="grey"></span>
								<span class="darkblue"></span>
								<span class="lightred"></span>
								<span class="lightgrey"></span>
								<span class="satblue"></span>
								<span class="satgreen"></span>
							</li>
						</ul>
					</li>
					<li class='dropdown language-select'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown">
							<img src="img/demo/flags/<?php echo strtoupper($this->session->userdata['language'] )?>.gif" alt="">
							<span><?php echo strtoupper($this->session->userdata['language'] )?></span>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#">
									<img src="img/demo/flags/br.gif" alt="">
									<span>Brasil</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/flags/de.gif" alt="">
									<span>Deutschland</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/flags/es.gif" alt="">
									<span>España</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/flags/fr.gif" alt="">
									<span>France</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $this->session->userdata['name'] ?>
						<img src="img/demo/user-avatar.jpg" alt="">
					</a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="more-userprofile.html">Edit profile</a>
						</li>
						<li>
							<a href="#">Account settings</a>
						</li>
						<li>
							<a href="more-login.html">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
