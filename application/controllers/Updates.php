<?php defined('BASEPATH') or die('Restricted direct access');

class Updates extends ADMIN_Controller{
    public function index(){
        echo md5('demouserEN');
        $this->convert_passwords_to_md5();
    }
    private function convert_passwords_to_md5(){
        $users = $this->db->get('usuarios')->result();
        $batch_data = array();
        foreach ($users as $user){
            $update_data = array(
                'usuario_id' => $user->usuario_id,
                'usuario_clave' => md5($user->usuario_clave)
            );
            $batch_data[] = $update_data;
        }
        $this->db->update_batch('usuarios',$batch_data,'usuario_id');
    }
}

