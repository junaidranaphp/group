<?php if($this->session->userdata('advanced_search_filter')) {?>
<div class="form-group"></div>
<div class="alert alert-info alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong><?php echo LTEXT('_message')?> ! </strong><?php echo LTEXT('_advanced_search_is_on')?>
					<a class="btn btn-primary btn-small"
		href="<?php echo base_url('clients/reset_search')?>"><?php echo LTEXT('_reset_search')?></a>
</div>
<?php }?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3><?php echo LTEXT('_clients_list')?></h3>
			</div>
			<div class="box-content nopadding">
				<form action="clients" id="form-clients" method="post">
					<table
						class="table table-hover table-nomargin table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 20px;" class='hidden-350'>&nbsp;</th>
								<th class='hidden-350'><?php echo LTEXT('_client_no')?><?php echo sorting('KDnr')?></th>
								<th><?php echo LTEXT('_global_fullname')?><?php echo sorting('name')?></th>
								<th><?php echo LTEXT('_responsible')?><?php echo sorting('name')?></th>
								<th><?php echo LTEXT('_town')?><?php echo sorting('ort')?></th>
								<th class='hidden-480'><?php echo LTEXT('_global_addresses')?></th>
								<th class='hidden-480'><?php echo LTEXT('_rating')?><?php echo sorting('bewertung')?></th>
								<th><?php echo LTEXT('_reminder')?><?php echo sorting('bewertung')?></th>
								<th class='hidden-480' style="vertical-align: top;"><?php echo LTEXT('_appointment')?></th>
								<th>Contact</th>
							</tr>
						</thead>
						<tbody>
										<?php
										foreach ( $records as $row ) {
											?><tr>
								<td>
									<div class="action-group">
										<a
											href="<?php echo base_url('clients/edit/'.$row->id_adresse)?>"
											class="btn edit-additional-contact"> <i class="fa fa-edit"></i>
										</a> <a href="#" class="btn remove-additional-contact"> <i
											class="fa fa-times"></i>
										</a>
									</div>
								</td>
								<td><?php echo $row->KDnr;?></td>
								<td><?php echo $row->name . ', ' .$row->vorname ;?></td>
								<td><?php echo $row->id_adresse;?></td>
								<td><?php echo $row->ort;?></td>
								<td><?php echo $row->adresse_1;?></td>
								<td><?php echo $row->bewertung;?></td>
								<td><?php echo '';?></td>
								<td><?php echo '';?></td>
								<td><?php echo '';?></td>
							</tr>  
									<?php }  ?>
									</tbody>
					</table>
					<input type="hidden" value="" id="sort-order" name="sort-order" />
					<input type="hidden" value="" id="sort-field" name="sort-field" />
				</form>
								<?php echo $this->pagination->create_links(); ?>
								
							</div>
		</div>
	</div>
</div>
<script>
	// A $( document ).ready() block.
$( document ).ready(function() {
	$( ".fa-caret-up, .fa-caret-down" ).bind( "click", function() {
		$('#sort-field').val($(this).data('field') );
		$('#sort-order').val($(this).data('sort') );
		$('#form-clients').submit();
	});
});
</script>