<?php
defined('BASEPATH') or die('Restricted directy access');

class Countries_model extends CI_Model
{
		
	function get_countries($order_field='pais_id',$sort_order='asc')
	{
		$this->db->order_by($order_field,$sort_order);
		return $this->db->get('paises')->result();
	}
	
	function insert_country($data)
	{
		$this->db->insert('paises',$data);
	}
	
	function delete_country($id)
	{
		$this->db->where('pais_id',$id);
		$this->db->delete('paises');
	}
	
	public function get_country($id)
	{
		$this->db->where('pais_id',$id);
		return $this->db->get('paises')->row();
	}
	
	public function update_country($data,$id)
	{
		$this->db->where('pais_id',$id);
		$this->db->update('paises',$data);
	}
}