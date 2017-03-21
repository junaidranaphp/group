<a href="#" onclick="javascript:targetitem=window.open('<?php echo base_url();?>index.php/residences/popanlagenzusatzadressen/<?php echo $table ?>/<?php echo $editID?>', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=800,height=500'); return false;">
<?php 
 $res_name = $this->residences_model->LA("global_add_address");
 echo $res_name[0]->en; 
?>
</a>


<?php
$getall_res = $this->residences_model->get_all_zusatzadressen_anlagen($editID);
?>

<table>
    <tr>
        <td>&nbsp;</td>
         <td>&nbsp;</td>
          <td><?php echo LTEXT('_name')?></td>

            
    </tr>
    <?php foreach($getall_res as $rows){
       $get_res    =   $this->residences_model->get_administrator($rows->id_zusatzadresse);
    ?>
    
    <tr>
        <td valign="top" align="right">
            <a href="#" onclick="javascript:targetitem=window.open('<?php echo site_url('index.php/residences/popzusatzadressen').'/'.$table.'/'.$rows->id;?>', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=300'); return false;"><img src="images/btn_edit.png" border=0>
            </a>
        </td>
        <td valign="top"><a href="<?php echo $_SERVER['PHP_SELF']?>?table=&Action=Delete&id=&id_anlage="><img src="images/btn_delete.png" style="height:15px"></a></td>
        <td valign="top">
            <a target="_blank" href=""><?php echo $get_res[0]->vor_name?></a>
        </td>
    </tr>
    <?php }?>
</table>