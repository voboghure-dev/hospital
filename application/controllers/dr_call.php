<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Dr_call extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['title'] = 'Welcome to Hospital Management System';
    $data['menu'] = 'dr_call';
    $data['content'] = 'admin/dr_call/item_list';
    $data['items'] = $this->MItems->get_all_with_category();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

}