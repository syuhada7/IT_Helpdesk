<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('User_model');
    $this->load->library('form_validation');
  }
  public function index()
  {
    // $data['row'] = $this->User_model->get();
    $this->template->load('templates/template', 'Users/index');
  }
}
