<?php defined('BASEPATH') or die('Restricted direct access'); ?>

			
		<form action="#" method="post">
			<div class="bg-primary well-sm" style="margin-top:20px;">
				<strong><?php echo LTEXT('_global_direct_search_addresses_with_data')?></strong>
			</div>
			<div style="margin-top:20px;"></div>
			<div class="stripes">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_user')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<?php echo $this->session->userdata('username')?>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_status')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SASearchStatus">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<option  <?php echo  ($search && $search['SA_SearchStatus']=='1') ?  'selected="selectd"' : '12'; ?> value="1"><?php echo LTEXT('_global_active')?></option>
									<option  <?php echo  ($search && $search['SA_SearchStatus']=='0') ?  'selected="selectd"' : ''; ?> value="0"><?php echo LTEXT('_global_inactive')?></option>
								</select>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Second row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_language')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SASearchSprache">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<?php foreach ($languages as $language) { ?>
									<option <?php echo  ($search && $search['SA_SearchSprache']== $language->id) ?  'selected="selectd"' : ''; ?> value="<?php echo $language->id?>"><?php echo $language->code?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_newsletter')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input <?php echo  ($search && $search['SA_newsletter']== '1') ?  'checked="checked"' : ''; ?> type="checkbox" name="SAnewsletter" value="1" >
							</div>
						</div>
					</div>
				</div>
				
				<!-- third row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_fulltext_search')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input type="text" name="SASearchTextAddress" value="<?php echo  ($search ) ? $search['SA_SearchTextAddress'] : ''; ?>">
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_adr_category')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SASuchTyp">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<option <?php echo  ($search && $search['SA_SuchTyp']== '-1') ?  'selected="selectd"' : ''; ?> value="-1"><?php echo LTEXT('_kunden')?></option>
									<option <?php echo  ($search && $search['SA_SuchTyp']== '-2') ?  'selected="selectd"' : ''; ?> value="-2"><?php echo LTEXT('_owner')?></option>
									<?php foreach ($ZusatzKontaktArtens as $ZusatzKontaktArten) {?>
									<option <?php echo  ($search && $search['SA_SuchTyp']== $ZusatzKontaktArten->row) ?  'selected="selectd"' : ''; ?>  value="<?php echo $ZusatzKontaktArten->row?>"><?php echo $ZusatzKontaktArten->value?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
				</div>
				
				<!-- fourth row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_surname')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input value="<?php echo  ($search ) ?  $search['SA_SearchTextNachname'] : ''; ?>" type="text" name="SASearchTextNachname">
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_firstname')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input value="<?php echo  ($search ) ?  $search['SA_SearchTextVorname'] : ''; ?>" type="text" name="SASearchTextVorname">
							</div>
						</div>
					</div>
				</div>
				
				<!-- Fifth row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_in_charge')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SASachbearbeiter">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<?php foreach ( $adressen_by_kontaktart6 as $adressen_by_kontaktart) { ?>
									<option <?php echo  ($search && $search['SA_Sachbearbeiter']== $adressen_by_kontaktart->ID) ?  'selected="selectd"' : ''; ?> value="<?php echo $adressen_by_kontaktart->ID?>"><?php echo $adressen_by_kontaktart->concated_name?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_quelle')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SAkundenaquise">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<?php foreach ($kundenaquise as $kundenaquis) { ?>
									<option <?php echo  ($search && $search['SA_kundenaquise']== $kundenaquis->row) ?  'selected="selectd"' : ''; ?> value="<?php echo $kundenaquis->row?>"><?php echo $kundenaquis->value?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="margin-top:20px;"></div>
			<div class="form-group">
				<button class=" btn-primary"><?php echo LTEXT('_global_search')?></button>
			</div>
			<div class="bg-primary well-sm" style="margin-top:20px;">
				<strong><?php echo LTEXT('_global_additional_information')?></strong>
			</div>
			<div style="margin-top:20px;"></div>
			
			
			<div class="stripes">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_obj_type')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SAobjekttyp">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<?php foreach ($objekttyps as $objekttyp) {
												if ($objekttyp->value === '--') { ?>
													<option disabled="disabled">
												<?php } else if (substr($objekttyp->value, 0,2) === '--'){?>
													<option <?php echo  ($search && $search['SA_objekttyp']== $objekttyp->row) ?  'selected="selectd"' : ''; ?> class="bg-danger" value="<?php echo $objekttyp->row?>"><?php echo substr($objekttyp->value, 2,strlen($objekttyp->value))?></option>
												<?php } else {?>
													 <option <?php echo  ($search && $search['SA_objekttyp']== $objekttyp->row) ?  'selected="selectd"' : ''; ?> value="<?php echo $objekttyp->row?>"><?php echo $objekttyp->value?></option>
												<?php }?>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_obj_form_of_use')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SAnutzungsart">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<?php foreach ($nutzungsart as $item) {?>
										<option <?php echo  ($search && $search['SA_nutzungsart']== $item->value) ?  'selected="selectd"' : ''; ?> value="<?php echo $item->id?>"><?php echo $item->value?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Second row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_region')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SAregion">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<?php foreach ($region as $item) { ?>
									<option <?php echo  ($search && $search['SA_region']== $item->id) ?  'selected="selectd"' : ''; ?> value="<?php echo $item->id?>"><?php echo $item->value?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_location')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input value="<?php echo  ($search ) ?  $search['SA_ort'] : ''; ?>" type="text" name="OS_Ort" > <a class=""href="#">select</a>
							</div>
						</div>
					</div>
				</div>
				
				<!-- third row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_obj_residence')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<select name="SAresidenz">
									<option value="all"><?php echo LTEXT('_global_select')?></option>
									<?php foreach ($anlagen as $item) { ?>
									<option <?php echo  ($search && $search['SA_residenz']== $item->id) ?  'selected="selectd"' : ''; ?> value="<?php echo $item->id?>"><?php echo $item->name?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_obj_position')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input <?php echo  ($search && $search['SA_erste_linie']== '1') ?  'checked="checked"' : ''; ?> name="SAerste_linie" type="checkbox" value="1"><?php echo  LTEXT("_obj_first_sealine"); ?>
							</div>
						</div>
					</div>
				</div>
				
				<!-- fourth row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_obj_listing_type')?></label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input <?php echo  ($search && $search['SA_kaufen']== '1') ?  'checked="checked"' : ''; ?> name="SAkaufen" type="checkbox" value="1">
								<?php echo  LTEXT("_obj_to_buy") ?>
            					<input <?php echo  ($search && $search['SA_mieten']== '1') ?  'checked="checked"' : ''; ?> name="SAmieten" type="checkbox" value="1">
            					<?php  echo  LTEXT("_obj_to_rent") ?>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_price')?> min/max</label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input value="<?php echo  ($search ) ?  $search['SA_preis_von'] : ''; ?>" size="8" type="text" name="SApreis_von" > /
            					<input value="<?php echo  ($search ) ?  $search['SA_preis_bis'] : ''; ?>" size="8" type="text" name="SApreis_bis">
							</div>
						</div>
					</div>
				</div>
				
				<!-- Fifth row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_obj_livingspace')?> min/max</label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input value="<?php echo  ($search ) ?  $search['SA_wohnflaeche_von'] : ''; ?>" size="8" type="text" name="SAwohnflaeche_von"> /
            					<input value="<?php echo  ($search ) ?  $search['SA_wohnflaeche_bis'] : ''; ?>" size="8" type="text" name="SAwohnflaeche_bis" >
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_obj_size_plot')?> min/max</label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input value="<?php echo  ($search ) ?  $search['SA_grundstueck_von'] : ''; ?>" size="4" type="text" name="SAgrundstueck_von"> /
           					 	<input value="<?php echo  ($search ) ?  $search['SA_grundstueck_bis'] : ''; ?>" size="4" type="text" name="SAgrundstueck_bis" >
							</div>
						</div>
					</div>
				</div>
				<!-- sixth row -->
				
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_obj_sleeping_rooms')?> min/max</label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input value="<?php echo  ($search ) ?  $search['SA_schlafzimmer_von'] : ''; ?>" size="8" type="text" name="SAschlafzimmer_von">/
            					<input  value="<?php echo  ($search ) ?  $search['SA_schlafzimmer_bis'] : ''; ?>" size="8" type="text" name="SAschlafzimmer_bis">
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<label><?php echo LTEXT('_global_bathrooms')?> min/max</label>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input value="<?php echo  ($search ) ?  $search['SA_baeder_von'] : ''; ?>" size="4" type="text" name="SAbaeder_von"> /
        						<input value="<?php echo  ($search ) ?  $search['SA_baeder_bis'] : ''; ?>" size="4" type="text" name="SAbaeder_bis">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="margin-top:20px;"></div>
			<div class="form-group">
				<button class=" btn-primary"><?php echo LTEXT('_global_search')?></button>
			</div>
			<div style="margin-top:20px;"></div>
		</form>
	</div>
</div>