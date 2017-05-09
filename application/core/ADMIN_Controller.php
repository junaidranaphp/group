<?php

defined('BASEPATH') or die('Restricted direct access');

class ADMIN_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'), 'refresh');
        }
    }

}

class BASIC_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'), 'refresh');
        }
        if (true) {
            $this->load->model('basic_model');
            $this->product_groups();
        }
    }

    private function product_groups() {

        $data['groups'] = $this->basic_model->get_user_product_groups($this->session->userdata('userid'));
        $this->template->set_extra_data($data);
    }

}
