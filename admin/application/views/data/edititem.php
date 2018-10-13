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

          <h3 class="text-muted">» Edit Items</h3>
          <hr>
          <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs">
                 <img src="<?php echo base_url().'asset/images/items.png' ?>" class="img-responsive img-circle" style="display: block;">               
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
               <form method="post" action="<?php echo base_url().'items/update' ?>">
                <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Item Names</label> 
                                <div class="col-8">
                                  <input id="nama" name="nama" value="<?php echo $item->nama; ?>" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Stock</label> 
                                <div class="col-8">
                                  <input id="lastname" name="stock" value="<?php echo $item->stock; ?>" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">Colour</label> 
                                <div class="col-8">
                                  <input id="website" name="colour" value="<?php echo $item->warna; ?>" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">Merek</label> 
                                <div class="col-8">
                                  <input id="newpass" name="merek" value="<?php echo $item->merek; ?>" class="form-control here" type="text">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">Image Link</label> 
                                <div class="col-8">
                                  <input id="website" name="link" value="<?php echo $item->link; ?>" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary pull-right">Save Item</button>
                                </div>
                              </div>
                            </form>
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