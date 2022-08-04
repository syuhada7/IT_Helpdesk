<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-box-body">
      <h3 align="center"><img src="<?= base_url() ?>assets/dist/img/pbn.png" class="img-circle" width="150px"> <br> Forgot Password</h3>
      <form action="<?= base_url('Auth/forgot') ?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Old Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password1" placeholder="New Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password2" placeholder="Re-password" required>
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-7">
            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Update</button>
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