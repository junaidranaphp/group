<?php $menu = getMenu('clients'); ?>

	<div class="container-fluid" id="content">
		<div id="left">
			<form action="search-results.html" method="GET" class='search-form'>
				<div class="search-pane">
					<input type="text" name="search" placeholder="Search here...">
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</form>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'>
						<i class="fa fa-angle-down"></i>
						<span><?php echo $menu[0]['title'];?></span>
					</a>
				</div>
				<ul class="subnav-menu">					
					<?php
					for ($i=1; $i < count($menu); $i++){
						echo '<li><a href="'.base_url($menu[$i]['url']).'"> '.$menu[$i]['title'].'</a></li>';
					}					
					?>
				</ul>
			</div>
		</div>
