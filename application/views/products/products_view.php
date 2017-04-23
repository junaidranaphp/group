<div class="row">
    <div class="col-sm-12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><?php echo LTEXT('_products_list') ?></h3>
            </div>
            <div class="box-content nopadding">
                <?php echo form_open(base_url('products/delete_products')) ?>
                <table class="table table-hover table-nomargin table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
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
                            <th>&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($records as $row) { ?>
                            <tr>
                                <td>
                                    <div class="action-group">
                                        <a
                                            href="<?php echo base_url('products/edit_product/' . $row->master_product_file_id) ?>"
                                            class="btn edit-additional-contact"> <i class="fa fa-edit"></i>
                                        </a> <a href="<?php echo base_url('products/delete_products/' . $row->master_product_file_id) ?>" class="btn remove-additional-contact"> <i
                                                class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>

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
                                <td><input type="checkbox" name="multi_select[]" value="<?php echo $row->master_product_file_id; ?>"</td>

                            </tr> 
                        <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-primary"><?php echo LTEXT('_delete'); ?></button>
                <?php echo form_close();?>
                <div class="pull-right ">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo base_url('products/') ?>" id="form-sort" method="post">
    <input type="hidden" name="sort-field" id="sort-field">
    <input type="hidden" name="sort-order" id="sort-order">
</form>
<script>
    // A $( document ).ready() block.
    $(document).ready(function () {
        $(".fa-caret-up, .fa-caret-down").click(function (event) {
            event.preventDefault();
            $('#sort-field').val($(this).data('field'));
            $('#sort-order').val($(this).data('sort'));
            $('#form-sort').submit();
        });
    });
</script>

