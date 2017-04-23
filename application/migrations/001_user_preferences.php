<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_user_preferences extends CI_Migration {

    public function up() {
         
        $sql1 = 'CREATE TABLE IF NOT EXISTS `user_preferences` (
                `id` int(250) NOT NULL AUTO_INCREMENT,
                `sort_field` varchar(250) NOT NULL,
                `sort_order` varchar(250) NOT NULL,
                `page` varchar(250) NOT NULL,
                `user_id` int(250) NOT NULL,
                PRIMARY KEY (`id`)
                ) 
                ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;';
        $this->db->query($sql1);

        $sql2 = "INSERT INTO `user_preferences` (`id`, `sort_field`, `sort_order`, `page`, `user_id`) VALUES
        (10, 'Prod_Grp', 'desc', 'products', 6080),
        (11, 'usuario_usuario', 'asc', 'clients', 6080);";
        $this->db->query($sql2);
    }

    public function down() {
        $this->dbforge->drop_table('user_preferences');
    }

}
