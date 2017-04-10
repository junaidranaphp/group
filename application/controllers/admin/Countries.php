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
		$data['countries'] = $this->countries_model->get_admin_countries($order_field,$sort_order);
		$data['session'] = $this->session->userdata;		
		$data['title'] = LTEXT('_admin_countries');					
		
		$this->template->set_active_menu('settings')
			->set_active_submenu('Countries')
			->set_heading(LTEXT('_admin_countries'))
			->set_page('admin/countries/admin_countries')
			->show($data);
	}
	
	public function add_admin_countries()
	{
		$this->edit_admin_countries('#new');
	}
		
	public function delete_admin_countries($id)
	{
		
		if (!$id || $id == '')
		{
			redirect(base_url('admin/language/admin_translations'));
		}
		$this->countries_model->delete_admin_translation($id);
		redirect(base_url('admin/countries/admin_countries'));
	}
	
	public function edit_admin_countries($id)
	{
					
		if(!$id || $id == '')
		{
			redirect(base_url('admin/countries/admin_countries'));
		}
		if($id == '#new')
		{
			$data['session'] = $this->session->userdata;
			$data['title'] = '_add_country';
			$data['translation'] = false;
			/*
			 * Setting error messages
			 */
			set_validation_messages();
			
			/*
			 * Setting validation rules
			 */
			$this->form_validation->set_rules('id', LTEXT('_token'), 'trim|required|is_unique[language_admin.token]|callback_valid_token');			
			$this->form_validation->set_rules('pais_nombre', LTEXT('country_name'), '');
			
			if ($this->form_validation->run() == true)
			{
				$translation_data['pais_id'] = trim($this->input->post('token'));				
				$translation_data['pais_nombre'] = trim($this->input->post('en'));
				
				$this->countries_model->insert_admin_language($translation_data);
				$this->session->set_flashdata('success_msg','<strong> Success !</strong> New translation added successfully');
				redirect(base_url('admin/countries/admin_countries'));
			}
			else
			{
				$this->template->set_active_menu('settings')
				->set_active_submenu('Language')
				->set_heading(LTEXT('_add_countries'))
				->set_page('admin/countries/countries')
				->show($data);
			}
		}
		else
		{
			$data['session'] = $this->session->userdata;
			$data['title'] = LTEXT('_edit_countries');
			$data['translation'] = $this->countries_model->get_admin_translation($token);
			/*
			 * Setting error messages
			 */
			set_validation_messages();
				
			/*
			 * Setting validation rules
			 */
			if( $token != $data['translation']->token) {
				$is_unique =  '|is_unique[language_admin.token]';
			} else{
				$is_unique = '';
			}
			$this->form_validation->set_rules('token', LTEXT('_token'), 'trim|required|callback_valid_token'.$is_unique);			
			$this->form_validation->set_rules('en', LTEXT('_en'), '');
			$this->form_validation->set_rules('es', LTEXT('_es'), '');
			$this->form_validation->set_rules('de', LTEXT('_de'), '');
			if ($this->form_validation->run() == true)
			{
				$translation_data['token'] = trim($this->input->post('token'));				
				$translation_data['en'] = trim($this->input->post('en'));
				$translation_data['es'] = trim($this->input->post('es'));
				$translation_data['de'] = trim($this->input->post('de'));
				$this->countries_model->update_admin_language($translation_data,$token);
				$this->session->set_flashdata('success_msg','<strong> Success !</strong> Translation edited successfully');
				redirect(base_url('admin/countries/admin_countries'));
			}
			else
			{
				$this->template->set_active_menu('settings')
				->set_active_submenu('Language')
				->set_heading(LTEXT('_edit_countries'))
				->set_page('admin/countries/countries')
				->show($data);
			}
		}
	}
}
