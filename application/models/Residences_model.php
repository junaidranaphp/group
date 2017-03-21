<?php
class Residences_model extends CI_Model {

        public function __construct()
        {
            
        }
        
        public function get_residences()
        {
            $this->db->select('*');  
            $this->db->order_by('name');   
            $query = $this->db->get('anlagen');      
            return $query->result();
            
        }

        public function get_administrator($id)
        {
            $this->db->select('concat_ws(",",name,vorname) as vor_name');  
            $this->db->order_by('name');  
            $this->db->where('ID', $id);
            $query = $this->db->get('adressen');      
            return $query->result();
            
        }
        
        public function LA($token)
        {
            //global $lang;  Need to set the language globally
            $this->db->select('en');   
            $this->db->where('token', $token);
            $query = $this->db->get('language_admin'); 
            return $query->result();
            //print $this->db->last_query(); 
            
        }
        
        public function getUsers($user)
        {
            //global $lang;  Need to set the language globally
                $this->db->select('concat_ws(",",surname_1,name) as username');   
            $this->db->where('id', $user);
            $query = $this->db->get('users'); 
            return $query->result();
            //print $this->db->last_query(); 
            
        }
        
        public function getadrcategory($user)
        {
            //global $lang;  Need to set the language globally
            $this->db->select('row,value');   
            $this->db->where('language', 3); // Language set globally
            $this->db->where('name', 'ZusatzKontaktArten');
            $this->db->order_by('SORT');
            $query = $this->db->get('listfield'); 
            return $query->result();
            //print $this->db->last_query(); 
            
        }
        
        public function getincharge($user)
        {
            $this->db->select("ID,concat_ws(',',name,vorname) as name");   
            $this->db->where('kontaktart', 6); 
            $this->db->order_by('name');
            $query = $this->db->get('adressen'); 
            return $query->result();
            //print $this->db->last_query(); 
            
        }

        public function get_source($user)
        {
            //global $lang;  Need to set the language globally
            $this->db->select("row,value");   
            $this->db->where('language', 3); // Language set globally
            $this->db->where('name', 'kundenaquise');
            $this->db->order_by('SORT');
            $query = $this->db->get('listfield'); 
            return $query->result();
            //print $this->db->last_query(); 
            
        }
        
        public function get_country()
        {
            //global $lang;  Need to set the language globally
            $this->db->select('*');   
            $this->db->where('language', 3); // need to get this 3 globally: language en
            $this->db->where('name', 'laender');
            $this->db->order_by('value');  
            $query = $this->db->get('listfield'); 
            return $query->result();
            
        }
        public function get_administratorlist()
        {
            $this->db->select('id,concat_ws(",",name,vorname) as vorname');  
            //$this->db->order_by('name');  
            $query = $this->db->get('adressen');      
            return $query->result();
            
        }
        
        public function get_administratorlistid($id)
        {
            $this->db->select('id,concat_ws(",",name,vorname) as vorname');  
            $this->db->where('id', $id);  
            $query = $this->db->get('adressen');      
            return $query->result();
            
        }
        
        
        public function form_insert($data){
            $this->db->insert('anlagen', $data);
        }
        
        public function update_form_insert($data,$id){
                $this->db->update('anlagen', $data, "id =".$id);
        }
        
        public function update_form_insert_notes($data,$id){
                $this->db->update('zusatzadressen_anlagen', $data, "id =".$id);
        }
        
        public function editresidences($id){
            $this->db->select('*');   
            $this->db->where('id', $id);
            $query = $this->db->get('anlagen'); 
            return $query->result();
        }
		
        public function deleteres($id){
            $this->db->delete('anlagen', array('id' => $id)); 
            $this->db->delete('zusatzadressen_anlagen', array('id_anlage' => $id)); 
        }
        
        
        public function get_listfields()
        {   

            $query = $this->db->get('redb_listfield');
            return $query->result();
        }
        
        public function get_all_search_results()
        {   
            $this->db->select('*');   
            $query = $this->db->get('adressen'); 
            return $query->result();
        }
        
        public function insert_search_result($table,$data,$id_anlage,$id)
        {   
            //insert table
            $this->db->insert($table, $data);
            
            //Updation
            $this->db->select('COUNT(id)');   
            $this->db->where('id_anlage', $id_anlage);
            $query = $this->db->get($table); 
            $result =   $query->result();
            if($result){
                $this->db->update($table, $data, "id_zusatzadresse =".$id);
            ?>
             <script type='text/javascript'>opener.location.reload();window.close();</script>  
            <?php
            }
            
        }
        
        
        
        
        public function get_all_zusatzadressen_anlagen($id)
        {   
            $this->db->select('*');   
            $this->db->where('id_anlage',$id);
            $this->db->order_by('default');
            $query = $this->db->get('zusatzadressen_anlagen'); 
            
            return $query->result();
        }
        
        
        public function get_list_id($id)
        {   
            $this->db->select('note');   
            $this->db->where('id',$id);
            $this->db->order_by('default');
            $query = $this->db->get('zusatzadressen_anlagen'); 
            
            return $query->result();
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
        
        
        
}