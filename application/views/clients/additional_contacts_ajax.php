<?php defined('BASEPATH') or die('Restricted direct access') ?>
<?php if (count($kontakt_formen) == 0) {
echo LTEXT('_global_no_results_found');
} else  {?>
<table class="table table-hover table-bordered table-striped">	
	<thead>
		<tr>
			<th><?php echo LTEXT('_global_default')?></th>
			<th><?php echo LTEXT('_global_value')?></th>
			<th><?php echo LTEXT('_global_text')?></th>
			<th><?php echo LTEXT('_action')?></th>
		</tr>
	</thead>							
	<tbody>
		<?php foreach ($kontakt_formen as $value){?>
				<tr>
					<td>
						<?php if ($value->default == 1) { echo LTEXT('_global_default');}?>
					</td>
           			<td>
   						<?php echo $value->value?>
   					</td>
   					<td>
   						<?php echo $value->text?>
   					</td>
   					<td>
						<div class="action-group">
							<button  class="btn edit-additional-contact"  data-id_address="<?php echo $value->id?>" >
								<i class="fa fa-edit"></i>
							</button>
							<button class="btn remove-additional-contact" data-id_address="<?php echo $value->id?>" >
								<i class="fa fa-times"></i>
							</button>
						</div>
					</td>
				</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>