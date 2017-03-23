<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
    }
 
    function index()
    {
        $data['title'] = 'Log in RedB';
        $this->load->helper(array('form'));
        $this->template->set_active_menu('forms')
            ->set_heading(LTEXT('_login_view'))
            ->set_page('login_view')
            ->show($data);
    }

}
 
?>