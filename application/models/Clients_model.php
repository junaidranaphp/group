<?php defined('BASEPATH') or die('Restricted direct access');
class Clients_model extends CI_Model {

        public function __construct()
        {
            
        }
        
        public function get_addresses($id = FALSE)
        {
        	if($this->session->userdata('advanced_search_filter'))
        	{
        		$search = $this->session->userdata('advanced_search_filter') ;
        		$no_search = true;
        		if($search['SA_objekttyp'] != 'all')
        		{
        			$no_search = false;
        			$this->db->where('objekttyp',$search['SA_objekttyp']);
        		}
        		if($search['SA_newsletter'] == '1')
        		{
        			$no_search = false;
        			$this->db->where('newsletter',$search['SA_newsletter']);
        		}
        		if(false)
        		{
        			//SA_angebotsart
        		}
        		if($search['SA_kaufen'] == '1')
        		{
        			$no_search = false;
        			$this->db->where('kaufen',$search['SA_kaufen']);
        		}
        		if($search['SA_mieten'] == '1')
        		{
        			$no_search = false;
        			$this->db->where('mieten',$search['SA_kaufen']);
        		}
        		if($search['SA_preis_von'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('sp.preis_von >=',$search['SA_preis_von']);
        		}
        		if($search['SA_preis_bis'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('sp.preis_bis <=',$search['SA_preis_bis']);
        		}
        		if($search['SA_wohnflaeche_von'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('wohnflaeche_von >=',$search['SA_wohnflaeche_von']);
        		}
        		if($search['SA_wohnflaeche_bis'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('wohnflaeche_von <=',$search['SA_wohnflaeche_bis']);
        		}
        		if($search['SA_grundstueck_von'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('grundstueck_von >=',$search['SA_grundstueck_von']);
        		}
        		if($search['SA_grundstueck_bis'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('grundstueck_von <=',$search['SA_grundstueck_bis']);
        		}
        		if($search['SA_schlafzimmer_von'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('schlafzimmer_von >=',$search['SA_schlafzimmer_von']);
        		}
        		if($search['SA_schlafzimmer_bis'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('schlafzimmer_von <=',$search['SA_schlafzimmer_bis']);
        		}
        		
        		if($search['SA_baeder_von'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('baeder_von >=',$search['SA_baeder_von']);
        		}
        		if($search['SA_baeder_bis'] >= '0')
        		{
        			$no_search = false;
        			$this->db->where('baeder_von >=',$search['SA_baeder_bis']);
        		}
        		
        		if($search['SA_SearchStatus'] != 'all')
        		{
        			$no_search = false;
        			$this->db->where('adressen.status ',$search['SA_SearchStatus']);
        		}
        		
        		if($search['SA_nutzungsart'] != 'all')
        		{
        			$no_search = false;
        			$this->db->where('sp.nutzungsart ',$search['SA_nutzungsart']);
        		}
        		if($search['SA_region'] != 'all')
        		{
        			$no_search = false;
        			$this->db->where('sp.region ',$search['SA_region']);
        		}
        		if($search['SA_residenz'] != 'all')
        		{
        			$no_search = false;
        			$this->db->where('sp.anlage ',$search['SA_residenz']);
        		}
        		if($search['SA_SearchSprache'] != 'all')
        		{
        			$no_search = false;
        			$this->db->where('adressen.sprache ',$search['SA_SearchSprache']);
        		}
        		if($search['SA_SearchTextNachname'] != '')
        		{
        			$no_search = false;
        			$this->db->like('lower('.$this->db->dbprefix.'adressen.name) ',mb_strtolower($search['SA_SearchTextNachname']));
        		}
        		if($search['SA_SearchTextVorname'] != '')
        		{
        			$no_search = false;
        			$this->db->like('lower('.$this->db->dbprefix.'adressen.vorname) ',mb_strtolower($search['SA_SearchTextVorname']));
        		}
        		if($search['SA_kundenaquise'] != 'all')
        		{
        			$no_search = false;
        			$this->db->where('adressen.kundenaquise ',$search['SA_kundenaquise']);
        		}
        		if($search['SA_SearchTextAddress'] != '')
        		{
        			$no_search = false;
        			$s = mb_strtolower($search['SA_SearchTextAddress']) ;
        			$this->db->where(' 
        				(
        					lower('.$this->db->dbprefix.'kontakt_formen.searchtext) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'kontakt_formen.text) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'kontakt_formen.notiz) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'zusatzadressen.note) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'adressen.plz) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'adressen.ort) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'adressen.land) like "%'.$s.'%"
        					OR lower('.$this->db->dbprefix.'adressen.name) like "%'.$s.'%"
        					OR lower('.$this->db->dbprefix.'adressen.vorname) like "%'.$s.'%"
        					OR lower('.$this->db->dbprefix.'adressen.firma) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'adressen.position) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'adressen.adresse_1) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'zusatzdaten.text) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'zusatzdaten.value) like "%'.$s.'%" 
        					OR lower('.$this->db->dbprefix.'zusatzdaten.notiz) like "%'.$s.'%"
        					
        				)');
        		}
        		if($search['SA_ort'] != '')
        		{
        			// this function needs to be corrected from old
        		}
        		if($search['SA_erste_linie'] == '1')
        		{
        			$no_search = false;
        			$this->db->where('sp.erste_linie ','0');
        		}
        		if($search['SA_SuchTyp'] != 'all')
        		{
        			$no_search = false;
        			switch ($search['SA_SuchTyp'])
        			{
        				case -1:
        					$this->db->where('kunde','1');
        					break;
        				case -2:
        					$this->db->where('eigentuemer','1');
        					break;
        				default:
        					$this->db->where('adressen.kontaktart',$search['SA_SuchTyp']);
        					break;
        			}
        		}
        		if($no_search)
        		{
        			$this->session->unset_userdata('advanced_search_filter');
        		}
        	}    
            $this->db->select('adressen.KDnr, adressen.status, adressen.name, adressen.vorname, adressen.ort, adressen.adresse_1, adressen.bewertung, sachbearbeiter.id_adresse');            
			$this->db->from('adressen');
            $this->db->join('kontakt_formen', 'kontakt_formen.id_adresse = adressen.ID', 'left');
            $this->db->join('sachbearbeiter', 'sachbearbeiter.id_adresse = adressen.ID', 'left');
            $this->db->join('zusatzadressen', 'zusatzadressen.ID_adresse = adressen.ID', 'left');
            $this->db->join('zusatzdaten', 'zusatzdaten.id_adresse = adressen.ID', 'left');
            $this->db->join('suchprofil as sp', 'sp.id_adresse = adressen.ID', 'left');
            $this->db->join('kontakt_historie as kh', 'kh.id_adresse = adressen.ID', 'left');
            $this->db->join('calendar as cal', 'cal.id_adresse = adressen.ID', 'left');
            $this->db->group_by('adressen.ID');
            if ($id === FALSE)
            {
                $query = $this->db->get();
                return $query->result_object();
            }
            else 
            {
            	$query = $this->db->where('adressen.ID',$id)->get();
            	return $query->row();
            }

           
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