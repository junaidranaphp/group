 <style type="text/css">
 .inner_table td {font-size: 16px;padding: 0 5px;}
 .alert {margin-top:10px;}
 </style>

		<div id="main">
			<div class="container-fluid">
				<?php $this->load->view('includes/toolbar_box', $title);?>
				<div class="breadcrumbs">
					<?php 
					$this->breadcrumbs->push(LTEXT('_locations'),'/locations');
					echo $this->breadcrumbs->show();
					?>
					<div class="close-bread">
						<a href="#">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
					    <?php if($this->session->flashdata('success_msg')) { ?>
							<div class="alert alert-success">
								<?php echo $this->session->flashdata('success_msg'); ?>
							</div>
						<?php } ?>
						<form method="post" action="locations/add_location">
					    <table class="inner_table" style="margin-top:15px;">
					        <tr>
					            <th><?php echo LTEXT('_plz_ort')?></th>
					            <th><?php echo LTEXT('_ort_name')?>Ort Name</th>
					            <th><?php echo LTEXT('_zugehoerigkeit')?></th>
					            <th><?php echo LTEXT('_region')?></th>
					            <th></th>
					        </tr>
					        <tr>
					            <td><input required type="text" class="form-control" name="plz"></td>
					            <td><input required type="text" class="form-control" name="ort"></td>
					            <td>
					            	<?php $addlocatns = $this->locations_model->get_locations(); ?>												
									<select required class="form-control" name="id_top">
										<?php foreach ($addlocatns as $addlocatn) {	?>
											<option value="<?php echo $addlocatn->id; ?>"><?php echo $addlocatn->ort; ?></option>
										<?php }  ?>
									</select>
					            </td>
					            <td>
					            	<?php $addlistfields = $this->locations_model->get_listfields(); ?>												
									<select required class="form-control" name="region">
										<?php foreach ($addlistfields as $addlistfield) {  ?>
											<option value="<?php echo $addlistfield->row; ?>"><?php echo $addlistfield->value; ?></option>
										<?php }  ?>
									</select>
					            </td>
					            <td><input type="submit" class="btn btn-primary" value="<?php echo LTEXT('_ort_hinzufügen')?>"></td>
					        </tr>
					    </table>
					    <input type="hidden" name="action" value="new">
					    </form>
					    <?php if($this->session->flashdata('success_update')) { ?>
							<div class="alert alert-success"><?php echo $this->session->flashdata('success_update'); ?></div>
						<?php } ?>
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3><?php echo LTEXT('_locations_list')?></h3>
							</div>
							<div class="box-content nopadding">
								<form action="locations/update_location" id="form-locations" method="post">
								<table class="table table-hover table-nomargin table-bordered table-striped">								
									<thead>
										<tr>
										    <th></th>											
											<th><?php echo LTEXT('_plz_ort')?></th>
											<th><?php echo LTEXT('_ort_name')?></th>
											<th><?php echo LTEXT('_zugehoerigkeit')?></th>
											<th><?php echo LTEXT('_region')?></th>
										</tr>
									</thead>
									<tbody>
										<?php 
										foreach ($records as $row) {  
										?>
										<tr>
											<td>
												<a href="javascript:void(0);" onclick="delete_confirm(<?php echo $row->id;?>);"><i style="font-size:1.3em" class="fa fa-trash-o"></i></a>
											</td>
											<td>
											    <input type="text" required class="form-control" size="5" name="plz[<?=$row->id?>]" value="<?php echo $row->plz;?>">												
											</td>
											<td><?php echo $row->ort;?></td>
											<td>
												<?php $locatns = $this->locations_model->getlocations($row->id,$row->id_top); ?>												
												<select class="form-control" name="id_top[<?=$row->id?>]">
													<?php 
														foreach ($locatns as $locatn) {  
													?>
													<option <?php if($row->id_top == $locatn->id) { ?> selected="selected" <?php } ?> value="<?php echo $locatn->id; ?>"><?php echo $locatn->ort; ?></option>
													<?php }  ?>
												</select>
											</td>
											<td>
												<?php $listfields = $this->locations_model->get_listfields(); ?>												
												<select class="form-control" name="region[<?=$row->id?>]">
													<?php
														foreach ($listfields as $listfield) {  
													?>
													<option <?php if($row->region == $listfield->row) { ?> selected="selected" <?php } ?> value="<?php echo $listfield->row; ?>"><?php echo $listfield->value; ?></option>
													<?php }  ?>
												</select>
												<input type="hidden" id="ort" name="ort[]" value="<?php echo $row->id; ?>">
											</td>
										</tr> 
										<?php }  ?>
										<tr>											
									        <td colspan="5" class="submit"><input type="submit" class="btn btn-primary" value="<?php echo LTEXT('_submit');?>"></td>
									    </tr> 									
									</tbody>
								</table>
								</form>
								<?php //echo $this->pagination->create_links(); ?>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
    var url="<?php echo current_url(); ?>";
    var message = "<?php echo LTEXT('_do_you_want_to_delete_this?')?>";
    function delete_confirm(id){
       var r=confirm(message);
        if (r==true)
          window.location = url+"/deletelocation/"+id;
        else
          return false;
        } 
</script> 