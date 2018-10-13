<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>ADMIN | List Data of Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->load->view('component/src');?>

</head>
<body>
<?php $this->view('dashboard/leftbar'); ?>

    <!-- Main Content -->

    <div class="container-fluid">
        <div class="side-body">

          <h3 class="text-muted">» Request List</h3>
          <hr>
<div class="row" style="margin-top:0 !important;">
  <div class="col-sm-offset-8 col-sm-4">
<?php if($this->session->flashdata('success_msg')){ ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
<?php } ?>
<?php if($this->session->flashdata('error_msg')){ ?>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('danger_msg'); ?>
      </div>
<?php } ?>
</div>
</div>

    <form method="post" action="<?php echo base_url().'request/search'?>">
  <div class="input-group">
    <input type="text" class="form-control" name="search_request" placeholder="Search" value="<?php echo set_value('search_request'); ?>">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
  

<br>
<div class="table-responsive">      
          <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>IdTrans</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Username</th>
        <th>Date</th>
        <th>Time</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($requestlist); ++$i) { ?>
      <tr>
       <td><?php echo ($page+$i+1); ?></td>
       <td><?php echo $requestlist[$i]->id_trans; ?></td>
       <td><?php echo $requestlist[$i]->nama; ?></td>
        <td><?php echo $requestlist[$i]->jumlah; ?></td>
       <td><?php echo $requestlist[$i]->username; ?></td>
       <td><?php echo $requestlist[$i]->date_trans; ?></td>
       <td><?php echo $requestlist[$i]->time; ?></td>
       <td>
        <a href="<?php echo base_url('request/accept/'.$requestlist[$i]->id_trans); ?>" class="btn btn-warning btn-xs">Accept</a>
        </td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
            <div class="text-center">   
                 <?php 
                    echo $pagination; 
                 ?>
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