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
<?php echo form_open('',array('id'=>'add-data-form'))?>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td><?php echo LTEXT('_type')?></td>
				<td>
					<select class="form-control" name="value">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php foreach ($types as $type) {?>
							<?php 
							$selected = false;
							if ($zusatzdaten)
							{
								if ($zusatzdaten->value == $type->value)
								{
									$selected = true;
								}
							}
							?>
							<option <?php echo set_select('value',$type->value,$selected)?> value="<?php echo $type->value?>"><?php echo $type->value?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_data')?></td>
				<td><input class="form-control" name="text"type="text" value="<?php echo set_value('text',$zusatzdaten ? $zusatzdaten->text : '')?>"></td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_details')?></td>
				<td><textarea class="form-control" name="notiz" rows="3" cols=""><?php echo set_value('notiz',$zusatzdaten ? $zusatzdaten->notiz : '')?></textarea></td>
			</tr>
		</tbody>
	</table>
	<input type="hidden" id="hidden-data-id" value="<?php echo $zusatzdaten ? $zusatzdaten->id : ''?>">
<?php echo form_close()?>