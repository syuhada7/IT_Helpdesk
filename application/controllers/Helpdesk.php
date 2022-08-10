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

  public function users()
  {
    $name = $this->fungsi->user_login()->username;
    $data['row'] = $this->Helpdesk_model->getDash($name)->result();
    $this->template->load('templates/template', 'users/index', $data);
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

    $data = array(
      'page'  => 'add',
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
      //kirim status ke telegram
      $this->telegram_progress($post);
      //kirim status ke e-mail
      //$this->send_email($post);
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
      $this->telegram_add($post);
      //kirim status ke e-mail
      //$this->send_email($post);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Success Save');
      }
      redirect('Helpdesk');
    } else if (isset($_POST['update'])) {
      $this->Helpdesk_model->edit($post);
      //kirim status ke telegram
      $this->telegram_close($post);
      //kirim status ke e-mail
      //$this->send_email($post);

      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Success Save');
      }
      redirect('Helpdesk/team');
    } else if (isset($_POST['open'])) {
      $this->Helpdesk_model->belum($post);
      //kirim status ke telegram
      $this->telegram_open($post);
      //kirim status ke e-mail
      //$this->send_email($post);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data Success Save');
      }
      redirect('Helpdesk/team');
    }
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

  public function view_users($id)
  {
    $data['detail'] = $this->Helpdesk_model->getView($id);
    $this->template->load('templates/template', 'users/view', $data);
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

  public function telegram_add($post)
  {
    $key_bot = '5585485836:AAEHd3wA0-RmI3es3BTzLI6gxMTBJjFa6w8';
    $no_tiket = $post['no_tiket'];
    $pelapor = $post['nama_user'];
    $divisi = $post['depart'];
    $lokasi = $post['lokasi'];
    $jenis = $post['request'];
    $desc = $post['deskrip1'];
    $status = "OPEN";

    $msg =  "[" . date('D, j M Y H:i:s') . "] " . PHP_EOL . "Hallo Tim IT Helpdesk, berikut rincian trouble ticket dari user :" . PHP_EOL . "No. Tiket : " . $no_tiket . PHP_EOL . "User : " . $pelapor . PHP_EOL . "Departement : " . $divisi . PHP_EOL . "Lokasi : " . $lokasi . PHP_EOL . "Type :" . $jenis . PHP_EOL . "Deskripsi : " . $desc . PHP_EOL . "Status : " . $status . PHP_EOL . "Mohon segera di follow up yah.";

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

  public function telegram_progress($post)
  {
    $key_bot = '5585485836:AAEHd3wA0-RmI3es3BTzLI6gxMTBJjFa6w8';
    $no_tiket = $post['no_tiket'];
    $pelapor = $post['nama_user'];
    $divisi = $post['depart'];
    $lokasi = $post['lokasi'];
    $waktu = $post['created'];
    $jenis = $post['request'];
    $desc = $post['deskrip1'];
    $teknisi = $post['username'];
    $status = "IN PROGRESS";

    $msg =  "[" . date('D, j M Y H:i:s') . "] " . PHP_EOL . "Hallo Tim IT, System menginformasikan terkait laporan user : " . PHP_EOL . "No. Tiket : " . $no_tiket . PHP_EOL . "User : " . $pelapor . PHP_EOL . "Departement : " . $divisi . PHP_EOL . "Lokasi : " . $lokasi . PHP_EOL . "Type :" . $jenis . PHP_EOL . "Waktu Lapor : " . $waktu . PHP_EOL . "Deskripsi : " . $desc . PHP_EOL . "Teknisi : " . $teknisi . PHP_EOL . "Status : " . $status . PHP_EOL . "Terimakasih.";

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

  public function telegram_open($post)
  {
    $key_bot = '5585485836:AAEHd3wA0-RmI3es3BTzLI6gxMTBJjFa6w8';
    $no_tiket = $post['no_tiket'];
    $pelapor = $post['nama_user'];
    $divisi = $post['depart'];
    $lokasi = $post['lokasi'];
    $jenis = $post['request'];
    $waktu1 = $post['created'];
    $waktu2 = $post['updated'];
    $desc = $post['deskrip1'];
    $desc2 = $post['deskrip2'];
    $teknisi = $post['username'];
    $status = "PENDING";

    $msg =  "[" . date('D, j M Y H:i:s') . "] " . PHP_EOL . "Hallo Tim IT, System akan menginformasikan terkait laporan user : " . PHP_EOL . "No. Tiket : " . $no_tiket . PHP_EOL . "User : " . $pelapor . PHP_EOL . "Departement : " . $divisi . PHP_EOL . "Lokasi : " . $lokasi . PHP_EOL . "Type :" . $jenis . PHP_EOL . "Waktu Lapor : " . $waktu1 . PHP_EOL . "Deskripsi : " . $desc . PHP_EOL . "Teknisi : " . $teknisi . PHP_EOL . "Waktu Pengerjaan : " . $waktu2 . PHP_EOL . "Status : " . $status . PHP_EOL . "Terpending Di Karenakan : " . $desc2 . PHP_EOL . "Terimakasih.";

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

  public function telegram_close($post)
  {
    $key_bot = '5585485836:AAEHd3wA0-RmI3es3BTzLI6gxMTBJjFa6w8';
    $no_tiket = $post['no_tiket'];
    $pelapor = $post['nama_user'];
    $divisi = $post['depart'];
    $lokasi = $post['lokasi'];
    $jenis = $post['request'];
    $waktu1 = $post['created'];
    $waktu2 = $post['updated'];
    $waktu3 = $post['opened'];
    $desc = $post['deskrip1'];
    $desc2 = $post['deskrip2'];
    $desc3 = $post['deskrip3'];
    $teknisi = $post['username'];
    $status = "Close";

    $msg =  "[" . date('D, j M Y H:i:s') . "] " . PHP_EOL . "Hallo Tim IT, System ingin Menginformasikan terkait laporan user : " . PHP_EOL . "No. Tiket : " . $no_tiket . PHP_EOL . "User : " . $pelapor . PHP_EOL . "Departement : " . $divisi . PHP_EOL . "Lokasi : " . $lokasi . PHP_EOL . "Type :" . $jenis . PHP_EOL . "Waktu Lapor : " . $waktu1 . PHP_EOL . "Deskripsi : " . $desc . PHP_EOL . "Teknisi : " . $teknisi . PHP_EOL . "Waktu Pengerjaan : " . $waktu2 . PHP_EOL . "Terpending Di Karenakan : " . $desc2 . PHP_EOL . "Pada tanggal : " . $waktu3 . PHP_EOL . "Status : " . $status . PHP_EOL . "Dengan rincian yang dikerjakan : " . $desc3 . PHP_EOL . "Terimakasih.";

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
