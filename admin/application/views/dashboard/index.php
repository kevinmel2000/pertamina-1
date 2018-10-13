<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>ADMIN | Aplikasi Peminjaman Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->load->view('component/src');?>

</head>
<body>
<?php $this->load->view('dashboard/leftbar'); ?>

    <!-- Main Content -->

    <div class="container-fluid">
        <div class="side-body">

          <h3 class="text-muted">» Dashboard</h3>
          <hr>

                   <div class="row" >
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Users
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $count->users; ?>
                                </div>
                                <a href="<?php echo base_url().'users' ?>" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-suitcase fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                    Items
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $count->product; ?> 
                                </div>
                                <a href="<?php echo base_url().'items' ?>" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-reorder fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Request
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $count->request; ?>
                                    <span id="sparklineB"></span>
                                </div>
                                <a href="<?php echo base_url().'request' ?>" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-archive fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Borrowing
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $count->onuser; ?>
                                    <span id="sparklineC"></span>
                                </div>
                                <a href="<?php echo base_url().'approved' ?>" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
<br><br>
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-reorder" style="font-size: 17px; letter-spacing: 2px;"></i>  Request List</div>
          <div class="panel-body">
<div class="table-responsive table-responsive1">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Id</th>
        <th>Username</th>
        <th>Items</th>
        <th>Quantity</th>
        <th>TIme</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

        <?php for ($i = 0; $i < count($request); ++$i) { ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $request[$i]->id_trans; ?></td>
                <td><?php echo $request[$i]->username; ?></td>
                <td><?php echo $request[$i]->nama; ?></td>
                <td><?php echo $request[$i]->jumlah; ?></td>
                <td><?php echo $request[$i]->time; ?></td>
                <td><a href="<?php echo base_url('request/accept/'.$request[$i]->id_trans); ?>" class="btn btn-info btn-xs">Accept</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
  </table>
  </div>
<br>
<a class="pull-right" href="<?php echo base_url().'request' ?>">More Info <i class="fa fa-chevron-circle-right"></i></a>
 
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-hourglass-end" style="font-size: 17px; letter-spacing: 2px;"></i>  Expired List</div>
          <div class="panel-body">
              

            <div class="table-responsive table-responsive1">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Id</th>
        <th>Username</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Expired</th>
        <th>Time</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

        <?php for ($i = 0; $i < count($expired); ++$i) { ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $expired[$i]->id_trans; ?></td>
                <td><?php echo $expired[$i]->user; ?></td>
                <td><?php echo $expired[$i]->nama; ?></td>
                <td><?php echo $expired[$i]->jumlah; ?></td>
                <td><?php echo $expired[$i]->tglexpired; ?></td>
                <td><?php echo $expired[$i]->days; ?></td>
                <td><a href="<?php echo base_url('expired/getback/'.$expired[$i]->id_trans); ?>" class="btn btn-info btn-xs">View</a>
                </td>
            </tr>
        <?php } ?>

    </tbody>
  </table>
  </div>
<br>
<a class="pull-right" href="<?php echo base_url().'expired' ?>">More Info <i class="fa fa-chevron-circle-right"></i></a>

          </div>
        </div>
      </div>
    </div>
         
        </div>
    </div>



</body>
<script type="text/javascript">
	$(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').toggleClass('slide-in');
        
    });
});
</script>
</html>