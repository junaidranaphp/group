<?php defined('BASEPATH') or die('Restricted direct access'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3>
					<i class="fa fa-table"></i>
					<?php echo LTEXT('_obj_additional_addresses')?>
				</h3>
			</div>
			<div class="box-content">
				<div class="form-group">
					  <button type="button" class="btn btn-primary add-address-btn" id="add-address-btn"><?php echo LTEXT('_global_search').' '.LTEXT('_global_addresses')?></button>
				</div>
				<div id="target-additional-address">
					<?php $this->load->view('clients/additional_addresses_ajax');?>
				</div>
			</div>
		</div>
	</div>
</div>