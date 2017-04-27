<div class = "row">
    <div class = "col-sm-12">
        <div class = "box box-color box-bordered">
            <div class = "box-title">
                <h3>
                    <i class = "fa fa-th-list"></i><?php echo $edit ? LTEXT('_edit_product') : LTEXT('_add_product')?></h3>
            </div>
           
            <div class = "box-content nopadding">
                <?php 
                 if($edit)
                 {
                     $form_url = base_url('admin/products/edit_product/'.$product->master_product_file_id);
                 }
                 else{
                     $form_url = base_url('admin/products/add_product');
                 }
                ?>
                <form action = "<?php echo $form_url?>" method = "POST" class = 'form-horizontal form-striped'>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_code') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" value="<?php echo $edit ? set_value('Code', $product->Code) : set_value('Code', '')?>" name = "Code" id = "textfield" placeholder = "<?php echo LTEXT('_code') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_product_grp') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" value="<?php echo $edit ?  set_value('Prod_Grp',$product->Prod_Grp) :  set_value('Prod_Grp','')?>" name = "Prod_Grp" id = "textfield" placeholder = "<?php echo LTEXT('_product_grp') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_rim') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" value="<?php echo $edit ?  set_value('Rim',$product->Rim) :  set_value('Rim','')?>" name = "Rim" id = "textfield" placeholder = "<?php echo LTEXT('_rim') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_pattern_family') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text" value="<?php echo $edit ?  set_value('Pattern_Family',$product->Pattern_Family) :  set_value('Pattern_Family','')?>" name = "Pattern_Family" id = "textfield" placeholder = "<?php echo LTEXT('_pattern_family') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_speed') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text"  value="<?php echo $edit ?  set_value('Speed',$product->Speed) :  set_value('Speed','')?>" name = "Speed" id = "textfield" placeholder = "<?php echo LTEXT('_speed') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_type') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text"  value="<?php echo $edit ?  set_value('Type',$product->Type) :  set_value('Type','')?>" name = "Type" id = "textfield" placeholder = "<?php echo LTEXT('_type') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "password" class = "control-label col-sm-2"><?php echo LTEXT('_tubed_tubeless') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text"  value="<?php echo $edit ?  set_value('Tubed_Tubeless',$product->Tubed_Tubeless) :  set_value('Tubed_Tubeless','')?>" name = "Tubed_Tubeless" id = "password" placeholder = "<?php echo LTEXT('_tubed_tubeless') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_stock') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text"  value="<?php echo $edit ?  set_value('Stock',$product->Stock) :  set_value('Stock','')?>" name = "Stock" id = "textfield" placeholder = "<?php echo LTEXT('_stock') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_source') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text"  value="<?php echo $edit ?  set_value('Source',$product->Source) :  set_value('Source','')?>" name = "Source" id = "textfield" placeholder = "<?php echo LTEXT('_source') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_price_fob') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text"  value="<?php echo $edit ?  set_value('CCT_Price_FOB_2004_Rounded',$product->CCT_Price_FOB_2004_Rounded) :  set_value('CCT_Price_FOB_2004_Rounded','')?>" name = "CCT_Price_FOB_2004_Rounded" id = "textfield" placeholder = "<?php echo LTEXT('_price_fob') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "textfield" class = "control-label col-sm-2"><?php echo LTEXT('_list_price') ?></label>
                        <div class = "col-sm-10">
                            <input type = "text"  value="<?php echo $edit ?  set_value('Net_Price',$product->Net_Price) :  set_value('Net_Price','')?>" name = "Net_Price" id = "textfield" placeholder = "<?php echo LTEXT('_list_price') ?>" class = "form-control">
                        </div>
                    </div>
                    <div class = "form-actions col-sm-offset-2 col-sm-10">
                        <button type = "submit" class = "btn btn-primary"><?php echo LTEXT('_submit')?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
