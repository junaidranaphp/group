<?php defined('BASEPATH') or die('Restricted direct access');
class Clients_model extends CI_Model {

        public function __construct()
        {
            
        }
        public function insert_client($data){
            return $this->db->insert('users',$data);
        }
        public function update_client($data,$id){
            return $this->db->where('id',$id)
            ->update('users',$data);
        }
        public function delete_client($id){
            return $this->db->where('id',$id)
            ->delete('users');
        }

        public function get_clients()
        {
            return $this->db->get('users')->result();
        }
        public function get_client($id)
        {
            return$this->db->where('id',$id)->get('users')->row();
        }
        
        public function total()
        {            
                
                return $this->db->get('adressen')->num_rows();
        }
        
        public function get_reminder_date($id = FALSE)
        {            
                
                return $this->db->get('adressen')->num_rows();
        }
        
        public function get_sachbearbeiter($id = FALSE)
        {            
                
                return $this->db->get('adressen')->num_rows();
        }   
        public function get_address($id)
        {
        	$this->db->where('id',$id);
        	return $this->db->get('adressen')->row();
        }
        public function get_KontaktArt($language)
        {
        	$this->db->where('language',$language);
        	$this->db->where('name','ZusatzKontaktArten');
        	return $this->db->get('listfield')->result();
        }
        public function get_countries($language)
        {
        	$this->db->where('language',$language);
        	$this->db->where('name','laender');
        	//$this->db->order_by();
        	return $this->db->get('listfield')->result();
        }
        public function get_objects_for_menu($id)
        {
        	 $this->db->where('e.id_adresse',$id);
        	 $this->db->select('e.*');
        	 $this->db->from('obj_eigentuemer as e');
        	 $this->db->join('obj_grunddaten as g','g.ID=e.id_object');
        	 return $this->db->get()->result();
        }
        public function get_in_charge($id)
        {
        	$this->db->where('id_adresse',$id);
        	return $this->db->get('sachbearbeiter')->result();
        }
        public function get_addressess_where_kontaktart_6()
        {
        	$this->db->where('kontaktart=6');
        	return $this->db->get('adressen')->result();
        }
        public function get_zusatzadressen($id)
        {
        	$this->db->where('id_adresse',$id);
        	return $this->db->get('zusatzadressen')->result();
        }
        public function search_addresses($search_data,$offset,$limit)
        {
        	
        	foreach($search_data as $key => $search)
        	{
        		switch($key)
        		{
        			case 'SA_SearchTextAddress' :
						$this->db->where("(	LOWER(kuerzel) LIKE '%$search%' 
											OR LOWER(name) LIKE '%$search%' 
											OR LOWER(vorname) LIKE '%$search%' 
											OR LOWER(firma) LIKE '%$search%')", null, false);
        				break;
        			case 'SA_SearchTextNachname' :
        				$this->db->where("LOWER(name) like '%$search%'");
        				break;
        			case 'SA_SearchTextVorname' :
        				$this->db->where("LOWER(vorname) like '%$search%'");
        				break;
        			case 'SA_SuchTyp' :
        				$this->db->where("LOWER(vorname) like '%$search%'");
        				if($search == -1 or $search == -2 or $search == -3){
        					switch($search){
        						case -1:
        							$this->db->where('kunde','1');
        							break;
        						case -2:
        							$this->db->where('eigentuemer=1');
        							break;
        					}
        				}else{
        					$this->db->where('kontaktart',$search);
        				}
        				break;
        		}
        	}
        	$this->db->order_by('name','asc');
        	return $this->db->get('adressen',$limit,$offset)->result();
        }
        public function get_addresses_count($search_data)
        {
        	foreach($search_data as $key => $search)
        	{
        		switch($key)
        		{
        			case 'SA_SearchTextAddress' :
        				$this->db->where("(	LOWER(kuerzel) LIKE '%$search%'
        				OR LOWER(name) LIKE '%$search%'
        				OR LOWER(vorname) LIKE '%$search%'
        				OR LOWER(firma) LIKE '%$search%')", null, false);
        				break;
        			case 'SA_SearchTextNachname' :
        				$this->db->where("LOWER(name) like '%$search%'");
        				break;
        			case 'SA_SearchTextVorname' :
        				$this->db->where("LOWER(vorname) like '%$search%'");
        				break;
        			case 'SA_SuchTyp' :
        				$this->db->where("LOWER(vorname) like '%$search%'");
        				if($search == -1 or $search == -2 or $search == -3){
        					switch($search){
        						case -1:
        							$this->db->where('kunde','1');
        							break;
        						case -2:
        							$this->db->where('eigentuemer=1');
        							break;
        					}
        				}else{
        					$this->db->where('kontaktart',$search);
        				}
        				break;
        		}
        	}
        	return $this->db->count_all_results('adressen');
        }
        public function insert_zusatzadressen($insert_data)
        {
        	$this->db->insert('zusatzadressen',$insert_data);
        	return $this->db->insert_id();
        }
        public function get_zusatzadressen_count($id)
        {
        	$this->db->where('id_adresse',$id);
        	return $this->db->get('zusatzadressen')->num_rows();
        }
        public function update_zusatzadressen($update_data,$zusatzadressen_id)
        {
        	$this->db->where('id_zusatzadresse',$zusatzadressen_id);
        	$this->db->update('zusatzadressen');
        }
        public function remove_additional_address($id)
        {
        	$this->db->where('id',$id);
        	$this->db->delete('zusatzadressen');
        }
        public function get_listfield($language,$option)
        {
        	$this->db->where('language',$language);
        	$this->db->where('name',$option);
        	$this->db->order_by('sort','asc');
        	return $this->db->get('listfield')->result();
        }
        public function insert_zusatzdaten($insert_data)
        {
        	$this->db->insert('zusatzdaten',$insert_data);
        	return $this->db->insert_id();
        }
        public function update_zusatzdaten($update_data,$id)
        {
        	$this->db->where('id',$id);
        	$this->db->update('zusatzdaten',$update_data);
        }
        public function get_zusatzdaten($id)
        {
        	$this->db->where('id_adresse',$id);
        	return $this->db->get('zusatzdaten')->result();
        }
        public function remove_additional_data($id)
        {
        	$this->db->where('id',$id);
        	$this->db->delete('zusatzdaten');
        }
        public function insert_kontakt_formen($insert_data)
        {
        	$this->db->insert('kontakt_formen',$insert_data);
        	return $this->db->insert_id();
        }
        public function update_kontakt_formen($update_data,$id)
        {
        	$this->db->where('id',$id);
        	$this->db->update('kontakt_formen',$update_data);
        }
		public function get_kontakt_formen($id)
        {
        	$this->db->where('id_adresse',$id);
        	$this->db->order_by('sort','desc');
        	return $this->db->get('kontakt_formen')->result();
        }
        public function remove_additional_contact($id)
        {
        	$this->db->where('id',$id);
        	$this->db->delete('kontakt_formen');
        }
        public function check_if_already_in_charge($id_sachbearbeiter,$id_address)
        {
        	$this->db->where('id_sachbearbeiter',$id_sachbearbeiter);
        	$this->db->where('id_adresse',$id_address);
        	return $this->db->count_all_results('sachbearbeiter');
        }
        public function insert_sachbearbeiter($insert_data)
        {
        	$this->db->insert('sachbearbeiter',$insert_data);
        }
        public function remove_defaults_in_sachbearbeiter($id)
        {
        	$update_data['default'] = 0;
        	$this->db->where('id_adresse',$id);
        	$this->db->update('sachbearbeiter',$update_data);
        }
        public function check_if_default_exists($id,$table)
        {
        	$this->db->where('id_adresse',$id);
        	$this->db->where('default',1);
        	return $this->db->count_all_results($table);
        }
        public function get_sachbearbeiters($id)
        {
        	$this->db->where('b.id_adresse',$id);
			$this->db->select('a.*,b.*');
			$this->db->from('adressen as a');
			$this->db->join('sachbearbeiter as b','a.id=b.id_sachbearbeiter');
        	return $this->db->get()->result();
        }
		public function remove_additional_incharge($id)
        {
        	$this->db->where('id',$id);
        	$this->db->delete('sachbearbeiter');
        }
        public function insert_suchprofil($insert_data)
        {
        	$this->db->insert('suchprofil',$insert_data);
        }
        public function get_suchprofiles($id)
        {
        	$this->db->where('id_adresse',$id);
        	return $this->db->get('suchprofil')->result();
        }
        public function remove_search_profile($id)
        {
        	$this->db->where('id',$id);
        	$this->db->delete('suchprofil');
        }
        public function get_suchprofile($id)
        {
        	$this->db->where('id',$id);
        	return $this->db->get('suchprofil')->row();
        }
        public function GetMenuIdFromMenuName($menu_name)
        {
        	$this->db->where('language_id',1);
        	$this->db->where('name',$menu_name);
        	return $this->db->get('attrib_menu_name')->row();
        }
        public function GetAttribID($menu_id,$what)
        {
        	$this->db->where('menu_id',$menu_id);
        	$this->db->where('name',$what);
        	$this->db->where('ref_id',0);
        	return $this->db->get('attrib_menu_content')->row();
        }
        public function get_users()
        {
        	$this->db->order_by('surname_1','asc');
        	return $this->db->get('users')->result();
        }
        public function insert_calendar($insert_data)
        {
        	$this->db->insert('calendar',$insert_data);
        }
        public function get_calendars($id)
        {
        	$this->db->select('a.*,b.surname_1 as user_surname,b.name as user_name,c.surname_1 as target_surname,c.name as target_name,d.value as value_kalendereintragart');
        	$this->db->from('calendar as a');
        	$this->db->join('users as b','a.id_user=b.id');
        	$this->db->join('users as c','a.id_assignedaddress=c.id');
        	$this->db->join('listfield as d','d.id=a.id_kalendereintragart');
        	$this->db->where('id_adresse',$id);
        	return $this->db->get()->result();
        }
        public function remove_additional_task($id)
        {
        	$this->db->where('idcal',$id);
        	$this->db->delete('calendar');
        }
        public function get_calendar($id)
        {
        	$this->db->select('a.*,b.surname_1 as user_surname,b.name as user_name,c.surname_1 as target_surname,c.name as target_name,d.value as value_kalendereintragart');
        	$this->db->from('calendar as a');
        	$this->db->join('users as b','a.id_user=b.id');
        	$this->db->join('users as c','a.id_assignedaddress=c.id');
        	$this->db->join('listfield as d','d.id=a.id_kalendereintragart');
        	$this->db->where('idcal',$id);
        	return $this->db->get()->row();
        }
        public function update_calendar($update_data,$id)
        {
        	$this->db->where('idcal',$id);
        	$this->db->update('calendar',$update_data);
        }
        public function insert_contact_history($insert_data)
        {
        	$this->db->insert('kontakt_historie',$insert_data);
        }
        public function get_contact_histories($id) 
        {
        	$this->db->select('a.*,b.surname_1 as user_surname,b.name as user_name');
        	$this->db->from('kontakt_historie as a');
        	$this->db->join('users as b','a.id_user=b.id');
        	$this->db->where('a.id_adresse',$id);
        	return $this->db->get()->result();
        }
        public function remove_additional_contacthistory($id)
        {
        	$this->db->where('id',$id);
        	$this->db->delete('kontakt_historie');
        }
        public function get_contacthistory($id)
        {
        	$this->db->select('a.*,b.surname_1 as user_surname,b.name as user_name');
        	$this->db->from('kontakt_historie as a');
        	$this->db->join('users as b','a.id_user=b.id');
        	$this->db->where('a.id',$id);
        	return $this->db->get()->row();
        }
        public function update_contact_history($update_data,$id)
        {
        	$this->db->where('id',$id);
        	$this->db->update('kontakt_historie',$update_data);
        }
        public function get_def_sprachen()
        {
        	$this->db->order_by('id','asc');
        	return $this->db->get('def_sprachen')->result();        	
        }
        public function update_addresses($update_data,$id)
        {
        	$this->db->where('ID',$id);
        	$this->db->update('adressen',$update_data);
        }
        public function get_sachbearbeitere($id)
        {
        	$this->db->where('id',$id);
        	return $this->db->get('sachbearbeiter')->row();
        }
        public function update_sachbearbeiter($update_data,$id)
        {
        	$this->db->where('id',$id);
        	$this->db->update('sachbearbeiter',$update_data);
        }
        public function get_zusatzdatenn($id)
        {
        	$this->db->where('id',$id);
        	return $this->db->get('zusatzdaten')->row();
        }
        public function remove_defaults_in_kontakt_formen($id)
        {
        	$this->db->where('id_adresse',$id);
        	$update_data['default'] = 0 ;
        	$this->db->update('kontakt_formen',$update_data);
        }
        public function get_kontakt_formens($id)
        {
        	$this->db->where('id',$id);
        	return $this->db->get('kontakt_formen')->row();
        }
        public function get_me()
        {
        	$this->db->where('language' , $this->session->userdata('lang_id'));
        	$z = $this->db->get('listfield')->result();
        	/**
        	var_dump($this->session->userdata('lang_id'));
        	die;
        	$KontaktArt[6] = LA("global_in_charge");
        	$sql           = "SELECT row,value FROM listfield WHERE language = " . $_SESSION['USER_LANGUAGE_ID'] . "  AND name='ZusatzKontaktArten' ORDER BY SORT";
        	//echo $sql;
        	$res           = mysql_query($sql);
        	if (IsRes($res))
        	{
        		while ($Z = mysql_fetch_array($res))
        		{
        			$t              = $Z['row'];
        			$KontaktArt[$t] = $Z['value'];
        		}
        	}
        	*/
        }
        public function get_adressen_by_kontaktart()
        {
        	$this->db->select("ID,concat_ws(',',name,vorname) as concated_name");
        	$this->db->where('kontaktart','6');
        	return $this->db->get('adressen')->result();
        }
        function get_anlagen()
        {
        	$this->db->order_by('name','asc');
        	return $this->db->get('anlagen')->result();
        }
}