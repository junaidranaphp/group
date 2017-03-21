<?php defined('BASEPATH') or die('Restricted direct access');

class Template{
    private $active_menu ;
    public function __construct(){
        $this->ci = &get_instance();
    }
    public function show($view,$view2,$view3){
        $this->ci->load->view($view);
        $this->ci->load->view($view2);
        $this->ci->load->view($view3);
    }
    public function set_active_menu($menu_name){
        $this->active_menu = $menu_name;
    }
    public function get_active_menu(){
        return $this->active_menu;
    }
}

