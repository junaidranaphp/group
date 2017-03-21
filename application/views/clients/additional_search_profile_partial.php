<?php defined('BASEPATH') or die('Restricted direct access'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3>
					<i class="fa fa-table"></i>
					<?php echo LTEXT('_global_search_profile')?>
				</h3>
			</div>
			<div class="box-content">
				<div class="form-group">
					  <button type="button" class="btn btn-primary search-profile-btn"><?php echo LTEXT('_global_create_search_profiles')?></button>
				</div>
				<div id="target-search-profile">
					<?php $this->load->view('clients/additional_search_profile_ajax');?>
				</div>
			</div>
		</div>
	</div>
</div>