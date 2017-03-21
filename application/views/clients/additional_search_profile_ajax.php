<?php defined('BASEPATH') or die('Restricted direct access') ?>
<?php 
if (count($suchprofil) == 0)
{
	echo LTEXT('_global_no_results_found');
} else {
?>
<table class="table table-hover table-bordered table-striped">								
	<tbody>
				<tr>
					 <th colspan="3"><?php echo LTEXT("_global_existing_search_profiles")?></th>
				</tr>
		<?php foreach ($suchprofil as $value){?>
				<tr>
           			<td>
           				<?php echo $value->name?>
   					</td>
   					<td>
   						<button data-id_address="<?php echo $value->id?>" class="btn load-profiles"><?php echo LTEXT('_global_load')?></button>
   					</td>
   					<td>
						<div class="action-group">
							<button  class="btn edit-additional-data"  data-id_address="<?php echo $value->id?>" >
							<i class="fa fa-edit"></i>
						</button>
						<button class="btn remove-search-profile" data-id_address="<?php echo $value->id?>" >
							<i class="fa fa-times"></i>
						</button>
					</div>
				</td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>