
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-color box-bordered">
                    <div>&nbsp;</div>
                    <div class="box-content nopadding">	
                        <table>
                            <tr>
                                <td>
                                   <form action="<?php echo site_url('index.php/residences/editaction');?>" id="form-clients" method="post">
                                        <table class="table table-hover table-nomargin table-bordered table-striped">
                                            <tr>
                                                <th colspan="2">
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_name_residence");
                                                       echo $res_name[0]->en;
                                                    ?>
                                                </th>
                                            </tr>
                                            <tr>   										
                                                <td><?php echo LTEXT('_bezeichnung_anlage')?></td>
                                                <td><input type="text" name="name" size="25" value="<?php echo $editdata[0]->name;?>"></td>
                                            </tr>
                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_address");
                                                       echo $res_name[0]->en .'1'; 
                                                    ?>
                                                </td>
                                                <td><input type="text" name="address_1" size="25" value="<?php echo $editdata[0]->adresse_1;?>"></td>
                                            </tr>

                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_address");
                                                       echo $res_name[0]->en .'2'; 
                                                    ?>
                                                </td>
                                                <td><input type="text" name="address_2" size="25" value="<?php echo $editdata[0]->adresse_2;?>"></td>
                                            </tr>

                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name    = $this->residences_model->LA("global_postalcode");
                                                       $res_name2   = $this->residences_model->LA("global_location");
                                                       echo $res_name[0]->en. '/'.$res_name2[0]->en; 
                                                    ?>
                                                </td>
                                                <td>
                                                    <input type="text" name="postalcode" size="25" value="<?php echo $editdata[0]->plz;?>"> /
                                                    <input type="text" name="location" size="25" value="<?php echo $editdata[0]->ort;?>">
                                                </td>
                                            </tr>

                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_land");
                                                       echo $res_name[0]->en; 
                                                    ?>
                                                </td>
                                                <td>
                                                    <select name="country">
                                                        <?php
                                                            $countryresults = $this->residences_model->get_country();
                                                            foreach($countryresults as $row){ //print_r($row);                                                                
                                                                if($editdata[0]->land == $row->value) {
                                                                    $selected = "selected";
                                                                } else {
                                                                    $selected = "";
                                                                }
                                                            ?>
                                                            <option value="<?php echo $row->value;?>" <?php echo $selected; ?>><?php echo $row->value;?></option>
                                                        <?php }?>
                                                    </select>

                                                </td>
                                            </tr>

                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_number_units");
                                                       echo $res_name[0]->en; 
                                                    ?>
                                                </td>
                                                <td><input type="text" name="numunits" size="25" value="<?php echo $editdata[0]->anzahl_einheiten;?>"></td>
                                            </tr>

                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_number_floors");
                                                       echo $res_name[0]->en; 
                                                    ?>
                                                </td>
                                                <td><input type="text" name="numfloors" size="25" value="<?php echo $editdata[0]->anzahl_etagen;?>"></td>
                                            </tr>
                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_code_main_entry");
                                                       echo $res_name[0]->en; 
                                                    ?>
                                                </td>
                                                <td><input type="text" name="codemainentry" size="25" value="<?php echo $editdata[0]->code_haupteingang;?>"></td>
                                            </tr>

                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_community_costs");
                                                       echo $res_name[0]->en; 
                                                    ?>
                                                </td>
                                                <td>
                                                    <input type="text" name="communitycosts" size="25" value="<?php echo $editdata[0]->gemeinschaftskosten;?>">&nbsp;&nbsp;
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_water_included");
                                                       echo $res_name[0]->en; 
                                                    ?>
                                                    <input type="checkbox" value="1" name="check_wasser">
                                                </td>
                                            </tr>

                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_administrator");
                                                       echo $res_name[0]->en; 
                                                    ?>
                                                </td>
                                                <td>

                                                    <select name="administrator">
                                                        <?php
                                                            $adminresults = $this->residences_model->get_administratorlist();
                                                            foreach($adminresults as $row) {
                                                                if($editdata[0]->verwalter == $row->id) {
                                                                    $selected = "selected";
                                                                } else {
                                                                    $selected = "";
                                                                }
                                                            ?>
                                                            <option value="<?php echo $row->id;?>" <?php echo $selected; ?>><?php echo $row->vorname;?></option>
                                                        <?php }?>
                                                    </select>

                                                </td>
                                            </tr>

                                            <tr>   										
                                                <td>
                                                    <?php 
                                                       $res_name = $this->residences_model->LA("global_comments");
                                                       echo $res_name[0]->en; 
                                                    ?>
                                                </td>
                                                <td><textarea name="comments"><?php echo $editdata[0]->notiz;?></textarea></td>
                                            </tr>

                                            <tr>
                                                <td class="submit" colspan="2" align="center">
                                                    <input type="submit" value="edit residence">&nbsp;
                                                    <input type="reset" value="reset form">
                                                    <input type="hidden" name="id_anlage" value="<?php echo $editID; ?>" />
                                                </td>
                                             </tr>
                                        </table>
                                    </form> 
                                </td>
                                <!------ 1st td -------->
                                <td>
                                    <p style="margin:2px">
                                        <?php 
                                            $res_name = $this->residences_model->LA("global_available_residences");
                                            echo $res_name[0]->en; 
                                        ?>
                                    </p>
                                    <iframe width="500" height="400" border=1 src="<?php echo base_url();?>index.php/residences/anlagenzusatzadressen/<?php echo $editID;?>"/>
                                </td>
                            </tr>
                        </table>
                        <?php echo $this->pagination->create_links(); ?>								
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
