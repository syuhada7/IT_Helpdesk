<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-child"></i> IT Helpdesk</h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">IT Helpdesk</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <i class="fa fa-list"></i>
      <h3 class="box-title">List Data</h3>
      <div class="pull-right">
        <a href="<?= base_url('Helpdesk/team'); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    </div>
    <table class="table table-bordered">
      <?php foreach ($detail->result() as $key => $data) : ?>
        <img src="<?= base_url('uploads/logo/logo.png') ?>" style="width:150px">
        <tr>
          <th>No Ticket</th>
          <td><?= $data->no_tiket ?></td>
        </tr>
        <tr>
          <th>User Name</th>
          <td><?= $data->nama_user ?></td>
        </tr>
        <tr>
          <th>Departement</th>
          <td><?= $data->depart ?></td>
        </tr>
        <tr>
          <th>Locations</th>
          <td><?= $data->lokasi ?></td>
        </tr>
        <tr>
          <th>Type</th>
          <td><?= $data->jenis ?></td>
        </tr>
        <tr>
          <th>Descriptions</th>
          <td><?= $data->deskrip1 ?></td>
        </tr>
        <tr>
          <th>Created</th>
          <td><?= $data->created ?></td>
        </tr>
        <tr>
          <th>What do ?</th>
          <td><?= $data->deskrip3 ?></td>
        </tr>
        <tr>
          <th>Status</th>
          <td><?= $data->status ?></td>
        </tr>
        <tr>
          <th>Update Date</th>
          <td><?= $data->updated ?></td>
        </tr>
        <tr>
          <th>Solved by</th>
          <td><?= $data->username ?></td>
        </tr>
        <tr>
          <th>Pending Date</th>
          <td><?= $data->opened ?></td>
        </tr>
        <tr>
          <th>Deskcription Pending</th>
          <td><?= $data->deskrip2 ?></td>
        </tr>
        <tr>
          <th>Close Date</th>
          <td><?= $data->closed ?></td>
        </tr>
        <tr>
          <th>Aproved by user</th>
          <td><?= $data->aproved ?></td>
        </tr>
    </table>
  <?php endforeach; ?>
  </div>
</section>
<!-- /.content -->