<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends BASIC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function index($page = 0) {
        $data['product_group_filter'] = false ;
        $this->template->set_active_menu('products')
                ->set_active_submenu('products')
                ->set_heading(LTEXT('_products'))
                ->set_js_file('assets/js/admin_products_view.js')
                ->set_page('admin/products/products_view')
                ->show($data);
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
            redirect(base_url('admin/products'));
        } else {
            $data['edit'] = FALSE;

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
            redirect(base_url('admin/products'));
        } else if (!($product = $this->products_model->get_product($id))) {
            $flash_data['content'] = 'Id is not present';
            $flash_data['type'] = 'danger';
            $this->session->set_flashdata('message', $flash_data);
            redirect(base_url('admin/products'));
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
                redirect(base_url('admin/products'));
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

    function delete_products($id = null) {
        
        if ($this->input->post('confirm_delete')) {
            $ids = $this->input->post('ids');
            if (!empty($ids)) {
                $checked_messages = $ids;
                if ($this->products_model->delete_batch($checked_messages)) {
                    $flash_data['content'] = 'products has been deleted successfully';
                    $flash_data['type'] = 'success';
                } else {
                    $flash_data['content'] = 'products could not be deleted';
                    $flash_data['type'] = 'danger';
                }
                $this->session->set_flashdata('message', $flash_data);
                redirect(base_url('admin/products'));
            } else {
                $flash_data['content'] = 'you did not select any item';
                $flash_data['type'] = 'danger';
                $this->session->set_flashdata('message', $flash_data);
                redirect(base_url('admin/products'));
            }
        } else {
            if ($id != null) {
                $idies = array($id);
            } else if ($multi_select = $this->input->post('multi_select')) {

                $idies = $multi_select;
            }
            else{
                 $flash_data['content'] = 'you did not select any item';
                $flash_data['type'] = 'danger';
                $this->session->set_flashdata('message', $flash_data);
                redirect(base_url('admin/products'));
            }
            $products = $this->products_model->get_multiple_products($idies);
            $data['products'] = $products;
            $this->template->set_active_menu('products')
                    ->set_active_submenu('products')
                    ->set_heading(LTEXT('_products'))
                    ->set_page('products/confirm_delete_batch')
                    ->show($data);
        }
    }
    private function product_groups($name) {

        $data['groups'] = $this->basic_model->get_user_product_groups($this->session->userdata('userid'));
        $this->template->set_extra_data($data);
    }
     public function records(){
        //echo '{"draw":1,"recordsTotal":57,"recordsFiltered":57,"data":[["Airi","Satou","Accountant","Tokyo","28th Nov 08","$162,700"],["Angelica","Ramos","Chief Executive Officer (CEO)","London","9th Oct 09","$1,200,000"],["Ashton","Cox","Junior Technical Author","San Francisco","12th Jan 09","$86,000"],["Bradley","Greer","Software Engineer","London","13th Oct 12","$132,000"],["Brenden","Wagner","Software Engineer","San Francisco","7th Jun 11","$206,850"],["Brielle","Williamson","Integration Specialist","New York","2nd Dec 12","$372,000"],["Bruno","Nash","Software Engineer","London","3rd May 11","$163,500"],["Caesar","Vance","Pre-Sales Support","New York","12th Dec 11","$106,450"],["Cara","Stevens","Sales Assistant","New York","6th Dec 11","$145,600"],["Cedric","Kelly","Senior Javascript Developer","Edinburgh","29th Mar 12","$433,060"]]}';die;
        $this->load->library('datatables');
       // $this->datatables->add_column('edit', '<a href="profiles/edit/$1">EDIT</a>', 'master_product_file_id');
        
        
        $result = $this->datatables->select('master_product_file_id,Code,Prod_Grp,Rim,Pattern_Family,Type,Tubed_Tubeless,Stock,Source,CCT_Price_FOB_2004_Rounded,Net_Price')
                ->from('master_product_file')
                ->generate();
        echo $result ;
    }
    
    

}
