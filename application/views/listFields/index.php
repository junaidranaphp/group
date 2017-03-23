

        <div class="row">
            <div class="col-sm-12">
                <div class="box box-color box-bordered">
                    <div class="box-title">
                        <h3><?php echo LTEXT('_list_fields')?></h3>
                    </div>
                    <div class="box-content nopadding">
                        <div class="col-xs-12 nopadding">
                            <div class="col-xs-3 nopadding">
                                <table class="table table-hover table-nomargin table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo LTEXT('_object_information')?></th>
                                            <th style="width: 20px;" class='hidden-350'>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listItem1 as $item1) : ?>
                                            <tr>
                                                <td><?php echo $item1['field'] . '(' . $item1['count'] . ')'; ?></td> 
                                                <td><i style="font-size:1.3em" class="fa fa-pencil"></i></td>
                                            </tr>  
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-3 nopadding">
                                <table class="table table-hover table-nomargin table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo LTEXT('_addresses')?>/<?php echo LTEXT('_contacts')?></th>
                                            <th style="width: 20px;" class='hidden-350'>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listItem2 as $item2) : ?>
                                            <tr>
                                                <td><?php echo $item2['field'] . '(' . $item2['count'] . ')'; ?></td> 
                                                <td><i style="font-size:1.3em" class="fa fa-pencil"></i></td>
                                            </tr>  
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-3 nopadding">
                                <table class="table table-hover table-nomargin table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo LTEXT('_marketing')?></th>
                                            <th style="width: 20px;" class='hidden-350'>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listItem3 as $item3) : ?>
                                            <tr>
                                                <td><?php echo $item3['field'] . '(' . $item3['count'] . ')'; ?></td> 
                                                <td><i style="font-size:1.3em" class="fa fa-pencil"></i></td>
                                            </tr>  
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-3 nopadding">
                                <table class="table table-hover table-nomargin table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo LTEXT('_general_info')?></th>
                                            <th style="width: 20px;" class='hidden-350'>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listItem4 as $item4) : ?>
                                            <tr>
                                                <td><?php echo $item4['field'] . '(' . $item4['count'] . ')'; ?></td> 
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
    </div>
</div>