<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-user"></i> Profile</h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dashboard/users'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?= base_url('./uploads/user/' . $this->fungsi->user_login()->image); ?>" alt="User profile picture">

          <h3 class="profile-username text-center"><?= $this->fungsi->user_login()->username; ?></h3>

          <p class="text-muted text-center"><?= $this->fungsi->user_login()->divisi; ?></p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Email</b> <a class="pull-right"><?= $this->fungsi->user_login()->email; ?></a>
            </li>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
          <li><a href="#profile" data-toggle="tab">Profile</a></li>
          <li><a href="#settings" data-toggle="tab">Change Password</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            <div class="post">
              <div class="user-block">
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
              <!-- /.user-block -->
            </div>
            <!-- /.post -->
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="profile">
            <table class="table table-bordered table-striped">
              <tr>
                <th>Name</th>
                <td><?= $this->fungsi->user_login()->username; ?></td>
              </tr>
              <tr>
                <th>Department</th>
                <td><?= $this->fungsi->user_login()->divisi; ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?= $this->fungsi->user_login()->email; ?></td>
              </tr>
              <tr>
                <th>Locations</th>
                <td><?= $this->fungsi->user_login()->lokasi; ?></td>
              </tr>
              <tr>
                <th>Date Created</th>
                <td><?= $this->fungsi->user_login()->date_created; ?></td>
              </tr>
              <tr>
                <th>Status User</th>
                <td>
                  <?php
                  $check = $this->fungsi->user_login()->actived;
                    if ($check == 1) {
                    echo "Active";
                    }
                  ?>
                </td>
              </tr>
            </table>
          </div>

          <div class="tab-pane" id="settings">
            <form class="form-horizontal" action="<?= base_url('Users/forgot') ?>" method="post">
              <div class="form-group has-feedback">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="username" value="<?= $this->fungsi->user_login()->username; ?>" readonly>
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password" placeholder="Old Password" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
              </div>
              <div class="form-group has-feedback">
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password1" placeholder="New Password" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password2" placeholder="Re-password" required>
                  <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-7">
                  <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Update</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->