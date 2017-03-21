<?php
defined('BASEPATH') or exit('Restricted direct access');
class Manageusers extends CI_Controller
{
	/*
	 * Constructor
	 */
	public function __construct() 
	{
		parent::__construct();
		/*
		 * If user is not logged in redirect to login page. 
		 * No function under this controller can be accessed wothout loggin in
		 */
		if(!$this->session->userdata('logged_in')) 
		{
			redirect(base_url('login'),'refresh');
		}
		$this->load->model('manageusers_model');
	}
	
	/*
	 * Lists all users in the system
	 */
	public function index()
	{
		$data['session'] = $this->session->userdata;			
		$data['title'] = LTEXT('_manage_users');
		$data['users'] = $this->manageusers_model->users();//Getting all users
		$this->load->view('includes/header', $data);
		$this->load->view('includes/toolbar', $data);
		$this->load->view('includes/menu_left_clients', $data);
		$this->load->view('manageusers/users',$data);
		$this->load->view('includes/footer');
	}
	/*
	 * Lists all permissions in the system
	 */
	public function permissions($id)
	{
		if(!$id || !($id>0))
		{
			redirect(base_url('manageusers'));
		}		
		$data['session'] = $this->session->userdata;
		$data['title'] = LTEXT('_user_permissions');
				
		$data['id_user'] = $id;
		$data['permissions'] = $this->manageusers_model->permissions($id);
		if(!(count($data['permissions']) > 0)) // if no data is present it means something is fishy
		{
			redirect(base_url('manageusers'));
		}
		$this->load->view('includes/header', $data);
		$this->load->view('includes/toolbar', $data);
		$this->load->view('includes/menu_left_clients', $data);
		$this->load->view('manageusers/permissions',$data);
		$this->load->view('includes/footer');
	}
	/*
	 * Updates the permission
	 */
	public function update_permissions()
	{
		if(!$this->input->post('id_user') || !($this->input->post('id_user')>0))
		{
			redirect(base_url('manageusers'));
		}
		$data['id_user'] = $this->input->post('id_user');
		$data['ManageContent'] = 1;
		$data['DeleteAdressZusatzadressen'] = 1;
		$data['AddUserPermission'] = 1;
		$data['DeleteUserPermission'] = 1;
		if (($this->input->post('ManageContent')))
		{
			$data['ManageContent'] = $this->input->post('ManageContent');
		}
		if (($this->input->post('ViewUser')))
		{
			$data['ViewUser'] = $this->input->post('ViewUser');
		}
		if (($this->input->post('AddUser')))
		{
			$data['AddUser'] = $this->input->post('AddUser');
		}
		
		if (($this->input->post('EditUser')))
		{
			$data['EditUser'] = $this->input->post('EditUser');
		}
		
		if (($this->input->post('DeleteUser')))
		{
			$data['DeleteUser'] = $this->input->post('DeleteUser');
		}
		if (($this->input->post('ViewSettings')))
		{
			$data['ViewSettings'] = $this->input->post('ViewSettings');
		}
		if (($this->input->post('AddSettings')))
		{
			$data['AddSettings'] = $this->input->post('AddSettings');
		}
		
		if (($this->input->post('EditSettings')))
		{
			$data['EditSettings'] = $this->input->post('EditSettings');
		}
		if (($this->input->post('DeleteSettings')))
		{
			$data['DeleteSettings'] = $this->input->post('DeleteSettings');
		}
		if (($this->input->post('ViewAdressen')))
		{
			$data['ViewAdressen'] = $this->input->post('ViewAdressen');
		}
		if (($this->input->post('AddAdressen')))
		{
			$data['AddAdressen'] = $this->input->post('AddAdressen');
		}
		if (($this->input->post('EditAdressen')))
		{
			$data['EditAdressen'] = $this->input->post('EditAdressen');
		}
		if (($this->input->post('DeleteAdressen')))
		{
			$data['DeleteAdressen'] = $this->input->post('DeleteAdressen');
		}
		if (($this->input->post('ViewOwnAdressen')))
		{
			$data['ViewOwnAdressen'] = $this->input->post('ViewOwnAdressen');
		}
		if (($this->input->post('AddOwnAdressen')))
		{
			$data['AddOwnAdressen'] = $this->input->post('AddOwnAdressen');
		}
		if (($this->input->post('EditOwnAdressen')))
		{
			$data['EditOwnAdressen'] = $this->input->post('EditOwnAdressen');
		}
		if (($this->input->post('DeleteOwnAdressen')))
		{
			$data['DeleteOwnAdressen'] = $this->input->post('DeleteOwnAdressen');
		}
		if (($this->input->post('ViewKontaktformen')))
		{
			$data['ViewKontaktformen'] = $this->input->post('ViewKontaktformen');
		}
		if (($this->input->post('AddKontaktformen')))
		{
			$data['AddKontaktformen'] = $this->input->post('AddKontaktformen');
		}
		if (($this->input->post('EditKontaktformen')))
		{
			$data['EditKontaktformen'] = $this->input->post('EditKontaktformen');
		}
		if (($this->input->post('DeleteKontaktformen')))
		{
			$data['DeleteKontaktformen'] = $this->input->post('DeleteKontaktformen');
		}
		if (($this->input->post('ViewAdressSachbearbeiter')))
		{
			$data['ViewAdressSachbearbeiter'] = $this->input->post('ViewAdressSachbearbeiter');
		}
		if (($this->input->post('AddAdressSachbearbeiter')))
		{
			$data['AddAdressSachbearbeiter'] = $this->input->post('AddAdressSachbearbeiter');
		}
		if (($this->input->post('EditAdressSachbearbeiter')))
		{
			$data['EditAdressSachbearbeiter'] = $this->input->post('EditAdressSachbearbeiter');
		}
		if (($this->input->post('DeleteAdressSachbearbeiter')))
		{
			$data['DeleteAdressSachbearbeiter'] = $this->input->post('DeleteAdressSachbearbeiter');
		}
		if (($this->input->post('ViewAdressZusatzadressen')))
		{
			$data['ViewAdressZusatzadressen'] = $this->input->post('ViewAdressZusatzadressen');
		}
		if (($this->input->post('AddAdressZusatzadressen')))
		{
			$data['AddAdressZusatzadressen'] = $this->input->post('AddAdressZusatzadressen');
		}
		if (($this->input->post('EditAdressZusatzadressen')))
		{
			$data['EditAdressZusatzadressen'] = $this->input->post('EditAdressZusatzadressen');
		}
		if (($this->input->post('	DeleteAdressZusatzadressen')))
		{
			$data['	DeleteAdressZusatzadressen'] = $this->input->post('	DeleteAdressZusatzadressen');
		}
		if (($this->input->post('ViewAdressZusatzdaten')))
		{
			$data['ViewAdressZusatzdaten'] = $this->input->post('ViewAdressZusatzdaten');
		}
		if (($this->input->post('AddAdressZusatzdaten')))
		{
			$data['AddAdressZusatzdaten'] = $this->input->post('AddAdressZusatzdaten');
		}
		if (($this->input->post('EditAdressZusatzdaten')))
		{
			$data['EditAdressZusatzdaten'] = $this->input->post('EditAdressZusatzdaten');
		}
		if (($this->input->post('DeleteAdressZusatzdaten')))
		{
			$data['DeleteAdressZusatzdaten'] = $this->input->post('DeleteAdressZusatzdaten');
		}
		if (($this->input->post('ViewAdressSuchprofil')))
		{
			$data['ViewAdressSuchprofil'] = $this->input->post('ViewAdressSuchprofil');
		}
		if (($this->input->post('AddAdressSuchprofil')))
		{
			$data['AddAdressSuchprofil'] = $this->input->post('AddAdressSuchprofil');
		}
		if (($this->input->post('EditAdressSuchprofil')))
		{
			$data['EditAdressSuchprofil'] = $this->input->post('EditAdressSuchprofil');
		}
		if (($this->input->post('DeleteAdressSuchprofil')))
		{
			$data['DeleteAdressSuchprofil'] = $this->input->post('DeleteAdressSuchprofil');
		}
		if (($this->input->post('ViewAdressKontakthistorie')))
		{
			$data['ViewAdressKontakthistorie'] = $this->input->post('ViewAdressKontakthistorie');
		}
		if (($this->input->post('AddAdressKontakthistorie')))
		{
			$data['AddAdressKontakthistorie'] = $this->input->post('AddAdressKontakthistorie');
		}
		if (($this->input->post('EditAdressKontakthistorie')))
		{
			$data['EditAdressKontakthistorie'] = $this->input->post('EditAdressKontakthistorie');
		}
		if (($this->input->post('DeleteAdressKontakthistorie')))
		{
			$data['DeleteAdressKontakthistorie'] = $this->input->post('DeleteAdressKontakthistorie');
		}
		if (($this->input->post('ViewObjekte')))
		{
			$data['ViewObjekte'] = $this->input->post('ViewObjekte');
		}
		if (($this->input->post('AddObjekte')))
		{
			$data['AddObjekte'] = $this->input->post('AddObjekte');
		}
		if (($this->input->post('EditObjekte')))
		{
			$data['EditObjekte'] = $this->input->post('EditObjekte');
		}
		if (($this->input->post('DeleteObjekte')))
		{
			$data['DeleteObjekte'] = $this->input->post('DeleteObjekte');
		}
		if (($this->input->post('ViewOwnObjekte')))
		{
			$data['ViewOwnObjekte'] = $this->input->post('ViewOwnObjekte');
		}
		if (($this->input->post('AddOwnObjekte')))
		{
			$data['AddOwnObjekte'] = $this->input->post('AddOwnObjekte');
		}
		if (($this->input->post('EditOwnObjekte')))
		{
			$data['EditOwnObjekte'] = $this->input->post('EditOwnObjekte');
		}
		if (($this->input->post('DeleteOwnObjekte')))
		{
			$data['DeleteOwnObjekte'] = $this->input->post('DeleteOwnObjekte');
		}
		if (($this->input->post('ViewObjektSachbearbeiter')))
		{
			$data['ViewObjektSachbearbeiter'] = $this->input->post('ViewObjektSachbearbeiter');
		}
		if (($this->input->post('AddObjektSachbearbeiter')))
		{
			$data['AddObjektSachbearbeiter'] = $this->input->post('AddObjektSachbearbeiter');
		}
		if (($this->input->post('EditObjektSachbearbeiter')))
		{
			$data['EditObjektSachbearbeiter'] = $this->input->post('EditObjektSachbearbeiter');
		}
		if (($this->input->post('DeleteObjektSachbearbeiter')))
		{
			$data['DeleteObjektSachbearbeiter'] = $this->input->post('DeleteObjektSachbearbeiter');
		}
		if (($this->input->post('ViewObjektEigentuemer')))
		{
			$data['ViewObjektEigentuemer'] = $this->input->post('ViewObjektEigentuemer');
		}
		if (($this->input->post('AddObjektEigentuemer')))
		{
			$data['AddObjektEigentuemer'] = $this->input->post('AddObjektEigentuemer');
		}
		if (($this->input->post('EditObjektEigentuemer')))
		{
			$data['EditObjektEigentuemer'] = $this->input->post('EditObjektEigentuemer');
		}
		if (($this->input->post('DeleteObjektEigentuemer')))
		{
			$data['DeleteObjektEigentuemer'] = $this->input->post('DeleteObjektEigentuemer');
		}
		if (($this->input->post('ViewObjektZusatzadressen')))
		{
			$data['ViewObjektZusatzadressen'] = $this->input->post('ViewObjektZusatzadressen');
		}
		if (($this->input->post('AddObjektZusatzadressen')))
		{
			$data['AddObjektZusatzadressen'] = $this->input->post('AddObjektZusatzadressen');
		}
		if (($this->input->post('EditObjektZusatzadressen')))
		{
			$data['EditObjektZusatzadressen'] = $this->input->post('EditObjektZusatzadressen');
		}
		if (($this->input->post('DeleteObjektZusatzadressen')))
		{
			$data['DeleteObjektZusatzadressen'] = $this->input->post('DeleteObjektZusatzadressen');
		}
		if (($this->input->post('ViewObjektSchluesseladressen')))
		{
			$data['ViewObjektSchluesseladressen'] = $this->input->post('ViewObjektSchluesseladressen');
		}
		if (($this->input->post('AddObjektSchluesseladressen')))
		{
			$data['AddObjektSchluesseladressen'] = $this->input->post('AddObjektSchluesseladressen');
		}
		if (($this->input->post('EditObjektSchluesseladressen')))
		{
			$data['EditObjektSchluesseladressen'] = $this->input->post('EditObjektSchluesseladressen');
		}
		if (($this->input->post('DeleteObjektSchluesseladressen')))
		{
			$data['DeleteObjektSchluesseladressen'] = $this->input->post('DeleteObjektSchluesseladressen');
		}if (($this->input->post('ViewObjektKontakthistorie')))
		{
			$data['ViewObjektKontakthistorie'] = $this->input->post('ViewObjektKontakthistorie');
		}
		if (($this->input->post('AddObjektKontakthistorie')))
		{
			$data['AddObjektKontakthistorie'] = $this->input->post('AddObjektKontakthistorie');
		}
		if (($this->input->post('EditObjektKontakthistorie')))
		{
			$data['EditObjektKontakthistorie'] = $this->input->post('EditObjektKontakthistorie');
		}
		if (($this->input->post('DeleteObjektKontakthistorie')))
		{
			$data['DeleteObjektKontakthistorie'] = $this->input->post('DeleteObjektKontakthistorie');
		}
		if (($this->input->post('ViewListfield')))
		{
			$data['ViewListfield'] = $this->input->post('ViewListfield');
		}
		if (($this->input->post('AddListfield')))
		{
			$data['AddListfield'] = $this->input->post('AddListfield');
		}
		if (($this->input->post('EditListfield')))
		{
			$data['EditListfield'] = $this->input->post('EditListfield');
		}
		if (($this->input->post('DeleteListfield')))
		{
			$data['DeleteListfield'] = $this->input->post('DeleteListfield');
		}
		if (($this->input->post('ViewCalendar')))
		{
			$data['ViewCalendar'] = $this->input->post('ViewCalendar');
		}
		if (($this->input->post('AddCalendar')))
		{
			$data['AddCalendar'] = $this->input->post('AddCalendar');
		}
		if (($this->input->post('EditCalendar')))
		{
			$data['EditCalendar'] = $this->input->post('EditCalendar');
		}
		if (($this->input->post('DeleteCalendar')))
		{
			$data['DeleteCalendar'] = $this->input->post('DeleteCalendar');
		}
		if (($this->input->post('ViewAnlagen')))
		{
			$data['ViewAnlagen'] = $this->input->post('ViewAnlagen');
		}
		if (($this->input->post('AddAnlagen')))
		{
			$data['AddAnlagen'] = $this->input->post('AddAnlagen');
		}
		if (($this->input->post('EditAnlagen')))
		{
			$data['EditAnlagen'] = $this->input->post('EditAnlagen');
		}
		if (($this->input->post('DeleteAnlagen')))
		{
			$data['DeleteAnlagen'] = $this->input->post('DeleteAnlagen');
		}
		if (($this->input->post('ViewAnlagenZusatzadressen')))
		{
			$data['ViewAnlagenZusatzadressen'] = $this->input->post('ViewAnlagenZusatzadressen');
		}
		if (($this->input->post('AddAnlagenZusatzadressen')))
		{
			$data['AddAnlagenZusatzadressen'] = $this->input->post('AddAnlagenZusatzadressen');
		}
		if (($this->input->post('EditAnlagenZusatzadressen')))
		{
			$data['EditAnlagenZusatzadressen'] = $this->input->post('EditAnlagenZusatzadressen');
		}
		if (($this->input->post('DeleteAnlagenZusatzadressen')))
		{
			$data['DeleteAnlagenZusatzadressen'] = $this->input->post('DeleteAnlagenZusatzadressen');
		}
		if (($this->input->post('ViewAttribute')))
		{
			$data['ViewAttribute'] = $this->input->post('ViewAttribute');
		}
		if (($this->input->post('AddAttribute')))
		{
			$data['AddAttribute'] = $this->input->post('AddAttribute');
		}
		if (($this->input->post('EditAttribute')))
		{
			$data['EditAttribute'] = $this->input->post('EditAttribute');
		}
		if (($this->input->post('DeleteAttribute')))
		{
			$data['DeleteAttribute'] = $this->input->post('DeleteAttribute');
		}
		if (($this->input->post('ViewUserPermission')))
		{
			$data['ViewUserPermission'] = $this->input->post('ViewUserPermission');
		}
		if (($this->input->post('AddUserPermission')))
		{
			$data['AddUserPermission'] = $this->input->post('AddUserPermission');
		}
		if (($this->input->post('EditUserPermission')))
		{
			$data['EditUserPermission'] = $this->input->post('EditUserPermission');
		}
		if (($this->input->post('DeleteUserPermission')))
		{
			$data['DeleteUserPermission'] = $this->input->post('DeleteUserPermission');
		}
		if (($this->input->post('ViewStartEmailFrame')))
		{
			$data['ViewStartEmailFrame'] = $this->input->post('ViewStartEmailFrame');
		}
		if (($this->input->post('WriteEmails')))
		{
			$data['WriteEmails'] = $this->input->post('WriteEmails');
		}
		if (($this->input->post('SearchEmails')))
		{
			$data['SearchEmails'] = $this->input->post('SearchEmails');
		}
		if (($this->input->post('DeleteEmails')))
		{
			$data['DeleteEmails'] = $this->input->post('DeleteEmails');
		}
		if (($this->input->post('ViewTasks')))
		{
			$data['ViewTasks'] = $this->input->post('ViewTasks');
		}
		if (($this->input->post('CreateTasks')))
		{
			$data['CreateTasks'] = $this->input->post('CreateTasks');
		}
		if (($this->input->post('EditTasks')))
		{
			$data['EditTasks'] = $this->input->post('EditTasks');
		}
		if (($this->input->post('DeleteTasks')))
		{
			$data['DeleteTasks'] = $this->input->post('DeleteTasks');
		}
		if (($this->input->post('SearchTasks')))
		{
			$data['SearchTasks'] = $this->input->post('SearchTasks');
		}
		if (($this->input->post('ViewObjektAttribute')))
		{
			$data['ViewObjektAttribute'] = $this->input->post('ViewObjektAttribute');
		}
		if (($this->input->post('EditObjektAttribute')))
		{
			$data['EditObjektAttribute'] = $this->input->post('EditObjektAttribute');
		}
		if (($this->input->post('AddObjektAttribute')))
		{
			$data['AddObjektAttribute'] = $this->input->post('AddObjektAttribute');
		}
		if (($this->input->post('DeleteObjektAttribute')))
		{
			$data['DeleteObjektAttribute'] = $this->input->post('DeleteObjektAttribute');
		}
		if (($this->input->post('ViewNewsletter')))
		{
			$data['ViewNewsletter'] = $this->input->post('ViewNewsletter');
		}
		$this->manageusers_model->update_permissions($data);
		$this->session->set_flashdata('success_msg','<strong> Success !</strong> Permissions updated successfully');
		redirect(base_url('manageusers/permissions/'.$data['id_user']));
	}
	/*
	 * Adds new user
	 * I have created this function to maintain visual difference between creating 
	 * and editing users while using same code and view page for two tasks
	 */
	public function add() 
	{
		$this->edit('new');
	}
	/*
	 * Edits a user as well as add new user
	 */
	public function edit($id)
	{
		if(!$id)
		{
			redirect(base_url('manageusers'));
		}
		if($id == 'new')
		{
			//For proper hashing i used bcrypt instead of encrypt which is better that encrypt. I have included bcrypt library class in libraries
			$params = array(
					'salt_prefix' => $this->config->item('encryption_key') // I am using codeigniter congif['salt_key'] here so salt can be changed using config file
			);
			$this->load->library('bcrypt');
			$data['session'] = $this->session->userdata;
			/*
			 * Setting error messages
			 */
			set_validation_messages();
			
			/*
			 * Setting validation rules
			 */
			$this->form_validation->set_rules('user', 				LTEXT('_login'), 'trim|required|is_unique[users.user]');
			$this->form_validation->set_rules('newpassword', 		LTEXT('_new_password'), 'trim|required');
			$this->form_validation->set_rules('newpassword2', 		LTEXT('_repeat_password'), 'trim|required|matches[newpassword]');
			$this->form_validation->set_rules('email',				LTEXT('_email'), 'trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('id_sachbearbeiter',	LTEXT('_assigned_person_in_charge'), '');
			$this->form_validation->set_rules('name',				LTEXT('_first_name'), '');
			$this->form_validation->set_rules('surname_1', 			LTEXT('1_surname'), '');
			$this->form_validation->set_rules('surname_2', 			LTEXT('2_surname'), '');
			$this->form_validation->set_rules('address',			LTEXT('_address'), '');
			$this->form_validation->set_rules('language',			LTEXT('_language'), '');
			$this->form_validation->set_rules('zip', 				LTEXT('_postal_code'), '');
			$this->form_validation->set_rules('city', 				LTEXT('_location'), '');
			$this->form_validation->set_rules('telephone', 			LTEXT('_telephone'), '');
			$this->form_validation->set_rules('mobilephone', 		LTEXT('_mobilephone'), '');
			$this->form_validation->set_rules('signature', 			LTEXT('_email_signature'), '');
				
			if ($this->form_validation->run() == true)
			{
				$user_data['user'] = strtolower(trim($this->input->post('user')));
				$user_data['email'] = trim($this->input->post('email'));
				/*
				 * I am not using bcrypt here. I am using md5 now.
				 * $user_data['password'] = $this->bcrypt->hash(trim($this->input->post('newpassword')));
				 */
				$user_data['password'] = md5(trim($this->input->post('newpassword')));
				$user_data['id_sachbearbeiter'] = $this->input->post('id_sachbearbeiter');
				$user_data['name'] = $this->input->post('name');
				$user_data['id_sachbearbeiter'] = $this->input->post('id_sachbearbeiter');
				$user_data['surname_1'] = $this->input->post('surname_1');
				$user_data['surname_2'] = $this->input->post('surname_2');
				$user_data['address'] = $this->input->post('address');
				$user_data['language'] = $this->input->post('language');
				$user_data['zip'] = $this->input->post('zip');
				$user_data['city'] = $this->input->post('city');
				$user_data['telephone'] = $this->input->post('telephone');
				$user_data['mobilephone'] = $this->input->post('mobilephone');
				$user_data['signature'] = $this->input->post('signature');
				$user_data['active'] = 1;
				$new_user_id = $this->manageusers_model->register($user_data);
				$this->manageusers_model->create_basic_permissions($new_user_id);
				$this->session->set_flashdata('success_msg','<strong> Success !</strong> New User added successfully');
				redirect(base_url('manageusers'));
			}
			else
			{
				$data['title'] = LTEXT('__add_new_user');
				$data['users'] = $this->manageusers_model->users();
				$data['user'] = false;
				$this->load->view('includes/header', $data);
				$this->load->view('includes/toolbar', $data);
				$this->load->view('includes/menu_left_clients', $data);
				$this->load->view('manageusers/user',$data);
				$this->load->view('includes/footer');
			}
		}
		else if($id > 0)
		{
			$data['user'] = $this->manageusers_model->user($id);
			$params = array(
					'salt_prefix' => $this->config->item('encryption_key')
			);
			$this->load->library('bcrypt');
			$data['session'] = $this->session->userdata;
			
			/*
			 * Setting error messages
			 */
			set_validation_messages();
			
			/*
			 * Setting validation rules
			 */
			if($this->input->post('user') != $data['user']->user) {
				$is_unique =  '|is_unique[users.user]';
			} else{
				$is_unique = '';
			}
			$this->form_validation->set_rules('user', 				LTEXT('_login'), 'trim|required'.$is_unique);
			
			//$this->form_validation->set_rules('newpassword', 		LTEXT('_new_password'), 'trim|required');
			//$this->form_validation->set_rules('newpassword2', 	LTEXT('_repeat_password'), 'trim|required|matches[newpassword]');
			if($this->input->post('email') != $data['user']->email) {
				$is_unique =  '|is_unique[users.email]';
			} else{
				$is_unique = '';
			}
			$this->form_validation->set_rules('email', 				LTEXT('_email'), 'trim|required|valid_email'.$is_unique);
			$this->form_validation->set_rules('id_sachbearbeiter',	LTEXT('_assigned_person_in_charge'), '');
			$this->form_validation->set_rules('name',				LTEXT('_first_name'), '');
			$this->form_validation->set_rules('surname_1', 			LTEXT('1_surname'), '');
			$this->form_validation->set_rules('surname_2', 			LTEXT('2_surname'), '');
			$this->form_validation->set_rules('address',			LTEXT('_address'), '');
			$this->form_validation->set_rules('language',			LTEXT('_language'), '');
			$this->form_validation->set_rules('zip', 				LTEXT('_postal_code'), '');
			$this->form_validation->set_rules('city', 				LTEXT('_location'), '');
			$this->form_validation->set_rules('telephone', 			LTEXT('_telephone'), '');
			$this->form_validation->set_rules('mobilephone', 		LTEXT('_mobilephone'), '');
			$this->form_validation->set_rules('signature', 			LTEXT('_email_signature'), '');
			
			if ($this->form_validation->run() == true)
			{
				$user_data['user'] = strtolower(trim($this->input->post('user')));
				$user_data['email'] = trim($this->input->post('email'));
				//$user_data['password'] = $this->bcrypt->hash(trim($this->input->post('newpassword')));
				$user_data['id_sachbearbeiter'] = $this->input->post('id_sachbearbeiter');
				$user_data['name'] = $this->input->post('name');
				$user_data['id_sachbearbeiter'] = $this->input->post('id_sachbearbeiter');
				$user_data['surname_1'] = $this->input->post('surname_1');
				$user_data['surname_2'] = $this->input->post('surname_2');
				$user_data['address'] = $this->input->post('address');
				$user_data['language'] = $this->input->post('language');
				$user_data['zip'] = $this->input->post('zip');
				$user_data['city'] = $this->input->post('city');
				$user_data['telephone'] = $this->input->post('telephone');
				$user_data['mobilephone'] = $this->input->post('mobilephone');
				$user_data['signature'] = $this->input->post('signature');
				$this->manageusers_model->update($user_data,$id);
				$this->session->set_flashdata('success_msg','<strong> Success !</strong> User edited successfully');
				redirect(base_url('manageusers/edit/'.$id));
			}
			else
			{
				$data['title'] = LTEXT('_edit_user');
				$data['users'] = $this->manageusers_model->users();
				$this->load->view('includes/header', $data);
				$this->load->view('includes/toolbar', $data);
				$this->load->view('includes/menu_left_clients', $data);
				$this->load->view('manageusers/user',$data);
				$this->load->view('includes/footer');
			}
		}
	}
}