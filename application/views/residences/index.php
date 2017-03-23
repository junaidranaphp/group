
        <div>&nbsp;</div>
        <div><a href="<?php echo base_url();?>index.php/residences/residencesadd"><?php echo LTEXT('_add_residence')?></a></div>
        
        <?php 
        if(count($records)){
        ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-color box-bordered">
                    <div class="box-title">
                        <h3><?php echo LTEXT('_residences_list')?></h3>
                    </div>
                    <div class="box-content nopadding">
                        <form action="clients" id="form-clients" method="post">
                        <table class="table table-hover table-nomargin table-bordered table-striped">								
                            <thead>
                                <tr>
                                    <th><?php echo LTEXT('_edit')?></th>
                                    <th><?php echo LTEXT('_delete')?></th>											
                                    <th><?php echo LTEXT('_name_of_resdence')?></th>
                                    <th><?php echo LTEXT('_address')?></th>
                                    <th><?php echo LTEXT('_administrator')?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($records as $row) {  
                                    $getadmins = $this->residences_model->get_administrator($row->verwalter);
                                ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php/residences/residencesedit/<?php echo $row->id;?>">
                                            <img border=0 src="images/btn_edit.png">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" onclick="confirm_delete('Löschen bestätigen: <?php echo $row->name?>','<?php echo base_url();?>index.php/residences/residencesdelete/<?php echo $row->id?>')">
                                            <img border=0 src="images/btn_delete.png" style="height:15px">
                                        </a>
                                    </td>
                                    <td><?php echo $row->name?></td>
                                    <td><?php echo $row->plz.' '.$row->ort.', '.$row->adresse_1.' ' .$row->adresse_2;?></td>
                                    <?php foreach($getadmins as $var){?>
                                    <td><?php echo $var->vor_name;?></td>
                                    <?php } ?>
                                </tr>  
                            <?php }  ?>
                            </tbody>
                        </table>
                        </form>
                        <?php echo $this->pagination->create_links(); ?>								
                    </div>
                </div>
            </div>
        </div>
        <?php } else{ ?>
        <div><?php echo LTEXT('_no_records_found')?></div>
        <?php } ?>
    
<script type="text/javascript">
function confirm_delete(confirm_text, delete_url) {
    if(confirm(confirm_text)) {
        window.location = delete_url;
    }
}
</script>