<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helpdesk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Helpdesk_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['row'] = $this->Helpdesk_model->get();
    $this->template->load('templates/template', 'helpdesk/index', $data);
  }

  public function team()
  {
    $data['row'] = $this->Helpdesk_model->get();
    $this->template->load('templates/template', 'team/index', $data);
  }

  public function add()
  {
    $helpdesk = new stdClass();
    $helpdesk->id_help = null;
    $helpdesk->nama_user = null;
    $helpdesk->lokasi = null;
    $helpdesk->depart = null;
    $helpdesk->jenis = null;
    $helpdesk->deskrip1 = null;

    $lokasi = $this->db->get('lokasi')->result();
    $depart = $this->db->get('departemen')->result();
    $data = array(
      'page'  => 'add',
      'lokasi' => $lokasi,
      'depart' => $depart,
      'row'   => $helpdesk
    );
    $data['tiket'] = $this->Helpdesk_model->tiket();
    $this->template->load('templates/template', 'helpdesk/form', $data);
  }

  public function edit($id)
  {
    $query = $this->Helpdesk_model->get($id);
    if ($query->num_rows() > 0) {
      $helpdesk = $query->row();
      $data = array(
        'page' => 'update',
        'row' => $helpdesk
      );
      $this->template->load('templates/template', 'helpdesk/edit', $data);
    }
  }

  public function belum($id)
  {
    $query = $this->Helpdesk_model->get($id);
    if ($query->num_rows() > 0) {
      $helpdesk = $query->row();
      $data = array(
        'page' => 'open',
        'row' => $helpdesk
      );
    }
    $this->template->load('templates/template', 'helpdesk/open', $data);
  }

  public function kerja()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['kerja'])) {
      $this->Helpdesk_model->kerja($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data Success Save');
    }
    redirect('Helpdesk/team');
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['add'])) {
      $this->Helpdesk_model->add($post);
      //kirim status ke telegram
      $this->send_telegram($post);
      //kirim status ke e-mail
      //$this->send_email($post);
    } else if (isset($_POST['update'])) {
      $this->Helpdesk_model->edit($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Success Save');
      }
      redirect('Helpdesk/team');
    } else if (isset($_POST['open'])) {
      $this->Helpdesk_model->belum($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Success Save');
      }
      redirect('Helpdesk/team');
    }

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data Success Save');
    }
    redirect('Helpdesk');
  }

  public function view($id)
  {
    $data['detail'] = $this->Helpdesk_model->getView($id);
    $this->template->load('templates/template', 'helpdesk/view', $data);
  }

  public function view_team($id)
  {
    $data['detail'] = $this->Helpdesk_model->getView($id);
    $this->template->load('templates/template', 'team/view', $data);
  }

  public function delete($id)
  {
    $where = array('id_help' => $id);
    $this->Helpdesk_model->delete($where, 'id_help');
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data Success Delete');
    }
    redirect('Helpdesk');
  }

  public function send_telegram($post){
    $key_bot = '5585485836:AAEHd3wA0-RmI3es3BTzLI6gxMTBJjFa6w8';
    $no_tiket = $post['no_tiket'];
    $pelapor = $post['nama_user'];
    $desc = $post['deskrip1'];

    $msg =  "[" . date('D, j M Y H:i:s') . "] ".PHP_EOL."Hallo Tim IT Helpdesk, berikut rincian trouble ticket :".PHP_EOL."No. Tiket: ".$no_tiket.PHP_EOL."Pelapor: ".$pelapor.PHP_EOL."Deskripsi: ".$desc;

    try {
        $url = "https://api.telegram.org/bot" . $key_bot . "/sendMessage?chat_id=-537375994";
        $url = $url . "&text=" . urlencode($msg);
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
        );
        curl_setopt_array($ch, $optArray);
        curl_exec($ch);
        echo "<script>alert(ok);</script>";
    } catch (Exception $ex) {
        echo "<script>alert(error);</script>";
    }
  }
}
