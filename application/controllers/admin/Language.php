<?php 
defined('BASEPATH') or die('Restricted direct access');

class Language extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			redirect('login','refresh');
		}
		$this->load->model('language_model');
	}
	
	public function admin_translations()
	{
		if ($this->input->post('sort-field')){
			$order_field = @$this->input->post('sort-field');
			$sort_order = @$this->input->post('sort-order');
		}
		if ( empty($order_field)){
			$order_field = "token";
			$sort_order = "asc";
		}
		$data['translations'] = $this->language_model->get_admin_translations($order_field,$sort_order);
		$data['session'] = $this->session->userdata;		
		$data['title'] = LTEXT('_admin_translations');			
		$data['languages'] = $this->language_model->get_languages();
		
		$this->template->set_active_menu('settings')
			->set_active_submenu('language')
			->set_heading(LTEXT('_admin_translations'))
			->set_page('admin/language/admin_translations')
			->show($data);
	}
	
	public function add_admin_translation()
	{
		$this->edit_admin_translation('#new');
	}
	
	public function valid_token($str)
	{
		if ( preg_match('/[\'^�$%&*()}{@#~?><>,| =+�-]/', $str))
		{
			$this->form_validation->set_message('valid_token', LTEXT('_invalid_token_field_error'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function delete_admin_translation($id)
	{
		
		if (!$id || $id == '')
		{
			redirect(base_url('admin/language/admin_translations'));
		}
		$this->language_model->delete_admin_translation($id);
		redirect(base_url('admin/language/admin_translations'));
	}
	
	public function edit_admin_translation($token)
	{
		
		$token = trim($token);		
		if(!$token || $token == '')
		{
			redirect(base_url('admin/language/admin_translations'));
		}
		if($token == '#new')
		{
			$data['session'] = $this->session->userdata;
			$data['title'] = '_add_translation';
			$data['translation'] = false;
			/*
			 * Setting error messages
			 */
			set_validation_messages();
			
			/*
			 * Setting validation rules
			 */
			$this->form_validation->set_rules('token', LTEXT('_token'), 'trim|required|is_unique[language_admin.token]|callback_valid_token');			
			$this->form_validation->set_rules('en', LTEXT('_en'), '');
			$this->form_validation->set_rules('es', LTEXT('_es'), '');
			$this->form_validation->set_rules('fr', LTEXT('_fr'), '');
			$this->form_validation->set_rules('pt', LTEXT('_pt'), '');
			if ($this->form_validation->run() == true)
			{
				$translation_data['token'] = trim($this->input->post('token'));				
				$translation_data['en'] = trim($this->input->post('en'));
				$translation_data['es'] = trim($this->input->post('es'));
				$translation_data['fr'] = trim($this->input->post('fr'));
				$translation_data['pt'] = trim($this->input->post('pt'));
				$this->language_model->insert_admin_language($translation_data);
				$this->session->set_flashdata('success_msg','<strong> Success !</strong> New translation added successfully');
				redirect(base_url('admin/language/admin_translations'));
			}
			else
			{
				$this->template->set_active_menu('settings')
				->set_active_submenu('Language')
				->set_heading(LTEXT('_add_translation'))
				->set_page('admin/language/translation')
				->show($data);
			}
		}
		else
		{
			$data['session'] = $this->session->userdata;
			$data['title'] = LTEXT('_edit_translation');
			$data['translation'] = $this->language_model->get_admin_translation($token);
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
			$this->form_validation->set_rules('fr', LTEXT('_fr'), '');
			$this->form_validation->set_rules('pt', LTEXT('_pt'), '');
			if ($this->form_validation->run() == true)
			{
				$translation_data['token'] = trim($this->input->post('token'));				
				$translation_data['en'] = trim($this->input->post('en'));
				$translation_data['es'] = trim($this->input->post('es'));
				$translation_data['fr'] = trim($this->input->post('fr'));
				$translation_data['pt'] = trim($this->input->post('pt'));
				$this->language_model->update_admin_language($translation_data,$token);
				$this->session->set_flashdata('success_msg','<strong> Success !</strong> Translation edited successfully');
				redirect(base_url('admin/language/admin_translations'));
			}
			else
			{
				$this->template->set_active_menu('settings')
				->set_active_submenu('Language')
				->set_heading(LTEXT('_edit_translation'))
				->set_page('admin/language/translation')
				->show($data);
			}
		}
	}
}
