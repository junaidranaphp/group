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
<?php echo form_open('',array('id'=>'search-profile-form'))?>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td colspan="2" class="text-center"><strong><?php echo LTEXT('_global_new_search_profile')?></strong></td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_name_searchprofile')?></td>
				<td>
					<input type="text" name="name" class="form-control">
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_type')?></td>
				<td>
					<select class="form-control" name="objekttyp">
						<option value=""><?php echo LTEXT('_select_all')?></option>
						<?php foreach ($objekttyp2 as $type) {?>
							<?php 
							if($type->value == '--'){
								$type->value= '';
								$type->id='';
								$disable=true;
							}
							else if(substr($type->value, 0,2) == '--'){
								$disable=true;
								$style=true;
							}
							else 
							{
								$disable=false;
								$style=false;
							}
							?>
							<option <?php echo  $disable ?  'disabled' : '' ?> <?php echo $style ? 'style="font-weight:bold"' : ''?>value="<?php echo $type->id?>"><?php echo $type->value?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_type')?> 2</td>
				<td>
					<select class="form-control" name="objekttyp2">
						<option value=""><?php echo LTEXT('_select_all')?></option>
						<?php foreach ($objekttyp2 as $type) {?>
							<?php 
							if($type->value == '--'){
								$type->value= '';
								$type->id='';
								$disable=true;
							}
							else if(substr($type->value, 0,2) == '--'){
								$disable=true;
								$style=true;
							}
							else 
							{
								$disable=false;
								$style=false;
							}
							?>
							<option <?php echo  $disable ?  'disabled' : '' ?> <?php echo $style ? 'style="font-weight:bold"' : ''?>value="<?php echo $type->id?>"><?php echo $type->value?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_form_of_use')?> 2</td>
				<td>
					<select class="form-control" name="nutzungsart">
						<option value=""><?php echo LTEXT('_select_all')?></option>
						<?php foreach ($nutzungsart as $type) {?>
							<option value="<?php echo $type->id?>"><?php echo $type->value?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_region')?></td>
				<td>
					<select class="form-control" name="region">
						<option value=""><?php echo LTEXT('_select_all')?></option>
						<?php foreach ($region as $type) {?>
							<option value="<?php echo $type->id?>"><?php echo $type->value?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_region')?> 2</td>
				<td>
					<select class="form-control" name="region2">
						<option value=""><?php echo LTEXT('_select_all')?></option>
						<?php foreach ($region as $type) {?>
							<option value="<?php echo $type->id?>"><?php echo $type->value?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_region')?> 3</td>
				<td>
					<select class="form-control" name="region3">
						<option value=""><?php echo LTEXT('_select_all')?></option>
						<?php foreach ($region as $type) {?>
							<option value="<?php echo $type->id?>"><?php echo $type->value?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_listfield_location')?></td>
				<td>
					<input type="text" name="ort" class="form-control">
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_residence')?></td>
				<td>
					<select class="form-control" name="anlage">
						<option value=""><?php echo LTEXT('_select_all')?></option>
						<?php foreach ($anlage as $type) {?>
							<option value="<?php echo $type->id?>"><?php echo $type->name?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_position')?></td>
				<td>
					<input type="checkbox" value="1" name="erste_linie"> <?php echo LTEXT("_obj_first_sealine")?>&nbsp;
       				<input type="checkbox" value="1" name="meerblick"> <?php echo LTEXT("_obj_meerblick")?>
       				<input type="checkbox" value="1" name="pool"> <?php echo LTEXT("_obj_pool")?>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_listing_type')?></td>
				<td>
					<input type="checkbox" value="1" name="kaufen"> <?php echo LTEXT("_obj_to_buy")?>&nbsp;
       				<input type="checkbox" value="1" name="mieten"> <?php echo LTEXT("_obj_to_rent")?>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_price').' '.LTEXT('_min').'/'.LTEXT('_max')?></td>
				<td>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="preis_von" class="form-control col-sm-6">
						</div>
						<div class="col-sm-6">
							<input type="text" name="preis_bis" class="form-control col-sm-6">
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_budget')?></td>
				<td>
					<input type="text" name="budgett" class="form-control">
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_livingspace')?></td>
				<td>
					<input type="text" name="wohnflaeche_von" class="form-control">
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_size_plot').' '.LTEXT('_min')?></td>
				<td>
					<input type="text" name="grundstueck_von" class="form-control">
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_obj_sleeping_rooms')?></td>
				<td>
					<input type="text" name="schlafzimmer_von" class="form-control">
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_bathrooms')?></td>
				<td>
					<input type="text" name="baeder_von" class="form-control">
				</td>
			</tr>
			<tr>
				<td><?php echo LTEXT('_global_comments')?></td>
				<td>
					<textarea rows="2" name="bemerkungen" class="form-control"></textarea>
				</td>
			</tr>
		</tbody>
	</table>
<?php echo form_close()?>
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