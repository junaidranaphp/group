<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start(); //we need to call PHP's session object to access it through CI

class Residences extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('residences_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {

            $config['base_url'] = 'http://redb2.local/index.php/locations/index';
            $config['total_rows'] = $this->residences_model->total();

            $config['per_page'] = 20;
            $config['num_links'] = 5;
            $config['full_tag_open'] = '<div class="table-pagination">';
            $config['full_tag_close'] = "</div>";
            $this->pagination->initialize($config);

            $data['title'] = LTEXT('_residences_all');

            // if ( empty($this->input->post('sort-field'))){
            // 	$order_field = @$this->session->userdata['order-field'];
            // 	$sort_order = @$this->session->userdata['sort-order'];
            // } else {
            // 	$order_field = @$this->input->post('sort-field');
            // 	$sort_order = @$this->input->post('sort-order');
            // }
            // if ( empty($order_field)){
            // 	$order_field = "name";
            // 	$sort_order = "desc";				
            // }
            // $this->db->order_by($order_field, $sort_order)->limit($config['per_page'], $this->uri->segment(3));	

            $data['records'] = $this->residences_model->get_residences(); // get all
            $data['session'] = $this->session->userdata;

           $this->template->set_active_menu('forms')
	            ->set_heading(LTEXT('_residences_all'))
	            ->set_page('residences/index')
	            ->show($data);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function residencesadd() {
        if ($this->session->userdata('logged_in')) {
            $data['title'] = LTEXT('_add_residences');
            $data['session'] = $this->session->userdata;
            
            $this->template->set_active_menu('forms')
            ->set_heading(LTEXT('_add_residences'))
            ->set_page('residences/residencesadd')
            ->show($data);
            
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    public function residencesedit($residenceID) {
        if ($this->session->userdata('logged_in') && trim($residenceID) <> '') {
            $data['title']      = LTEXT('_edit_residences');
            $data['session']    = $this->session->userdata;
            $data['editdata']   = $this->residences_model->editresidences($residenceID);
            $data['editID']     = $residenceID;

            $this->template->set_active_menu('forms')
            ->set_heading(LTEXT('_edit_residences'))
            ->set_page('residences/residencesedit')
            ->show($data);
            
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function addaction() {
        // echo '<pre>'; print_r($_POST); echo '</pre>'; exit;
        $data   = array(
                    'name'                  => $this->input->post('name'),
                    'adresse_1'             => $this->input->post('address_1'),
                    'adresse_2'             => $this->input->post('address_2'),
                    'plz'                   => $this->input->post('postalcode'),
                    'ort'                   => $this->input->post('location'),
                    'land'                  => $this->input->post('country'),
                    'anzahl_einheiten'      => $this->input->post('numunits'),
                    'anzahl_etagen'         => $this->input->post('numfloors'),
                    'code_haupteingang'     => $this->input->post('codemainentry'),
                    'gemeinschaftskosten'   => $this->input->post('communitycosts'),
                    'check_wasser'          => $this->input->post('check_wasser'),
                    'verwalter'             => $this->input->post('administrator'),
                    'notiz'                 => $this->input->post('comments')
        );
        $this->residences_model->form_insert($data);
        redirect('residences', 'refresh');
    }
    
    public function editaction() {
        // echo '<pre>'; print_r($_POST); echo '</pre>'; exit;
        $data = array(
                    'name'                  => $this->input->post('name'),
                    'adresse_1'             => $this->input->post('address_1'),
                    'adresse_2'             => $this->input->post('address_2'),
                    'plz'                   => $this->input->post('postalcode'),
                    'ort'                   => $this->input->post('location'),
                    'land'                  => $this->input->post('country'),
                    'anzahl_einheiten'      => $this->input->post('numunits'),
                    'anzahl_etagen'         => $this->input->post('numfloors'),
                    'code_haupteingang'     => $this->input->post('codemainentry'),
                    'gemeinschaftskosten'   => $this->input->post('communitycosts'),
                    'check_wasser'          => $this->input->post('check_wasser'),
                    'verwalter'             => $this->input->post('administrator'),
                    'notiz'                 => $this->input->post('comments')
        );

        $id = $this->input->post('id_anlage');   
        $this->residences_model->update_form_insert($data, $id);
        //redirect("residencesedit/$id", 'refresh');
        redirect('residences', 'refresh');
    }
    
    public function residencesdelete($residenceID) {
        if ($this->session->userdata('logged_in') && trim($residenceID) <> '') {
            $this->residences_model->deleteres($residenceID);
            redirect('residences', 'refresh');
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function anlagenzusatzadressen($id)
    {
        if($this->session->userdata('logged_in')) {
                $data['title']          = LTEXT('_available_residences');
                $data['session']        = $this->session->userdata;
                $data['editID']         = $id;
                $data['table']          = 'zusatzadressen_anlagen';
                $this->template->set_active_menu('forms')
                ->set_heading(LTEXT('_available_residences'))
                ->set_page('residences/anlagenzusatzadressen')
                ->show($data);
                
        } else {
                //If no session, redirect to login page
                redirect('login', 'refresh');
        }
    }
    
    
    public function popanlagenzusatzadressen()
    {
        if($this->session->userdata('logged_in')) {
                $data['title']          = LTEXT('_popup');
                $data['session']        = $this->session->userdata;
                $this->load->view('includes/header', $data);
                $this->load->view('includes/toolbar', $data);
                $this->load->view('includes/menu_left_clients', $data);
                $this->load->view('residences/popanlagenzusatzadressen', $data);
                $this->load->view('includes/footer');
        } else {
                //If no session, redirect to login page
                redirect('login', 'refresh');
        }
    }
    
    public function listsearchresult(){
        if($this->session->userdata('logged_in')) {
                $data['title']          = LTEXT('_popup');
                $data['session']        = $this->session->userdata;
                $data['id_anlage']      = $this->input->post('id_anlage'); 
                $data['table']      = $this->input->post('table'); 
                $this->load->view('includes/header', $data);
                $this->load->view('includes/toolbar', $data);
                $this->load->view('includes/menu_left_clients', $data);
                $this->load->view('residences/listsearchresult', $data);
                $this->load->view('includes/footer');
        } else {
                //If no session, redirect to login page
                redirect('login', 'refresh');
        }
    }
    
    public function popzusatzadressen(){
        if($this->session->userdata('logged_in')) {
                $data['title']          = LTEXT('_popup');
                $this->load->view('residences/popzusatzadressen', $data);
        } else {
                //If no session, redirect to login page
                redirect('login', 'refresh');
        }
    }
    
    
    
    
    
    public function insertsearchres(){
        if($this->session->userdata('logged_in')) {
            $id         =   $this->uri->segment(3);
            $id_anlage  =   $this->uri->segment(4);
            $table      =   $this->uri->segment(5);
            
            $data = array(
                    'id_anlage' => $id_anlage,
                     'id_zusatzadresse' => $id,
                     'note'      => ''
                    );
            
            $this->residences_model->insert_search_result($table,$data,$id_anlage,$id);
                
        } else {
                //If no session, redirect to login page
                redirect('login', 'refresh');
        }
    }
    
    
    public function updatecomments() {
        // echo '<pre>'; print_r($_POST); echo '</pre>'; exit;
        $data = array(
                    'note'           => $this->input->post('notes')
        );

        $id = $this->input->post('id');
        $this->residences_model->update_form_insert_notes($data, $id);
        //redirect("residencesedit/$id", 'refresh');
        ?>
        <script type='text/javascript'>opener.location.reload();window.close();</script>  
        <?php 
        }
    
    
    
    
    
    
    
    public function view($id = NULL) {
        $data['title'] = LTEXT('_adressen_detail');
        $data['news_item'] = $this->clients_model->get_address($id);
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

}