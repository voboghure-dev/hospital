<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Settings extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  /*--------------------- User Part Start ---------------------*/
  function index() {
    $data['title'] = 'Welcome to Hospital Management System';
    $data['menu'] = 'settings';
    $data['content'] = 'admin/settings/user_list';
    $data['users'] = $this->MUsers->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function user_add() {
    if ($this->input->post('email')) {
      $this->MUsers->create();
      $this->session->set_flashdata('message', 'User created');
      redirect('settings', 'refresh');
    } else {
      $data['title'] = 'Welcome to Hospital Management System';
      $data['menu'] = 'settings';
      $this->load->vars($data);
      $this->load->view('admin/settings/user_entry');
    }
  }

  function user_edit($id=0) {
    if ($this->input->post('email')) {
      $this->MUsers->update();
      $this->session->set_flashdata('message', 'User updated');
      redirect('settings', 'refresh');
    } else {
      $data['title'] = 'Welcome to Hospital Management System';
      $data['menu'] = 'settings';
      $data['user'] = $this->MUsers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/settings/user_edit');
    }
  }

  function user_delete($id) {
    $this->MUsers->delete($id);
    redirect('settings', 'refresh');
  }
  /*--------------------- User Part End -----------------------*/

}