<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function index()
  {
    check_not_login();
    $this->template->load('templates/template', 'dashboard');
  }

  public function team()
  {
    check_not_login();
    $this->template->load('templates/template', 'team/dashboard');
  }

  public function users()
  {
    check_not_login();
    $this->template->load('templates/template', 'users/dashboard');
  }
}
