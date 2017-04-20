<?php

class Sorting_model extends CI_Model{
    public function get_user_preference($user_id,$page){
        return $this->db->where('user_id',$user_id)->where('page',$page)->get('user_preferences')->row();
    }
    public function insert_user_preference($pref_data){
        $this->db->insert('user_preferences',$pref_data);
    }
    public function update_user_preference($pref_data, $user_preference_id){
        $this->db->where('id',$user_preference_id)->update('user_preferences',$pref_data);
    }
}

