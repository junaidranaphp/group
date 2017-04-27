<?php

defined('BASEPATH') or die('Restricted direct access');

class Template {

    private $active_menu;
    private $active_submenu;
    private $heading;
    private $page;
    private $CI;
    private $extra_data = array();

    public function __construct() {
        $this->CI = &get_instance();
    }

    public function show($data = array()) {
        $view_data = array_merge($data,$this->extra_data);
        $this->CI->load->view('template/template', $view_data);
    }

    public function set_active_menu($menu_name) {
        $this->active_menu = $menu_name;
        return $this;
    }

    public function get_active_menu() {
        return $this->active_menu;
    }

    public function set_active_submenu($menu_name) {
        $this->active_submenu = $menu_name;
        return $this;
    }

    public function get_active_submenu() {
        return $this->active_submenu;
    }

    public function set_heading($heading) {
        $this->heading = $heading;
        return $this;
    }

    public function get_heading() {
        return $this->heading;
    }

    public function set_page($page) {
        $this->page = $page;
        return $this;
    }

    public function get_page() {
        return $this->page;
    }
    
    public function set_extra_data($data){
        $this->extra_data = $data;
    }
    

}
