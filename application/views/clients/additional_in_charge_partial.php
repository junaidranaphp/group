<?php defined('BASEPATH') or die('Restricted direct access'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3>
					<i class="fa fa-table"></i>
					<?php echo LTEXT('_global_in_charge')?>
				</h3>
			</div>
			<div class="box-content">
				<div class="form-group">
					  <button type="button" class="btn btn-primary add-incharge-btn"><?php echo LTEXT('_global_add_in_charge')?></button>
				</div>
				<div id="target-additional-incharge">
					<?php $this->load->view('clients/additional_incharge_ajax');?>
				</div>
			</div>
		</div>
	</div>
</div>