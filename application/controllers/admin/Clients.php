<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start(); //we need to call PHP's session object to access it through CI

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('clients_model');
        $this->load->model('language_model');
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'), 'refresh');
        }
    }

    public function index($page = 0) {
        
        $data['product_group_filter'] = false ;
        $this->template->set_active_menu('clients')
                ->set_active_submenu('clients')
                ->set_heading(LTEXT('_all_clients'))
                ->set_js_file('assets/js/admin_clients_view.js')
                ->set_page('clients/index')
                ->show($data);
    }

    public function view($id = NULL) {
        $data['title'] = LTEXT('_address_detail');
        $data['news_item'] = $this->clients_model->get_address($id);
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

    public function view_client() {
        $this->template->set_active_menu('clients')
                ->set_active_submenu('clients')
                ->set_heading(LTEXT('_global_addresses'))
                ->set_page('clients/edit_client')
                ->show();
    }

    public function add_client() {

        $this->form_validation->set_rules('usuario_nombre', 'Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('usuario_usuario', 'User Name', 'trim|required|min_length[4]|is_unique[usuarios.usuario_usuario]');
        $this->form_validation->set_rules('usuario_clave', 'password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('usuario_email', 'email', 'trim|required|min_length[4]|is_unique[usuarios.usuario_email]');

        if ($this->form_validation->run() == true) {
            $insert_data['usuario_nombre'] = trim(strip_tags($this->input->post('usuario_nombre')));
            $insert_data['usuario_usuario'] = trim(strip_tags($this->input->post('usuario_usuario')));
            $insert_data['usuario_empresa'] = trim(strip_tags($this->input->post('usuario_empresa')));
            $insert_data['usuario_email'] = trim(strip_tags($this->input->post('usuario_email')));
            $insert_data['usuario_telefono'] = trim(strip_tags($this->input->post('usuario_telefono')));
            $insert_data['usuario_direccion'] = trim(strip_tags($this->input->post('usuario_direccion')));
            $insert_data['usuario_clave'] = trim(strip_tags($this->input->post('usuario_clave')));
            $insert_data['usuario_idioma'] = trim(strip_tags($this->input->post('usuario_idioma')));
            $insert_data['usuario_site'] = trim(strip_tags($this->input->post('usuario_site')));
            $insert_data['usuario_tire_shipping_comment'] = trim(strip_tags($this->input->post('usuario_tire_shipping_comment')));
            $insert_data['usuario_batery_shipping_comment'] = trim(strip_tags($this->input->post('usuario_batery_shipping_comment')));
            if ($this->clients_model->insert_client($insert_data)) {
                $flash_data['content'] = 'Client has been created successfully';
                $flash_data['type'] = 'success';
            } else {
                $flash_data['content'] = 'Client could not be created';
                $flash_data['type'] = 'danger';
            }
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('admin'));
        } else {
            $data['edit'] = FALSE;

            $data['page'] = 'clients/view_user';
            $this->template->set_active_menu('clients')
                    ->set_active_submenu('clients')
                    ->set_heading(LTEXT('_add_client'))
                    ->set_page('clients/edit_client')
                    ->show($data);
        }
    }

    public function edit_client($id = null) {

        if ($id == null || !($id > 0)) {
            $flash_data['content'] = 'Id is illegal or not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('admin'));
        } else if (!($client = $this->clients_model->get_client($id))) {
            $flash_data['content'] = 'Id is not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('admin'));
        } else {

            if ($this->input->post('usuario_usuario') != $client->usuario_usuario) {
                $is_unique = '|is_unique[usuario.usuario]';
            } else {
                $is_unique = '';
            }
            $this->form_validation->set_rules('usuario_nombre', 'Name', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('usuario_usuario', 'User Name', 'trim|required|min_length[4]');

            $this->form_validation->set_rules('usuario_clave', 'password', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('usuario_email', 'email', 'trim|required|min_length[4]|is_unique[users.email]');



            if ($this->form_validation->run() == true) {

                $insert_data['usuario_nombre'] = trim(strip_tags($this->input->post('usuario_nombre')));
                $insert_data['usuario_usuario'] = trim(strip_tags($this->input->post('usuario_usuario')));
                $insert_data['usuario_empresa'] = trim(strip_tags($this->input->post('usuario_empresa')));
                $insert_data['usuario_email'] = trim(strip_tags($this->input->post('usuario_email')));
                $insert_data['usuario_telefono'] = trim(strip_tags($this->input->post('usuario_telefono')));
                $insert_data['usuario_direccion'] = trim(strip_tags($this->input->post('usuario_direccion')));
                $insert_data['usuario_clave'] = trim(strip_tags($this->input->post('usuario_clave')));
                $insert_data['usuario_idioma'] = trim(strip_tags($this->input->post('usuario_idioma')));
                $insert_data['usuario_site'] = trim(strip_tags($this->input->post('usuario_site')));
                $insert_data['usuario_tire_shipping_comment'] = trim(strip_tags($this->input->post('usuario_tire_shipping_comment')));
                $insert_data['usuario_batery_shipping_comment'] = trim(strip_tags($this->input->post('usuario_batery_shipping_comment')));
                if ($this->clients_model->update_client($insert_data, $id)) {
                    $flash_data['content'] = 'Client has been updated successfully';
                    $flash_data['type'] = 'success';
                } else {
                    $flash_data['content'] = 'Client could not be updated';
                    $flash_data['type'] = 'danger';
                }
                $this->session->set_flashdata('message', $flash_data);
                redirect(base_url('admin'));
            } else {

                $data['client'] = $client;
                $data['edit'] = true;


                $this->template->set_active_menu('clients')
                        ->set_active_submenu('clients')
                        ->set_heading(LTEXT('_edit_client'))
                        ->set_page('clients/edit_client')
                        ->show($data);
            }
        }
    }

    public function delete_client($id) {
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            if ($this->clients_model->delete_client($id)) {
                $flash_data['content'] = 'Client has been deleted successfully';
                $flash_data['type'] = 'success';
            } else {
                $flash_data['content'] = 'Client could not be deleted';
                $flash_data['type'] = 'danger';
            }
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('admin'));
        } else {

            if ($id == null || !($id > 0)) {
                $flash_data['content'] = 'Id is illegal or not present';
                $flash_data['type'] = 'danger';
                $this->session->set_flashdata('message', $flash_data);
                redirect(base_url('admin'));
            } else if (!($client = $this->clients_model->get_client($id))) {
                $flash_data['content'] = 'Id is not present';
                $flash_data['type'] = 'danger';
                $this->session->set_flashdata('message', $flash_data);
                redirect(base_url('admin'));
            } else {
                $data['client'] = $client;
                $this->template->set_active_menu('clients')
                        ->set_active_submenu('clients')
                        ->set_heading(LTEXT('_client'))
                        ->set_page('clients/confirm_delete')
                        ->show($data);
            }
        }
    }

    public function address_name_check($str) {
        $name = strtolower($this->input->post('name'));
        $vorname = strtolower($this->input->post('vorname'));
        $id = $this->input->post('id_adresse');
        if (!$id) {
            return false;
        }
        $this->db->where('name', $name);
        $this->db->where('vorname', $vorname);
        $this->db->where('id !=', $id);
        $results = $this->db->get('adressen')->result();
        $count = count($results);
        if ($count > 0) {
            $this->form_validation->set_message('address_name_check', LTEXT('_name_and_vorname_already_exists'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function add_address_ajax() {
        $data['session'] = $this->session->userdata;
        $ZusatzKontaktArten = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'ZusatzKontaktArten');
        $SA_SuchTyp = array(-1 => 'Kunden', -2 => LTEXT("_owner"), 6 => LTEXT("_in_charge"));
        foreach ($ZusatzKontaktArten as $type) {
            $SA_SuchTyp[$type->row] = $type->value;
        }
        $data['SA_SuchTyp'] = $SA_SuchTyp;
        $this->load->view('clients/add_address_ajax', $data);
    }

    public function search_addresses_ajax($page) {
        $search_data = array();
        if ($this->input->post('SA_SearchTextAddress')) {
            $search_data['SA_SearchTextAddress'] = $this->input->post('SA_SearchTextAddress');
        }
        if ($this->input->post('SA_SearchTextNachname')) {
            $search_data['SA_SearchTextNachname'] = $this->input->post('SA_SearchTextNachname');
        }
        if ($this->input->post('SA_SearchTextVorname')) {
            $search_data['SA_SearchTextVorname'] = $this->input->post('SA_SearchTextVorname');
        }
        if ($this->input->post('SA_SuchTyp')) {
            $search_data['SA_SuchTyp'] = $this->input->post('SA_SuchTyp');
        }
        if ($this->input->post('SA_SuchTyp')) {
            $search_data['SA_SuchTyp'] = $this->input->post('SA_SuchTyp');
        }
        if ($this->input->post('SA_SearchStatus')) {
            $search_data['SA_SearchStatus'] = $this->input->post('SA_SearchStatus');
        }
        if (!$page > 0) {
            $page = 1;
        }
        $data['last_page'] = '';
        $data['first_page'] = '';
        $data['page'] = $page;
        $per_page = 8;
        $offset = ($page - 1) * $per_page;
        $total_rows = $this->clients_model->get_addresses_count($search_data);
        if ($total_rows <= $offset + $per_page) {
            $data['last_page'] = 'disabled';
        }
        if ($page == 1) {
            $data['first_page'] = 'disabled';
        }
        $data['total_rows'] = $total_rows;
        $data['addresses'] = $this->clients_model->search_addresses($search_data, $offset, $per_page);
        $data['session'] = $this->session->userdata;
        $this->load->view('clients/search_address_ajax', $data);
    }

    public function add_address_confirm_ajax($id) {
        if (!$id) {
            echo 'Id not set';
        }

        $data['address'] = $this->clients_model->get_address($id);
        $this->load->view('clients/add_address_confirm_ajax', $data);
    }

    public function add_address_post_ajax() {
        $id = false;
        if (!$this->input->post('id_address')) {
            echo LTEXT('_main_address_id_not_set');
            return;
        }
        if (!$this->input->post('id_additional_address')) {
            echo LTEXT('_additional_address_id_not_set');
            return;
        }

        $id = $this->input->post('id_address');
        $additional_id = $this->input->post('id_additional_address');
        $insert_data['note'] = $this->input->post('note');
        if ($this->input->post('default')) {
            $insert_data['default'] = $this->input->post('default');
        }
        $insert_data['id_zusatzadresse'] = $additional_id;
        $insert_data['id_adresse'] = $id;
        $zusatzadressen_id = $this->clients_model->insert_zusatzadressen($insert_data);
        $total_records_by_address = $this->clients_model->get_zusatzadressen_count($id);
        if ($total_records_by_address == 1) {
            $update_data = array();
            $update_data['default'] = 1;
            $this->db->update_zusatzadressen($update_data, $zusatzadressen_id);
        }
        echo '<span class="text-success">Address added</span>';
    }

    public function update_additional_addresses_ajax($id) {
        $data['zusatzadressen'] = $this->clients_model->get_zusatzadressen($id);
        foreach ($data['zusatzadressen'] as $value) {
            $value->kontakt_formen = $this->clients_model->get_kontakt_formen($value->id_zusatzadresse);
        }
        $this->load->view('clients/additional_addresses_ajax', $data);
    }

    public function remove_additional_address_ajax($id, $id_address) {
        if (!$id || !$id_address) {
            echo 'Id not set properly';
            return;
        }
        $this->clients_model->remove_additional_address($id);
        $this->update_additional_addresses_ajax($id_address);
    }

    public function edit_additional_address_ajax($id, $id_address) {
        if (!$id || !$id_address) {
            echo 'Id not set properly';
            return;
        }
    }

    public function add_data_ajax() {
        $data = array();
        if ($this->input->post('id_address')) {
            set_validation_messages();
            $this->form_validation->set_rules('value', LTEXT('_value'), 'required');
            $this->form_validation->set_rules('text', LTEXT('_text'), 'required');
            $this->form_validation->set_rules('notiz', LTEXT('_notiz'), '');
            if ($this->form_validation->run() == true) {
                $insert_data['value'] = $this->input->post('value');
                $insert_data['text'] = $this->input->post('text');
                $insert_data['id_adresse'] = $this->input->post('id_address');
                $insert_data['notiz'] = $this->input->post('notiz');
                $id = $this->clients_model->insert_zusatzdaten($insert_data);
                $update_data['sort'] = $id;
                $this->clients_model->update_zusatzdaten($update_data, $id);
                $data['success_message'] = LTEXT('_data_added_successfully') . '<br>' . LTEXT('_add_more_data_or_close');
            } else {
                if (validation_errors()) {
                    $data['warning_message'] = validation_errors();
                }
            }
        }
        $data['zusatzdaten'] = false;
        $data['types'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'zusatzdaten');
        $this->load->view('clients/add_data_ajax', $data);
    }

    public function update_additional_data_ajax($id) {
        $data['zusatzdaten'] = $this->clients_model->get_zusatzdaten($id);
        $this->load->view('clients/additional_data_ajax', $data);
    }

    public function remove_additional_data_ajax($id, $id_address) {
        if (!$id || !$id_address) {
            echo 'Id not set properly';
            return;
        }
        $this->clients_model->remove_additional_data($id);
        $this->update_additional_data_ajax($id_address);
    }

    public function edit_data_ajax($id) {
        if (!$id) {
            echo LTEXT('_id_not_set');
            return;
        }
        $data = array();
        if ($this->input->post('id_address')) {
            set_validation_messages();
            $this->form_validation->set_rules('value', LTEXT('_value'), 'required');
            $this->form_validation->set_rules('text', LTEXT('_text'), 'required');
            $this->form_validation->set_rules('notiz', LTEXT('_notiz'), '');
            if ($this->form_validation->run() == true) {
                $update_data['value'] = $this->input->post('value');
                $update_data['text'] = $this->input->post('text');
                $update_data['id_adresse'] = $this->input->post('id_address');
                $update_data['notiz'] = $this->input->post('notiz');
                $this->clients_model->update_zusatzdaten($update_data, $id);
                $data['success_message'] = LTEXT('_data_edited_successfully') . '<br>' . LTEXT('_add_more_data_or_close');
            } else {
                if (validation_errors()) {
                    $data['warning_message'] = validation_errors();
                }
            }
        }
        $data['zusatzdaten'] = $this->clients_model->get_zusatzdatenn($id);
        $data['types'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'zusatzdaten');
        $this->load->view('clients/add_data_ajax', $data);
    }

    public function add_contact_ajax() {
        $data = array();
        if ($this->input->post('id_address')) {
            set_validation_messages();
            $this->form_validation->set_rules('value', '_value', 'required');
            $this->form_validation->set_rules('text', '_text', 'required');
            $this->form_validation->set_rules('notiz', '_notiz', '');
            $this->form_validation->set_rules('default', '_default', '');
            if ($this->form_validation->run() == true) {
                $insert_data['value'] = $this->input->post('value');
                $insert_data['text'] = $this->input->post('text');
                $insert_data['id_adresse'] = $this->input->post('id_address');
                $insert_data['notiz'] = $this->input->post('notiz');

                if ($this->input->post('default')) {
                    $insert_data['default'] = $this->input->post('default');
                } else {
                    $insert_data['default'] = 0;
                }

                if ($insert_data['default']) {
                    $this->clients_model->remove_defaults_in_kontakt_formen($insert_data['id_adresse']);
                } else {
                    $count = $this->clients_model->check_if_default_exists($insert_data['id_adresse'], 'kontakt_formen');
                    if (!$count) {
                        $insert_data['default'] = 1;
                    }
                }

                $id = $this->clients_model->insert_kontakt_formen($insert_data);
                $update_data['sort'] = $id;
                $this->clients_model->update_kontakt_formen($update_data, $id);
                $data['success_message'] = LTEXT('_contact_added_successfully') . '<br>' . LTEXT('_add_more_contacts_or_close');
            } else {
                if (validation_errors()) {
                    $data['warning_message'] = validation_errors();
                }
            }
        }
        $data['kontakt_formen'] = false;
        $data['types'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'kontaktform');
        $this->load->view('clients/add_contact_ajax', $data);
    }

    public function update_additional_contact_ajax($id) {
        $data['kontakt_formen'] = $this->clients_model->get_kontakt_formen($id);
        $this->load->view('clients/additional_contacts_ajax', $data);
    }

    public function remove_additional_contact_ajax($id, $id_address) {
        if (!$id || !$id_address) {
            echo 'Id not set properly';
            return;
        }
        $this->clients_model->remove_additional_contact($id);
        $this->update_additional_contact_ajax($id_address);
    }

    public function edit_contact_ajax($id) {
        if (!$id) {
            echo LTEXT('_id_not_set');
            return;
        }
        $data = array();
        if ($this->input->post('id_address')) {
            set_validation_messages();
            $this->form_validation->set_rules('value', '_value', 'required');
            $this->form_validation->set_rules('text', '_text', 'required');
            $this->form_validation->set_rules('notiz', '_notiz', '');
            $this->form_validation->set_rules('default', '_default', '');
            if ($this->form_validation->run() == true) {
                $update_data['value'] = $this->input->post('value');
                $update_data['text'] = $this->input->post('text');
                $update_data['id_adresse'] = $this->input->post('id_address');
                $update_data['notiz'] = $this->input->post('notiz');

                if ($this->input->post('default')) {
                    $update_data['default'] = $this->input->post('default');
                } else {
                    $update_data['default'] = 0;
                }

                if ($update_data['default']) {
                    $this->clients_model->remove_defaults_in_kontakt_formen($update_data['id_adresse']);
                } else {
                    $count = $this->clients_model->check_if_default_exists($update_data['id_adresse'], 'kontakt_formen');
                    if (!$count) {
                        $update_data['default'] = 1;
                    }
                }

                $id = $this->clients_model->update_kontakt_formen($update_data, $id);
                $data['success_message'] = LTEXT('_contact_added_successfully') . '<br>' . LTEXT('_add_more_contacts_or_close');
            } else {
                if (validation_errors) {
                    $data['warning_message'] = validation_errors();
                }
            }
        }
        $data['kontakt_formen'] = $this->clients_model->get_kontakt_formens($id);
        $data['types'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'kontaktform');
        $this->load->view('clients/add_contact_ajax', $data);
    }

    public function add_incharge_ajax() {
        $data = array();
        if ($this->input->post('id_address')) {
            set_validation_messages();
            $this->form_validation->set_rules('id_sachbearbeiter', LTEXT('_id_sachbearbeiter'), 'required|callback_already_incharge');
            $this->form_validation->set_rules('default', LTEXT('_default'), '');
            $this->form_validation->set_rules('notiz', LTEXT('_notiz'), '');
            if ($this->form_validation->run() == true) {
                $insert_data['id_sachbearbeiter'] = $this->input->post('id_sachbearbeiter');
                $insert_data['id_adresse'] = $this->input->post('id_address');
                $insert_data['notiz'] = $this->input->post('notiz');
                if ($this->input->post('default')) {
                    $insert_data['default'] = $this->input->post('default');
                } else {
                    $insert_data['default'] = 0;
                }

                if ($insert_data['default']) {
                    $this->clients_model->remove_defaults_in_sachbearbeiter($insert_data['id_adresse']);
                } else {
                    $count = $this->clients_model->check_if_default_exists($insert_data['id_adresse'], 'sachbearbeiter');
                    if (!$count) {
                        $insert_data['default'] = 1;
                    }
                }
                $this->clients_model->insert_sachbearbeiter($insert_data);
                $data['success_message'] = LTEXT('_data_added_successfully') . '<br>' . LTEXT('_add_more_data_or_close');
            } else {
                $data['warning_message'] = validation_errors();
            }
        }
        $data['sachbearbeiter'] = false;
        $data['persons'] = $this->clients_model->get_addressess_where_kontaktart_6();
        $this->load->view('clients/add_incharge_ajax', $data);
    }

    public function already_incharge($str) {
        $count = $this->clients_model->check_if_already_in_charge($this->input->post('id_sachbearbeiter'), $this->input->post('id_adresse'));
        if ($count) {
            $this->form_validation->set_message('already_incharge', LTEXT('_already_incharge'));
            return FALSE;
        } else {
            return true;
        }
    }

    public function update_additional_incharge_ajax($id) {
        $data['sachbearbeiter'] = $this->clients_model->get_sachbearbeiters($id);
        $this->load->view('clients/additional_incharge_ajax', $data);
    }

    public function remove_additional_incharge_ajax($id, $id_address) {
        if (!$id || !$id_address) {
            echo 'Id not set properly';
            return;
        }
        $this->clients_model->remove_additional_incharge($id);
        $this->update_additional_incharge_ajax($id_address);
    }

    public function edit_incharge_ajax($id) {
        if (!$id) {
            echo LTEXT('_no_id_selected');
            return;
        }
        $data = array();
        if ($this->input->post('id_address')) {
            set_validation_messages();
            $this->form_validation->set_rules('id_sachbearbeiter', LTEXT('_id_sachbearbeiter'), 'required|callback_already_incharge');
            if ($this->form_validation->run() == true) {
                $update_data['id_sachbearbeiter'] = $this->input->post('id_sachbearbeiter');
                $update_data['id_adresse'] = $this->input->post('id_address');
                $update_data['notiz'] = $this->input->post('notiz');
                if ($this->input->post('default')) {
                    $update_data['default'] = $this->input->post('default');
                } else {
                    $update_data['default'] = 0;
                }

                if ($update_data['default']) {
                    $this->clients_model->remove_defaults_in_sachbearbeiter($update_data['id_adresse']);
                } else {
                    $count = $this->clients_model->check_if_default_exists($update_data['id_adresse']);
                    if (!$count) {
                        $update_data['default'] = 1;
                    }
                }
                $this->clients_model->update_sachbearbeiter($update_data, $id);
                $data['success_message'] = LTEXT('_data_added_successfully') . '<br>' . LTEXT('_add_more_data_or_close');
            } else {
                $data['warning_message'] = validation_errors();
            }
        }
        $data['sachbearbeiter'] = $this->clients_model->get_sachbearbeitere($id);
        $data['persons'] = $this->clients_model->get_addressess_where_kontaktart_6();
        $this->load->view('clients/add_incharge_ajax', $data);
    }

    public function search_profile_ajax() {
        $data = array();
        if ($this->input->post('id_address')) {
            $insert_data = array(
                'name' => $this->input->post('name'),
                'objekttyp' => $this->input->post('objekttyp'),
                'objekttyp2' => $this->input->post('objekttyp2'),
                'nutzungsart' => $this->input->post('nutzungsart'),
                'region' => $this->input->post('region'),
                'region2' => $this->input->post('region2'),
                'region3' => $this->input->post('region3'),
                'ort' => $this->input->post('ort'),
                'anlage' => $this->input->post('anlage'),
                'preis_von' => $this->input->post('preis_von'),
                'preis_bis' => $this->input->post('preis_bis'),
                'budgett' => $this->input->post('budgett'),
                'wohnflaeche_von' => $this->input->post('wohnflaeche_von'),
                'grundstueck_von' => $this->input->post('grundstueck_von'),
                'schlafzimmer_von' => $this->input->post('schlafzimmer_von'),
                'baeder_von' => $this->input->post('baeder_von'),
                'bemerkungen' => $this->input->post('bemerkungen'),
                'id_adresse' => $this->input->post('id_address'),
            );
            if ($this->input->post('erste_linie')) {
                $insert_data['erste_linie'] = (int) $this->input->post('erste_linie');
            }
            if ($this->input->post('meerblick')) {
                $insert_data['meerblick'] = (int) $this->input->post('meerblick');
            }
            if ($this->input->post('kaufen')) {
                $insert_data['kaufen'] = (int) $this->input->post('kaufen');
            }
            if ($this->input->post('mieten')) {
                $insert_data['mieten'] = (int) $this->input->post('mieten');
            }
            if ($this->input->post('pool')) {
                $insert_data['pool'] = (int) $this->input->post('pool');
            }
            $this->clients_model->insert_suchprofil($insert_data);
            $data['success_message'] = LTEXT('_search_profile_added_successfully') . '<br>' . LTEXT('_add_more_data_or_close');
        }
        $data['objekttyp'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'objekttyp');
        $data['objekttyp2'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'objekttyp');
        $data['nutzungsart'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'nutzungsart');
        $data['region'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'region');
        $data['anlage'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'anlage');
        $this->load->view('clients/add_search_profile_ajax', $data);
    }

    public function update_search_profile_ajax($id) {
        $data['suchprofil'] = $this->clients_model->get_suchprofiles($id);
        $this->load->view('clients/additional_search_profile_ajax', $data);
    }

    public function remove_search_profile_ajax($id, $id_address) {
        if (!$id || !$id_address) {
            echo 'Id not set properly';
            return;
        }
        $this->clients_model->remove_search_profile($id);
        $this->update_search_profile_ajax($id_address);
    }

    public function load_profiles_ajax($id, $id_address) {
        $SearchCond = '';
        $profile = $this->clients_model->get_suchprofile($id);
        $SearchCategory = $profile->objekttyp;
        if ($SearchCategory) {
            $ot1 = "ob_kategorien_1 = $SearchCategory OR ob_kategorien_2 = $SearchCategory OR ob_kategorien_3 = $SearchCategory";
            $SC2 = $profile->objekttyp2;
            if ($SC2)
                $ot2 = " OR ob_kategorien_1 = $SC2 OR ob_kategorien_2 = $SC2 OR ob_kategorien_3 = $SC2";
            $KatCond = "AND ( $ot1 $ot2 )";
        }
        $s = $profile->region;
        if ($s) {
            $R1 = " ob_region = $s ";
            $s = $profile->region2;
            $R2 = " OR ob_region = $s ";
            $s = $profile->region3;
            $R3 = " OR ob_region = $s ";
            $RegionCond = " AND ($R1 $R2 $R3) ";
            $this->db->where($RegionCond);
        }
        if (isset($SearchText)) {
            $SearchCond = "
				( ob_referenznr like('%$SearchText%')
				OR ob_titel_sp_1 like('%$SearchText%')
				OR ob_titel_sp_2 like('%$SearchText%')
				OR ob_titel_sp_3 like('%$SearchText%') )
				";
            $this->db->where($SearchCond);
        }
        switch (isset($Sort)) {
            case "aktiv":
                $Order = "ORDER BY aktiv";
                break;
            case "online":
                $Order = "ORDER BY sichtbar";
                break;
            case "Ref":
                $Order = "ORDER BY ob_referenznr";
                break;
            case "obj_typ":
                $Order = "order by ob_kategorien_1";
                break;
            case "nutz_flaeche":
                $Order = "ORDER BY ob_nutzflaecheqm";
                break;
            case "wohn_flaeche":
                $Order = "ORDER BY ob_wohnflaecheqm";
                break;
            case "SZ":
                $Order = "ORDER BY ob_schlafzimmer";
                break;
            case "BZ":
                $Order = "ORDER BY ob_baeder";
                break;
            case "Region":
                $Order = "order by ob_region";
                break;
            case "Preis":
                $Order = "order by CAST(ob_vk_kaufpreis_brutto AS UNSIGNED)";
                break;
            case "Ort":
                $Order = "order by ob_ort";
                break;
            default:
                $Order = "order by aenderungsdatum";
                $desc = true;
                break;
        }
        if (isset($desc))
            $DescCond = "DESC";

        // search attribs
        if ($profile->erste_linie) {
            $menu_id = $this->clients_model->GetMenuIdFromMenuName("Position")->menu_id;
            $content_id = $this->clients_model->GetAttribID($menu_id, '1. Meereslinie')->id;
            $attrib_content_id[] = $content_id;
        }
        if ($profile->meerblick) {
            $menu_id = $this->clients_model->GetMenuIdFromMenuName("Blick")->menu_id;
            $content_id = $this->clients_model->GetAttribID($menu_id, 'Meerblick')->id;
            $attrib_content_id[] = $content_id;
        }
        if (is_array(@$attrib_content_id) AND ( $count = count($attrib_content_id)) > 0) {
            foreach ($attrib_content_id as $id) {
                $ATTRIB_CONTENT_WHERE .= "AND obj_grunddaten.ID = ANY (SELECT object_id FROM attrib_menu_mapping WHERE language_id = 1 AND content_id = $id GROUP BY object_id ) ";
            }
        }
        // kaufen und/oder miete
        if ($profile->kaufen == 1) {
            $SearchCond .= "  CAST(ob_vk_kaufpreis_brutto AS UNSIGNED) > 0 ";
            if ($profile->preis_von) {
                $SearchCond = "  CAST(ob_vk_kaufpreis_brutto AS UNSIGNED) >= " . $profile->preis_von;
                $this->db->where($SearchCond);
            }
            if ($profile->preis_bis) {
                $SearchCond = " CAST(ob_vk_kaufpreis_brutto AS UNSIGNED) <= " . $profile->preis_bis;
                $this->db->where($SearchCond);
                $kaufen = 1;
            }
        }
        if ($profile->mieten == 1) {
            $SearchCond = " CAST(ob_mietpreis AS UNSIGNED) > 0 ";
            $this->db->where($SearchCond);
            if ($profile->preis_von) {
                $SearchCond = "  CAST(ob_mietpreis AS UNSIGNED) >= " . $PROFILE->preis_von;
                $this->db->where($SearchCond);
            }
            if ($profile->preis_bis) {
                $SearchCond = "  CAST(ob_mietpreis AS UNSIGNED) <= " . $profile->preis_bis;
                $this->db->where($SearchCond);
                $mieten = 1;
            }
        }
        if ($profile->angebotsart) {
            $SearchCond = "  ob_angebotsart='" . $profile->angebotsart . "'";
            $this->db->where($SearchCond);
        }
        if ($profile->anlage) {
            $SearchCond = "  anlage = " . $profile->anlage;
            $this->db->where($SearchCond);
        }
        if ($profile->preis_von) {
            $kauf_and_von = "CAST(ob_vk_kaufpreis_brutto AS UNSIGNED) >= " . $profile->preis_von;
        } else {
            $kauf_and_von = "CAST(ob_vk_kaufpreis_brutto AS UNSIGNED) > 0 ";
        }
        if ($profile->preis_von) {
            $miet_and_von = "CAST(ob_mietpreis AS UNSIGNED) >= " . $profile->preis_von;
        } else {
            $miet_and_von = "CAST(ob_mietpreis AS UNSIGNED) > 0 ";
        }
        if ($profile->preis_bis) {
            $kauf_and_bis = "CAST(ob_vk_kaufpreis_brutto AS UNSIGNED) <= " . $profile->preis_bis;
        } else {
            $kauf_and_bis = "1";
        }
        if ($profile->preis_bis) {
            $miet_and_bis = "CAST(ob_mietpreis AS UNSIGNED) <= " . $profile->preis_bis;
        } else {
            $miet_and_bis = "1";
        }
        if ($kauf_and_von or $kauf_and_bis or $miet_and_von or $miet_and_bis) {
            $SearchCond = "  ( ($kauf_and_von AND $kauf_and_bis) OR ($miet_and_von AND 2) )";
            $this->db->where($SearchCond);
        }
        if ($profile->wohnflaeche_von) {
            $SearchCond = "  CAST(ob_wohnflaecheqm AS UNSIGNED) >= " . $profile->wohnflaeche_von;
            $this->db->where($SearchCond);
        }
        if ($profile->wohnflaeche_bis) {
            $SearchCond = "  CAST(ob_wohnflaecheqm AS UNSIGNED) <= " . $profile->wohnflaeche_bis;
            $this->db->where($SearchCond);
        }
        if ($profile->grundstueck_von) {
            $SearchCond = "  CAST(ob_gr_flaecheqm AS UNSIGNED) >= " . $profile->grundstueck_von;
            $this->db->where($SearchCond);
        }
        if ($profile->grundstueck_bis) {
            $SearchCond = "  CAST(ob_gr_flaecheqm AS UNSIGNED) <= " . $profile->grundstueck_bis;
            $this->db->where($SearchCond);
        }
        if ($profile->schlafzimmer_von) {
            $SearchCond = "  CAST(ob_schlafzimmer AS UNSIGNED) >= " . $profile->schlafzimmer_von;
            $this->db->where($SearchCond);
        }
        if ($profile->schlafzimmer_bis) {
            $SearchCond = "  CAST(ob_schlafzimmer AS UNSIGNED) <= " . $profile->schlafzimmer_bis;
            $this->db->where($SearchCond);
        }
        if ($profile->baeder_von) {
            $SearchCond = "  CAST(ob_baeder AS UNSIGNED) >= " . $profile->baeder_von;
            $this->db->where($SearchCond);
        }
        if ($profile->baeder_bis) {
            $SearchCond = "  CAST(ob_baeder AS UNSIGNED) <= " . $profile->baeder_bis;
            $this->db->where($SearchCond);
        }
        $Ort = $profile->ort;
        // ort
        if ($ort = mb_strtolower($Ort, "utf-8")) {
            if (strpos($ort, ",")) {
                $ort_array = explode(",", $ort);
                foreach ($ort_array as $thisOrt) {
                    $ort_search .= " LOWER(ob_ort) like '%$thisOrt%' OR ";
                }
                $ort_search = substr($ort_search, 0, -3);
                $SearchCond = "  ( $ort_search )";
                $this->db->where($SearchCond);
            } else {
                $SearchCond = "  lower(ob_ort) like('%" . strtolower($Ort) . "%') ";
                $this->db->where($SearchCond);
            }
        }
        /**
          $SACHBEARBEITER_JOIN = requestGetVar('SACHBEARBEITER_JOIN');
          if(!$PERM['ViewObjekte']){
          if($PERM['ViewOwnObjekte']){
          if(!$SACHBEARBEITER_JOIN)$SACHBEARBEITER_JOIN = "LEFT JOIN obj_sachbearbeiter SB ON obj_grunddaten.ID = SB.id_object";
          $PERM_COND = " AND SB.id_sachbearbeiter = " . $_SESSION['USER_SACHBEARBEITER'];
          }else die("kein zugriff");
          }
          //      $Limit="LIMIT ".(int)$LimitFrom.",25";
          //$Limit="LIMIT ".(int)$ShowResultsFrom.",$ResultsPerPage";
         * 
         */
        if (!isset($KatCond))
            $KatCond = '';
        if (!isset($RegionCond))
            $RegionCond = '';
        if (!isset($ATTRIB_CONTENT_WHERE))
            $ATTRIB_CONTENT_WHERE = '';
        if (!isset($PERM_COND))
            $PERM_COND = '';
        if (!isset($SACHBEARBEITER_JOIN))
            $SACHBEARBEITER_JOIN = '';
        $this->db->select('DISTINCT (a.ID)');
        $this->db->from('obj_grunddaten as a');
        $this->db->join('attrib_menu_mapping as b', 'a.ID = b.object_id');
        //echo $this->db->get_compiled_select();die;
        $results = $this->db->get()->result();
        var_dump($results);
        die;
        $sql = "select distinct(a.ID) from $this->db->dbprefix('obj_grunddaten') as a
		LEFT JOIN $this->db->dbprefix('attrib_menu_mapping') as amm ON a.ID = amm.object_id
		$SACHBEARBEITER_JOIN
		WHERE aktiv = 1
		$KatCond
		$SearchCond
		$RegionCond
		$ATTRIB_CONTENT_WHERE
		$PERM_COND
		
		$Order
		$DescCond
		";

        //echo "<pre>$sql</pre>$sql";
        var_dump($sql);
        die;
        $result = $this->db->query($sql)->result();
        var_dump($result);
        die;
        $sql_count = "select count(distinct($this->db->dbprefix('obj_grunddaten').ID)) from $this->db->dbprefix('obj_grunddaten')
		LEFT JOIN $this->db->dbprefix('attrib_menu_mapping') amm ON attrib_menu_mapping.ID = amm.object_id
		$SACHBEARBEITER_JOIN
		WHERE aktiv = 1
		$KatCond
		$SearchCond
		$RegionCond
		$ATTRIB_CONTENT_WHERE
		$PERM_COND
		";
        //echo $sql_count;
        $resC = mysql_query($sql_count);
        $Results = mysql_result($resC, 0, 0);
        $ShowExposeSubmit = true;
        include "obj_list.inc.php";
    }

    public function add_task_ajax() {
        $data = array();
        if ($this->input->post('id_address')) {
            set_validation_messages();
            $this->form_validation->set_rules('content', LTEXT('_comments'), '');
            $this->form_validation->set_rules('referenz', LTEXT('_referenz'), '');
            $this->form_validation->set_rules('priority', LTEXT('_priority'), '');
            $this->form_validation->set_rules('id_kalendereintragart', LTEXT('id_kalendereintragart'), '');
            $this->form_validation->set_rules('erledigt', LTEXT('_erledigt'), '');
            $this->form_validation->set_rules('id_assignedaddress', LTEXT('_id_assignedaddress'), '');
            $this->form_validation->set_rules('hour', LTEXT('_hour'), 'trim|required');
            $this->form_validation->set_rules('minutes', LTEXT('_minutes'), 'trim|required');
            $this->form_validation->set_rules('thour', LTEXT('_thour'), 'trim|required');
            $this->form_validation->set_rules('tminutes', LTEXT('_tminutes'), 'trim|required');
            $this->form_validation->set_rules('date', LTEXT('_start_date'), 'required|callback_date_check');
            $this->form_validation->set_rules('date_stop', LTEXT('_date_stop'), 'required|callback_date_check|callback_compare_dates');

            if ($this->form_validation->run() == true) {
                $insert_data['id_adresse'] = $this->input->post('id_address');
                if (($this->input->post('erledigt'))) {
                    $insert_data['erledigt'] = $this->input->post('erledigt');
                } else {
                    $insert_data['erledigt'] = 0;
                }
                $insert_data['date'] = trim($this->input->post('date'));
                $insert_data['create_date'] = date('Y-m-d H:i:s');
                $insert_data['content'] = $this->input->post('content');
                $insert_data['hour'] = $this->input->post('hour') . ':' . $this->input->post('minutes');
                $insert_data['priority'] = $this->input->post('priority');
                $insert_data['date_stop'] = $this->input->post('date_stop');
                $insert_data['hour_stop'] = $this->input->post('thour') . ':' . $this->input->post('tminutes');
                $insert_data['id_assignedaddress'] = $this->input->post('id_assignedaddress');
                $insert_data['id_user'] = $this->session->userdata['userid'];
                $insert_data['id_kalendereintragart'] = $this->input->post('id_kalendereintragart');
                $insert_data['referenz'] = $this->input->post('referenz');
                $this->clients_model->insert_calendar($insert_data);
                $data['success_message'] = LTEXT('_data_added_successfully') . '<br>' . LTEXT('_add_more_task_or_close');
            } else {
                $data['warning_message'] = validation_errors();
            }
        }
        $data['task'] = false;
        $data['users'] = $this->clients_model->get_users();
        $data['kalendereintragart'] = $this->clients_model->get_listfield(1, 'kalendereintragart');
        $this->load->view('clients/add_task_ajax', $data);
    }

    public function date_check($str) {
        if (!strtotime($str)) {
            $this->form_validation->set_message('date_check', LTEXT('_valid_date_error'));
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function compare_dates($tdate) {
        if ($this->input->post('hour') && $this->input->post('minutes') && $this->input->post('thour') && $this->input->post('tminutes')) {
            if (strtotime($this->input->post('date') . ' ' . $this->input->post('hour') . ':' . $this->input->post('minutes')) >= strtotime($tdate . ' ' . $this->input->post('thour') . ':' . $this->input->post('tminutes'))) {
                $this->form_validation->set_message('compare_dates', LTEXT('_start_date_greater_field_error'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function update_add_task_ajax($id) {
        if (!$id) {
            $data['warning_message'] = LTEXT('_no_id_set');
            return;
        }
        $data['tasks'] = $this->clients_model->get_calendars($id);
        $this->load->view('clients/additional_task_ajax', $data);
    }

    public function remove_add_task_ajax($id, $id_address) {
        if (!$id || !$id_address) {
            echo 'Id not set properly';
            return;
        }
        $this->clients_model->remove_additional_task($id);
        $this->update_add_task_ajax($id_address);
    }

    public function edit_task_ajax($id) {
        if (!$id) {
            echo 'Id not set properly';
            return;
        }
        $task = $this->clients_model->get_calendar($id);
        $task->hour = explode(':', $task->hour);
        $task->hour_stop = explode(':', $task->hour_stop);
        $data = array();
        if ($this->input->post('id_address')) {
            set_validation_messages();
            $this->form_validation->set_rules('content', LTEXT('_comments'), '');
            $this->form_validation->set_rules('referenz', LTEXT('_referenz'), '');
            $this->form_validation->set_rules('priority', LTEXT('_priority'), '');
            $this->form_validation->set_rules('id_kalendereintragart', LTEXT('id_kalendereintragart'), '');
            $this->form_validation->set_rules('erledigt', LTEXT('_erledigt'), '');
            $this->form_validation->set_rules('id_assignedaddress', LTEXT('_id_assignedaddress'), '');
            $this->form_validation->set_rules('hour', LTEXT('_hour'), 'trim|required');
            $this->form_validation->set_rules('minutes', LTEXT('_minutes'), 'trim|required');
            $this->form_validation->set_rules('thour', LTEXT('_thour'), 'trim|required');
            $this->form_validation->set_rules('tminutes', LTEXT('_tminutes'), 'trim|required');
            $this->form_validation->set_rules('date', LTEXT('_start_date'), 'required|callback_date_check');
            $this->form_validation->set_rules('date_stop', LTEXT('_date_stop'), 'required|callback_date_check|callback_compare_dates');

            if ($this->form_validation->run() == true) {
                $update_data['id_adresse'] = $this->input->post('id_address');
                if (($this->input->post('erledigt'))) {
                    $update_data['erledigt'] = $this->input->post('erledigt');
                } else {
                    $update_data['erledigt'] = 0;
                }
                $update_data['date'] = trim($this->input->post('date'));
                $update_data['modify_date'] = date('Y-m-d H:i:s');
                $update_data['content'] = $this->input->post('content');
                $update_data['hour'] = $this->input->post('hour') . ':' . $this->input->post('minutes');
                $update_data['priority'] = $this->input->post('priority');
                $update_data['date_stop'] = $this->input->post('date_stop');
                $update_data['hour_stop'] = $this->input->post('thour') . ':' . $this->input->post('tminutes');
                $update_data['id_assignedaddress'] = $this->input->post('id_assignedaddress');
                $update_data['id_user'] = $this->session->userdata['userid'];
                $update_data['id_kalendereintragart'] = $this->input->post('id_kalendereintragart');
                $update_data['referenz'] = $this->input->post('referenz');
                $this->clients_model->update_calendar($update_data, $id);
                $data['success_message'] = LTEXT('_task_edited_successfully') . '<br>' . LTEXT('_edit_task_or_close');
            } else {
                $data['warning_message'] = validation_errors();
            }
        }
        $data['users'] = $this->clients_model->get_users();
        $data['kalendereintragart'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'kalendereintragart');
        $data['task'] = $task;
        $this->load->view('clients/add_task_ajax', $data);
    }

    public function add_contacthistory_ajax() {
        $data = array();
        if ($this->input->post('id_address')) {
            $this->form_validation->set_rules('comment', LTEXT('_comments'), '');
            $this->form_validation->set_rules('referenz', LTEXT('_referenz'), '');
            $this->form_validation->set_rules('kontaktart', LTEXT('_kontaktart'), 'required');
            $this->form_validation->set_rules('aktion', LTEXT('aktion'), '');

            if ($this->form_validation->run() == true) {
                $insert_data['id_adresse'] = $this->input->post('id_address');
                $insert_data['date'] = date('Y-m-d H:i:s');
                $insert_data['comment'] = $this->input->post('comment');
                $insert_data['kontaktart'] = $this->input->post('kontaktart');
                $insert_data['aktion'] = $this->input->post('aktion');
                $insert_data['referenz'] = $this->input->post('referenz');
                $insert_data['id_user'] = $this->session->userdata['userid'];
                $this->clients_model->insert_contact_history($insert_data);
                $data['success_message'] = LTEXT('_contacthistory_added_successfully') . '<br>' . LTEXT('_add_more_task_or_close');
            } else {
                $data['warning_message'] = validation_errors();
            }
        }
        $data['contact_history'] = false;
        $data['kontaktart'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'kontaktart');
        $data['aktion'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'kontakthistorie_aktion');
        $this->load->view('clients/add_contacthistory_ajax', $data);
    }

    public function update_contacthistory_ajax($id) {
        if (!$id) {
            $data['warning_message'] = LTEXT('_no_id_set');
            return;
        }
        $data['contact_histories'] = $this->clients_model->get_contact_histories($id);
        $this->load->view('clients/additional_contacthistory_ajax', $data);
    }

    public function remove_contacthistory($id, $id_address) {
        if (!$id || !$id_address) {
            echo 'Id not set properly';
            return;
        }
        $this->clients_model->remove_additional_contacthistory($id);
        $this->update_contacthistory_ajax($id_address);
    }

    public function edit_contacthistory_ajax($id) {
        if (!$id) {
            echo LTEXT('_no_id_set');
            return;
        }
        $data = array();
        if ($this->input->post('id_address')) {
            $this->form_validation->set_rules('comment', LTEXT('_comments'), '');
            $this->form_validation->set_rules('referenz', LTEXT('_referenz'), '');
            $this->form_validation->set_rules('kontaktart', LTEXT('_kontaktart'), 'required');
            $this->form_validation->set_rules('aktion', LTEXT('aktion'), '');

            if ($this->form_validation->run() == true) {
                $update_data['id_adresse'] = $this->input->post('id_address');
                $update_data['modify_date'] = date('Y-m-d H:i:s');
                $update_data['comment'] = $this->input->post('comment');
                $update_data['kontaktart'] = $this->input->post('kontaktart');
                $update_data['aktion'] = $this->input->post('aktion');
                $update_data['referenz'] = $this->input->post('referenz');
                $update_data['id_user'] = $this->session->userdata['userid'];
                $this->clients_model->update_contact_history($update_data, $id);
                $data['success_message'] = LTEXT('_contacthistory_added_successfully') . '<br>' . LTEXT('_add_more_task_or_close');
            } else {
                $data['warning_message'] = validation_errors();
            }
        }
        $data['contact_history'] = $this->clients_model->get_contacthistory($id);
        $data['kontaktart'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'kontaktart');
        $data['aktion'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'kontakthistorie_aktion');

        $this->load->view('clients/add_contacthistory_ajax', $data);
    }

    public function advanced_search() {
        $this->form_validation->set_rules('SASearchStatus', 'You', 'required');
        $this->form_validation->set_rules('SASearchSprache', 'You', '');
        $this->form_validation->set_rules('SAnewsletter', 'You', '');
        $this->form_validation->set_rules('SASearchTextAddress', 'You', '');
        $this->form_validation->set_rules('SASuchTyp', 'You', '');
        $this->form_validation->set_rules('SASearchTextNachname', 'You', '');
        $this->form_validation->set_rules('SASearchTextVorname', 'You', '');
        $this->form_validation->set_rules('SASachbearbeiter', 'You', '');
        $this->form_validation->set_rules('SAkundenaquise', 'You', '');
        $this->form_validation->set_rules('SAobjekttyp', 'You', '');
        $this->form_validation->set_rules('SAnutzungsart', 'You', '');
        $this->form_validation->set_rules('SAregion', 'You', '');
        $this->form_validation->set_rules('OS_Ort', 'You', '');
        $this->form_validation->set_rules('SAresidenz', 'You', '');
        $this->form_validation->set_rules('SAerste_linie', 'You', '');
        $this->form_validation->set_rules('SAkaufen', 'You', '');
        $this->form_validation->set_rules('SAmieten', 'You', '');
        $this->form_validation->set_rules('SApreis_von', 'You', '');
        $this->form_validation->set_rules('SApreis_bis', 'You', '');
        $this->form_validation->set_rules('SAwohnflaeche_von', 'You', '');
        $this->form_validation->set_rules('SAwohnflaeche_bis', 'You', '');
        $this->form_validation->set_rules('SAgrundstueck_von', 'You', '');
        $this->form_validation->set_rules('SAgrundstueck_bis', 'You', '');
        $this->form_validation->set_rules('SAschlafzimmer_von', 'You', '');
        $this->form_validation->set_rules('SAschlafzimmer_bis', 'You', '');
        $this->form_validation->set_rules('SAbaeder_von', 'You', '');
        $this->form_validation->set_rules('SAbaeder_bis', 'You', '');
        if ($this->form_validation->run() == false) {
            $data['title'] = LTEXT('_advanced_search');
            $data['search'] = $this->session->userdata('advanced_search_filter');
            $data['languages'] = $this->language_model->get_languages();
            $data['ZusatzKontaktArtens'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'ZusatzKontaktArten');
            $data['adressen_by_kontaktart6'] = $this->clients_model->get_adressen_by_kontaktart();
            $data['kundenaquise'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'kundenaquise');
            $data['objekttyps'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'objekttyp');
            $data['nutzungsart'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'nutzungsart');
            $data['region'] = $this->clients_model->get_listfield($this->session->userdata('lang_id'), 'region');
            $data['anlagen'] = $this->clients_model->get_anlagen($this->session->userdata('lang_id'), 'anlagen');
            $header_data['title'] = LTEXT('_advanced_search');
            $this->clients_model->get_me();
            $this->template->set_active_menu('clients')
                    ->set_active_submenu('_advanced_search')
                    ->set_heading(LTEXT('_advanced_search'))
                    ->set_page('clients/address_advance_search')
                    ->show($data);
        } else {
            $search['SA_Sachbearbeiter'] = $this->input->post('SASachbearbeiter');
            $search['SA_newsletter'] = $this->input->post('SAnewsletter');
            $search['SA_SearchSprache'] = $this->input->post('SASearchSprache');
            $search['SA_SearchTextAddress'] = $this->input->post('SASearchTextAddress');
            $search['SA_SearchStatus'] = $this->input->post('SASearchStatus');
            $search['SA_SearchTextNachname'] = $this->input->post('SASearchTextNachname');
            $search['SA_SearchTextVorname'] = $this->input->post('SASearchTextVorname');
            $search['SA_kundenaquise'] = $this->input->post('SAkundenaquise');
            $search['SA_SuchTyp'] = $this->input->post('SASuchTyp');  // kunde eigentuemer
            $search['SA_User'] = $this->input->post('SAUser');
            $search['SA_AD_Day_from'] = $this->input->post('SAAD_Day_from');
            $search['SA_AD_Month_from'] = $this->input->post('SAAD_Month_from');
            $search['SA_AD_Year_from'] = $this->input->post('SAAD_Year_from');
            $search['SA_AD_Day_to'] = $this->input->post('SAAD_Day_to');
            $search['SA_AD_Month_to'] = $this->input->post('SAAD_Month_to');
            $search['SA_AD_Year_to'] = $this->input->post('SAAD_Year_to');
            $search['SA_CD_Day_from'] = $this->input->post('SACD_Day_from');
            $search['SA_CD_Month_from'] = $this->input->post('SACD_Month_from');
            $search['SA_CD_Year_from'] = $this->input->post('SACD_Year_from');
            $search['SA_CD_Day_to'] = $this->input->post('SACD_Day_to');
            $search['SA_CD_Month_to'] = $this->input->post('SACD_Month_to');
            $search['SA_CD_Year_to'] = $this->input->post('SACD_Year_to');
            $search['SA_objekttyp'] = $this->input->post('SAobjekttyp');
            $search['SA_nutzungsart'] = $this->input->post('SAnutzungsart');
            $search['SA_region'] = $this->input->post('SAregion');
            $search['SA_residenz'] = $this->input->post('SAresidenz');
            $search['SA_ort'] = $this->input->post('OS_Ort');
            $search['SA_angebotsart'] = $this->input->post('SAangebotsart');
            $search['SA_kaufen'] = (int) $this->input->post('SAkaufen');
            $search['SA_mieten'] = (int) $this->input->post('SAmieten');
            $search['SA_erste_linie'] = (int) $this->input->post('SAerste_linie');
            unset($search['SA_meerblick']);
            //if(requestIsset('SAmeerblick'))$search['SA_meerblick']=(int)$this->input->post('SAmeerblick'); 
            $search['SA_preis_von'] = $this->input->post('SApreis_von');
            $search['SA_preis_bis'] = $this->input->post('SApreis_bis');
            $search['SA_wohnflaeche_von'] = $this->input->post('SAwohnflaeche_von');
            $search['SA_wohnflaeche_bis'] = $this->input->post('SAwohnflaeche_bis');
            $search['SA_grundstueck_von'] = $this->input->post('SAgrundstueck_von');
            $search['SA_grundstueck_bis'] = $this->input->post('SAgrundstueck_bis');
            $search['SA_schlafzimmer_von'] = $this->input->post('SAschlafzimmer_von');
            $search['SA_schlafzimmer_bis'] = $this->input->post('SAschlafzimmer_bis');
            $search['SA_baeder_von'] = $this->input->post('SAbaeder_von');
            $search['SA_baeder_bis'] = $this->input->post('SAbaeder_bis');
            $this->session->set_userdata('advanced_search_filter', $search);
            redirect(base_url('clients'));
        }
    }

    function reset_search() {
        $this->session->unset_userdata('advanced_search_filter');
        redirect(base_url('clients'));
    }
    
     public function records(){
        //echo '{"draw":1,"recordsTotal":57,"recordsFiltered":57,"data":[["Airi","Satou","Accountant","Tokyo","28th Nov 08","$162,700"],["Angelica","Ramos","Chief Executive Officer (CEO)","London","9th Oct 09","$1,200,000"],["Ashton","Cox","Junior Technical Author","San Francisco","12th Jan 09","$86,000"],["Bradley","Greer","Software Engineer","London","13th Oct 12","$132,000"],["Brenden","Wagner","Software Engineer","San Francisco","7th Jun 11","$206,850"],["Brielle","Williamson","Integration Specialist","New York","2nd Dec 12","$372,000"],["Bruno","Nash","Software Engineer","London","3rd May 11","$163,500"],["Caesar","Vance","Pre-Sales Support","New York","12th Dec 11","$106,450"],["Cara","Stevens","Sales Assistant","New York","6th Dec 11","$145,600"],["Cedric","Kelly","Senior Javascript Developer","Edinburgh","29th Mar 12","$433,060"]]}';die;
        $this->load->library('datatables');
        if($this->input->post('wherefield')){
            $this->datatables->where('Prod_Grp',$this->input->post('wherefield') );
        }
        $result = $this->datatables->select('usuario_id,usuario_usuario,usuario_empresa,usuario_email,usuario_telefono,usuario_direccion')
                ->from('usuarios')
                ->generate();
        echo $result ;
    }

}
