<div id="main">
    <div class="container-fluid">
        <?php $this->load->view('includes/toolbar_box', $title);?>
		<div class="breadcrumbs">
			<?php 
			$this->breadcrumbs->push(LTEXT('_ListFieldItems'),'/listfield');
			echo $this->breadcrumbs->show();
			?>
			<div class="close-bread">
				<a href="#">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
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