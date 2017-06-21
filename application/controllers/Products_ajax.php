<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products_ajax extends BASIC_ajax_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function add_product() {
        $this->form_validation->set_rules('quantity', 'quantity', 'trim|required|numeric|greater_than[0]');
        $this->form_validation->set_rules('product_id', 'product_id', 'trim|required|numeric');
        if ($this->form_validation == TRUE) {
            $product_id = $this->input->post('product_id');
            $quantity = $this->input->post('quantity');
            if ($product = $this->products_model->get_product($product_id)) {
                $data = array(
                    'id' => $product->master_product_file_id,
                    'qty' => $quantity,
                    'price' => $product->CCT_Price_FOB_2004_Rounded,
                    'name' => $product->Code
                );

                $this->cart->insert($data);
                $message = array(
                    'type' => 'success',
                    'message' => 'product has been added to cart',
                    'products' => $this->cart->contents(),
                    'total' => $this->cart->total()
                );
                die(json_encode($message));
            }
        }
    }

    public function get_cart() {
        $message = array(
            'type' => 'success',
            'message' => '',
            'products' => $this->cart->contents(),
            'total' => $this->cart->total()
        );
        die(json_encode($message));
    }

}
