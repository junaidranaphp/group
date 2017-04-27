<?php 
defined('BASEPATH') or die('Restricted direct access');

class Countries extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			redirect('login','refresh');
		}		
		$this->load->model('countries_model');
	}
	
	public function admin_countries()
	{
		

		if ($this->input->post('sort-field')){
			$order_field = @$this->input->post('sort-field');
			$sort_order = @$this->input->post('sort-order');			

		}
		if ( empty($order_field)){
			$order_field = "pais_id";
			$sort_order = "asc";
		}
		$data['countries'] = $this->countries_model->get_countries($order_field,$sort_order);
		$data['session'] = $this->session->userdata;		
		$data['title'] = LTEXT('_admin_countries');					
		
		$this->template->set_active_menu('settings')
			->set_active_submenu('countries')
			->set_heading(LTEXT('_admin_countries'))
			->set_page('admin/countries/list_countries')
			->show($data);
	}
	
	public function add_countries()
	{
		$this->edit_countries('#new');
	}
		
	public function delete_countries($id)
	{
		
		if (!$id || $id == '')
		{
			redirect(base_url('admin/countries/admin_countries'));
		}
		$this->countries_model->delete_country($id);
		redirect(base_url('admin/countries/admin_countries'));
	}
	
	public function edit_countries($id)
	{
					
		if(!$id || $id == '')
		{
			redirect(base_url('admin/countries/admin_countries'));
		}
		
		if($id == '#new')
		{
			$data['session'] = $this->session->userdata;
			$data['title'] = '_add_country';
			$data['country'] = false;
			/*
			 * Setting error messages
			 */
			set_validation_messages();
			
			/*
			 * Setting validation rules
			 */
			
			$this->form_validation->set_rules('pais_nombre', LTEXT('country_name'), 'trim|required');
			
			if ($this->form_validation->run() == true)
			{
				$form_data['pais_id'] = trim($this->input->post('pais_id'));				
				$form_data['pais_nombre'] = trim($this->input->post('pais_nombre'));
				
				$this->countries_model->insert_country($form_data);
				$this->session->set_flashdata('success_msg','<strong> Success !</strong> New country added successfully');
				redirect(base_url('admin/countries/admin_countries'));
			}
			else
			{
				$this->template->set_active_menu('settings')
				->set_active_submenu('countries')
				->set_heading(LTEXT('_add_countries'))
				->set_page('admin/countries/edit_countries')
				->show($data);
			}
		}
		else
		{
			$data['session'] = $this->session->userdata;
			$data['title'] = LTEXT('_edit_countries');
			$data['country'] = $this->countries_model->get_country($id);
			/*
			 * Setting error messages
			 */
			set_validation_messages();
				
			/*
			 * Setting validation rules
			 */
			$this->form_validation->set_rules('pais_id', LTEXT('_en'), 'trim|required');			
			$this->form_validation->set_rules('pais_nombre', LTEXT('_en'), '');			
			
			if ($this->form_validation->run() == true)
			{
				
				$form_data['pais_nombre'] = trim($this->input->post('pais_nombre'));
				
				$this->countries_model->update_country($form_data, $id);
				$this->session->set_flashdata('success_msg','<strong> Success !</strong> Country edited successfully');
				redirect(base_url('admin/countries/admin_countries'));
			}
			else
			{
				$this->template->set_active_menu('settings')
				->set_active_submenu('Language')
				->set_heading(LTEXT('_edit_countries'))
				->set_page('admin/countries/edit_countries')
				->show($data);
			}
		}
	}
}
