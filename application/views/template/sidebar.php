
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
				<a href="#" class='toggle-subnav'> <i class="fa fa-angle-down"></i>
                                    <span><?php echo LTEXT('_clients')?></span>
				</a>
			</div>
			<ul class="subnav-menu">
                            <li><a href="<?php echo base_url('clients')?>"><?php echo LTEXT('_all_clients')?></a></li>
                            <li><a href="<?php echo base_url('clients/advanced_search')?>"><?php echo LTEXT('_advanced_search')?></a></li>
                            <li><a href="<?php echo base_url('clients/add_client')?>"><?php echo LTEXT('_add_new')?></a></li>
			</ul>
		</div>
	</div>