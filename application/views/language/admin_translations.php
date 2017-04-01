<?php defined('BASEPATH') or die('Restricted direct access'); ?>
		<br/>
		<div class="row">
			<div class="col-sm-12">
				<?php if($this->session->flashdata('success_msg')) { ?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('success_msg'); ?>
					</div>
				<?php } ?>
				<div><a class="btn btn-success" href="<?php echo base_url('language/add_admin_translation')?>"><?php echo LTEXT('_add_translation')?></a></div>
				<div class="box box-color box-bordered">
					<div class="box-title">
						<h3><?php echo LTEXT('_admin_trnslations')?></h3>
					</div>
						<div class="box-content nopadding">
							<div style="padding:8px;" class="pull-right">
								<div class="input-group" style="width: 300px;">
	  								<input type="text" id="filter" class="form-control" placeholder="Search" aria-describedby="filter-addon">
	  								<span class="input-group-addon" id="filter-addon"><span class="fa fa-search"></span></span>
								</div>
							</div>
							<table class="table table-hover table-nomargin table-bordered searchable">
								<thead>
									<tr>
										<th><?php echo LTEXT('_sr_number')?></th>
										<th><?php echo LTEXT('_token')?> <?php echo sorting('token')?></th>
										<th><?php echo LTEXT('_page')?> <?php echo sorting('token')?></th>
										<th>
											<select class="form-control" id="select-language">
												<option value="en"><?php echo LTEXT('_en')?></option>
												<option value="es"><?php echo LTEXT('_es')?></option>
												<option value="de"><?php echo LTEXT('_de')?></option>
											</select>
											<?php echo sorting('en')?>
										</th>
										<th><?php echo LTEXT('_actions')?></th>
									</tr>
								</thead>
							<tbody>
								<?php if (count($translations) > 0) {?>
								<?php $counter = 0;?>
								<?php foreach ($translations as $translation) {?>
								<?php $counter++;?>
								<tr>
									<td><?php echo $counter?></td>
									<td><?php echo $translation->token?></td>
									<td><?php echo $translation->page?></td>
									<td class="en"><?php echo $translation->en?></td>
									<td class="es hide"><?php echo $translation->es?></td>
									<td class="de hide"><?php echo $translation->de?></td>
									<td>
										<div class="action-group">
											<a href="<?php echo base_url('language/edit_admin_translation/'.$translation->token)?>" class="btn" rel="tooltip" title="Edit">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?php echo base_url('language/delete_admin_translation/'.$translation->token)?>" class="btn" rel="tooltip" title="Delete">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</td>
								</tr>
								<?php } }else {?>
								<tr>
									<td colspan="7" class="text-center">
										<?php echo LTEXT('_no_records_found')?>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	
<?php 
/*
 * following js script is to be moved to sepratae js file
 */
?>
<script>
$(document).ready(function () {
	$('#select-language').change(function(){
		language = $(this).val();
		if(!$('.en').hasClass('hide'))
		{
			$('.en').addClass('hide');
		}
		if(!$('.es').hasClass('hide'))
		{
			$('.es').addClass('hide');
		}
		if(!$('.de').hasClass('hide'))
		{
			$('.de').addClass('hide');
		}
		$('.'+language).removeClass('hide');
		
	});

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