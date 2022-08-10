<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-users"></i> User Data</h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <i class="fa fa-list"></i>
      <h3 class="box-title">List Data</h3>
      <div class="pull-right">
        <button class="btn btn-primary" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i> Create</button>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <th>Username</th>
          <th>Email</th>
          <th>Divisi</th>
          <th>Level</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          foreach ($row->result() as $key => $data) : ?>
            <tr>
              <td><?= $data->username ?></td>
              <td><?= $data->email ?></td>
              <td><?= $data->divisi ?></td>
              <td><?= $data->level == 1 ? "Administrator" : "User" ?></td>
              <td class="text-center" width="160">
                <?= anchor('user/edit/' . $data->id_user, '<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Update</button>'); ?>
                <a href="<?= site_url('user/delete/' . $data->id_user); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure delete <?= $data->username ?> ?');"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->

<!-- Modal Input -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userModal">Input User</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('User/add'); ?>" method="POST">
          <div class="form-group row">
            <div class="col-lg-6 <?= form_error('username') ? 'has-error' : null ?>">
              <label>Username *</label>
              <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control">
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-lg-6 <?= form_error('email') ? 'has-error' : null ?>">
              <label>Email *</label>
              <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6 <?= form_error('password1') ? 'has-error' : null ?>">
              <label>Password *</label>
              <input type="password" name="password1" class="form-control">
              <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-lg-6 <?= form_error('password2') ? 'has-error' : null ?>">
              <label>Re-Password *</label>
              <input type="password" name="password2" class="form-control">
              <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4 <?= form_error('divisi') ? 'has-error' : null ?>">
              <label>Divisi *</label>
              <select name="divisi" class="form-control" required>
                <option>Department</option>
                <?php foreach ($depart as $dep) : ?>
                  <option value="<?= $dep->nama_depart ?>"><?= $dep->nama_depart ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-lg-4 <?= form_error('lokasi') ? 'has-error' : null ?>">
              <label>Locations *</label>
              <select name="lokasi" class="form-control" required>
                <option>Locations</option>
                <?php foreach ($lokasi as $lok) : ?>
                  <option value="<?= $lok->lokasi ?>"><?= $lok->lokasi ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-lg-4 <?= form_error('level') ? 'has-error' : null ?>">
              <label>Level *</label>
              <select name="level" class="form-control">
                <option>--</option>
                <option value="1">Administrator</option>
                <option value="2">Admin</option>
                <option value="3">Pimpinan</option>
                <option value="3">Users</option>
              </select>
              <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
            <button type="reset" class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>