<?php

defined('BASEPATH') or die('Restricted direct access');

class Products_model extends CI_Model {

    public function insert_product($data) {
        return $this->db->insert('master_product_file', $data);
    }

    public function get_products($limit, $start, $sort_field, $sort_order) {
        return $this->db->limit($limit, $start)->order_by($sort_field, $sort_order)->get('master_product_file')->result();
    }

    public function get_product($id) {
        return$this->db->where('master_product_file_id', $id)->get('master_product_file')->row();
    }

    public function update_product($data, $id) {
        return $this->db->where('master_product_file_id', $id)
                        ->update('master_product_file', $data);
    }

    public function record_count() {
        return $this->db->count_all("master_product_file");
    }

    public function delete_product($id) {
        return $this->db->where('master_product_file_id', $id)
                        ->delete('master_product_file');
    }

}
