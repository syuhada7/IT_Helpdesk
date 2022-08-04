<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
      <h3 align="center"><img src="<?= base_url() ?>assets/dist/img/pbn.png" class="img-circle" width="150px"> <br> IT Helpdesk</h3>
      <form action="<?= site_url('Auth/login') ?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="text-center">
            <button type="submit" name="btnlogin" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Sign In</button> |
            <a href="<?= base_url("auth/regis"); ?>" class=" btn btn-success"><i class="fa fa-user-plus"></i> Register</a>
            <br>
            <br>
            <a href="<?= base_url("auth/forgot"); ?>" class="btn btn-default"><i class="fa fa-key"></i> Forgot password</a>
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->