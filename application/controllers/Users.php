<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['User_model', 'Helpdesk_model']);
    $this->load->library('form_validation');
  }
  public function index()
  {
    // $data['row'] = $this->User_model->get();
    $name = $this->fungsi->user_login()->username;
    $data['row'] = $this->Helpdesk_model->getDash($name)->result();
    $this->template->load('templates/template', 'Users/index', $data);
  }

  function users()
  {
    $name = $this->fungsi->user_login()->username;
    $data['row'] = $this->Helpdesk_model->getDash($name)->result();
    $this->template->load('templates/template', 'users/list', $data);
  }

  function forgot()
  {
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[6]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/auth_header');
      $this->load->view('auth/forgot');
      $this->load->view('templates/auth_footer');
    } else {
      $post = $this->input->post(null, TRUE);
      $this->User_model->forgot($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Password Changed')</script>";
      }
      echo "<script>window.location='" . site_url('Users') . "'</script>";
    }
  }
}