<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    check_already_login();
    $this->load->view('templates/auth_header');
    $this->load->view('auth/login');
    $this->load->view('templates/auth_footer');
  }

  public function logout()
  {
    $params = array('id_user', 'level');
    $this->session->unset_userdata($params);
    redirect('Auth');
  }

  public function login()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($post['btnlogin'])) {
      $query = $this->User_model->login($post);
      if ($query->num_rows() > 0) {
        $row = $query->row();
        $params = array(
          'id_user' => $row->id_user,
          'level'   => $row->level,
          'actived' => $row->actived
        );
        $this->session->set_userdata($params);
        if ($row->actived == 1) {
          if ($row->level == 1) {
            echo "<script>
          alert('Hore, Login Success');
          window.location='" . site_url('Dashboard') . "';
          </script>";
          } elseif ($row->level == 2) {
            echo "<script>
          alert('Hore, Login Success');
          window.location='" . site_url('Dashboard/team') . "';
          </script>";
          } elseif ($row->level == 3) {
            echo "<script>
        alert('Hore, Login Success');
        window.location='" . site_url('Dashboard') . "';
        </script>";
          } elseif ($row->level == 4) {
            echo "<script>
        alert('Hore, Login Success');
        window.location='" . site_url('Dashboard/users') . "';
        </script>";
          }
        } else {
          echo "<script>
          alert('Sorry, Your account not actived');
          window.location='" . site_url('Auth') . "';
          </script>";
        }
      } else {
        echo "<script>
        alert('Sorry, Please check your username / password');
        window.location='" . site_url('Auth') . "';
        </script>";
      }
    }
  }

  public function regis()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim');
    $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', ['is_unique' => 'This Email has available!!']);
    $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]|matches[password2]', ['matches' => 'password dont match!!', 'min_length' => 'Password too short!']);
    $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');
    $this->form_validation->set_rules('divisi', 'Divisi', 'trim');
    $this->form_validation->set_rules('lokasi', 'Locations', 'trim');

    if ($this->form_validation->run() == false) {
      $data['depart'] = $this->db->get('departemen')->result();
      $data['lokasi'] = $this->db->get('lokasi')->result();
      $this->load->view('templates/auth_header');
      $this->load->view('Auth/register', $data);
      $this->load->view('templates/auth_footer');
    } else {
      $post = $this->input->post(null, TRUE);
      $this->User_model->regis($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data success registered, Please confirm to Administrator')</script>";
      }
      echo "<script>window.location='" . site_url('Auth') . "'</script>";
    }
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
      echo "<script>window.location='" . site_url('Auth') . "'</script>";
    }
  }
}
