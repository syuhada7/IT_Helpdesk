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
    </div>
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <th>No Ticket</th>
          <th>User</th>
          <th>Departement</th>
          <th>Descriptions</th>
          <th>Date Create</th>
          <th>Status</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) : ?>
            <tr>
              <td><?= $data->no_tiket ?></td>
              <td><?= $data->nama_user ?></td>
              <td><?= $data->depart ?></td>
              <td><?= $data->deskrip1 ?></td>
              <td><?= $data->created ?></td>
              <td><?= $data->status ?></td>
              <td class="text-center" width="160">
                <form action="<?= base_url('helpdesk/kerja'); ?>" method="POST">
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
                    <input type="hidden" name="updated" <?= date_default_timezone_set("Asia/Jakarta"); ?> value="<?= date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="username" value="<?= $this->fungsi->user_login()->username; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <a href="<?= base_url('helpdesk/view_team/' . $data->id_help); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                    <?php $status = $data->status;
                    if ($status == "OPEN") {
                      echo "| <button type='submit' class='btn btn-warning btn-xs' name='kerja' data-toggle='tooltip' data-placement='top' title='In Progress'><i class='fa fa-car'></i></button>";
                      echo "<a href='edit/$data->id_help' class='btn btn-success btn-xs hidden' data-toggle='tooltip' data-placement='top' title='Update'><i class='fa fa-pencil'></i></a>";
                    } elseif ($status == "PENDING") {
                      echo "<a href='belum/$data->id_help' class='btn btn-danger btn-xs hidden' data-toggle='tooltip' data-placement='top' title='Open'><i class='fa fa-book'></i></a>";
                      echo "| <a href='edit/$data->id_help' class='btn btn-success btn-xs' data-toggle='tooltip' data-placement='top' title='Close'><i class='fa fa-pencil'></i></a>";
                    } elseif ($status == "IN PROGRESS") {
                      echo "| <a href='belum/$data->id_help' class='btn btn-danger btn-xs' data-toggle='tooltip' data-placement='top' title='Open'><i class='fa fa-book'></i></a> | ";
                      echo "<a href='edit/$data->id_help' class='btn btn-success btn-xs' data-toggle='tooltip' data-placement='top' title='Close'><i class='fa fa-pencil'></i></a>";
                    } ?>
                  </div>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->