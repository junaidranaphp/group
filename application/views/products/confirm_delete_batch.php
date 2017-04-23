<div class="row">
    <div class="col-sm-12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><?php echo LTEXT('_products_list') ?></h3>
            </div>
            <div class="box-content nopadding">
                <form method="post">
                <table class="table table-hover table-nomargin table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            
                            <th><?php echo LTEXT('_code') ?><?php echo sorting('Code') ?></th>
                            <th><?php echo LTEXT('_product_grp') ?><?php echo sorting('Prod_Grp') ?></th>
                            <th><?php echo LTEXT('_rim') ?><?php echo sorting('Rim') ?></th>
                            <th><?php echo LTEXT('_pattern_family') ?><?php echo sorting('Pattern_Family') ?></th>
                            <th><?php echo LTEXT('_load/_speed') ?><?php echo sorting('Speed') ?></th>
                            <th><?php echo LTEXT('_types') ?><?php echo sorting('Type') ?></th>
                            <th><?php echo LTEXT('_tt/_tl') ?><?php echo sorting('Tubed_Tubeless') ?></th>
                            <th><?php echo LTEXT('_stock') ?><?php echo sorting('Stock') ?></th>
                            <th><?php echo LTEXT('_source') ?><?php echo sorting('Source') ?></th>
                            <th><?php echo LTEXT('_price_fob') ?><?php echo sorting('CCT_Price_FOB_2004_Rounded') ?></th>
                            <th><?php echo LTEXT('_list_price') ?><?php echo sorting('Net_Price') ?></th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $row) { ?>
                            <tr>
                                <td><?php echo $row->Code; ?></td>
                                <td><?php echo $row->Prod_Grp; ?></td>
                                <td><?php echo $row->Rim; ?></td>
                                <td><?php echo $row->Pattern_Family; ?></td>
                                <td><?php echo $row->Speed; ?></td>
                                <td><?php echo $row->Type; ?></td>
                                <td><?php echo $row->Tubed_Tubeless; ?></td>
                                <td><?php echo $row->Stock; ?></td>
                                <td><?php echo $row->Source; ?></td>
                                <td><?php echo $row->CCT_Price_FOB_2004_Rounded; ?></td>
                                <td><?php echo $row->Net_Price; ?></td>
                                <input type="hidden" name="ids[]" value="<?php echo $row->master_product_file_id;?>">
                            </tr> 
                        <?php } ?>
                    </tbody>
                </table>
                
               

                    <div class="text text-danger text-center">
                        <h3>Are you sure you want delete this product</h3>
                        <input type="hidden" name="confirm_delete" value="1" />
                        <button class="btn btn-primary"><?php echo LTEXT('_confirm_delete');?></button>
                    </div>
                </form>
                
                
          
               
            </div>
        </div>
    </div>
</div>

