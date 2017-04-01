<?php
class Locations_model extends CI_Model {

        public function __construct()
        {
            
        }
        
        public function get_locations()
        {
            $this->db->select('*');
            $this->db->from('obj_orte');
            $query = $this->db->get();
            if ( $query->num_rows() > 0 )
            {
                $row = $query->result();
                return $row;
            }
        }

        public function getlocations($id_ort,$id_top)
        {
            $this->db->select('id,ort,id_top');
            $this->db->from('obj_orte');
            $this->db->where("id !=",$id_ort);
            //$this->db->where("id !=",$id_top);
            $query = $this->db->get();
            if ( $query->num_rows() > 0 )
            {
                $row = $query->result();
                return $row;
            }
        }

        public function get_listfields()
        {   
            $this->db->select('row,value');
            $this->db->from('listfield');
            $this->db->where("name","region");
            $this->db->where("language",3);
            $this->db->where("value !=","");
            $this->db->order_by("SORT");
            $query = $this->db->get();
            //echo $this->db->last_query(); exit();
            if ( $query->num_rows() > 0 )
            {
                $row = $query->result();
                return $row;
            }
        }

        public function delete_location($id){
            $this->db-> where('id', $id);
            $this->db-> delete('obj_orte');
        }

        function add_location($data){
            $this->db->insert('obj_orte', $data);
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
        }

        public function update_location($id,$plz,$region,$id_top)
        {
            $data = array(
               'plz' => $plz,
               'region' => $region,
               'id_top' => $id_top
            );
            $this->db->where('id', $id);
            $this->db->update('obj_orte', $data); 
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
        }
        
        public function total()
        {            
                
            return $this->db->get('adressen')->num_rows();
        }       
        
        
}