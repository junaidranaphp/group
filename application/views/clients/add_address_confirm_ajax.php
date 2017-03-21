<?php defined('BASEPATH') or die('Restricted direct access'); ?> 
<?php echo form_open('',array('id' => 'add-address-confirm-form'))?>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td><?php echo LTEXT('_global_select_contact')?></td>
				<td><?php echo $address->name.' , '.$address->vorname.' '.$address->plz.' '.$address->ort?></td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_comments')?></td>
				<td><textarea class="form-control" name="note" rows="3"></textarea></td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_default')?></td>
				<td><input name="default" type="checkbox"></td>
			</tr>
		</tbody>
	</table>
	<input id="hidden-address" type="hidden" name="id_additional_address" value="<?php echo $address->ID?>">
<?php echo form_close()?>
    
    