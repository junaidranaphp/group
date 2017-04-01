<?php defined('BASEPATH') or die('Restricted direct access'); ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-color box-bordered">
                    <div class="box-title">
                        <h3><?php echo LTEXT('_selection_list_for')?>: <?php echo $name; ?></h3>
                    </div>
                    <div class="box-content nopadding">
                        <table class="table table-hover table-nomargin table-bordered table-striped">								
                            <thead>
                                <tr>
                                    <th><?php echo LTEXT('_deutsch')?></th>
                                    <th><?php echo LTEXT('_español')?></th>
                                    <th><?php echo LTEXT('english')?></th>
                                    <th><?php echo LTEXT('_russisch')?></th>
                                    <th style="width: 20px;" class='hidden-350'>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listItems as $item) : ?>
                                    <tr>
                                        <td><?php echo $item->value; ?></td>
                                        <td><?php echo $item->value; ?></td>
                                        <td><?php echo $item->value; ?></td>
                                        <td><?php echo $item->value; ?></td>
                                        <td><i style="font-size:1.3em" class="fa fa-pencil"></i></td>
                                    </tr>  
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>