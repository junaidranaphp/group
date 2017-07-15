<?php

defined('BASEPATH') or die('Restricted direct access');

class Order extends ADMIN_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
    }

    public function index() {
        $this->template->set_active_menu('order')
                ->set_active_submenu('orders')
                ->set_heading(LTEXT('_all_orders'))
                ->set_js_file('assets/js/view_orders.js')
//                ->set_widget_file('clients/widget_file', 2)
                ->set_page('order/view_orders')
                ->show();
    }
    
    public function view_details($id=null){
        
    }

    public function records() {
        //echo '{"draw":1,"recordsTotal":57,"recordsFiltered":57,"data":[["Airi","Satou","Accountant","Tokyo","28th Nov 08","$162,700"],["Angelica","Ramos","Chief Executive Officer (CEO)","London","9th Oct 09","$1,200,000"],["Ashton","Cox","Junior Technical Author","San Francisco","12th Jan 09","$86,000"],["Bradley","Greer","Software Engineer","London","13th Oct 12","$132,000"],["Brenden","Wagner","Software Engineer","San Francisco","7th Jun 11","$206,850"],["Brielle","Williamson","Integration Specialist","New York","2nd Dec 12","$372,000"],["Bruno","Nash","Software Engineer","London","3rd May 11","$163,500"],["Caesar","Vance","Pre-Sales Support","New York","12th Dec 11","$106,450"],["Cara","Stevens","Sales Assistant","New York","6th Dec 11","$145,600"],["Cedric","Kelly","Senior Javascript Developer","Edinburgh","29th Mar 12","$433,060"]]}';die;
        $this->load->library('datatables');
        $result = $this->datatables->select('orders.id,usuarios.usuario_nombre,usuarios.usuario_email,orders.date_created')
                ->from('orders')
                ->join('usuarios','usuarios.usuario_id = orders.user_id')
                ->generate();
        echo $result;
    }

}
