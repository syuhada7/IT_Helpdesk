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
}
