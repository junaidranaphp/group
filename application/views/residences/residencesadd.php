<div id="main">
    <div class="container-fluid">
    	<?php $this->load->view('includes/toolbar_box', $title);?>
        <div class="breadcrumbs">
			<?php 
			$this->breadcrumbs->push(LTEXT('_residences'),'/residences');
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
                    <div>&nbsp;</div>
                    <div class="box-content nopadding">	
                        <form action="<?php echo site_url('index.php/residences/addaction');?>" id="form-clients" method="post">
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
                                <td><input type="text" name="name" size="25"></td>
                            </tr>
                            <tr>   										
                                <td>
                                    <?php 
                                       $res_name = $this->residences_model->LA("global_address");
                                       echo $res_name[0]->en .'1'; 
                                    ?>
                                </td>
                                <td><input type="text" name="address_1" size="25"></td>
                            </tr>
                            
                            <tr>   										
                                <td>
                                    <?php 
                                       $res_name = $this->residences_model->LA("global_address");
                                       echo $res_name[0]->en .'2'; 
                                    ?>
                                </td>
                                <td><input type="text" name="address_2" size="25" ></td>
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
                                    <input type="text" name="postalcode" size="25" > /
                                    <input type="text" name="location" size="25" >
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
                                                if($_SERVER['QUERY_STRING']){
                                                    $country_res    =   $country;
                                                    
                                                }
                                                else{
                                                    $country_res    =   $row->value;
                                                }
                                            ?>
                                            <option value="<?php echo $country_res;?>"><?php echo $country_res;?></option>
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
                                <td><input type="text" name="numunits" size="25"></td>
                            </tr>
                            
                            <tr>   										
                                <td>
                                    <?php 
                                       $res_name = $this->residences_model->LA("global_number_floors");
                                       echo $res_name[0]->en; 
                                    ?>
                                </td>
                                <td><input type="text" name="numfloors" size="25" ></td>
                            </tr>
                            <tr>   										
                                <td>
                                    <?php 
                                       $res_name = $this->residences_model->LA("global_code_main_entry");
                                       echo $res_name[0]->en; 
                                    ?>
                                </td>
                                <td><input type="text" name="codemainentry" size="25"></td>
                            </tr>
                            
                            <tr>   										
                                <td>
                                    <?php 
                                       $res_name = $this->residences_model->LA("global_community_costs");
                                       echo $res_name[0]->en; 
                                    ?>
                                </td>
                                <td>
                                    <input type="text" name="communitycosts" size="25" value="">&nbsp;&nbsp;
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
                                            foreach($adminresults as $row){
                                                /*if($_SERVER['QUERY_STRING']){
                                                    $admin_res = $this->residences_model->get_administratorlistid($administrator);
                                                    $admin_name =   $admin_res[0]->vorname;
                                                    
                                                }*/
                                            ?>
                                            <option value="<?php echo $row->id;?>"><?php echo $row->vorname;?></option>
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
                                <td><textarea name="comments"></textarea></td>
                            </tr>
                            
                            <tr>
                                <td class="submit" colspan="2" align="center">
                                    <input type="submit" value="new residence">&nbsp;
                                    <input type="reset" value="reset form">
                                </td>
                             </tr>
                            
                            
                            <tbody>
                                <tr>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <?php echo $this->pagination->create_links(); ?>								
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
