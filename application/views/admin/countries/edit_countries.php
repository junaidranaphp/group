<?php defined('BASEPATH') or die('Restricted direct accesss'); ?>

		<br/>
				<div class="row">
					<div class="col-sm-12">
						<?php echo form_open('',array('class'=>'form-horizontal'))?>
							<div class="form-group" style="display: none">
								<label for="token" class="control-label col-sm-2"><?php echo LTEXT('_ID')?></label>
								<div class="col-sm-10">
									<input value="<?php echo set_value('pais_id',$country ? $country->pais_id: '')?>" type="text" id="pais_id" name="pais_id" class="form-control"/>
									<span class="text-danger"><?php echo form_error('pais_id'); ?></span>
								</div>
							</div>							
							<div class="form-group">
								<label for="en" class="control-label col-sm-2"><?php echo LTEXT('_country')?></label>
								<div class="col-sm-10">
									<input value="<?php echo set_value('pais_nombre',$country ? $country->pais_nombre: '')?>" type="text" id="pais_nombre" name="pais_nombre" class="form-control"/>
								</div>
							</div>
							
							<div class="form-group">
								<button type="submit" class="btn btn-primary"><?php echo LTEXT('_submit')?></button>
							</div>
						<?php echo form_close()?>	
					</div>
				</div>
			
