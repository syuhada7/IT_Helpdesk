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
          <td><?= $data->deskrip2 ?></td>
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
          <th>Close Date</th>
          <td><?= $data->closed ?></td>
        </tr>
    </table>
    <form action="<?= base_url('helpdesk/kerja');?>" method="POST">
      <div class="form-group row">
        <input type="hidden" name="id_help" value="<?= $data->id_help ?>">
        <input type="hidden" name="no_tiket" value="<?= $data->no_tiket ?>">
        <input type="hidden" name="nama_user" value="<?= $data->nama_user ?>">
        <input type="hidden" name="depart" value="<?= $data->depart ?>">
        <input type="hidden" name="lokasi" value="<?= $data->lokasi ?>">
        <input type="hidden" name="request" value="<?= $data->jenis ?>">
        <input type="hidden" name="deskrip1" value="<?= $data->deskrip1 ?>">
        <input type="hidden" name="status" value="<?= $data->status ?>">
        <input type="hidden" name="created" value="<?= $data->created ?>">
        <input type="hidden" name="updated" class="form-control" <?= date_default_timezone_set("Asia/Jakarta"); ?> value="<?= date('Y-m-d H:i:s') ?>">
        <input type="hidden" name="username" value="<?= $this->fungsi->user_login()->username; ?>" class="form-control">
      </div>
      <div class="form-group">
        <?php $status = $data->status;
        if ($status == "IN PROGRESS") {
          echo "<button type='button' class='btn btn-warning' name='kerja' data-toggle='tooltip' data-placement='top' title='In Progress' disabled><i class='fa fa-car'></i></button>";
        } else if($status == "OPEN"){
          echo "<button type='submit' class='btn btn-warning' name='kerja' data-toggle='tooltip' data-placement='top' title='In Progress'><i class='fa fa-car'></i></button>";
        }?>
      </div>
    </form>
  <?php endforeach; ?>
  </div>
</section>
<!-- /.content -->