<?php defined('BASEPATH') or die('Restricted direct access') ?>
<div class="modal fade" data-backdrop="static" id="search-profile-modal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"><?php echo LTEXT('_global_search_profile')?></h4>
      		</div>
      		<div class="modal-body" id="search-profile-target">
        		
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="button" id="post-search-profile" class="btn btn-primary post-search-profile-btn"><?php echo LTEXT('_global_save_submitbutton')?></button>
        		<button type="button" id="add-address-confirm-btn" class="btn btn-success hide"><?php echo LTEXT('_global_add')?></button>
        		<button type="button" id="edit-address-confirm-btn" class="btn btn-warning hide"><?php echo LTEXT('_global_update')?></button>
      		</div>
    	</div>
	</div>
</div>