<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends ADMIN_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function index($page = 0) {
        $url = base_url() . '/products/index';
        $rows = $this->products_model->record_count();
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


        $data['records'] = $this->products_model->get_products($per_page, $page, $sort_field, $sort_order);
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

        $this->form_validation->set_rules('Code', 'code', 'trim|required');
        $this->form_validation->set_rules('Prod_Grp', 'product_grp', 'trim');
        $this->form_validation->set_rules('Rim', 'rim', 'trim');
        $this->form_validation->set_rules('Speed', 'speed', 'trim');

        if ($this->form_validation->run() == true) {
            $insert_data['Code'] = trim(strip_tags($this->input->post('Code')));
            $insert_data['Prod_Grp'] = trim(strip_tags($this->input->post('Prod_Grp')));
            $insert_data['Rim'] = trim(strip_tags($this->input->post('Rim')));
            $insert_data['Pattern_Family'] = trim(strip_tags($this->input->post('Pattern_Family')));
            $insert_data['Speed'] = trim(strip_tags($this->input->post('Speed')));
            $insert_data['Type'] = trim(strip_tags($this->input->post('Type')));
            $insert_data['Tubed_Tubeless'] = trim(strip_tags($this->input->post('Tubed_Tubeless')));
            $insert_data['Stock'] = trim(strip_tags($this->input->post('Stock')));
            $insert_data['Source'] = trim(strip_tags($this->input->post('Source')));
            $insert_data['CCT_Price_FOB_2004_Rounded'] = trim(strip_tags($this->input->post('CCT_Price_FOB_2004_Rounded')));
            $insert_data['Net_Price'] = trim(strip_tags($this->input->post('Net_Price')));
            if ($this->products_model->insert_product($insert_data)) {
                $flash_data['content'] = 'Product has been created successfully';
                $flash_data['type'] = 'success';
            } else {
                $flash_data['content'] = 'Product could not be created';
                $flash_data['type'] = 'danger';
            }
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('products'));
        } else {
            $data['edit'] = FALSE;

            $data['page'] = 'clients/view_user';
            $this->template->set_active_menu('products')
                    ->set_active_submenu('products')
                    ->set_heading(LTEXT('_add_product'))
                    ->set_page('products/edit_product')
                    ->show($data);
        }
    }

    public function edit_product($id = null) {

        if ($id == null || !($id > 0)) {
            $flash_data['content'] = 'Id is illegal or not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('products'));
        } else if (!($product = $this->products_model->get_product($id))) {
            $flash_data['content'] = 'Id is not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('products'));
        } else {

            $this->form_validation->set_rules('Code', 'code', 'trim|required');
            $this->form_validation->set_rules('Prod_Grp', 'product_grp', 'trim');
            $this->form_validation->set_rules('Rim', 'rim', 'trim');
            $this->form_validation->set_rules('Speed', 'speed', 'trim');

            if ($this->form_validation->run() == true) {

                $insert_data['Code'] = trim(strip_tags($this->input->post('Code')));
                $insert_data['Prod_Grp'] = trim(strip_tags($this->input->post('Prod_Grp')));
                $insert_data['Rim'] = trim(strip_tags($this->input->post('Rim')));
                $insert_data['Pattern_Family'] = trim(strip_tags($this->input->post('Pattern_Family')));
                $insert_data['Speed'] = trim(strip_tags($this->input->post('Speed')));
                $insert_data['Type'] = trim(strip_tags($this->input->post('Type')));
                $insert_data['Tubed_Tubeless'] = trim(strip_tags($this->input->post('Tubed_Tubeless')));
                $insert_data['Stock'] = trim(strip_tags($this->input->post('Stock')));
                $insert_data['Source'] = trim(strip_tags($this->input->post('Source')));
                $insert_data['CCT_Price_FOB_2004_Rounded'] = trim(strip_tags($this->input->post('CCT_Price_FOB_2004_Rounded')));
                $insert_data['Net_Price'] = trim(strip_tags($this->input->post('Net_Price')));

                if ($this->products_model->update_product($insert_data, $id)) {
                    $flash_data['content'] = 'product has been updated successfully';
                    $flash_data['type'] = 'success';
                } else {
                    $flash_data['content'] = 'product could not be updated';
                    $flash_data['type'] = 'danger';
                }
                $this->session->set_flashdata('message', $flash_data);
                redirect(base_url('products'));
            } else {

                $data['product'] = $product;
                $data['edit'] = true;


                $this->template->set_active_menu('products')
                        ->set_active_submenu('products')
                        ->set_heading(LTEXT('_edit_products'))
                        ->set_page('products/edit_product')
                        ->show($data);
            }
        }
    }

}