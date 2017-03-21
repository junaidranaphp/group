<?php defined('BASEPATH') or die('Restricted direct access');?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3>
					<i class="fa fa-table"></i>
					<?php echo LTEXT('_address_data')?>
				</h3>
			</div>
			<div class="box-content nopadding">
				<?php echo form_open()?>
					<table class="table table-hover table-nomargin table-bordered table-striped">
						<tbody>
							<tr>
								<td>
									<strong><?php echo LTEXT('_address_data')?></strong>
								</td>
								<td colspan="2">
									<?php echo LTEXT('_global_status')?> : 
									<select name="status">
										<?php 
										$selected = false;
										if ($address->status == 1){
											$selected = true;
										}
										?>
										<option value="0" <?php echo set_select('status', 0,$selected); ?> >0</option>
										<option value="1" <?php echo set_select('status', 1,$selected); ?> >1</option>
									</select>
								</td>
								<td >
									<?php echo LTEXT('_adr_valoration')?> : 
									<select name="bewertung">
										<option value=""><?php echo LTEXT('_global_select')?></option>
										<?php foreach ($bewertung as $type) {?>
										<?php 
										$selected = false;
										if ($address->bewertung == $type->value){
											$selected = true;
										}
										?>
										<option <?php echo set_select('bewertung', $type->value,$selected); ?> value="<?php echo $type->value?>"><?php echo $type->value?></option>
										<?php }?>
									</select>
								</td>
								<td></td>
							</tr>
							<tr>
								<td>
									<strong><?php echo LTEXT('_obj_category')?></strong>
								</td>
								<td>
									<?php echo LTEXT('_customer')?> : 
									<?php 
										$checked = false;
										if ($address->kunde)
										{
											$checked=true;
										}
									?>
									<input value="1" name="kunde" type="checkbox" <?php echo set_checkbox('kunde', 1,$checked); ?>>
								</td>
								<td>
									<?php echo LTEXT('_obj_owner')?> : 
									<?php 
										$checked = false;
										if ($address->eigentuemer)
										{
											$checked=true;
										}
									?>
									<input value="1" name="eigentuemer" type="checkbox" <?php echo set_checkbox('eigentuemer', 1,$checked); ?>>
								</td>
								<td>
									<?php echo LTEXT('_obj_lister')?> : 
									<?php 
										$checked = false;
										if ($address->lister)
										{
											$checked=true;
										}
									?>
									<input type="checkbox" name="lister" value="1" <?php echo set_checkbox('lister', 1,$checked); ?>>
								</td>
								<td>
									<?php echo LTEXT('_global_other')?> :  
									<select name="kontaktart">
										<option><?php echo LTEXT('_global_select')?></option>
										<?php foreach ($KontaktArts as $type) {?>
										<?php 
										$checked = false;
										if ($type->value == $address->kontaktart)
										{
											$checked=true;
										}
										?>
										<option <?php echo set_select('kontaktart', $type->value,$selected); ?> value="<?php echo $type->value?>"><?php echo $type->value?></option>
										<?php }?>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo LTEXT('_client_no')?> : 
									<input class="form-control" type="text" name="KDnr" value="<?php echo set_value('KDnr',$address->KDnr)?>">
								</td>
								<td>
									<?php echo LTEXT('_global_bezeichnung')?> : 
									<input class="form-control" type="text" name="titel" value="<?php echo set_value('titel',$address->titel)?>">
								</td>
								<td>
									<?php echo LTEXT('_global_firstname')?> : 
									<input class="form-control" type="text" name="vorname" value="<?php echo set_value('vorname',$address->vorname)?>">
								</td>
								<td>
									<?php echo LTEXT('_global_surname')?> : 
									<input class="form-control" type="text" name="name" value="<?php echo set_value('name',$address->name)?>">
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<?php echo LTEXT('_company')?> : 
									<input value="<?php echo set_value('firma',$address->firma)?>" name="firma" type="text" class="form-control">
								</td>
								<td colspan="2">
									<?php echo LTEXT('_obj_position')?> : 
									<input value="<?php echo set_value('position',$address->position)?>" name="position" type="text" class="form-control">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo LTEXT('_global_address')?>
									<input value="<?php echo set_value('adresse_1',$address->adresse_1)?>" name="adresse_1" type="text" class="form-control">
								</td>
								<td>
									<?php echo LTEXT('_global_block')?>
									<input value="<?php echo set_value('block',$address->block)?>" name="block" type="text" class="form-control">
								</td>
								<td>
									<?php echo LTEXT('_global_floor')?>
									<input value="<?php echo set_value('etage',$address->etage)?>" name="etage" type="text" class="form-control">
								</td>
								<td>
									<?php echo LTEXT('_global_door')?>
									<input value="<?php echo set_value('tuer',$address->tuer)?>" name="tuer" type="text" class="form-control">
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<?php echo LTEXT('_global_postalcode')?>
									<input value="<?php echo set_value('plz',$address->plz)?>" name="plz" type="text" class="form-control">
								</td>
								<td colspan="2">
									<?php echo LTEXT('_listfield_location')?>
									<input value="<?php echo set_value('ort',$address->ort)?>" name="ort" type="text" class="form-control">
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<?php echo LTEXT('_global_land')?>
									<select class="form-control" class="form-control" name="land">
										<option value=""><?php echo LTEXT('_global_select')?></option>
										<?php foreach ($countries as $type) {?>
										<?php 
										$selected = false;
										if ($type->value == $address->land)
										{
											$selected = true;
										}
										?>
										<option <?php echo set_select('land', $type->value,$selected); ?> value="<?php echo $type->value?>"><?php echo $type->value?></option>
										<?php }?>
									</select>
								</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo LTEXT('_global_anrede')?>
									<select class="form-control" name="anrede" class="form-control">
										<option><?php echo LTEXT('_global_select')?></option>
										<?php foreach ($anrede as $type) {?>
											<?php 
											$selected = false;
											if ($type->value == $address->anrede)
											{
												$selected = true;
											}
											?>
											<option <?php echo set_select('anrede', $type->value,$selected); ?> value="<?php echo $type->value?>"><?php echo $type->value?></option>
										<?php }?>
									</select>
								</td>
								<td colspan="2">
									<?php echo LTEXT('_salutation_letter')?>
									<input class="form-control" value="<?php echo set_value('briefanrede',$address->briefanrede)?>" name="briefanrede"  type="text">
								</td>
								<td>
									<?php echo LTEXT('_global_newsletter')?>
									<?php 
										$checked = false;
										if ($address->newsletter)
										{
											$checked=true;
										}
									?>
									<input type="checkbox" name="newsletter" value="1" <?php echo set_checkbox('newsletter', 1,$checked); ?>>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<?php echo LTEXT('_global_language')?>
									<select class="form-control" name="sprache">
										<option><?php echo LTEXT('_global_select')?></option>
									</select>
								</td>
								<td colspan="2">
									<?php echo LTEXT('_resident')?>
									<?php 
										$checked = false;
										if ($address->resident)
										{
											$checked=true;
										}
									?>
									<input type="checkbox" name="resident" value="1" <?php echo set_checkbox('resident', 1,$checked); ?>>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<?php echo LTEXT('_global_quelle')?>
									<select class="form-control" name="kundenaquise">
										<option><?php echo LTEXT('_global_select')?></option>
										<?php foreach ($kundenaquise as $type) {?>
											<?php 
											$selected = false;
											if ($type->value == $address->kundenaquise)
											{
												$selected = true;
											}
											?>
											<option <?php echo set_select('kundenaquise', $type->value,$selected); ?> value="<?php echo $type->value?>"><?php echo $type->value?></option>
										<?php }?>
									</select>
								</td>
								<td>
									<?php echo LTEXT('_tippgeber')?> : 
									<a href="#"><?php echo LTEXT('_global_select')?></a>
									<input type="text" class="form-control" disabled="disabled">
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<?php echo LTEXT('_global_comments')?>
									<textarea rows="3" class="form-control" name="notiz"><?php echo set_value('notiz',$address->notiz)?></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<button class="btn btn-primary btn-lg"><?php echo LTEXT('_global_save_submitbutton')?></button>
								</td>
							</tr>
						</tbody>
					</table>
					<input type="hidden" name="id_adresse" value="<?php echo $address->ID;?>">
				<?php echo form_close()?>
			</div>
		</div>
	</div>
</div>