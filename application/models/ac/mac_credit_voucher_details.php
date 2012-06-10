<?php

class MAc_credit_voucher_details extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('ac_credit_voucher_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_by_voucher_no($voucher_no) {
    $data = array();
    $this->db->where('voucher_no', $voucher_no);
    $q = $this->db->get('ac_credit_voucher_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $chart = MAc_charts::get_by_id($row['chart_id']);
        $row['chart_name'] = $chart['name'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_all() {
    $data = array();
    $q = $this->db->get('ac_credit_voucher_details');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $cr_chart = MAc_charts::get_by_id($row['cr_chart_id']);
        $dr_chart = MAc_charts::get_by_id($row['dr_chart_id']);
        $row['cr_chart_name'] = $cr_chart['name'];
        $row['dr_chart_name'] = $dr_chart['name'];
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function create() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'voucher_no' => $this->input->post('voucher_no'),
        'chart_id' => $this->input->post('chart_id'),
        'debit' => $this->input->post('debit'),
        'credit' => $this->input->post('credit'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('ac_credit_voucher_details', $data);
  }

  function update() {
    $chart_acc = MAc_charts::get_by_id($this->input->post('ac_chart_id'));
    
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'voucher_no' => $this->input->post('voucher_no'),
        'voucher_date' => $this->input->post('voucher_date'),
        'ac_chart_id' => $this->input->post('ac_chart_id'),
        'emp_id' => $this->input->post('emp_id'),
        'memo' => $this->input->post('memo'),
        'amount' => $this->input->post('amount'),
        'type' => $chart_acc['type']
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('ac_credit_voucher_details', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('ac_credit_voucher_details');
  }

}
