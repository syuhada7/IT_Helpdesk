<?php
class Fungsi
{
  protected $ci;

  function __construct()
  {
    $this->ci = &get_instance();
  }

  function user_login()
  {
    $this->ci->load->model('User_model');
    $user_id = $this->ci->session->userdata('id_user');
    $user_data = $this->ci->User_model->get($user_id)->row();
    return $user_data;
  }

  public function count_user()
  {
    $this->ci->load->model('User_model');
    return $this->ci->User_model->get()->num_rows();
  }

  public function count_done()
  {
    $this->ci->load->model('Helpdesk_model');
    return $this->ci->Helpdesk_model->getDone()->num_rows();
  }

  public function count_progress()
  {
    $this->ci->load->model('Helpdesk_model');
    return $this->ci->Helpdesk_model->getProgress()->num_rows();
  }

  public function count_open()
  {
    $this->ci->load->model('Helpdesk_model');
    return $this->ci->Helpdesk_model->getOpen()->num_rows();
  }
}
