<?php defined('BASEPATH') or die('Restricted direct access'); ?>
		<br/>
		<div class="row">
			<div class="col-sm-12">
				<?php if($this->session->flashdata('success_msg')) { ?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('success_msg'); ?>
					</div>
				<?php } ?>
				<div><a class="btn btn-success" href="<?php echo base_url('admin/countries/add_countries')?>"><?php echo LTEXT('_add_countries')?></a></div>
				<div class="box box-color box-bordered">
					<div class="box-title">
						<h3><?php echo LTEXT('_admin_countries')?></h3>
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
											<th width="35%"><?php echo LTEXT('_pais_id')?> <?php echo sorting('pais_id')?></th>										
											<th width="55%"><?php echo LTEXT('_country')?> <?php echo sorting("pais_nombre") ?>
											</th>										
										</tr>
									</thead>
								<tbody>
									<?php if (count($countries) > 0) {?>								
										<?php foreach ($countries as $country) {?>								
										<tr>
											<td>
												<div class="action-group">
													<a href="<?php echo base_url('admin/countries/edit_countries/'.$country->pais_id)?>" class="btn" rel="tooltip" title="Edit">
														<i class="fa fa-edit"></i>
													</a>
													<a href="<?php echo base_url('admin/countries/delete_countries/'.$country->pais_id)?>" class="btn" rel="tooltip" title="Delete">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</td>									
											<td><?php echo $country->pais_id?></td>
											<td ><?php echo $country->pais_nombre?></td>
											
											
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
    });
</script>