<?php
defined('BASEPATH') or die('Restricted directy access');

class Countries_model extends CI_Model
{
	
	
	function get_admin_countries($order_field='token',$sort_order='asc')
	{

		$this->db->order_by($order_field,$sort_order);
		return $this->db->get('paises')->result();
	}
	
	function insert_admin_language($data)
	{
		$this->db->insert('paises',$data);
	}
	
	function delete_admin_translation($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('paises');
	}
	
	public function get_admin_translation($token)
	{
		$this->db->where('token',$token);
		return $this->db->get('paises')->row();
	}
	
	public function update_admin_language($translation_data,$token)
	{
		$this->db->where('token',$token);
		$this->db->update('paises',$translation_data);
	}
}