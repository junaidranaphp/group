<?php
defined('BASEPATH') or die('Restricted directy access');

class Language_model extends CI_Model
{
	public function get_languages()
	{
		return $this->db->order_by('id',"asc")->get('default_lang')->result();
	}
	
	function get_admin_translations($order_field='token',$sort_order='asc')
	{
		$this->db->order_by($order_field,$sort_order);
		return $this->db->get('language_admin')->result();
	}
	
	function insert_admin_language($data)
	{
		$this->db->insert('language_admin',$data);
	}
	
	function delete_admin_translation($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('language_admin');
	}
	
	public function get_admin_translation($token)
	{
		$this->db->where('token',$token);
		return $this->db->get('language_admin')->row();
	}
	
	public function update_admin_language($translation_data,$token)
	{
		$this->db->where('token',$token);
		$this->db->update('language_admin',$translation_data);
	}
}