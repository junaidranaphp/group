<?php defined('BASEPATH') or die('Restricted direct access') ?>    
<?php if (count($addresses) == 0) { 
echo LTEXT('_global_no_results_found');
} else  {?> 
<table class="table table-sm table-bordered">
	<tbody>
		<?php foreach ($addresses as $addr) { ?>
		<tr>
			<td><button data-id_address="<?php echo $addr->ID?>" class="btn btn-primary select-address-btn"><?php echo LTEXT('_global_select')?></button></td>
			<td><?php echo $addr->name.' , '.$addr->vorname?>
			<td><?php echo $addr->plz?></td>
			<td><?php echo $addr->ort?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
<div class="form-group">
	<br>
	<div class="pull-right" style="width:50px;">
		<button class="btn btn-primary pull-left <?php echo $first_page?> left-page-btn"  data-page ="<?php echo $page ?>"><i class="fa fa-angle-left"></i></button>
		<button class="btn btn-primary pull-right <?php echo $last_page?> right-page-btn"  data-page ="<?php echo $page ?>"><i class="fa fa-angle-right"></i></button>
	</div>
	<div class="pull-right" style="margin-right:20px;">
		<strong><?php echo LTEXT('_global_result_found')?></strong> : <?php echo $total_rows?>
	</div>
</div>
<?php }?>