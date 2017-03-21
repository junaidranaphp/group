<?php defined('BASEPATH') or die('Restricted direct access') ?>
<?php echo form_open(base_url('clients/search_addresses_ajax'),array('id' => 'search-address-form'))?>
	<table class="table table-bordered table-striped">
		<tbody>
	    	<tr>
	       		<td><?php echo LTEXT('_global_user')?></td>
	        	<td><?php echo $session['name']?>
	        	<td><?php echo LTEXT('_global_status')?></td>
	       		<td>
	       			<select name="SA_SearchStatus">
	       				<option value=""><?php echo LTEXT('_select_all')?></option>
	       				<option value="1"><?php echo LTEXT('_global_active')?></option>
	       				<option value="0"><?php echo LTEXT('_global_inactive')?></option>
	       			</select>
	       		</td>
	       	</tr>        	
	       	<tr>
	       		<td><?php echo LTEXT('_global_language')?></td>
	       		<td>
	       			<select  name="SA_SearchSprache">
	       				<option value=""><?php echo LTEXT('_global_select')?></option>
	       			</select>
	       		</td>
	       		<td><?php echo LTEXT('_global_newsletter')?></td>
	       		<td><input type="checkbox" name="SA_newsletter"></td>
	       	</tr>
	       	<tr>
	       		<td><?php echo LTEXT('_text_search')?></td>
	       		<td><input name="SA_SearchTextAddress" type="text"></td>
	       		<td><?php echo LTEXT('_address_category')?></td>
	       		<td>
	       			<select name="SA_SuchTyp">
	       				<option value=""><?php echo LTEXT('_select_all')?></option>
	       				<?php foreach ($SA_SuchTyp as $key => $type) {?>
	       				<option value="<?php echo $key?>"><?php echo $type?></option>
	       				<?php }?>
	       			</select>
	       		</td>
	       	</tr>
	       	<tr>
	       		<td><?php echo LTEXT('_global_surname')?></td>
	       		<td><input type="text" name="SA_SearchTextNachname"></td>
	       		<td><?php echo LTEXT('_global_firstname')?></td>
	       		<td><input type="text" name="SA_SearchTextVorname"></td>
	       	</tr>
	       	<tr>
	        	<td><?php echo LTEXT('_global_in_charge')?></td>
	        	<td>
					<select name="SA_Sachbearbeiter">
						<option value=""><?php echo LTEXT('_select_all')?></option>
					</select>
				</td>
	        	<td><?php echo LTEXT('_global_quelle')?></td>
	        	<td>
	        		<select name="SA_kundenaquise">
						<option value=""><?php echo LTEXT('_select_all')?></option>
					</select>
	        	</td>
	    	</tr>
		</tbody>
	</table>
<?php echo form_close()?>