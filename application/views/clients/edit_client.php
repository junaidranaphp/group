
<div class = "row">
    <div class = "col-sm-12">
        <div class = "box box-color box-bordered">
            <div class = "box-title">
                <h3>
                    <i class = "fa fa-th-list"></i><?php echo $edit ? LTEXT('_edit_client') : LTEXT('_add_client')?></h3>
            </div>
           
            <div class = "box-content nopadding">
                <?php 
                 if($edit)
                 {
                     $form_url = base_url('clients/edit_client/'.$client->usuario_id);
                 }
                 else{
                     $form_url = base_url('clients/add_client');
                 }
                ?>
                <form action = "<?php echo $form_url?>" method = "POST" class = 'form-horizontal form-striped'>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_name') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "usuario_nombre" id = "textfield" placeholder = "<?php echo LTEXT('_name') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_user_name') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" value="<?php echo $edit ?  set_value('usuario_usuario',$client->usuario_usuario) :  set_value('usuario_usuario','')?>" name = "usuario_usuario" id = "textfield" placeholder = "<?php echo LTEXT('_user_name') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_company') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "usuario_empresa" id = "textfield" placeholder = "<?php echo LTEXT('_company') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_email') ?></label>
                        <div class = "col-sm-10">
                            <input type = "email" name = "usuario_email" id = "textfield" placeholder = "<?php echo LTEXT('_email') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_phone_number') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "usuario_telefono" id = "textfield" placeholder = "<?php echo LTEXT('_phone_number') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_address') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "usuario_direccion" id = "textfield" placeholder = "<?php echo LTEXT('_address') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "password" class = "control-label col-sm-2"><?php echo LTEXT('_password') ?></label>
                        <div class = "col-sm-10">
                            <input type = "password" name = "usuario_clave" id = "password" placeholder = "<?php echo LTEXT('_password') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_language') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "usuario_idioma" id = "textfield" placeholder = "<?php echo LTEXT('_language') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_usuario_site') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "usuario_site" id = "textfield" placeholder = "<?php echo LTEXT('_usuario_site') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_usuario_tire_shipping_comment') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "_usuario_tire_shipping_comment" id = "textfield" placeholder = "<?php echo LTEXT('_usuario_tire_shipping_comment') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_usuario_batery_shipping_comment') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" name = "_usuario_batery_shipping_comment" id = "textfield" placeholder = "<?php echo LTEXT('_usuario_batery_shipping_comment') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked> Radio 1 (preselected)
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option2" autocomplete="off"> Radio 2
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option3" autocomplete="off"> Radio 3
  </label>
</div>

                    <div class = "form-actions col-sm-offset-2 col-sm-10">
                        <button type = "submit" class = "btn btn-primary"><?php echo LTEXT('_submit')?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
