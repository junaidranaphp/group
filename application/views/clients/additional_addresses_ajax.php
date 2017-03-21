<?php defined('BASEPATH') or die('Restricted direct access') ?>
<?php 
if (count($zusatzadressen) == 0)
{
	echo LTEXT('_global_no_results_found');
}else {
?>
<table class="table table-hover table-bordered table-striped">
	<thead>
		<tr>
			<th><?php echo LTEXT('_global_default')?></th>
			<th><?php echo LTEXT('_global_contact_forms')?></th>
			<th><?php echo LTEXT('_note')?></th>
			<th><?php echo LTEXT('_action')?></th>
		</tr>
	</thead>						
	<tbody>
		<?php foreach ($zusatzadressen as $adresse){?>
		<?php $ID = $adresse->id_zusatzadresse;?>
				<tr>
           			<td>
   						<?php if($adresse->default) {echo LTEXT('_global_default');}?>
   					</td>
   					<td>
   						<?php if (count($adresse->kontakt_formen) == 0 ) {
   						echo LTEXT('_global_no_results_found');
						} else {?>
   						<select class="for-control">
   							<?php foreach ($adresse->kontakt_formen as $formen) { ?>
   							<option><?php echo $formen->value.'&nbsp;&nbsp;&nbsp;&nbsp;'.$formen->text?></option>
   							<?php }?>
   						</select>
   						<?php }?>
   					</td>
   					<td>
   						<?php echo $adresse->note?>
   					</td>
   					<td>
						<div class="action-group">
							
						<button class="btn remove-additional-address" data-id_address="<?php echo $adresse->id?>" >
							<i class="fa fa-times"></i>
						</button>
					</div>
				</td>
			</tr>
		<?php }?>
	</tbody>	
</table>	
<?php }?>	