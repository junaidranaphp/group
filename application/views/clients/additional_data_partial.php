<?php defined('BASEPATH') or die('Restricted direct access'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3>
					<i class="fa fa-table"></i>
					<?php echo LTEXT('_global_additional_data')?>
				</h3>
			</div>
			<div class="box-content">
				<div class="form-group">
					  <button type="button" class="btn btn-primary add-data-btn"><?php echo LTEXT('_add_additional_data')?></button>
				</div>
				<div id="target-additional-data">
					<?php $this->load->view('clients/additional_data_ajax');?>
				</div>
			</div>
		</div>
	</div>
</div>