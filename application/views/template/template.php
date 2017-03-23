<?php
$this->load->view('template/header');
$this->load->view('template/sidebar');
$this->load->view('template/toolbar');
$this->load->view($this->template->get_page());
$this->load->view('template/footer');