<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-child"></i> IT Helpdesk</h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dashboard/users'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
        <a href="<?= base_url('helpdesk/add_users'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <th>No Ticket</th>
          <th>Descriptions</th>
          <th>Date Create</th>
          <th>Status</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row as $data) : ?>
            <tr>
              <td><?= $data->no_tiket ?></td>
              <td><?= $data->deskrip1 ?></td>
              <td><?= $data->created ?></td>
              <td><?= $data->status ?></td>
              <td class="text-center" width="160">
                <?= anchor('helpdesk/view_users/' . $data->id_help, '<button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i> View</button>'); ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->