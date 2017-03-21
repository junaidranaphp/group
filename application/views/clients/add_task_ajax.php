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
<?php echo form_open('',array('id' => 'add-task-form')) ;?>
	<table class="table table-bordered table-striped">
		<tbody>
			<tr>
				<th colspan="4" class="text-center">
					<strong><?php echo LTEXT('_create_task')?></strong>
				</th>
			</tr>
			<tr>
				<td>
					<?php echo LTEXT("_global_task_receiver")?>
				</td>
				<td>
					<select name="id_assignedaddress" class="form-control">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php foreach ($users as $user) {?>
						<?php 
						$selected = false;
						if($task)
						{
							if ($user->id == $task->id_assignedaddress){
								$selected = true;
							}
						}
						?>
						<option <?php echo set_select('id_assignedaddress',$user ? $user->id : '',$selected); ?>  value="<?php echo $user->id?>">
							<?php echo $user->surname_1.' , '.$user->name?>
						</option>
						<?php }?>
					</select>
				</td>
				<td><?php echo LTEXT('_obj_referencenumber') ?></td>
				<td>
					<input type="text" name="referenz" value="<?php echo set_value('referenz',$task ? $task->referenz : '')?>">
					<button class="btn"><?php echo LTEXT('_global_select')?></button>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT("_global_start")?></td>
				<td><input name="date" type="text" class="mydatepicker" value="<?php echo set_value('date',$task ? $task->date:'')?>"></td>
				<td><?php echo LTEXT('_global_time')?></td>
				<td>
					<select name="hour">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php 
						for($i=8;$i<24;$i++){
							$HourArray[sprintf("%02d",$i)]=sprintf("%02d",$i);
						}
						?>
						<?php foreach($HourArray as $key => $hour) {?>
							<?php
							$selected = false;
							if($task)
							{
								if ( $key == $task->hour[0]){
									$selected = true;
								}
							}
							?>
							<option <?php echo set_select('hour',$key,$selected); ?> value="<?php echo $key?>"><?php echo $hour?></option>
						<?php }?>
					</select>
					<select name="minutes">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php 
						for($i=0;$i<=45;$i=$i+15){
							$minutes_array[sprintf("%02d",$i)]=sprintf("%02d",$i);
						}
						?>
						<?php foreach($minutes_array as $minutes) {?>
						<?php 
						$selected = false;
						if($task)
						{
							if ( $minutes == $task->hour[1]){
								$selected = true;
							}
						}
						?>
						<option <?php echo set_select('minutes',$minutes,$selected); ?> value="<?php echo $minutes?>">
							<?php echo $minutes?>
						</option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT("_global_end")?></td>
				<td><input name="date_stop" type="text" class="mydatepicker" value="<?php echo set_value('date_stop',$task ? $task->date_stop : '')?>"></td>
				<td><?php echo LTEXT('_global_time')?></td>
				<td>
					<select name="thour">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php foreach($HourArray as $key => $hour) {?>
							<?php 
							$selected = false;
							if($task)
							{
								if ( $key == $task->hour_stop[0]){
									$selected = true;
								}
							}
							?>
							<option <?php echo set_select('thour',$key,$selected); ?> value="<?php echo $key?>"><?php echo $hour?></option>
						<?php }?>
					</select>
					<select name="tminutes">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php foreach($minutes_array as $minutes) {?>
						<?php 
						$selected = false;
						if($task)
						{
							if ( $minutes == $task->hour_stop[1]){
								$selected = true;
							}
						}
						?>
						<option <?php echo set_select('tminutes',$minutes,$selected); ?> value="<?php echo $minutes?>">
							<?php echo $minutes?>
						</option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_task_form')?></td>
				<td colspan="3">
					<select name="id_kalendereintragart" class="form-control">
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<?php foreach ($kalendereintragart as $type) {?>
						<?php 
						$selected = false;
						if($task)
						{
							if ( $type->id == $task->id_kalendereintragart){
								$selected = true;
							}
						}
						?>
						<option <?php echo set_select('id_kalendereintragart',$type->id,$selected); ?> value="<?php echo $type->id?>"><?php echo $type->value?>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_priority')?></td>
				<td colspan="3">
					<select name="priority" class="form-control">
						<?php 
						$selected_1 = false;
						$selected_2 = false;
						$selected_3 = false;
						if($task)
						{
							if ( $task->priority == 1){
								$selected_1 = true;
							}
							if ( $task->priority == 2){
								$selected_2 = true;
							}
							if ( $task->priority == 3){
								$selected_3 = true;
							}
						}
						?>
						<option value=""><?php echo LTEXT('_global_select')?></option>
						<option <?php echo set_select('priority',1,$selected_1); ?> value="1"><?php echo LTEXT('_global_priority_low')?></option>
						<option <?php echo set_select('priority',2,$selected_2); ?> value="2"><?php echo LTEXT('_global_priority_medium')?></option>
						<option <?php echo set_select('priority',3,$selected_3); ?> value="3"><?php echo LTEXT('_global_priority_high')?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_comments')?></td>
				<td colspan="3"><textarea rows="3" class="form-control" name="content"><?php echo set_value('content',$task ? $task->content : '')?></textarea>
			</tr>
			<tr>
				<td><?php echo LTEXT('_erledigt')?></td>
				<?php 
				$selected = false;
				if($task)
				{
					if($task->erledigt == 1)
					{
						$selected = true;
					}
				}
				?>
				<td colspan="3"><input type="checkbox" <?php echo set_checkbox('erledigt', '1',$selected); ?> value="1" name="erledigt"></td>
			</tr>
	    </tbody>
	</table>
	<input id="hidden-task-id" type="hidden" value="<?php echo $task ? $task->idcal : ''?>" name="idcal">
<?php echo form_close();?>