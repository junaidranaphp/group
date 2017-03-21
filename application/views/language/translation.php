<?php defined('BASEPATH') or die('Restricted direct accesss'); ?>

		<div id="main">
			<div class="container-fluid">
				<?php $this->load->view('includes/toolbar_box', $title);?>
				<div class="breadcrumbs">
					<?php 
					$this->breadcrumbs->push(LTEXT('_admin_translations'),'/language/admin_translations');
					if($translation)
					{
						$this->breadcrumbs->push(LTEXT('_edit_admin_translation'),'/language/edit_admin_translation/'.$translation->token);
					}
					else 
					{
						$this->breadcrumbs->push(LTEXT('_add_admin_translation'),'/language/add_admin_translation');
					}
					echo $this->breadcrumbs->show();
					?>
					<div class="close-bread">
						<a href="#">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						<?php echo form_open('',array('class'=>'form-horizontal'))?>
							<div class="form-group">
								<label for="token" class="control-label col-sm-2"><?php echo LTEXT('_token')?></label>
								<div class="col-sm-10">
									<input value="<?php echo set_value('token',$translation ? $translation->token: '')?>" type="text" id="token" name="token" class="form-control"/>
									<span class="text-danger"><?php echo form_error('token'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="page" class="control-label col-sm-2"><?php echo LTEXT('_page')?></label>
								<div class="col-sm-10">
									<input value="<?php echo set_value('page',$translation ? $translation->page: '')?>" type="text" id="page" name="page" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label for="en" class="control-label col-sm-2"><?php echo LTEXT('_en')?></label>
								<div class="col-sm-10">
									<input value="<?php echo set_value('en',$translation ? $translation->en: '')?>" type="text" id="en" name="en" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label for="es" class="control-label col-sm-2"><?php echo LTEXT('_es')?></label>
								<div class="col-sm-10">
									<input value="<?php echo set_value('es',$translation ? $translation->es: '')?>" type="text" id="es" name="es" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label for="de" class="control-label col-sm-2"><?php echo LTEXT('_de')?></label>
								<div class="col-sm-10">
									<input value="<?php echo set_value('de',$translation ? $translation->de: '')?>" type="text" id="de" name="de" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary"><?php echo LTEXT('_submit')?></button>
							</div>
						<?php echo form_close()?>	
					</div>
				</div>
			</div>
		</div>
