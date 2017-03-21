<?php 
$res_search_res = $this->residences_model->get_all_search_results();

?>
<table>
    <tr>
        <td align="center"><?php echo LTEXT('_search_results')?></td>
    </tr>
    <?php foreach($res_search_res as $rows){?>
    <tr>
        <td><a href="<?php echo site_url('index.php/residences/insertsearchres');?>/<?php echo $rows->ID?>/<?php echo $id_anlage;?>/<?php echo $table;?>">Select</a></td>
        <td><?php echo $rows->name.' , '.$rows->vorname.' '.$rows->plz .' '.$rows->ort;?></td>
    </tr>
    
    <?php }?>
</table>