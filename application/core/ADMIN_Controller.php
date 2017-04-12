<?php defined('BASEPATH') or die('Restricted direct access');
class ADMIN_Controller extends CI_Controller{
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'), 'refresh');
        }
    }
}
