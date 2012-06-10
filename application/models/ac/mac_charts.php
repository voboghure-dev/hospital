<?php

class MAc_charts extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function get_by_id($id) {
    $data = array();
    $this->db->where('id', $id);
    $q = $this->db->get('ac_charts');
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
    $this->db->order_by('parent_id','asc')->group_by('parent_id,id');
    $q = $this->db->get('ac_charts');
    if ($q->num_rows() > 0) {
      foreach ($q->result_array() as $row) {
        $data[] = $row;
      }
    }

    $q->free_result();
    return $data;
  }
  
  function get_coa_tree(){
    $select = array();
    $options = "";

    $this->db->where('parent_id', 0);
    $q = $this->db->get('ac_charts');
    foreach($q->result_array() as $row){
      //$options .= "<option value=\"{$row['id']}\"><b>{$row['name']}</b></option>\n";
      
      $options .= "<option value=" . $row['id'] . "><b>" . $row['name'] . " (" . $row['code'] . ")</b></option>\n";
      
      $this->db->where('parent_id', $row['id']);
      $first = $this->db->get('ac_charts');
      if($first->num_rows() > 0){
        foreach($first->result_array() as $frow){
          //$options .= "<option value=\"{$frow['id']}\"><b>&nbsp;&nbsp;--&nbsp;{$frow['name']}</b></option>\n";
          $options .= "<option value=" . $frow['id'] . "><b>&nbsp;&nbsp;--&nbsp;" . $frow['name'] . " (" . $frow['code'] . ")</b></option>\n";

          $this->db->where('parent_id', $frow['id']);
          $second = $this->db->get('ac_charts');
          if($second->num_rows() > 0){
            foreach($second->result_array() as $srow){
              //$options .= "<option value=\"{$srow['id']}\"><b>&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{$srow['name']}</b></option>\n";
              $options .= "<option value=" . $srow['id'] . "><b>&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;" . $srow['name'] . " (" . $srow['code'] .")</b></option>\n";
            }
          }
        }
      }
    }
    
    return $options;
  }
  
  function get_coa_list(){
    $select = array();
    $options = array();

    $this->db->where('parent_id', 0);
    $q = $this->db->get('ac_charts');
    foreach($q->result_array() as $row){
      $options[] = $row;
      
      $this->db->where('parent_id', $row['id']);
      $first = $this->db->get('ac_charts');
      if($first->num_rows() > 0){
        foreach($first->result_array() as $frow){
          $options[] = $frow;

          $this->db->where('parent_id', $frow['id']);
          $second = $this->db->get('ac_charts');
          if($second->num_rows() > 0){
            foreach($second->result_array() as $srow){
              $options[] = $srow;
            }
          }
        }
      }
    }
    
    return $options;
  }

  function create($type) {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'parent_id' => $this->input->post('parent_id'),
        'code' => $this->input->post('code'),
        'name' => $this->input->post('name'),
        'memo' => $this->input->post('memo'),
        'type' => $type,
        'edate' => date('Y-m-d H:i:s', time())
    );
    $this->db->insert('ac_charts', $data);
  }

  function update($type) {
    $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'parent_id' => $this->input->post('parent_id'),
        'code' => $this->input->post('code'),
        'name' => $this->input->post('name'),
        'memo' => $this->input->post('memo'),
        'type' => $type
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('ac_charts', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('ac_charts');
  }

}
