<?php defined('BASEPATH') or exit('Restricted access'); ?>
		<br/>
		<a class="btn btn-success" href="<?php echo base_url('manageusers')?>"><?php echo LTEXT('_users');?></a>
		<a class="btn btn-success" href="<?php echo base_url('manageusers/add')?>"><?php echo LTEXT('_add_new_user')?></a>
	
	<h2 class="text-center"><?php echo LTEXT('_permissions_for')?> <?php echo $session['name']?></h2>
	<div class="box box-color box-bordered">
		<div class="box-title">
			<h3><?php echo LTEXT('_manage_permissions')?></h3>
		</div>
			<div class="box-content nopadding">
				<?php echo form_open(base_url('manageusers/update_permissions/'.$id_user));?>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th></th>
								<th><?php echo LTEXT('_view')?></th>
								<th><?php echo LTEXT('_add')?></th>
								<th><?php echo LTEXT('_modify')?></th>
								<th><?php echo LTEXT('_delete')?></th>
								<th><?php echo LTEXT('_search')?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="6" class="text-center"><span><?php echo '_email'?></span></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_system_user_rights')?></td>
								<td><input type="checkbox" name="ViewStartEmailFrame" value="1" <?php if($permissions->ViewStartEmailFrame){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="WriteEmails" value="1" <?php if($permissions->WriteEmails){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
								<td><input type="checkbox" name="DeleteEmails" value="1" <?php if($permissions->DeleteEmails){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="SearchEmails" value="1" <?php if($permissions->SearchEmails){ echo 'checked' ;}?>></td>
							</tr>
							<tr>
								<td colspan="6" class="text-center"><span><?php echo LTEXT('_system_user')?></span></td>
							</tr>
							
							<tr>
								<td><?php echo LTEXT('_system_user')?></td>
								<td><input type="checkbox" name="ViewUser" value="1" <?php if($permissions->ViewUser){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddUser" value="1" <?php if($permissions->AddUser){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditUser" value="1" <?php if($permissions->EditUser){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteUser" value="1" <?php if($permissions->DeleteUser){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_system_user_rights')?></td>
								<td><input type="checkbox" name="ViewUserPermission" value="1" <?php if($permissions->ViewUserPermission){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
								<td><input type="checkbox" name="EditUserPermission" value="1" <?php if($permissions->EditUserPermission){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td colspan="6" class="text-center"><span><?php echo LTEXT('_address')?></span></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_addresses')?></td>
								<td><input type="checkbox" name="ViewAdressen" value="1" <?php if($permissions->ViewAdressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAdressen" value="1" <?php if($permissions->AddAdressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAdressen" value="1" <?php if($permissions->EditAdressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAdressen" value="1" <?php if($permissions->DeleteAdressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_own_addresses_in_charge')?></td>
								<td><input type="checkbox" name="ViewOwnAdressen" value="1" <?php if($permissions->ViewOwnAdressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddOwnAdressen" value="1" <?php if($permissions->AddOwnAdressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditOwnAdressen" value="1" <?php if($permissions->EditOwnAdressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteOwnAdressen" value="1" <?php if($permissions->DeleteOwnAdressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_kontaktformen')?></td>
								<td><input type="checkbox" name="ViewKontaktformen" value="1" <?php if($permissions->ViewKontaktformen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddKontaktformen" value="1" <?php if($permissions->AddKontaktformen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditKontaktformen" value="1" <?php if($permissions->EditKontaktformen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteKontaktformen" value="1" <?php if($permissions->DeleteKontaktformen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_in_charge')?></td>
								<td><input type="checkbox" name="ViewAdressSachbearbeiter" value="1" <?php if($permissions->ViewAdressSachbearbeiter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAdressSachbearbeiter" value="1" <?php if($permissions->AddAdressSachbearbeiter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAdressSachbearbeiter" value="1" <?php if($permissions->EditAdressSachbearbeiter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAdressSachbearbeiter" value="1" <?php if($permissions->DeleteAdressSachbearbeiter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_additional_addresses')?></td>
								<td><input type="checkbox" name="ViewAdressZusatzadressen" value="1" <?php if($permissions->ViewAdressZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAdressZusatzadressen" value="1" <?php if($permissions->AddAdressZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAdressZusatzadressen" value="1" <?php if($permissions->EditAdressZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAdressZusatzadressen" value="1" <?php if($permissions->DeleteAdressZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_additional_data')?></td>
								<td><input type="checkbox" name="ViewAdressZusatzdaten" value="1" <?php if($permissions->ViewAdressZusatzdaten){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAdressZusatzdaten" value="1" <?php if($permissions->AddAdressZusatzdaten){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAdressZusatzdaten" value="1" <?php if($permissions->EditAdressZusatzdaten){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAdressZusatzdaten" value="1" <?php if($permissions->DeleteAdressZusatzdaten){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_search_profile')?></td>
								<td><input type="checkbox" name="ViewAdressSuchprofil" value="1" <?php if($permissions->ViewAdressSuchprofil){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAdressSuchprofil" value="1" <?php if($permissions->AddAdressSuchprofil){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAdressSuchprofil" value="1" <?php if($permissions->EditAdressSuchprofil){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAdressSuchprofil" value="1" <?php if($permissions->DeleteAdressSuchprofil){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_contact_history')?></td>
								<td><input type="checkbox" name="ViewAdressKontakthistorie" value="1" <?php if($permissions->ViewAdressKontakthistorie){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAdressKontakthistorie" value="1" <?php if($permissions->AddAdressKontakthistorie){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAdressKontakthistorie" value="1" <?php if($permissions->EditAdressKontakthistorie){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAdressKontakthistorie" value="1" <?php if($permissions->DeleteAdressKontakthistorie){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled="disabled"></td>
							</tr>
							<tr>
								<td colspan="6" class="text-center"><span><?php echo LTEXT('_tasks_addresses_and_objects')?></span></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_tasks')?></td>
								<td><input type="checkbox" name="ViewTasks" value="1" <?php if($permissions->ViewTasks){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="CreateTasks" value="1" <?php if($permissions->CreateTasks){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditTasks" value="1" <?php if($permissions->EditTasks){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteTasks" value="1" <?php if($permissions->DeleteTasks){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="SearchTasks" value="1" <?php if($permissions->SearchTasks){ echo 'checked' ;}?>></td>
							</tr>
							<tr>
								<td colspan="6" class="text-center"><span><?php echo LTEXT('_objects')?></span></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_objects')?></td>
								<td><input type="checkbox" name="ViewObjekte" value="1" <?php if($permissions->ViewObjekte){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddObjekte" value="1" <?php if($permissions->AddObjekte){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditObjekte" value="1" <?php if($permissions->EditObjekte){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteObjekte" value="1" <?php if($permissions->DeleteObjekte){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_own_objects')?></td>
								<td><input type="checkbox" name="ViewOwnObjekte" value="1" <?php if($permissions->ViewOwnObjekte){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddOwnObjekte" value="1" <?php if($permissions->AddOwnObjekte){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditOwnObjekte" value="1" <?php if($permissions->EditOwnObjekte){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteOwnObjekte" value="1" <?php if($permissions->DeleteOwnObjekte){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_in_charge')?></td>
								<td><input type="checkbox" name="ViewObjektSachbearbeiter" value="1" <?php if($permissions->ViewObjektSachbearbeiter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddObjektSachbearbeiter" value="1" <?php if($permissions->AddObjektSachbearbeiter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditObjektSachbearbeiter" value="1" <?php if($permissions->EditObjektSachbearbeiter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteObjektSachbearbeiter" value="1" <?php if($permissions->DeleteObjektSachbearbeiter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_owner')?></td>
								<td><input type="checkbox" name="ViewObjektEigentuemer" value="1" <?php if($permissions->ViewObjektEigentuemer){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddObjektEigentuemer" value="1" <?php if($permissions->AddObjektEigentuemer){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditObjektEigentuemer" value="1" <?php if($permissions->EditObjektEigentuemer){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteObjektEigentuemer" value="1" <?php if($permissions->DeleteObjektEigentuemer){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_additional_addresses')?></td>
								<td><input type="checkbox" name="ViewObjektZusatzadressen" value="1" <?php if($permissions->ViewObjektZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddObjektZusatzadressen" value="1" <?php if($permissions->AddObjektZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditObjektZusatzadressen" value="1" <?php if($permissions->EditObjektZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteObjektZusatzadressen" value="1" <?php if($permissions->DeleteObjektZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_keyholder_addresses')?></td>
								<td><input type="checkbox" name="ViewObjektSchluesseladressen" value="1" <?php if($permissions->ViewObjektSchluesseladressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddObjektSchluesseladressen" value="1" <?php if($permissions->AddObjektSchluesseladressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditObjektSchluesseladressen" value="1" <?php if($permissions->EditObjektSchluesseladressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteObjektSchluesseladressen" value="1" <?php if($permissions->DeleteObjektSchluesseladressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_contact_history')?></td>
								<td><input type="checkbox" name="ViewObjektKontakthistorie" value="1" <?php if($permissions->ViewObjektKontakthistorie){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddObjektKontakthistorie" value="1" <?php if($permissions->AddObjektKontakthistorie){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditObjektKontakthistorie" value="1" <?php if($permissions->EditObjektKontakthistorie){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteObjektKontakthistorie" value="1" <?php if($permissions->DeleteObjektKontakthistorie){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_attributes')?></td>
								<td><input type="checkbox" name="ViewObjektAttribute" value="1" <?php if($permissions->ViewObjektAttribute){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddObjektAttribute" value="1" <?php if($permissions->AddObjektAttribute){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditObjektAttribute" value="1" <?php if($permissions->EditObjektAttribute){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteObjektAttribute" value="1" <?php if($permissions->DeleteObjektAttribute){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td colspan="6" class="text-center"><span><?php echo LTEXT('_residences')?></span></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_residences')?></td>
								<td><input type="checkbox" name="ViewAnlagen" value="1" <?php if($permissions->ViewAnlagen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAnlagen" value="1" <?php if($permissions->AddAnlagen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAnlagen" value="1" <?php if($permissions->EditAnlagen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAnlagen" value="1" <?php if($permissions->DeleteAnlagen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_additional_residences')?></td>
								<td><input type="checkbox" name="ViewAnlagenZusatzadressen" value="1" <?php if($permissions->ViewAnlagenZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAnlagenZusatzadressen" value="1" <?php if($permissions->AddAnlagenZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAnlagenZusatzadressen" value="1" <?php if($permissions->EditAnlagenZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAnlagenZusatzadressen" value="1" <?php if($permissions->DeleteAnlagenZusatzadressen){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td colspan="6" class="text-center"><span><?php echo LTEXT('_attributes_menu')?></span></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_attributes')?></td>
								<td><input type="checkbox" name="ViewAttribute" value="1" <?php if($permissions->ViewAttribute){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddAttribute" value="1" <?php if($permissions->AddAttribute){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditAttribute" value="1" <?php if($permissions->EditAttribute){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteAttribute" value="1" <?php if($permissions->DeleteAttribute){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td colspan="6" class="text-center"><hr></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_calendar')?></td>
								<td><input type="checkbox" name="ViewCalendar" value="1" <?php if($permissions->ViewCalendar){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddCalendar" value="1" <?php if($permissions->AddCalendar){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditCalendar" value="1" <?php if($permissions->EditCalendar){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteCalendar" value="1" <?php if($permissions->DeleteCalendar){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_selection_lists')?></td>
								<td><input type="checkbox" name="ViewListfield" value="1" <?php if($permissions->ViewListfield){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddListfield" value="1" <?php if($permissions->AddListfield){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditListfield" value="1" <?php if($permissions->EditListfield){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteListfield" value="1" <?php if($permissions->DeleteListfield){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_preferences')?></td>
								<td><input type="checkbox" name="ViewSettings" value="1" <?php if($permissions->ViewSettings){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="AddSettings" value="1" <?php if($permissions->AddSettings){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="EditSettings" value="1" <?php if($permissions->EditSettings){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" name="DeleteSettings" value="1" <?php if($permissions->DeleteSettings){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td><?php echo LTEXT('_newsletter')?></td>
								<td><input type="checkbox" name="ViewNewsletter" value="1" <?php if($permissions->ViewNewsletter){ echo 'checked' ;}?>></td>
								<td><input type="checkbox" disabled value="1"></td>
								<td><input type="checkbox" disabled value="1"></td>
								<td><input type="checkbox" disabled value="1"></td>
								<td><input type="checkbox" disabled value="1"></td>
							</tr>
							<tr>
								<td colspan="6">
									<button type="submit" class="btn btn-primary"><?php echo LTEXT('_submit')?></button>
								</td>
							</tr>
						</tbody>
					</table>
					<input type="hidden" name="id_user" value="<?php echo $id_user?>">
				<?php echo form_close()?>
			</div>
		</div>
	