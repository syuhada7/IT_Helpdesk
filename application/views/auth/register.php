<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-box-body">
      <h3 align="center"><img src="<?= base_url() ?>assets/dist/img/pbn.png" class="img-circle" width="150px"> <br> Register a new membership</h3>
      <form action="<?= base_url('Auth/regis') ?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password1" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password2" placeholder="Re-password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <select name="divisi" class="form-control" required>
            <option>Department</option>
            <option></option>
            <?php foreach ($depart as $dep) : ?>
              <option value="<?= $dep->nama_depart ?>"><?= $dep->nama_depart ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group has-feedback">
          <select name="lokasi" class="form-control" required>
            <option>Locations</option>
            <option></option>
            <?php foreach ($lokasi as $lok) : ?>
              <option value="<?= $lok->lokasi ?>"><?= $lok->lokasi ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="row">
          <div class="col-xs-7">
            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Register</button>
          </div>
          <div class="col-xs-4">
            <a href="<?= base_url("auth"); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back to Login</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div>