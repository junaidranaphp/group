<?php
$this->load->view('template/header');

//load sidebar depending on toolbar selection
switch ($this->template->get_active_menu()){
    case "settings":
        $this->load->view('template/sidebar');
        break;
    case "products":
        $this->load->view('includes/menu_left_products');
        break;
    case "clients":
        $this->load->view('includes/menu_left_clients');
        break;
    
}
$this->load->view('template/toolbar');
$this->load->view($this->template->get_page());
$this->load->view('template/footer');