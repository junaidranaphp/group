<?php

defined('BASEPATH') or die('Restricted direct access');

class Template {

    private $active_menu;
    private $active_submenu;
    private $heading;
    private $page;
    private $CI;
    private $extra_data = array();
    private $css_files = array();
    private $js_files = array();
    private $widget_file;
    private $widget_active;

    public function __construct() {
        $this->CI = &get_instance();
    }

    public function show($data = array()) {
        $view_data = array_merge($data, $this->extra_data);
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

    public function set_extra_data($data) {
        $this->extra_data = $data;
    }

    public function get_css_files() {
        return $this->css_files;
    }

    public function set_css_file($file) {
        $this->css_files[] = $file;
        return $this;
    }

    public function get_js_files() {
        return $this->js_files;
    }

    public function set_js_file($file) {
        $this->js_files[] = $file;
        return $this;
    }

    public function set_widget_file($widget_file, $active = null) {
        $this->widget_file = $widget_file;
        $this->widget_active = $active;
        return $this;
    }

    public function get_widget_file() {
        return $this->widget_file;
    }

    public function get_widget_active() {
        return $this->widget_active;
    }
}
