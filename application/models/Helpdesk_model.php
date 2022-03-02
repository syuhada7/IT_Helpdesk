<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helpdesk_model extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('helpdesk');
    $this->db->order_by('id_help', 'DESC');
    if ($id != null) {
      $this->db->where('id_help', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getView($id = null)
  {
    $this->db->from('helpdesk');
    if ($id != null) {
      $this->db->where('id_help', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getDone()
  {
    $this->db->from('helpdesk');
    $this->db->order_by('no_tiket', 'desc');
    $this->db->where('status', 'Close');
    $query = $this->db->get();
    return $query;
  }

  public function getProgress()
  {
    $this->db->from('helpdesk');
    $this->db->order_by('no_tiket', 'desc');
    $this->db->where('status', 'IN PROGRESS');
    $query = $this->db->get();
    return $query;
  }

  public function getOpen()
  {
    $this->db->from('helpdesk');
    $this->db->order_by('no_tiket', 'desc');
    $this->db->where('status', 'OPEN');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'no_tiket'    => $post['no_tiket'],
      'nama_user'   => $post['nama_user'],
      'lokasi'      => $post['lokasi'],
      'depart'      => $post['depart'],
      'jenis'       => $post['request'],
      'deskrip1'    => $post['deskrip1'],
      'status'      => 'IN PROGRESS',
      'username'    => $post['username']
    ];
    $this->db->insert('helpdesk', $params);
  }

  public function edit($post)
  {
    $params = [
      'no_tiket'    => $post['no_tiket'],
      'nama_user'   => $post['nama_user'],
      'lokasi'      => $post['lokasi'],
      'depart'      => $post['depart'],
      'jenis'       => $post['request'],
      'deskrip1'    => $post['deskrip1'],
      'deskrip2'    => $post['deskrip2'],
      'status'      => 'Close',
      'username'    => $post['username'],
      'updated'     => $post['updated']
    ];
    $this->db->where('id_help', $post['id_help']);
    $this->db->update('helpdesk', $params);
  }

  public function belum($post)
  {
    $params = [
      'no_tiket'    => $post['no_tiket'],
      'nama_user'   => $post['nama_user'],
      'lokasi'      => $post['lokasi'],
      'depart'      => $post['depart'],
      'jenis'       => $post['request'],
      'deskrip1'    => $post['deskrip1'],
      'deskrip2'    => $post['deskrip2'],
      'status'      => 'OPEN',
      'username'    => $post['username'],
      'updated'     => $post['updated']
    ];
    $this->db->where('id_help', $post['id_help']);
    $this->db->update('helpdesk', $params);
  }

  public function delete($where)
  {
    $this->db->where($where);
    $this->db->delete('helpdesk');
  }

  public function tiket()
  {
    $sql = "SELECT MAX(MID(no_tiket,9,4)) as no_tiket
            FROM helpdesk
            WHERE MID(no_tiket,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $n = ((int)$row->no_tiket) + 1;
      $no = sprintf("%'.04d", $n);
    } else {
      $no = "0001";
    }
    $no_tiket = "IT" . date('ymd') . $no;
    return $no_tiket;
  }
}
