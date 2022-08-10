<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-home"></i> <b>Dashboard</b></h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dashboard/users'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <marquee>
    <h3><b>Welcome</b>
      <span> to IT Helpdesk <?= $this->fungsi->user_login()->username; ?>.</span>
    </h3>
  </marquee>
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $this->fungsi->count_done_users(); ?></h3>
          <p>Close</p>
        </div>
        <div class="icon">
          <i class="fa fa-check"></i>
        </div>
        <a href="<?= base_url('Helpdesk/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $this->fungsi->count_progress_users(); ?></h3>
          <p>In Progress</p>
        </div>
        <div class="icon">
          <i class="fa fa-truck"></i>
        </div>
        <a href="<?= base_url('Helpdesk/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $this->fungsi->count_open_users(); ?></h3>
          <p>Open</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <a href="<?= base_url('Helpdesk/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->