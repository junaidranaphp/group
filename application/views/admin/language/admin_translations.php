<?php defined('BASEPATH') or die('Restricted direct access'); ?>
		<br/>
		<div class="row">
			<div class="col-sm-12">
				<?php if($this->session->flashdata('success_msg')) { ?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('success_msg'); ?>
					</div>
				<?php } ?>
				<div><a class="btn btn-success" href="<?php echo base_url('admin/language/add_admin_translation')?>"><?php echo LTEXT('_add_translation')?></a></div>
				<div class="box box-color box-bordered">
					<div class="box-title">
						<h3><?php echo LTEXT('_admin_trnslations')?></h3>
					</div>
						<div class="box-content nopadding">
							<form action="admin_countries" id="form-clients" method="post">
								<div style="padding:8px;" class="pull-right">
									<div class="input-group" style="width: 300px;">
										<input type="text" id="filter" class="form-control" placeholder="Search" aria-describedby="filter-addon">
										<span class="input-group-addon" id="filter-addon"><span class="fa fa-search"></span></span>
									</div>
								</div>
								<table class="table table-hover table-nomargin table-bordered searchable">
									<thead>
										<tr>
											<th width="10%"><?php echo LTEXT('_actions')?></th>										
											<th width="35%"><?php echo LTEXT('_token')?> <?php echo sorting('token')?></th>										
											<th width="55%">
												<select class="form-control" id="select-language">
													<?php foreach( $languages as $lang){
														echo "<option value=\"{$lang->code}\">{$lang->lang}</option>";
													}
													?>												
												</select>
												<?php echo sorting($languages[0]->code) ?>
											</th>										
										</tr>
									</thead>
								<tbody>
									<?php if (count($translations) > 0) {?>								
										<?php foreach ($translations as $translation) {?>								
										<tr>
											<td>
												<div class="action-group">
													<a href="<?php echo base_url('admin/language/edit_admin_translation/'.$translation->token)?>" class="btn" rel="tooltip" title="Edit">
														<i class="fa fa-edit"></i>
													</a>
													<a href="<?php echo base_url('admin/language/delete_admin_translation/'.$translation->id)?>" class="btn" rel="tooltip" title="Delete">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</td>									
											<td><?php echo $translation->token?></td>
											<?php foreach ( $languages as $lang){																				
												echo "<td class=\"{$lang->code} hide\">{$translation->{$lang->code}}</td>";
											}
											?>
										</tr>
										<?php
										}
									} else { ?>
									<tr>
										<td colspan="7" class="text-center">
											<?php echo LTEXT('_no_records_found')?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						<input type="hidden" value="" id="sort-order" name="sort-order" />
						<input type="hidden" value="" id="sort-field" name="sort-field" />
						</form>
					</div>
				</div>
			</div>
		</div>

<script>
$(document).ready(function () {
	$(".fa-caret-up, .fa-caret-down").bind("click", function () {
            $('#sort-field').val($(this).data('field'));
            $('#sort-order').val($(this).data('sort'));
            $('#form-clients').submit();
        });
	
	$('#select-language').change(function(){
		language = $(this).val();
		
		<?php
		foreach ( $languages as $lang){
			echo "
				if(!$('.{$lang->code}').hasClass('hide'))
				{
					$('.{$lang->code}').addClass('hide');
				}
				";
		}
		?>
		
		$('.'+language).removeClass('hide');
		
	});
	language = $('#select-language').val();
	$('.'+language).removeClass('hide');
	
    (function ($) {

        $('#filter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tbody tr').hide();
            $('.searchable tbody tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));

});
</script>