<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
  // Filter Grup Lokasi
  function filter1($lokasi)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter6($lokasi, $status)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND status = '$status' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter7($lokasi, $depart)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND depart = '$depart' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter8($lokasi, $jenis)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND jenis = '$jenis' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter9($lokasi, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter10($lokasi, $depart, $status)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND depart = '$depart' AND status = '$status' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter11($lokasi, $depart, $jenis)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND depart = '$depart' AND jenis = '$jenis' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter13($lokasi, $status, $jenis)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND status = '$status' AND jenis = '$jenis' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter12($lokasi, $depart, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND depart = '$depart' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter14($lokasi, $status, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND status = '$status' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter15($lokasi, $jenis, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND jenis = '$jenis' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter16($lokasi, $depart, $status, $jenis)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND depart = '$depart' AND status = '$status' AND jenis = '$jenis' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter17($lokasi, $depart, $status, $jenis, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND depart = '$depart' AND status = '$status' AND jenis = '$jenis' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter30($lokasi, $user)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND username = '$user' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter31($lokasi, $depart, $user)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND depart = '$depart' AND username = '$user' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter32($lokasi, $status, $user)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND status = '$status' AND username = '$user' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter33($lokasi, $jenis, $user)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND jenis = '$jenis' AND username = '$user' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter34($lokasi, $user, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND username = '$user' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter35($lokasi, $depart, $status, $jenis, $user, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE lokasi = '$lokasi' AND depart = '$depart' AND status = '$status' AND jenis = '$jenis' AND username='$user' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  // Filter Grup Department
  function filter2($depart)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE depart = '$depart' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter18($depart, $status)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE depart = '$depart' AND status = '$status' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter19($depart, $jenis)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE depart = '$depart' AND jenis = '$jenis' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter20($depart, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE depart = '$depart' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter21($depart, $status, $jenis)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE depart = '$depart' AND status = '$status' AND jenis = '$jenis' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter22($depart, $status, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE depart = '$depart' AND status = '$status' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter23($depart, $jenis, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE depart = '$depart' AND jenis = '$jenis' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter24($depart, $status, $jenis, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE depart = '$depart' AND status = '$status' AND jenis = '$jenis' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  // Filter Grup Status
  function filter3($status)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE status = '$status' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter25($status, $jenis)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE status = '$status' AND jenis = '$jenis' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter26($status, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE status = '$status' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter27($status, $jenis, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE status = '$status' AND jenis = '$jenis' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  // Filter Grup Type
  function filter4($jenis)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE jenis = '$jenis' ORDER BY id_help ASC");
    return $query->result();
  }

  function filter28($jenis, $created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE jenis = '$jenis' AND created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  // Fiter Rentang waktu
  function filter5($created, $updated)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE created BETWEEN '$created' AND '$updated' ORDER BY id_help ASC");
    return $query->result();
  }

  // Filter username IT
  function filter29($user)
  {
    $query = $this->db->query("SELECT * FROM helpdesk WHERE username = '$user' ORDER BY id_help ASC");
    return $query->result();
  }
}
