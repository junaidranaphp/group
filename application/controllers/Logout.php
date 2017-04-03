<?php defined('BASEPATH') or die('Restricted direct accesss');

class Logout extends CI_Controller{
    public function index(){
        $this->session->unset_userdata('logged_in');
        redirect(base_url('login'));
    }
}

