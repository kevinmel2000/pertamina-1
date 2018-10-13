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

          <h3 class="text-muted">» Items List</h3>
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
<div class="row">
  <div class="col-sm-2 col-xs-2">
    <a href="<?php echo base_url().'items/addnew'?>" type="button" class="btn btn-info btn-block">Insert New</a>
  </div>
  <div class="col-sm-10 col-xs-10">
    <form method="post" action="<?php echo base_url().'items/search'?>">
  <div class="input-group">
    <input type="text" class="form-control" name="search_item" placeholder="Search" value="<?php echo set_value('search_item'); ?>">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
  </div>
</div>

<br>
<div class="table-responsive">      
          <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Items</th>
        <th>Stock</th>
        <th>Warna</th>
        <th>Merek</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($itemlist); ++$i) { ?>
      <tr>
       <td><?php echo ($page+$i+1); ?></td>
       <td><?php echo $itemlist[$i]->nama; ?></td>
       <td><?php echo $itemlist[$i]->stock; ?></td>
       <td><?php echo $itemlist[$i]->warna; ?></td>
       <td><?php echo $itemlist[$i]->merek; ?></td>
       <td>
        <a href="<?php echo base_url('items/delete/'.$itemlist[$i]->id); ?>" class="btn btn-danger btn-xs" role="button" onclick="return confirm('Do you want to delete this record?');"><i class="fa fa-trash"></i></a>
        <a href="<?php echo base_url('items/editpage/'.$itemlist[$i]->id); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
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