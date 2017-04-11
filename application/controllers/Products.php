<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function index($page=0) {
        $url = base_url() . '/products/index';
        $rows= $this->products_model->record_count() ;
        $per_page = 25;
        $this->pagination->initialize(get_pagination_config($url, $rows, $per_page));
        


        if (empty($this->input->post('sort-field'))) {
            $sort_field = @$this->session->userdata['sort-field'];
            $sort_order = @$this->session->userdata['sort-order'];
        } else {
            $sort_field = @$this->input->post('sort-field');
            $sort_order = @$this->input->post('sort-order');
        }
        if (empty($sort_field)) {
            $sort_field = "master_product_file_id";
            $sort_order = "desc";
        }
        $this->session->userdata['sort-field'] = $sort_field;
        $this->session->userdata['sort-order'] = $sort_order;


        $data['records'] = $this->products_model->get_products($per_page, $page,$sort_field,$sort_order);
        $this->template->set_active_menu('products')
                ->set_active_submenu('products')
                ->set_heading(LTEXT('_products'))
                ->set_page('products/products_view')
                ->show($data);
    }

    public function delete_product($id) {
        if ($id == null || !($id > 0)) {
            $flash_data['content'] = 'Id is illegal or not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('products'));
        } else if (!($client = $this->products_model->get_products($id))) {
            $flash_data['content'] = 'Id is not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('products'));
        } else {
            if ($this->products_model->delete_product($id)) {
                $flash_data['content'] = 'Client has been deleted successfully';
                $flash_data['type'] = 'success';
            } else {
                $flash_data['content'] = 'Client could not be deleted';
                $flash_data['type'] = 'danger';
            }
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('products'));
        }
    }

    public function add_product() {

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
            redirect(base_url('clients'));
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

    public function edit_products($id = null) {

        if ($id == null || !($id > 0)) {
            $flash_data['content'] = 'Id is illegal or not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('clients'));
        } else if (!($client = $this->products_model->get_products($id))) {
            $flash_data['content'] = 'Id is not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('product'));
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
                redirect(base_url('clients'));
            } else {

                $data['product'] = $client;
                $data['edit'] = true;


                $this->template->set_active_menu('products')
                        ->set_active_submenu('products')
                        ->set_heading(LTEXT('_edit_products'))
                        ->set_page('products/edit_products')
                        ->show($data);
            }
        }
    }

}
