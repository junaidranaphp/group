<?php

defined('BASEPATH') or die('Restricted direct access');

class Basic_model extends CI_Model {
    public function get_user_product_groups($user_id) {
        return $this->db->select(' master_product_file.Prod_Grp as group_name')
                ->from('permisos')
                ->where('permisos.usuario_id',$user_id)
                ->join('master_product_file','master_product_file.Prod_Grp = permisos.permiso_prodgrp ')
                ->group_by('master_product_file.Prod_Grp')
                ->get()->result();
    }
   
}
