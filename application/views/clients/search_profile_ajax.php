<?php defined('BASEPATH') or die('Restricted direct access') ?>
<table class="table table-hover table-bordered table-striped">								
	<tbody>
		<?php foreach ($suchprofil as $value){?>
				<tr>
					 <th colspan="2"><?php echo LTEXT("_global_existing_search_profiles")?></th>
				</tr>
				<tr>
           			<td>
   						<select name="SuchProfilID" class="form-control">
   							<option value=""><?php echo LTEXT('_select_all')?></option>
   							<?php foreach ($suchprofil as $value) {?>
   							<option value="<?php echo $value->id?>"><?php echo $value->name?></option>
   							<?php }?>
   						</select>
   					</td>
   					<td>
   						<?php echo $value->text?>
   					</td>
   					<td>
   						<?php echo $value->notiz?>
   					</td>
   					<td>
						<div class="action-group">
							<button  class="btn edit-additional-data"  data-id_address="<?php echo $value->id?>" >
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn remove-additional-data" data-id_address="<?php echo $value->id?>" >
							<i class="fa fa-times"></i>
						</button>
					</div>
				</td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php /** if($i>1){?>
    <div nowrap>
    <?=LA("global_existing_search_profiles")?>:
      <form name="form1" method="post" action="<?=$_SERVER['PHP_SELF']?>">
      <?=ListFieldOC($SP,"SuchProfilID",$SuchProfilID,"-- ".LA("global_selection_listfield")." --")?>
      <input type="hidden" name="id_adresse" value="<?=$id_adresse?>">
      <input type="submit" value="<?=LA("global_load")?>">
      <input name="submit" type="submit" value="<?=LA("global_delete")?>">
      </form>
    </div>
    <? }else{ ?>
        <p class="InfoMessage"><?=LA("info_searchprofiles_unavailable")?></p>
    <?}*/
