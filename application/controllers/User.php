<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    check_admin();
    $this->load->model('User_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['depart'] = $this->db->get('departemen')->result();
    $data['lokasi'] = $this->db->get('lokasi')->result();
    $data['row'] = $this->User_model->get();
    $this->template->load('templates/template', 'User/data_user', $data);
  }

  public function add()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This Email has available!!']);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'password dont match!!', 'min_length' => 'Password too short!']);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    $this->form_validation->set_rules('divisi', 'Divisi', 'trim|required');
    $this->form_validation->set_rules('lokasi', 'Locations', 'trim|required');
    $this->form_validation->set_rules('level', 'Level', 'trim|required');

    if ($this->form_validation->run() == false) {
      $this->template->load('templates/template', 'User');
    } else {
      $post = $this->input->post(null, TRUE);
      $this->User_model->add($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Success Save');
      }
      redirect('User');
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|callback_username_check');
    $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
    if ($this->input->post('password1')) {
      $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]|matches[password2]', ['matches' => 'password dont match!!', 'min_length' => 'Password too short!']);
      $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');
    }
    if ($this->input->post('password2')) {
      $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');
    }
    $this->form_validation->set_rules('divisi', 'Divisi', 'trim|required');
    $this->form_validation->set_rules('level', 'Level', 'trim|required');

    if ($this->form_validation->run() == false) {
      $query = $this->User_model->get($id);
      if ($query->num_rows() > 0) {
        $data['row'] = $query->row();
        $this->template->load('templates/template', 'User/edit_user', $data);
      } else {
        echo "<script>alert('Data not found !!') window.location='" . site_url('User') . "'</script>";
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $this->User_model->edit($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Success Save');
      }
      redirect('User');
    }
  }

  function username_check()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('username_check', '{field} this username has been avail');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function delete($id)
  {
    $where = array('id_user' => $id);
    $this->User_model->delete($where, 'username');
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data Success Delete');
    }
    redirect('User');
  }
}
