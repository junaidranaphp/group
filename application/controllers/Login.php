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
        $this->load->view('includes/header', $data);			
        $this->load->view('login_view');
        $this->load->view('includes/footer');
    }

}
 
?>