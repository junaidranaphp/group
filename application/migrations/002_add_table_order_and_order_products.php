<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_table_order_and_order_products extends CI_Migration {

    public function up() {
        $this->dbforge->drop_table('orders', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE,
                'unsigned' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
            'date_created' => array(
                'type' => 'TIMESTAMP',
                'default'=> date('Y-m-d H:i:s')
            ),
        ));
        $this->dbforge->create_table('orders', TRUE);
        
         $this->dbforge->drop_table('order_products', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE,
                'unsigned' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
            'order_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
            'product_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
            'product_price' => array(
                'type' => 'FLOAT'
            ),
             'product_quantity' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
            
        ));
        $this->dbforge->create_table('order_products', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('orders', true);
        $this->dbforge->drop_table('order_products', true);
    }

}
