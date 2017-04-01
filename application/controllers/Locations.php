<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI

class Locations extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('locations_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')) {
			
			$config['base_url'] = 'http://redb2.local/index.php/locations/index';
			$config['total_rows'] = $this->locations_model->total();
			
			$config['per_page'] = 20;
			$config['num_links'] = 5;
			$config['full_tag_open'] = '<div class="table-pagination">';
			$config['full_tag_close'] = "</div>";
			$this->pagination->initialize($config);

			$data['title'] = LTEXT('_locations_all');
			
			$data['records'] = $this->locations_model->get_locations(); // get all
			$data['session'] = $this->session->userdata;
			
			$this->template->set_active_menu('settings')
			->set_active_submenu('Locations')
			->set_heading(LTEXT('_locations_all'))
			->set_page('locations/index')
			->show($data);
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}

	public function deletelocation($id='')
	{
		if(isset($id)){
			$this->locations_model->delete_location($id);
			$this->session->set_flashdata('success_msg', '<strong>Success!</strong> Location Deleted Successfully');
			redirect('locations');
		} else {
			redirect('locations');
		}
	}

	public function add_location(){
		$datas = array(
					'plz' => $this->input->post('plz'),
					'ort' => $this->input->post('ort'),
					'id_top' => $this->input->post('id_top'),
					'region' => $this->input->post('region')
				);
		$this->locations_model->add_location($datas);
		$this->session->set_flashdata('success_msg', '<strong>Success!</strong> Location Added Successfully');
		redirect('locations');
	}

	public function update_location(){
		$ort_id = $this->input->post('ort');
		$id_top = $this->input->post('id_top');
        $region = $this->input->post('region');
        $plz    = $this->input->post('plz');
		foreach ($ort_id as $id) {
			//echo $plz[$id]."</br>";
			if($id_top[$id]){
				$this->locations_model->update_location($id,$plz[$id],$region[$id],$id_top[$id]);
			}
		}
		$this->session->set_flashdata('success_update', '<strong>Success!</strong> Location Updated Successfully');
		redirect('locations');
	}

	public function view($id = NULL)
	{
		$data['title'] = LTEXT('_adressen_detail');
		$data['news_item'] = $this->clients_model->get_address($id);
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}


	
}