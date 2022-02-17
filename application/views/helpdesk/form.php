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
      <i class="fa fa-edit"></i>
      <h3 class="box-title"><?= ucfirst($page) ?> Helpdesk Form</h3>
      <div class="pull-right">
        <a href="<?= site_url('Helpdesk'); ?>" class="btn btn-warning">
          <i class="fa fa-arrow-left"></i> Back
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-lg">
          <form action="<?= base_url('helpdesk/process') ?>" method="POST">
            <div class="form-group row">
              <div class="col-lg-4">
                <label>No Ticket</label>
                <input type="hidden" name="id_help" value="<?= $row->id_help ?>" class="form-control">
                <input type="hidden" name="username" value="<?= $this->fungsi->user_login()->username; ?>" class="form-control">
                <input type="text" name="no_tiket" value="<?= $tiket ?>" class="form-control" readonly>
              </div>
              <div class="col-lg-4">
                <label>Locations *</label>
                <select name="lokasi" class="form-control">
                  <option>--</option>
                  <?php foreach ($lokasi as $lok) : ?>
                    <option value="<?= $lok->lokasi ?>"><?= $lok->lokasi ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-lg-4">
                <label>User *</label>
                <input type="text" name="nama_user" class="form-control" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
                <label>Departement</label>
                <select name="depart" class="form-control">
                  <option>--</option>
                  <?php foreach ($depart as $dep) : ?>
                    <option value="<?= $dep->nama_depart ?>"><?= $dep->nama_depart ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-lg-4">
                <label>Type *</label>
                <select name="request" class="form-control">
                  <option>--</option>
                  <option value="Request">Requestion</option>
                  <option value="Problem">Problem</option>
                </select>
              </div>
              <div class="col-lg-4">
                <label>Descriptions *</label>
                <textarea name="deskrip1" class="form-control" cols="2" rows="2" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success" name="<?= $page ?>"><i class="fa fa-paper-plane"></i> Save</button>
              <button type="reset" class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>
<!-- /.content -->