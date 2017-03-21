<?php defined('BASEPATH') or die('Restricted direct access') ?>
<div class="modal fade" data-backdrop="static" id="add-address-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"><?php echo LTEXT('_search_addresses')?></h4>
      		</div>
      		<div class="modal-body" id="add-address-target">
        		
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="button" id="search-addresses-btn" class="btn btn-primary search-addresses-btn"><?php echo LTEXT('_global_save_submitbutton')?></button>
        		<button type="button" id="add-address-confirm-btn" class="btn btn-success hide"><?php echo LTEXT('_global_add')?></button>
        		<button type="button" id="edit-address-confirm-btn" class="btn btn-warning hide"><?php echo LTEXT('_global_update')?></button>
      		</div>
    	</div>
	</div>
</div>