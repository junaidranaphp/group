<body>
	<div id="modal-user" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel"><?php echo $this->session->userdata['name'] ?></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-2">
							<img src="img/demo/user-1.jpg" alt="">
						</div>
						<div class="col-sm-10">
							<dl class="dl-horizontal" style="margin-top:0;">
								<dt>Full name:</dt>
								<dd><?php echo $this->session->userdata['name']  ?></dd>
								<dt>Email:</dt>
								<dd>jane.doe@janedoesemail.com</dd>
								<dt>Address:</dt>
								<dd>
									<address>
										<strong>John Doe, Inc.</strong>
										<br>7195 JohnsonDoes Ave, Suite 320
										<br>San Francisco, CA 881234
										<br>
										<abbr title="Phone">P:</abbr>
										(123) 456-7890
									</address>
								</dd>
								<dt>Social:</dt>
								<dd>
									<a href="#" class='btn'>
										<i class="fa fa-facebook"></i>
									</a>
									<a href="#" class='btn'>
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#" class='btn'>
										<i class="fa fa-linkedin"></i>
									</a>
									<a href="#" class='btn'>
										<i class="fa fa-envelope"></i>
									</a>
									<a href="#" class='btn'>
										<i class="fa fa-rss"></i>
									</a>
									<a href="#" class='btn'>
										<i class="fa fa-github"></i>
									</a>
								</dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('includes/navigation');?>