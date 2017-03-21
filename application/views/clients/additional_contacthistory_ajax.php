<?php defined('BASEPATH') or die('Restricted direct access') ?>
<?php if (count($contact_histories)==0) {
echo LTEXT('_global_no_results_found');
} else {?>
<table class="table table-hover table-bordered table-striped">								
	<tbody>
				<tr>
              		<th ><?php echo LTEXT("_global_date")?></th>
              		<th><?php echo LTEXT("_global_employee")?></th>
              		<th><?php echo LTEXT("_global_contact_forms")?></th>
              		<th><?php echo LTEXT("_global_reference_number")?></th>
              		<th><?php echo LTEXT("_action")?></th>
            	</tr>
				<?php foreach ($contact_histories as $value){?>
				<tr>
					<td><?php echo $value->date?></td>
                	<td><?php echo $value->user_surname.' , '.$value->user_name?></td>
                	<td><?php echo $value->kontaktart?></td>
                	<td><?php echo $value->referenz?></td>
                	<td>
						<div class="action-group">
							<button  class="btn edit-additional-contacthistory"  data-id_address="<?php echo $value->id?>" >
								<i class="fa fa-edit"></i>
							</button>
							<button class="btn remove-additional-contacthistory" data-id_address="<?php echo $value->id?>" >
								<i class="fa fa-times"></i>
							</button>
						</div>
					</td>
              	</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>