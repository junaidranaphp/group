<?php defined('BASEPATH') or die('Restricted direct access'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3>
					<i class="fa fa-table"></i>
					<?php echo LTEXT('_additional_contacts')?>
				</h3>
			</div>
			<div class="box-content">
				<div class="form-group">
					  <button type="button" class="btn btn-primary add-contact-btn" id="add-contact-btn"><?php echo LTEXT('_add_contacts')?></button>
				</div>
				<div id="target-additional-contact">
					<?php $this->load->view('clients/additional_contacts_ajax');?>
				</div>
			</div>
		</div>
	</div>
</div>