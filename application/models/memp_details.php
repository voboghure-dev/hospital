<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MEmp_details extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $this->db->limit(1);
    $q = $this->db->get('emp_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_all() {
    $data = array();
    $this->db->order_by('id', 'ASC');
    $q = $this->db->get('emp_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_all_dropdown() {
    $q = $this->db->get('emp_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[$row['id']] = $row['name'];
      }
    } else {
      $data['0'] = 'No Employee Added';
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'name' => $this->input->post('name'),
        'dob' => $this->input->post('dob'),
        'join' => $this->input->post('join'),
        'address' => $this->input->post('address'),
        'level' => $this->input->post('level'),
        'area' => $this->input->post('area'),
        'edate' => date('Y-m-d')
    );
    $this->db->insert('emp_details', $data);
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'name' => $this->input->post('name'),
        'dob' => $this->input->post('dob'),
        'join' => $this->input->post('join'),
        'address' => $this->input->post('address'),
        'level' => $this->input->post('level'),
        'area' => $this->input->post('area'),
        'edate' => date('Y-m-d')
    );

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('emp_details', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('emp_details');
  }

}