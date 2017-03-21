<?php defined('BASEPATH') or die('Restricted direct access'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3>
					<i class="fa fa-table"></i>
					<?php echo LTEXT('_global_contact_history')?>
				</h3>
			</div>
			<div class="box-content">
			  	<div class="form-group">
			  		<button type="button" class="btn btn-primary add-contacthistory-btn"><?php echo LTEXT('_add_contact_history')?></button>	
			  	</div>
				<div id="target-additional-contacthistory">
					<?php $this->load->view('clients/additional_contacthistory_ajax');?>
				</div>
			</div>
		</div>
	</div>
</div>