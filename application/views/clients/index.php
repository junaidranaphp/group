<?php if ($this->session->userdata('advanced_search_filter')) { ?>
    <div class="form-group"></div>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo LTEXT('_message') ?> ! </strong><?php echo LTEXT('_advanced_search_is_on') ?>
        <a class="btn btn-primary btn-small"
           href="<?php echo base_url('admin/clients/reset_search') ?>"><?php echo LTEXT('_reset_search') ?></a>
    </div>
<?php } ?>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><?php echo LTEXT('_client_list') ?></h3>
            </div>
            <div class="box-content nopadding">
                
                    <table class="table table-hover table-nomargin table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo LTEXT('_user_id') ?><?php echo sorting('usuario_id') ?></th>
                                <th><?php echo LTEXT('_user_name') ?><?php echo sorting('usuario_usuario') ?></th>
                                <th><?php echo LTEXT('_company') ?><?php echo sorting('usuario_empresa') ?></th>
                                <th><?php echo LTEXT('_email') ?><?php echo sorting('usuario_email') ?></th>
                                <th><?php echo LTEXT('_phone') ?><?php echo sorting('usuario_telefono') ?></th>
                                <th><?php echo LTEXT('_address') ?><?php echo sorting('usuario_direccion') ?></th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="action-group">
                                            <a
                                                href="<?php echo base_url('admin/clients/edit_client/' . $row->usuario_id) ?>"
                                                class="btn edit-additional-contact"> <i class="fa fa-edit"></i>
                                            </a> <a href="<?php echo base_url('admin/clients/delete_client/' . $row->usuario_id) ?>" class="btn remove-additional-contact"> <i
                                                    class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php echo $row->usuario_id; ?></td>
                                    <td><?php echo $row->usuario_usuario; ?></td>
                                    <td><?php echo $row->usuario_empresa; ?></td>
                                    <td><?php echo $row->usuario_email; ?></td>
                                    <td><?php echo $row->usuario_telefono; ?></td>
                                    <td><?php echo $row->usuario_direccion; ?></td>
                                    
                                </tr>  
                            <?php } ?>
                        </tbody>
                    </table>
                <form method="post" id="form-sort">
                    <input type="hidden" value="" id="sort-order" name="sort-order" />
                    <input type="hidden" value="" id="sort-field" name="sort-field" />
               </form>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    // A $( document ).ready() block.
    $(document).ready(function () {
        
        $(".fa-caret-up, .fa-caret-down").click( function () {
            $('#sort-field').val($(this).data('field'));
            $('#sort-order').val($(this).data('sort'));
            $('#form-sort').submit();
        });
    });
</script>