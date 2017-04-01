<?php

class Listfields extends CI_Model
{
    public function getListFieldItemsByName($name=NULL)
    {
        $this->db->group_by('row');
        $this->db->order_by('sort');
        return $this->db->get_where('listfield',array('name'=>$name))->result();
    }
    public function getListFieldItemCount($name=NULL)
    {
        $this->db->group_by('row');
        $this->db->order_by('sort');
        return $this->db->get_where('listfield',array('name'=>$name))->num_rows();
    }
    public function getTranslation($token=NULL,$lang)
    {
        $this->db->select($lang);
        return $this->db->get_where('language_admin',array('token'=>$token))->result();
    }
}
