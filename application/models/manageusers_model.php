<?php
defined('BASEPATH') or exit('Restricted direct access');
class manageusers_model extends CI_Model
{
	public function users()	//This function returns all the users
	{
		$this->db->select('*');
		$this->db->from('users');		
		return $this->db->get()->result();
	}
	public function permissions($id)	//This function returns all permissions for specific user id
	{
		$this->db->where('id_user',$id);
		return $this->db->get('permissions')->row();
	}
	public function update_permissions($data) //This function updates permissions of specific user. It deletes old record first and then re enters new record
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('permissions');
		
		$this->db->insert('permissions',$data);
	}
	public function register($user_data) //This function inserts new user in database
	{
		$this->db->insert('users',$user_data);
		return $this->db->insert_id();
	}
	public function user($id) // This function gets user by id
	{
		$this->db->where('id',$id);
		return $this->db->get('users')->row();
	}
	public function update($user_data,$id)//This function updates user data by id
	{
		$this->db->where('id',$id);
		$this->db->update('users',$user_data);
	}
	public function create_basic_permissions($new_user_id)//This function creates permissions for newly created user. 0 means no access 1 means access.
	{
		$data['id_user'] = $new_user_id;
		$data['ManageContent'] = 1;
		$data['DeleteAdressZusatzadressen'] = 1;
		$data['AddUserPermission'] = 1;
		$data['DeleteUserPermission'] = 1;
		$data['ManageContent'] = 1;
		$data['ViewUser'] = 1;
		$data['AddUser'] = 1;
		$data['EditUser'] = 1;
		$data['DeleteUser'] = 1;
		$data['ViewSettings'] = 1;
		$data['AddSettings'] = 1;
		$data['EditSettings'] = 1;
		$data['DeleteSettings'] = 1;
		$data['ViewAdressen'] = 1;
		$data['AddAdressen'] = 1;
		$data['EditAdressen'] = 1;
		$data['DeleteAdressen'] = 1;
		$data['ViewOwnAdressen'] = 1;
		$data['AddOwnAdressen'] = 1;
		$data['EditOwnAdressen'] = 1;
		$data['DeleteOwnAdressen'] = 1;
		$data['ViewKontaktformen'] = 1;
		$data['AddKontaktformen'] = 1;
		$data['EditKontaktformen'] = 1;
		$data['DeleteKontaktformen'] = 1;
		$data['ViewAdressSachbearbeiter'] = 1;
		$data['AddAdressSachbearbeiter'] = 1;
		$data['EditAdressSachbearbeiter'] = 1;
		$data['DeleteAdressSachbearbeiter'] = 1;
		$data['ViewAdressZusatzadressen'] = 1;
		$data['AddAdressZusatzadressen'] = 1;
		$data['EditAdressZusatzadressen'] = 1;
		$data['	DeleteAdressZusatzadressen'] = 1;
		$data['ViewAdressZusatzdaten'] = 1;
		$data['AddAdressZusatzdaten'] = 1;
		$data['EditAdressZusatzdaten'] = 1;
		$data['DeleteAdressZusatzdaten'] = 1;
		$data['ViewAdressSuchprofil'] = 1;
		$data['AddAdressSuchprofil'] = 1;
		$data['EditAdressSuchprofil'] = 1;
		$data['DeleteAdressSuchprofil'] = 1;
		$data['ViewAdressKontakthistorie'] = 1;
		$data['AddAdressKontakthistorie'] = 1;
		$data['EditAdressKontakthistorie'] = 1;
		$data['DeleteAdressKontakthistorie'] = 1;
		$data['ViewObjekte'] = 1;
		$data['AddObjekte'] = 1;
		$data['EditObjekte'] = 1;
		$data['DeleteObjekte'] = 1;
		$data['ViewOwnObjekte'] = 1;
		$data['AddOwnObjekte'] = 1;
		$data['EditOwnObjekte'] = 1;
		$data['DeleteOwnObjekte'] = 1;
		$data['ViewObjektSachbearbeiter'] = 1;
		$data['AddObjektSachbearbeiter'] = 1;
		$data['EditObjektSachbearbeiter'] = 1;
		$data['DeleteObjektSachbearbeiter'] = 1;
		$data['ViewObjektEigentuemer'] = 1;
		$data['AddObjektEigentuemer'] = 1;
		$data['EditObjektEigentuemer'] = 1;
		$data['DeleteObjektEigentuemer'] = 1;
		$data['ViewObjektZusatzadressen'] = 1;
		$data['AddObjektZusatzadressen'] = 1;
		$data['EditObjektZusatzadressen'] = 1;
		$data['DeleteObjektZusatzadressen'] = 1;
		$data['ViewObjektSchluesseladressen'] = 1;
		$data['AddObjektSchluesseladressen'] = 1;
		$data['EditObjektSchluesseladressen'] = 1;
		$data['DeleteObjektSchluesseladressen'] = 1;
		$data['ViewObjektKontakthistorie'] = 1;
		$data['AddObjektKontakthistorie'] = 1;
		$data['EditObjektKontakthistorie'] = 1;
		$data['DeleteObjektKontakthistorie'] = 1;
		$data['ViewListfield'] = 1;
		$data['AddListfield'] = 1;
		$data['EditListfield'] = 1;
		$data['DeleteListfield'] = 1;
		$data['ViewCalendar'] = 1;
		$data['AddCalendar'] = 1;
		$data['EditCalendar'] = 1;
		$data['DeleteCalendar'] = 1;
		$data['ViewAnlagen'] = 1;
		$data['AddAnlagen'] = 1;
		$data['EditAnlagen'] = 1;
		$data['DeleteAnlagen'] = 1;
		$data['ViewAnlagenZusatzadressen'] = 1;
		$data['AddAnlagenZusatzadressen'] = 1;
		$data['EditAnlagenZusatzadressen'] = 1;
		$data['DeleteAnlagenZusatzadressen'] = 1;
		$data['ViewAttribute'] = 1;
		$data['AddAttribute'] = 1;
		$data['EditAttribute'] = 1;
		$data['DeleteAttribute'] = 1;
		$data['ViewUserPermission'] = 1;
		$data['AddUserPermission'] = 1;
		$data['EditUserPermission'] = 1;
		$data['DeleteUserPermission'] = 1;
		$data['ViewStartEmailFrame'] = 1;
		$data['WriteEmails'] = 1;
		$data['SearchEmails'] = 1;
		$data['DeleteEmails'] = 1;
		$data['ViewTasks'] = 1;
		$data['CreateTasks'] = 1;
		$data['EditTasks'] = 1;
		$data['DeleteTasks'] = 1;
		$data['SearchTasks'] = 1;
		$data['ViewObjektAttribute'] = 1;
		$data['EditObjektAttribute'] = 1;
		$data['AddObjektAttribute'] = 1;
		$data['DeleteObjektAttribute'] = 1;
		$data['ViewNewsletter'] = 1;
		$this->db->insert('permissions',$data);
	}
}