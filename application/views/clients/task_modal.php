<?php defined('BASEPATH') or die('Restricted direct access') ?>
<div class="modal fade" data-backdrop="static" id="add-task-modal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"><?php echo LTEXT('_additional_task')?></h4>
      		</div>
      		<div class="modal-body" id="add-task-target">
        		
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="button" id="post-task-btn" class="btn btn-primary post-task-btn"><?php echo LTEXT('_global_save_submitbutton')?></button>
      		</div>
    	</div>
	</div>
</div>