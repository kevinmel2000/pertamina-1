
 <div class="container">
    <h2 class="text-center">Borrow Process</h2>
    <br/>
  
    <div class="container">
 <div class="row">
  <div class="process">
   <div class="process-row nav nav-tabs">
  <div class="process-step" >
     <button type="button" class="btn btn-default btn-circle " data-toggle="tab" href="#menu2" ><i class="fa fa-file-text-o fa-3x "></i></button>
     <p><small>Choose Product</small></p>
    </div>
    <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-check fa-3x"></i></button>
     <p><small>Confirm</small></p>
    </div>
   </div>
  </div>
  <div class="tab-content">
   <div id="menu2" class="tab-pane fade active in">
    
    <div class="container">
      <div class="row">
<form method="post" action="<?php echo base_url('dashboard/submitrequest') ?>">

        <?php
          foreach ($product as $p) {
        ?>

          <div class="col-xs-6 col-sm-3 col-md-2 nopad text-center"  >
            <label class="image-checkbox" >   
              <img class="img-responsive" src=" <?php  echo $p->link; ?>" style="height: 100px;width: 100%">
            <input type="checkbox" name="image_check[]"  value="<?php  echo $p->id; ?>">
            <i class="glyphicon glyphicon-ok hidden"></i>
            <div class="progress">
            <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="40%" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo ($p->stock - $p->taken)/$p->stock*100; ?>%"><?php  echo $p->stock - $p->taken; ?>
            </div>
        </div>
          <p><?php  echo $p->nama; ?></p>
          </label>
        <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="<?php  echo "jumlah".$p->id; ?>">
                  <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="<?php  echo "jumlah".$p->id; ?>" class="form-control input-number" value="1" min="1" max="<?php  echo $p->stock - $p->taken; ?>">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="<?php  echo "jumlah".$p->id; ?>">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div> 
    </div>
       <?php
          }
       ?>
          
              
</div>
</div>
<br>
      <ul class="list-unstyled list-inline pull-right">
     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>

    </ul>
   </div>
  
   <div id="menu3" class="tab-pane fade">
  <div style="display:flex;width:100%;">
    <div class="login">
        <div style="width:100%;">
            <p>MORE PRODUCT INFO</p>
            <input type="text" name="info" required="required">
        </div>
        <div style="width:100%;">
            <p>NECESSITY</p>
            <input type="text" name="necessity" required="required">
        </div>
        <div style="width:100%;">
            <p>BORROWING TIME :  <span id="demo"></span> DAYS</p>
            <input type="range" min="1" max="30" value="1" id="myRange" name="time">
        </div>
    </div> 
</div>
    <ul class="list-unstyled list-inline pull-right">
     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
     <li><button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Done!</button></li>
    </ul>
     </form>
   </div>
  </div>
 </div>
</div>
</div>