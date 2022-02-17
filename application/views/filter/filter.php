<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-book"></i> Report Data</h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Report Data</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box-body">
    <div class="row">
      <div class="col-lg">
        <div class="panel panel-default">
          <div class="panel-heading">
            <Filter class="panel-title"><i class="fa fa-edit"></i> Filter Form : </h3>
          </div>
          <div class="panel-body">
            <form action="<?= base_url('report/filter'); ?>" method="POST" target="_blank" class="form-horizontal">
              <div class="form-group">
                <label for="lokasi" class="col-sm-2 control-label">Locations</label>
                <div class="col-sm-4">
                  <select id="lokasi" name="lokasi" class="form-control">
                    <option value="">--</option>
                    <?php foreach ($lokasi as $lok) : ?>
                      <option value="<?= $lok->lokasi; ?>"><?= $lok->lokasi; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <label for="depart" class="col-sm-2 control-label">Departement</label>
                <div class="col-sm-4">
                  <select id="depart" name="depart" class="form-control">
                    <option value="">--</option>
                    <?php foreach ($depart as $dep) : ?>
                      <option value="<?= $dep->nama_depart; ?>"><?= $dep->nama_depart; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-4">
                  <select id="status" name="status" class="form-control">
                    <option value="">--</option>
                    <option value="OPEN">OPEN</option>
                    <option value="IN PROGRESS">IN PROGRESS</option>
                    <option value="Close">CLOSE</option>
                  </select>
                </div>
                <label for="jenis" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-4">
                  <select id="jenis" name="jenis" class="form-control">
                    <option value="">--</option>
                    <option value="Request">Request</option>
                    <option value="Problem">Problem</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal1" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-4">
                  <input type="date" class="form-control" name="created" id="created">
                </div>
                <label for="tanggal2" class="col-sm-2 control-label">Until Date</label>
                <div class="col-sm-4">
                  <input type="date" class="form-control" name="updated" id="updated">
                </div>
              </div>
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Solved By</label>
                <div class="col-sm-4">
                  <select id="username" name="username" class="form-control">
                    <option value="">--</option>
                    <?php foreach ($user as $usr) : ?>
                      <option value="<?= $usr->username; ?>"><?= $usr->username; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label"></label>
                <div class="col-sm-4">
                  <button type="submit" id="btn-filter" name="btn-filter" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button> |
                  <button type="reset" class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>