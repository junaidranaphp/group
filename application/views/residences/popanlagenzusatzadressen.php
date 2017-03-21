<a href="<?=$_SERVER['PHP_SELF']?>?Action=AdressSuche&ResetAddressForm=1">
<?php 
 $res_name = $this->residences_model->LA("global_reset_submitbutton");
 echo $res_name[0]->en; 
?>
</a>

<form  action="<?php echo site_url('index.php/residences/listsearchresult');?>" method="post">
<table width="600" class="inner_table page-heading"> 
   <tr>
        <th colspan="4">
            <?php 
            $res_name = $this->residences_model->LA("global_direct_search_addresses_with_data");
            echo $res_name[0]->en; 
            ?>
        </th>
    </tr>
    <tr>
        <td class="submit" colspan="4">
            <?php
              $res_name = $this->residences_model->LA("global_search");
            ?>
            <input type="submit" value="<?php echo $res_name[0]->en;?>">
        </td>
   </tr>
   <tr>
       <td>
           <?php
              $res_name = $this->residences_model->LA("global_user");
              echo $res_name[0]->en;
            ?>
       </td>
       <td>
           <?php
              $user_name = $this->residences_model->getUsers($_SESSION['userid']);
              echo $user_name[0]->username;
            ?>
       </td>
       <td colspan="1" nowrap>
           <?php
              $res_name = $this->residences_model->LA("global_status");
              echo $res_name[0]->en;
           ?>
       </td>
       
       <td>
           <select name="SASearchStatus">
               <option value="0">-- <?php echo LTEXT('_all')?> --</option>
               <option value="1"><?php echo LTEXT('_active')?></option>
               <option value="2"><?php echo LTEXT('_inactive')?></option>
           </select>
       </td>
   </tr>
   <tr>
       <td>
           <?php
              $res_name = $this->residences_model->LA("global_language");
              echo $res_name[0]->en;
           ?>
       </td>
       <td>
           <select size="1" name="SASearchSprache"> <!--- Cant find the table def_sprachen --->
                <option selected="" value="0">-- select --</option>
                <option value="1">Deutsch</option>
                <option value="2">Español</option>
                <option value="3">English</option>
                <option value="4">Russisch</option>
            </select>
       </td>
       
       <td>
           <?php
              $res_name = $this->residences_model->LA("global_newsletter");
              echo $res_name[0]->en;
           ?>
       </td>
       <td><input name="SAnewsletter" type="checkbox" value="1"></td>
   </tr>
   <tr>
       <td>
           <?php
              $res_name = $this->residences_model->LA("global_fulltext_search");
              echo $res_name[0]->en;
           ?>
       </td>
       <td>
           <input type="text" size="26" name="SASearchTextAddress" value="">
       </td>
       <td>
           <?php
              $res_name = $this->residences_model->LA("adr_category");
              echo $res_name[0]->en;
           ?>
       </td>
       <td>
           
           <select>
                <?php
                $get_cat = $this->residences_model->getadrcategory();
                foreach($get_cat as $rows){
                ?>
                <option value="<?php echo $rows->row;?>"><?php echo $rows->value;?></option>
               <?php }?>
           </select>
           
       </td>
   </tr>
   <tr>
       <td>
           <?php
              $res_name = $this->residences_model->LA("global_surname");
              echo $res_name[0]->en;
           ?>
       </td>
       <td><input type="text" size="26" name="SASearchTextNachname" value=""></td>
       <td>
           <?php
              $res_name = $this->residences_model->LA("global_firstname");
              echo $res_name[0]->en;
           ?>
       </td>
       <td><input type="text" size="26" name="SASearchTextVorname" value=""></td>
   </tr>
   <tr>
       <td>
           <?php
            $res_name = $this->residences_model->LA("global_in_charge");
            echo $res_name[0]->en;
          ?>
       </td>
       <td>
           <select name="SASachbearbeiter">
                <?php
                $get_incharge = $this->residences_model->getincharge();
                foreach($get_incharge as $rows){
                ?>
                <option value="<?php echo $rows->ID;?>"><?php echo $rows->name;?></option>
               <?php }?>
           </select>
       </td>
       
       <td>
           <?php
            $res_name = $this->residences_model->LA("global_quelle");
            echo $res_name[0]->en;
          ?>
           
       </td>
       
       <td>
           <select name="SAkundenaquise">
                <?php
                $get_source = $this->residences_model->get_source();
                foreach($get_source as $rows){
                ?>
                <option value="<?php echo $rows->row;?>"><?php echo $rows->value;?></option>
               <?php }?>
           </select>
       </td>
       
   </tr>
   <tr>
    <td class="submit" colspan="4">
        <?php
            $res_name = $this->residences_model->LA("global_search");
          ?>
        <input type="submit" value="<?php echo $res_name[0]->en;?>">
        
        <input type="hidden" name="id_anlage" value="<?php echo $this->uri->segment(4);?>">
        <input type="hidden" name="table" value="<?php echo $this->uri->segment(3);?>">
        <input type="hidden" name="Action" value="Adressen">
        <input type="hidden" name="SearchSubmit" value="1">
    </td>
   </tr>
</table>
</form>