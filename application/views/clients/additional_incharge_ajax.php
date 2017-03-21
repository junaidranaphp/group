<?php defined('BASEPATH') or die('Restricted direct access') ?>
<?php if (count($sachbearbeiter) == 0) { ?>
<span><?php echo LTEXT('_global_no_results_found')?></span>
<?php } else { ?>
<table class="table table-hover table-bordered table-striped">	
	<thead>
		<tr>
			<th><?php echo LTEXT('_global_default')?></th>
			<th><?php echo LTEXT('_global_fullname')?></th>
			<th><?php echo LTEXT('_action')?></th>
		</tr>
	</thead>							
	<tbody>
		<?php foreach ($sachbearbeiter as $value){?>
			<tr>
       			<td>
					<?php echo $value->default ? LTEXT('_global_default'):''?>
				</td>
				<td>
					<?php echo $value->name.' , '.$value->vorname?>
   				</td>
   				<td>
					<div class="action-group">
						<button  class="btn edit-additional-incharge"  data-id_incharge="<?php echo $value->id?>" >
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn remove-additional-incharge" data-id_incharge="<?php echo $value->id?>" >
							<i class="fa fa-times"></i>
						</button>
					</div>
				</td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>