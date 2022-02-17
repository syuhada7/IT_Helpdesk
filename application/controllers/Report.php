<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Report_model');
  }

  public function index()
  {
    $data['lokasi'] = $this->db->get('lokasi')->result();
    $data['depart'] = $this->db->get('departemen')->result();
    $data['user']   = $this->db->get('user')->result();
    $this->template->load('templates/template', 'filter/filter', $data);
  }

  function filter()
  {
    $lokasi     = $_POST['lokasi'];
    $depart     = $_POST['depart'];
    $jenis      = $_POST['jenis'];
    $status     = $_POST['status'];
    $created    = $_POST['created'];
    $updated    = $_POST['updated'];
    $user       = $_POST['username'];

    if (isset($_POST['btn-filter'])) {
      if ($lokasi && $depart == NULL && $status == NULL && $jenis == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . ' : ' . $lokasi;
        $data['datafilter'] = $this->Report_model->filter1($lokasi);
        $this->load->view('report/lokasi/report', $data);
      } elseif ($depart && $lokasi == NULL && $status == NULL && $jenis == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Department " . ' : ' . $depart;
        $data['datafilter'] = $this->Report_model->filter2($depart);
        $this->load->view('report/depart/report2', $data);
      } elseif ($status && $lokasi == NULL && $depart == NULL && $jenis == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Status " . ' : ' . $status;
        $data['datafilter'] = $this->Report_model->filter3($status);
        $this->load->view('report/status/report3', $data);
      } elseif ($jenis && $lokasi == NULL && $depart == NULL && $status == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Type " . ' : ' . $jenis;
        $data['datafilter'] = $this->Report_model->filter4($jenis);
        $this->load->view('report/report4', $data);
      } elseif ($created . $updated && $lokasi == NULL && $depart == NULL && $jenis == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter5($created, $updated);
        $this->load->view('report/report5', $data);
      } elseif ($lokasi . $status && $depart == NULL && $jenis == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Status " . " : " . $status;
        $data['datafilter'] = $this->Report_model->filter6($lokasi, $status);
        $this->load->view('report/lokasi/report6', $data);
      } elseif ($lokasi . $depart && $status == NULL && $jenis == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Department " . " : " . $depart;
        $data['datafilter'] = $this->Report_model->filter7($lokasi, $depart);
        $this->load->view('report/lokasi/report7', $data);
      } elseif ($lokasi . $jenis && $depart == NULL && $status == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Type " . " : " . $jenis;
        $data['datafilter'] = $this->Report_model->filter8($lokasi, $jenis);
        $this->load->view('report/lokasi/report8', $data);
      } elseif ($lokasi . $created . $updated && $depart == NULL && $status == NULL && $jenis == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter9($lokasi, $created, $updated);
        $this->load->view('report/lokasi/report9', $data);
      } elseif ($lokasi . $depart . $status && $jenis == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Department " . " : " . $depart . " / " . "Status " . " : " . $status;
        $data['datafilter'] = $this->Report_model->filter10($lokasi, $depart, $status);
        $this->load->view('report/lokasi/report10', $data);
      } elseif ($lokasi . $depart . $jenis && $status == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Department " . " : " . $depart . " / " . " Type " . " : " . $jenis;
        $data['datafilter'] = $this->Report_model->filter11($lokasi, $depart, $jenis);
        $this->load->view('report/lokasi/report11', $data);
      } elseif ($lokasi . $depart . $created . $updated && $jenis == NULL && $status == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Department " . " : " . $depart . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter12($lokasi . $depart . $created . $updated);
        $this->load->view('report/lokasi/report12', $data);
      } elseif ($lokasi . $status . $jenis && $depart == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Status " . " : " . $status . " / " . " Type " . " : " . $jenis;
        $data['datafilter'] = $this->Report_model->filter13($lokasi, $status, $jenis);
        $this->load->view('report/lokasi/report13', $data);
      } elseif ($lokasi . $status . $created . $updated && $depart == NULL && $jenis == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Status " . " : " . $status . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter14($lokasi, $status, $created, $updated);
        $this->load->view('report/lokasi/report14', $data);
      } elseif ($lokasi . $jenis . $created . $updated && $depart == NULL && $status == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Type " . " : " . $jenis . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter15($lokasi, $jenis, $created, $updated);
        $this->load->view('report/lokasi/report15', $data);
      } elseif ($lokasi . $depart . $status . $jenis && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Department " . " : " . $depart  . " / " . " Status " . " : " . $status . " / " . " Type " . " : " . $jenis;
        $data['datafilter'] = $this->Report_model->filter16($lokasi, $depart, $status, $jenis);
        $this->load->view('report/report16', $data);
      } elseif ($lokasi . $depart . $status . $jenis . $created . $updated && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Locations " . " : " . $lokasi . " / " . " Department " . " : " . $depart  . " / " . " Status " . " : " . $status . " / " . " Type " . " : " . $jenis . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter17($lokasi, $depart, $status, $jenis, $created, $updated);
        $this->load->view('report/lokasi/report17', $data);
      } elseif ($depart . $status && $lokasi == NULL && $jenis == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Department " . " : " . $depart  . " / " . " Status " . " : " . $status;
        $data['datafilter'] = $this->Report_model->filter18($depart, $status);
        $this->load->view('report/depart/report18', $data);
      } elseif ($depart . $jenis && $lokasi == NULL && $status == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Department " . " : " . $depart  . " / " . " Type " . " : " . $jenis;
        $data['datafilter'] = $this->Report_model->filter19($depart, $jenis);
        $this->load->view('report/depart/report19', $data);
      } elseif ($depart . $created . $updated && $lokasi == NULL && $status == NULL && $jenis == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Department " . " : " . $depart  . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter20($depart, $created, $updated);
        $this->load->view('report/depart/report20', $data);
      } elseif ($depart . $status . $jenis && $lokasi == NULL && $created == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Department " . " : " . $depart  . " / " . " Status " . " : " . $status . " / " . " Type " . " : " . $jenis;
        $data['datafilter'] = $this->Report_model->filter21($depart, $status, $jenis);
        $this->load->view('report/depart/report21', $data);
      } elseif ($depart . $status . $created . $updated && $lokasi == NULL && $jenis == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Department " . " : " . $depart  . " / " . " Status " . " : " . $status . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter22($depart, $status, $created, $updated);
        $this->load->view('report/depart/report22', $data);
      } elseif ($depart . $jenis . $created . $updated && $lokasi == NULL && $status == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Department " . " : " . $depart  . " / " . " Type " . " : " . $jenis . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter23($depart, $jenis, $created, $updated);
        $this->load->view('report/depart/report23', $data);
      } elseif ($depart . $status . $jenis . $created . $updated && $lokasi == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Department " . " : " . $depart  . " / " . " Status " . " : " . $status . " / " . " Type " . " : " . $jenis . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter24($depart, $status, $jenis, $created, $updated);
        $this->load->view('report/depart/report24', $data);
      } elseif ($status . $jenis && $lokasi == NULL && $depart == NULL && $created  == NULL && $updated == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Status " . " : " . $status . " / " . " Type " . " : " . $jenis;
        $data['datafilter'] = $this->Report_model->filter25($status, $jenis);
        $this->load->view('report/status/report25', $data);
      } elseif ($status . $created . $updated && $lokasi == NULL && $depart == NULL && $jenis == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Status " . " : " . $status . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter26($status, $created, $updated);
        $this->load->view('report/status/report26', $data);
      } elseif ($status . $jenis . $created . $updated && $lokasi == NULL && $depart == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Status " . " : " . $status . " / " . " Type " . " : " . $jenis . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter27($status, $jenis, $created, $updated);
        $this->load->view('report/status/report27', $data);
      } elseif ($jenis . $created . $updated && $lokasi == NULL && $depart == NULL && $status == NULL && $user == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Type " . " : " . $jenis . " / " . " Date " . " : " . $created . " / " . " Until Date " . " : " . $updated;
        $data['datafilter'] = $this->Report_model->filter28($jenis, $created, $updated);
        $this->load->view('report/type/report28', $data);
      } elseif ($user && $lokasi == NULL && $depart == NULL && $status == NULL && $jenis == NULL && $created == NULL && $updated == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Solved By " . ' : ' . $user;
        $data['datafilter'] = $this->Report_model->filter29($user);
        $this->load->view('report/user/report29', $data);
      } elseif ($lokasi . $user && $depart == NULL && $status == NULL && $jenis == NULL && $created == NULL && $updated == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Solved By " . ' : ' . $user . " / " . " Locations " . " : " . $lokasi;
        $data['datafilter'] = $this->Report_model->filter30($lokasi, $user);
        $this->load->view('report/lokasi/report30', $data);
      } elseif ($lokasi . $depart . $user && $status == NULL && $jenis == NULL && $created == NULL && $updated == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Solved By " . ' : ' . $user . " / " . " Locations " . " : " . $lokasi . " / " . " Department " . " : " . $depart;
        $data['datafilter'] = $this->Report_model->filter31($lokasi, $depart, $user);
        $this->load->view('report/lokasi/report31', $data);
      } elseif ($lokasi . $status . $user && $depart == NULL && $jenis == NULL && $created == NULL && $updated == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Solved By " . ' : ' . $user . " / " . " Locations " . " : " . $lokasi . " / " . " Status " . " : " . $status;
        $data['datafilter'] = $this->Report_model->filter32($lokasi, $status, $user);
        $this->load->view('report/lokasi/report32', $data);
      } elseif ($lokasi . $jenis . $user && $depart == NULL && $status == NULL && $created == NULL && $updated == NULL) {
        $data['title']      = "Report List Job IT Helpdesk";
        $data['subtitle']   = " PT. PAHALA BAHARI NUSANTARA ";
        $data['judul']      = " Solved By " . ' : ' . $user . " / " . " Locations " . " : " . $lokasi . " / " . " Type " . " : " . $jenis;
        $data['datafilter'] = $this->Report_model->filter33($lokasi, $jenis, $user);
        $this->load->view('report/lokasi/report33', $data);
      }
    }
  }
}
