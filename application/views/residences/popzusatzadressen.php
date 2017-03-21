<?php 
$res_res = $this->residences_model->get_list_id($this->uri->segment(4));
?>

<form action="<?php echo site_url('index.php/residences/updatecomments') ?>" method="post" >
    
<table>
    <tr>
        <td><?php echo LTEXT('_change_comments')?></td>
    </tr>
    <tr>
        <td>
            <textarea cols="" name="notes"><?php echo $res_res[0]->note;?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="update" value="Update">
            <input type="hidden" name="id" value="<?php echo $this->uri->segment(4);?>" >
        </td>
    </tr>
</table>
</form>