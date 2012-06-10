<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Pharmacy_setup extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  /* -------------- Pharmacy Item Start ------------------------ */

  function index() {
    $data['title'] = 'Welcome to Hospital Management System';
    $data['menu'] = 'pharmacy';
    $data['content'] = 'admin/pharmacy/item_list';
    $data['items'] = $this->MItems->get_all_with_category();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function add() {
    if ($this->input->post('name')) {
      $this->MItems->create();
      $this->session->set_flashdata('message', 'Item created');
      redirect('item', 'refresh');
    } else {
      $data['from'] = 'pharmacy';
      $data['categories'] = $this->MCategories->get_all();
      $this->load->vars($data);
      $this->load->view('admin/item_entry');
    }
  }

  function edit($id=0) {
    if ($this->input->post('name')) {
      $this->MItems->update();
      $this->session->set_flashdata('message', 'Item updated.');
      redirect('item', 'refresh');
    } else {
      $data['item'] = $this->MItems->get_by_id($id);
      $data['categories'] = $this->MCategories->get_all();
      $this->load->vars($data);
      $this->load->view('admin/item_edit');
    }
  }

  function delete($id) {
    $this->MItems->delete($id);
    redirect('pharmacy_setup', 'refresh');
  }

  /* -------------- Pharmacy Item End ------------------------ */

  /* -------------- Pharmacy Category Start ------------------ */

  function category_list() {
    $data['title'] = 'Welcome to Hospital Management System';
    $data['menu'] = 'pharmacy';
    $data['content'] = 'admin/pharmacy/category_list';
    $data['categories'] = $this->MCategories->get_all_with_parent();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function category_add() {
    if ($this->input->post('name')) {
      $this->MCategories->create();
      $this->session->set_flashdata('message', 'Category created');
      redirect('category', 'refresh');
    } else {
      redirect('category', 'refresh');
    }
  }

  function category_edit($id=0) {
    if ($this->input->post('name')) {
      $this->MCategories->update();
      $this->session->set_flashdata('message', 'Category updated.');
      redirect('category', 'refresh');
    } else {
      $data['category'] = $this->MCategories->get_by_id($id);
      $data['categories'] = $this->MCategories->get_top();
      $this->load->vars($data);
      $this->load->view('admin/category_edit');
    }
  }

  function category_delete($id) {
    $this->MCategories->delete($id);
    redirect('category', 'refresh');
  }

  /* -------------- Pharmacy Category End -------------------- */

  /* -------------- Pharmacy Customer Start ------------------ */

  function customer_list() {
    $data['title'] = 'Welcome to Hospital Management System';
    $data['menu'] = 'pharmacy';
    $data['content'] = 'admin/pharmacy/customer_list';
    $data['customers'] = $this->MCustomers->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function customer_add() {
    if ($this->input->post('first_name')) {
      $this->MCustomers->create();
      $this->session->set_flashdata('message', 'Customer created');
      redirect('customer', 'refresh');
    } else {
      $this->load->view('admin/customer_entry');
    }
  }

  function customer_edit($id=0) {
    if ($this->input->post('first_name')) {
      $this->MCustomers->update();
      $this->session->set_flashdata('message', 'Customer updated.');
      redirect('customer', 'refresh');
    } else {
      $data['customer'] = $this->MCustomers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/customer_edit');
    }
  }

  function customer_delete($id) {
    $this->MCustomers->delete($id);
    redirect('customer', 'refresh');
  }

  /* -------------- Pharmacy Customer End -------------------- */

  /* -------------- Pharmacy Supplier Start ------------------ */

  function supplier_list() {
    $data['title'] = 'Welcome to Hospital Management System';
    $data['menu'] = 'pharmacy';
    $data['content'] = 'admin/pharmacy/supplier_list';
    $data['suppliers'] = $this->MSuppliers->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function supplier_add() {
    if ($this->input->post('first_name')) {
      $this->MSuppliers->create();
      $this->session->set_flashdata('message', 'Supplier created');
      redirect('supplier', 'refresh');
    } else {
      $this->load->view('admin/supplier_entry');
    }
  }

  function supplier_edit($id=0) {
    if ($this->input->post('first_name')) {
      $this->MSuppliers->update();
      $this->session->set_flashdata('message', 'Supplier updated.');
      redirect('supplier', 'refresh');
    } else {
      $data['supplier'] = $this->MSuppliers->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/supplier_edit');
    }
  }

  function supplier_delete($id) {
    $this->MSuppliers->delete($id);
    redirect('supplier', 'refresh');
  }

  /* -------------- Pharmacy Supplier End -------------------- */

  /* -------------- Pharmacy Receive Start ------------------- */

  function receive_list() {
    $data['title'] = 'Welcome to Hospital Management System';
    $data['menu'] = 'pharmacy';
    $data['content'] = 'admin/pharmacy/receive_list';
    $data['receives'] = $this->MReceive_items->get_all();
    $this->load->vars($data);
    $this->load->view('admin/dashboard');
  }

  function receive_add() {
    if ($this->input->post('item_id')) {
      $item = $this->MItems->get_by_id($this->input->post('item_id'));
      $this->MReceive_items->create($item);
      redirect('receive', 'refresh');
    } else {
      $data['suppliers'] = $this->MSuppliers->get_all_dropdown();
      $data['categories'] = $this->MCategories->get_all();
      $data['items'] = $this->MItems->get_all_dropdown();
      $this->load->vars($data);
      $this->load->view('admin/receive_entry');
    }
  }

  function receive_edit($id=0) {
    if ($this->input->post('id')) {
      $this->MReceive_items->update();
      redirect('receive', 'refresh');
    } else {
      $data['suppliers'] = $this->MSuppliers->get_all_dropdown();
      $data['categories'] = $this->MCategories->get_all();
      $data['items'] = $this->MItems->get_all_dropdown();
      $data['receive'] = $this->MReceive_items->get_by_id($id);
      $this->load->vars($data);
      $this->load->view('admin/receive_edit');
    }
  }

  function receive_delete($id) {
    $this->MReceive_items->delete($id);
    redirect('receive', 'refresh');
  }

  /* -------------- Pharmacy Receive End --------------------- */
}