
 <div class="container">
    <h2 class="text-center">Borrow Process</h2>
    <br/>
  
    <div class="container">
 <div class="row">
  <div class="process">
   <div class="process-row nav nav-tabs">
    <div class="process-step">
     <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-info fa-3x"></i></button>
     <p><small>Login ! </small></p>
    </div>
    <div class="process-step " disabled>
     <button type="button" class="btn btn-default btn-circle " data-toggle="tab" href="#menu2" disabled="disabled"><i class="fa fa-file-text-o fa-3x "></i></button>
     <p><small>Choose Product</small></p>
    </div>
    <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3" disabled="disabled"><i class="fa fa-check fa-3x"></i></button>
     <p><small>Confirm</small></p>
    </div>
   </div>
  </div>
  <div class="tab-content">
   <div id="menu1" class="tab-pane fade active in">
    <br/>
    <div style="display:flex;width:100%;">
    <form class="login" method="post" action="<?php echo base_url(); ?>welcome/login">
        <div style="width:100%;">
            <p>USERNAME</p>
            <input name="username" autofocus>
        </div>
        <div style="width:100%;">
            <p>PASSWORD</p>
            <input type="password" name="password">
        </div>
        <ul class="list-unstyled list-inline pull-right">
           <li> Didn't Have Account ?<a href="<?php echo base_url(); ?>signup">Create New</a></li>
           <li><input type="submit" class="btn btn-warning" value="LOGIN"></li>
        </ul>
    </form> 
</div>
    
   </div>
  
  </div>
 </div>
</div>
</div>


