<div class="row">
    <div class="col-sm-12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><?php echo LTEXT('_products_list') ?></h3>
            </div>
            <div class="box-content nopadding">
                <table id="mytabless" class="table table-condensed table-hover table-nomargin table-bordered dataTable-column_filter" data-column_filter_types="text,text,text,text,text,text,text,text,text,text,null">
                    <thead>

                        <tr>

                            <th><?php echo LTEXT('_code') ?></th>
                            <th><?php echo LTEXT('_product_grp') ?></th>
                            <th><?php echo LTEXT('_rim') ?></th>
                            <th><?php echo LTEXT('_pattern_family') ?></th>
                            <th><?php echo LTEXT('_types') ?></th>
                            <th><?php echo LTEXT('_tt/_tl') ?></th>
                            <th><?php echo LTEXT('_stock') ?></th>
                            <th><?php echo LTEXT('_source') ?></th>
                            <th><?php echo LTEXT('_price_fob') ?></th>
                            <th><?php echo LTEXT('_list_price') ?></th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var product_group_filter = '<?php echo  $product_group_filter ? $product_group_filter : ''  ?>';
</script>

