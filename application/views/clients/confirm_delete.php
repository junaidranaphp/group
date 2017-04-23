<div class="row">
    <div class="col-sm-12">

        <div class="box box-color box-bordered">

            <div class="box-title">
                <h3><?php echo LTEXT('_delete_client') ?></h3>
            </div>

            <div class="box-content ">
                <table class="table table-hover table-nomargin table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo LTEXT('_user_id') ?><?php echo sorting('usuario_id') ?></th>
                            <th><?php echo LTEXT('_user_name') ?><?php echo sorting('usuario_usuario') ?></th>
                            <th><?php echo LTEXT('_company') ?><?php echo sorting('usuario_empresa') ?></th>
                            <th><?php echo LTEXT('_email') ?><?php echo sorting('usuario_email') ?></th>
                            <th><?php echo LTEXT('_phone') ?><?php echo sorting('usuario_telefono') ?></th>
                            <th><?php echo LTEXT('_address') ?><?php echo sorting('usuario_direccion') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $client->usuario_id; ?></td>
                            <td><?php echo $client->usuario_usuario; ?></td>
                            <td><?php echo $client->usuario_empresa; ?></td>
                            <td><?php echo $client->usuario_email; ?></td>
                            <td><?php echo $client->usuario_telefono; ?></td>
                            <td><?php echo $client->usuario_direccion; ?></td>
                        </tr>
                    </tbody>
                </table>
                <form method="post">

                    <div class="text text-danger text-center">
                        <h3>Are you sure you want delete this product</h3>
                        <input type="hidden" name="id" value="<?php echo $client->usuario_id?>"/>
                        <button class="btn btn-primary"><?php echo LTEXT('_confirm_delete'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>