<?php defined('BASEPATH') or die('Restricted direct access'); ?>
<br/>
<div class="row">
    <div class="col-sm-12">
        <?php if ($this->session->flashdata('success_msg')) { ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success_msg'); ?>
            </div>
        <?php } ?>
        <div><a class="btn btn-success" href="<?php echo base_url('manageusers/add') ?>"><?php echo LTEXT('_add_new_user') ?></a></div>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><?php echo LTEXT('_manage_users') ?></h3>
            </div>
            <div class="box-content nopadding">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo LTEXT('_login'); ?></th>
                            <th><?php echo LTEXT('_first_name'); ?></th>
                            <th><?php echo LTEXT('_in_charge'); ?></th>
                            <th><?php echo LTEXT('_language'); ?></th>
                            <th></th>
                            <th><?php echo LTEXT('_state') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($users) > 0) { ?>
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td><?php echo $user->usuario_usuario ?></td>
                                    <td><?php echo $user->usuario_nombre ?></td>
                                    <td><?php //echo $user->id_sachbearbeiter ?></td>
                                    <td><?php //echo $user->language ?></td>
                                    <td><a href="<?php echo base_url('manageusers/permissions/' . $user->usuario_id); ?>"><?php echo LTEXT('_system_rights'); ?></a></td>
                                    <td><?php // echo $user->active ?></td>
                                    <td>
                                        <div class="action-group">
                                            <a href="<?php echo base_url('manageusers/edit/' . $user->usuario_id) ?>" class="btn" rel="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn" rel="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="7" class="text-center">
    <?php echo LTEXT('_no_record_found'); ?>
                                </td>
                            </tr>
<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
