<?php defined('BASEPATH') or die('Restricted direct access');

class Template{
    private $active_menu ;
    private $heading;
    private $page;
    public function __construct(){
        $this->ci = &get_instance();
    }
    public function show($data=array()){
    	$this->ci->load->view('template/template',$data);
    }
    public function set_active_menu($menu_name){
        $this->active_menu = $menu_name;
        return $this;
    }
    public function get_active_menu(){
        return $this->active_menu;
    }
    public function set_heading($heading){
    	$this->heading = $heading;
    	return $this;
    }
    public function get_heading(){
    	return $this->heading;
    }
    public function set_page($page){
    	$this->page = $page;
    	return $this;
    }
    public function get_page(){
    	return $this->page;
    }
}

