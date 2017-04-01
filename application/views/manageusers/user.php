<?php defined('BASEPATH') or die('Restricted direct access'); ?>
		<br/>
		<?php if($this->session->flashdata('success_msg')) { ?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('success_msg'); ?>
			</div>
		<?php } ?>
		<div><a class="btn btn-success" href="<?php echo base_url('manageusers')?>"><?php echo LTEXT('_users');?></a></div>
		<hr>
		<?php echo form_open('',array('class'=>'form-horizontal'))?>
			<div class="form-group">
				<label for="id_sachbearbeiter" class="control-label col-sm-3"><?php echo LTEXT('_assigned_person_in_charge');?></label>
				<div class="col-sm-9">
					<select class="form-control" id="id_sachbearbeiter" name="id_sachbearbeiter">
						<option value=""><?php echo LTEXT('_select');?></option>
						<?php foreach ($users as $existing_user) {?>
							<?php 
								$selected = false;
								if ($user->id_sachbearbeiter == $existing_user->id){
									$selected = true;
								}
							?>
							<option value="<?php echo $existing_user->id?>" <?php echo set_select('id_sachbearbeiter',$existing_user->id,$selected); ?>><?php echo $existing_user->name?></option>
						<?php }?>
						
					</select>
					<span class="text-danger"><?php echo form_error('id_sachbearbeiter'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="control-label col-sm-3"><?php echo LTEXT('_first_name');?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('name',$user ? $user->name: '')?>" type="text" id="name" name="name" class="form-control">
					<span class="text-danger"><?php echo form_error('name'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="user" class="control-label col-sm-3"><?php echo LTEXT('_login')?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('user',$user ? $user->user : '')?>" type="text" id="user" name="user" class="form-control">
					<span class="text-danger"><?php echo form_error('user'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="surname_1" class="control-label col-sm-3"><?php echo LTEXT('1_surname');?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('surname_1',$user ? $user->surname_1 : '')?>" type="text" id="surname_1" name="surname_1" class="form-control">
					<span class="text-danger"><?php echo form_error('surname_1'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="surname_2" class="control-label col-sm-3"><?php echo LTEXT('2_surname');?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('surname_2',$user ? $user->surname_2 : '')?>" type="text" id="surname_2" name="surname_2" class="form-control">
					<span class="text-danger"><?php echo form_error('surname_2'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="address" class="control-label col-sm-3"><?php echo LTEXT('_address');?></label>
				<div class="col-sm-9">
					<textarea rows="2" id="address" name="address" class="form-control"><?php echo set_value('address',$user ? $user->address : '')?></textarea>
					<span class="text-danger"><?php echo form_error('address'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="language" class="control-label col-sm-3"><?php echo LTEXT('_language');?></label>
				<div class="col-sm-9">
					<select id="language" name="language" class="form-control">
						<option value=""><?php echo LTEXT('_select');?></option>
						<option value="es"  <?php echo set_select('language','es', $user ? ($user->language == 'es'):''); ?>>es</option>
						<option value="en"  <?php echo set_select('language','en', $user ? ($user->language == 'en'):''); ?>>en</option>
						<option value="de"	<?php echo set_select('language','de', $user ? ($user->language == 'de'):''); ?>>de</option>
					</select>
					<span class="text-danger"><?php echo form_error('address'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="zip" class="control-label col-sm-3"><?php echo LTEXT('_postal_code');?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('zip',$user ? $user->ZIP : '')?>" type="text" id="zip" name="zip" class="form-control">
					<span class="text-danger"><?php echo form_error('zip'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="city" class="control-label col-sm-3"><?php echo LTEXT('_location');?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('city',$user ? $user->city : '')?>" type="text" id="city" name="city" class="form-control">
					<span class="text-danger"><?php echo form_error('city'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="telephone" class="control-label col-sm-3"><?php echo LTEXT('_telephone');?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('telephone',$user ? $user->telephone : '')?>" type="text" id="telephone" name="telephone" class="form-control">
					<span class="text-danger"><?php echo form_error('telephone'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="mobilephone" class="control-label col-sm-3"><?php echo LTEXT('_mobilephone');?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('mobilephone',$user ? $user->mobilephone : '')?>" type="text" id="mobilephone" name="mobilephone" class="form-control">
					<span class="text-danger"><?php echo form_error('mobilephone'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="control-label col-sm-3"><?php echo LTEXT('_email');?></label>
				<div class="col-sm-9">
					<input value="<?php echo set_value('email',$user ? $user->email : '')?>" type="text" id="email" name="email" class="form-control">
					<span class="text-danger"><?php echo form_error('email'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="signature" class="control-label col-sm-3"><?php echo LTEXT('_email_signature');?></label>
				<div class="col-sm-9">
					<textarea rows="3" id="signature" name="signature" class="form-control"><?php echo set_value('signature',$user ? $user->signature : '')?></textarea>
					<span class="text-danger"><?php echo form_error('signature'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="newpassword" class="control-label col-sm-3"><?php echo LTEXT('_new_password');?></label>
				<div class="col-sm-9">
					<input type="text" id="newpassword" name="newpassword" class="form-control">
					<span class="text-danger"><?php echo form_error('newpassword'); ?></span>
				</div>
			</div>	
			<div class="form-group">
				<label for="newpassword2" class="control-label col-sm-3"><?php echo LTEXT('_repeat_password');?></label>
				<div class="col-sm-9">
					<input type="text" id="newpassword2" name="newpassword2" class="form-control">
					<span class="text-danger"><?php echo form_error('newpassword2'); ?></span>
				</div>
			</div>	
			<div class="form-group">
				<button class="btn btn-primary"><?php echo LTEXT('_submit')?></button>
			</div>		
		<?php echo form_close()?>
	