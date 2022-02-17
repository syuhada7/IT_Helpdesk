<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PBN | IT Helpdesk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/square/blue.css">
  <!-- Icon Title -->
  <link rel="shortcut icon" href="<?= base_url() ?>uploads/logo/logo.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body id="hold-transition skin-green sidebar-mini">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <div class="container-fluid">
      <div class="box-header">
        <table class="table">
          <tr>
            <td class="text-center">
              <img src="<?= base_url() ?>uploads/logo/logo.png" width="100px">
              <h3><?= $subtitle ?></h3>
              <h4> -- <?= $title ?> -- </h4>
              <h4> -- <?= $judul ?> -- </h4>
            </td>
          </tr>
        </table>
      </div>
      <hr>
      <table class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th>No.</th>
            <th>No Ticket</th>
            <th>User</th>
            <th>Locations</th>
            <th>Department</th>
            <th>Descriptions</th>
            <th>Date Created</th>
            <th>Solved by</th>
            <th>What do ?</th>
            <th>Date Closed</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($datafilter as $key) : ?>
            <tr class="text-center">
              <td><?= $no++; ?></td>
              <td><?= $key->no_tiket ?></td>
              <td><?= $key->nama_user ?></td>
              <td><?= $key->lokasi ?></td>
              <td><?= $key->depart ?></td>
              <td><?= $key->deskrip1 ?></td>
              <td><?= $key->created ?></td>
              <td><?= $key->username ?></td>
              <td><?= $key->deskrip2 ?></td>
              <td><?= $key->updated ?></td>
            <?php endforeach; ?>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
  <!-- JQuery Print -->
  <Script type="text/javascript">
    window.print();
  </Script>
</body>

</html>