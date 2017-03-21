<?php defined('BASEPATH') or die('Restricted direct access') ;?>
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
<?php echo form_open('',array('id' => 'add-contacthistory-form')) ;?>
	<table class="table table-bordered table-striped">
		<tbody>
			<tr>
				<th colspan="2" class="text-center">
					<strong><?php echo LTEXT('_create_contact_history')?></strong>
				</th>
			</tr>
			<tr>
				<td><?php echo LTEXT("_global_reference_number")?>&nbsp;<button class="btn"><?php echo LTEXT("_global_select")?></button></td>
                <td><input  class="form-control"type="text" name="referenz" value="<?php echo set_value('referenz',$contact_history ? $contact_history->referenz : '')?>"></td>
			</tr>
			<tr>
				<td><?php echo LTEXT("_global_contact_form")?></td>
		        <td>
		        	<select name="kontaktart" class="form-control">
		        		<option value=""><?php echo LTEXT('_global_select')?></option>
		        		<?php foreach ($kontaktart as $value) { ?>
		        		<?php 
		        		$selected = false;
		        		if($contact_history)
		        		{
		        			if ($value->value== $contact_history->kontaktart){
		        				$selected = true;
		        			}
		        		}
		        		?>
		        		<option <?php echo set_select('kontaktart',$value->value,$selected); ?> value="<?php  echo $value->value?>"><?php echo $value->value?></option>
		        		<?php }?>
		        	</select>
			    </td>
			</tr>
			<tr>
				<td><?php echo LTEXT("_global_status")?></td>
		        <td>
		        	<select name="aktion" class="form-control">
		        		<option value=""><?php echo LTEXT('_global_select')?></option>
		        		<?php foreach ($aktion as $value) { ?>
		        		<?php 
		        		$selected = false;
		        		if($contact_history)
		        		{
		        			if ($value->row== $contact_history->aktion){
		        				$selected = true;
		        			}
		        		}
		        		?>
		        		<option <?php echo set_select('aktion',$value->row,$selected); ?> value="<?php  echo $value->row?>"><?php echo $value->value?></option>
		        		<?php }?>
		        	</select>
			    </td>
			</tr>
			
			
			<tr>
				<td><?php echo LTEXT('_global_comments')?></td>
				<td colspan="3"><textarea rows="3" class="form-control" name="comment"><?php echo set_value('comment',$contact_history ? $contact_history->comment : '')?></textarea>
			</tr>
	    </tbody>
	</table>
	<input id="hidden-contacthistory-id" type="hidden" value="<?php echo $contact_history ? $contact_history->id : ''?>" name="id_contacthistory">
<?php echo form_close();?>