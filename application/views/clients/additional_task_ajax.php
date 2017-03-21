<?php defined('BASEPATH') or die('Restricted direct access') ?>
<?php if (count($tasks) == 0) { ?>
<span><?php echo LTEXT('_global_no_results_found')?></span>
<?php } else { ?>
<table class="table table-hover table-bordered table-striped">								
	<tbody>
				<tr>
              		<th ><?php echo LTEXT("_global_date")?></th>
              		<th><?php echo LTEXT("_global_from")?></th>
              		<th><?php echo LTEXT("_task_for")?></th>
              		<th><?php echo LTEXT("_global_task").' '.LTEXT('_global_form');?></th>
              		<th><?php echo LTEXT("_global_reference_number")?></th>
              		<th><?php echo LTEXT("_global_status")?></th>
              		<th><?php echo LTEXT('_action')?></th>
            	</tr>
				<?php foreach ($tasks as $value){?>
				<tr>
					<td><?php echo $value->date?></td>
                	<td><?php echo $value->user_surname.' , '.$value->user_name?></td>
                	<td><?php echo $value->target_surname.' , '.$value->target_name?></td>
                	<td><?php echo $value->value_kalendereintragart?></td>
                	<td><?php echo $value->referenz?></td>
                	<td><?php echo $value->erledigt ? LTEXT("_global_done") : LTEXT("_global_open")?></td>
                	<td>
						<div class="action-group">
							<button  class="btn edit-additional-task"  data-id_address="<?php echo $value->idcal?>" >
								<i class="fa fa-edit"></i>
							</button>
							<button class="btn remove-additional-task" data-id_address="<?php echo $value->idcal?>" >
								<i class="fa fa-times"></i>
							</button>
						</div>
					</td>
              	</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>