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
<?php echo form_open('',array('id'=>'add-contact-form'))?>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th><?php echo LTEXT('_global_default')?></th>
				<?php 
				$selected = false;
				if ($kontakt_formen)
				{
					if ($kontakt_formen->default == 1)
					{
						$selected = true;
					}
				}
				?>
				<td><input <?php echo set_checkbox('default',1,$selected)?> type="checkbox" name="default" value="1"></td>
			</tr>
			<tr>
				<th><?php echo LTEXT("_type")?></th>
				<td>
					<select class="form-control" name="value">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php foreach ($types as $type) {?>
						<?php 
						$selected = false;
						if ($kontakt_formen)
						{
							if ($kontakt_formen->value == $type->value)
							{
								$selected = true;
							}
						}
						?>
						<option <?php echo set_select('value',$type->value,$selected)?>value="<?php echo $type->value?>"><?php echo $type->value?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<th><?php echo LTEXT("_global_text")?></th>
				<td><input class="form-control" name="text"type="text" value="<?php echo set_value('text',$kontakt_formen ? $kontakt_formen->text : '')?>"></td>
			</tr>
			<tr>
				<th><?php echo LTEXT("_detail")?></th>
				<td><textarea class="form-control" name="notiz" rows="3" cols=""><?php echo set_value('notiz',$kontakt_formen ? $kontakt_formen->notiz : '')?></textarea></td>
			</tr>
		</tbody>
	</table>
	<input type="hidden" value="<?php echo $kontakt_formen ? $kontakt_formen->id : ''?>" id="hidden-contact-id">
<?php echo form_close()?>
    