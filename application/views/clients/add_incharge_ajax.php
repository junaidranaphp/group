<?php defined('BASEPATH') or die('Restricted direct access') ?>
<?php if (isset($warning_message)) {?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong><?php echo LTEXT('_warning')?>!</strong> <?php echo $warning_message?>
</div>
<?php }?>
<?php if (isset($success_message)) {?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong><?php echo LTEXT('_success')?>!</strong> <?php echo $success_message?>
</div>
<?php }?>
<?php echo form_open('',array('id'=>'add-incharge-form'))?>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td><?php echo LTEXT('_global_default')?></td>
				<?php 
				$selected = false;
				if ($sachbearbeiter)
				{
					if ($sachbearbeiter->default == 1)
					{
						$selected = true;
					}
				}
				?>
				<td><input <?php echo set_checkbox('default',1,$selected)?>type="checkbox" name="default" value="1"></td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_in_charge')?></td>
				<td>
					<select class="form-control" name="id_sachbearbeiter">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php foreach ($persons as $type) {?>
						<?php 
						$selected = false;
						if ($sachbearbeiter)
						{
							if ($sachbearbeiter->id_sachbearbeiter == $type->ID)
							{
								$selected = true;
							}
						}
						?>
							<option <?php echo set_select('id_sachbearbeiter',$type->ID,$selected)?>value="<?php echo $type->ID?>"><?php echo $type->name.' , '.$type->vorname?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_comments')?></td>
				<td><textarea class="form-control" name="notiz" rows="3" cols=""><?php echo set_value('notiz',$sachbearbeiter ? $sachbearbeiter->notiz : '')?></textarea></td>
			</tr>
		</tbody>
	</table>
	<input type="hidden" value="<?php echo $sachbearbeiter ? $sachbearbeiter->id : '';?>" id="hidden-incharge-id">
<?php echo form_close()?>