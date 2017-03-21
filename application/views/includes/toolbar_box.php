				<div class="page-header">
					<div class="pull-left">
						<h1><?php echo $title ?></h1>
					</div>
					<div class="pull-right">
						<ul class="minitiles">
							<li class='grey'>
								<a href="#">
									<i class="fa fa-cogs"></i>
								</a>
							</li>
						</ul>
						<ul class="stats">
							<li class='satgreen'>
								<i class="fa fa-money"></i>
								<div class="details">
									<span class="big">5660</span>
									<span><?php echo LTEXT('Clients')?></span>
								</div>
							</li>
							<li class='lightred'>
								<i class="fa fa-calendar"></i>
								<div class="details">
									<span class="big"><?php echo date ('j F, Y') ; ?></span>
									<span><?php echo date ('l')?> <script type="text/javascript">var d = new Date();document.write(d.getHours() + " : " + d.getMinutes());</script></span>
								</div>
							</li>
						</ul>
					</div>
				</div>