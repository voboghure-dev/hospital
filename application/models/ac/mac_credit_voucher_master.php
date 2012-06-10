<?php

class MAc_credit_voucher_master extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('ac_credit_voucher_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_voucher_number() {
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    $q = $this->db->get('ac_credit_voucher_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data = $row;
      }
      $number = (int) $data['voucher_no'] + 1;
    } else {
      $number = 1;
    }

    $q->free_result();
    return $number;
  }

  function get_all() {
    $data = array();
    $q = $this->db->get('ac_credit_voucher_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $details = MAc_credit_voucher_details::get_by_voucher_no($row['voucher_no']);
        $row['debit_amount'] = 0;
        $row['credit_amount'] = 0;
        foreach ($details as $key => $value) {
          $row['debit_amount'] += $value['debit'];
          $row['credit_amount'] += $value['credit'];
        }

        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }

  function get_voucher($type, $sdate, $edate) {
    $data = array();
    $this->db->where('type', $type);
    $edate = 'voucher_date BETWEEN "' . $sdate . '" AND "' . $edate . '"';
    $this->db->where($edate, NULL, FALSE);
    //$this->db->where('edate=>', $sdate);
    //$this->db->where('edate=<', $edate);
    $q = $this->db->get('ac_credit_voucher_master');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $chart_acc = MAc_charts::get_by_id($row['ac_chart_id']);
        $row['name_acc'] = $chart_acc['name'];
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
        'voucher_date' => $this->input->post('voucher_date'),
        'emp_id' => $this->input->post('emp_id'),
        'memo' => $this->input->post('memo'),
        'edate' => date('Y-m-d H:i:s', time())
    );
    
    $this->db->insert('ac_credit_voucher_master', $data);
  }

  function update() {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'voucher_no' => $this->input->post('voucher_no'),
        'voucher_date' => $this->input->post('voucher_date'),
        'emp_id' => $this->input->post('emp_id'),
        'memo' => $this->input->post('memo')
    );
    
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('ac_credit_voucher_master', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('ac_credit_voucher_master');
  }

}
