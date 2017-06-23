<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends BASIC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function index($page = 0) {
        $data['product_group_filter'] = false;
        $this->template->set_active_menu('products')
                ->set_active_submenu('products')
                ->set_heading(LTEXT('_products'))
                ->set_js_file('assets/js/products_view.js')
                ->set_page('products/products_view')
                ->show($data);
    }

    public function group($group_name = '', $page = 0) {

        $group_name = str_replace('%20', ' ', $group_name);
        $data['products_group'] = $group_name;
        $data['product_group_filter'] = $group_name;
        $this->template->set_active_menu('products')
                ->set_active_submenu('products')
                ->set_js_file('assets/js/products_view.js')
                ->set_heading(LTEXT('_products'))
                ->set_page('products/products_view')
                ->show($data);
    }

    public function records() {
        //echo '{"draw":1,"recordsTotal":57,"recordsFiltered":57,"data":[["Airi","Satou","Accountant","Tokyo","28th Nov 08","$162,700"],["Angelica","Ramos","Chief Executive Officer (CEO)","London","9th Oct 09","$1,200,000"],["Ashton","Cox","Junior Technical Author","San Francisco","12th Jan 09","$86,000"],["Bradley","Greer","Software Engineer","London","13th Oct 12","$132,000"],["Brenden","Wagner","Software Engineer","San Francisco","7th Jun 11","$206,850"],["Brielle","Williamson","Integration Specialist","New York","2nd Dec 12","$372,000"],["Bruno","Nash","Software Engineer","London","3rd May 11","$163,500"],["Caesar","Vance","Pre-Sales Support","New York","12th Dec 11","$106,450"],["Cara","Stevens","Sales Assistant","New York","6th Dec 11","$145,600"],["Cedric","Kelly","Senior Javascript Developer","Edinburgh","29th Mar 12","$433,060"]]}';die;
        $this->load->library('datatables');
        //$this->datatables->add_column('edit', ' <button class="btn details" data-id="$1">DETAIL </button>', 'master_product_file_id');

        if ($this->input->post('wherefield')) {
            $this->datatables->where('Prod_Grp', $this->input->post('wherefield'));
        }
        $result = $this->datatables->select('master_product_file.Code,Prod_Grp,Rim,Pattern_Family,Type,Tubed_Tubeless,Stock,Source,CCT_Price_FOB_2004_Rounded,Net_Price,master_product_file_id')
                ->from('permisos')
                ->where('permisos.usuario_id', $this->session->userdata('userid'))
                ->join('master_product_file', 'master_product_file.Prod_Grp = permisos.permiso_prodgrp')
                ->generate();
        echo $result;
    }

    public function get_product($id) {
        $user_id = $this->session->userdata('userid');
        $product = $this->products_model->get_user_product($id,$user_id);
        die(json_encode($product));
    }

    public function checkout() {
        $data['product_group_filter'] = false;
        $this->template->set_active_menu('products')
                ->set_active_submenu('products')
                ->set_heading(LTEXT('_products'))
                ->set_js_file('assets/js/checkout.js')
                ->set_page('products/checkout')
                ->show($data);
    }

    public function insert_order() {
        if ($this->cart->contents()) {
            $insert_data['user_id'] = $this->session->userdata('userid');
            $insert_data['date_created'] = date('Y-m-d H:i:s');
            if ($this->products_model->insert_order($insert_data)) {
                $order_id = $this->db->insert_id();
                if ($this->insert_order_products($order_id)) {
                    $this->cart->destroy();
                    $flash_data['content'] = 'Order created successfully';
                    $flash_data['type'] = 'success';
                    $this->session->set_flashdata('message', $flash_data);
                    redirect(base_url('products'));
                } else {
                    $flash_data['content'] = 'Order could not be created';
                    $flash_data['type'] = 'danger';
                    $this->session->set_flashdata('message', $flash_data);
                    redirect(base_url('products'));
                }
            } else {
                $flash_data['content'] = 'Order could not be created';
                $flash_data['type'] = 'danger';
                $this->session->set_flashdata('message', $flash_data);
                redirect(base_url('products'));
            }
        }
    }

    private function insert_order_products($order_id) {
        $insert_data = array();
        foreach ($this->cart->contents() as $key => $product) {
            $insert_data[$key]['order_id'] = $order_id;
            $insert_data[$key]['user_id'] = $this->session->userdata('userid');
            $insert_data[$key]['product_id'] = $product['id'];
            $insert_data[$key]['product_quantity'] = $product['qty'];
            $insert_data[$key]['product_price'] = $product['price'];
        }
        if ($this->products_model->insert_order_products($insert_data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function destroy() {
        $this->cart->destroy();
        redirect('products');
    }

}
