<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $data['title'] = "Log into RedB";
            $this->load->view('template/header', $data);
            $this->load->view('login_view');
            $this->load->view('template/footer');
        } else {
            //Go to private area
            redirect(base_url('admin'), 'refresh');
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'userid' => $row->usuario_id,
                    'username' => $row->usuario_usuario,
                    'name' => $row->usuario_nombre,
                    'email' => $row->usuario_email,
                    'language' => 'en', // This is hardcoded for starting project
                    'lang_id' => '1',
                    'user_sachbearbeiter' => '$row->id_sachbearbeiter',
                    'logged_in' => true,
                );
                $this->session->set_userdata($sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

}
