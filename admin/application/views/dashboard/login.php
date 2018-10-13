<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
    $this->load->view('/component/src');
?>
<title>LOGIN PAGE ADMIN</title> 
<div class="container">
  <div class="row loginpanel">
    <div class="col-sm-4 hidden-xs"></div>
    <div class="col-sm-4 col-xs-12 cons">
      <h4 class="text-center text-danger">LOGIN PAGE</h4>
      <br>
      <form method="post" action="<?php echo base_url(); ?>welcome/login">  
        <div class="form-group">  
          <label>Enter Username</label>  
          <input type="text" name="username" class="form-control" />  
          <span class="text-danger"><?php echo form_error('username'); ?></span>                 
        </div>  
        <div class="form-group">  
          <label>Enter Password</label>  
          <input type="password" name="password" class="form-control" />  
          <span class="text-danger"><?php echo form_error('password'); ?></span>  
        </div>  
        <div class="form-group">  
          <input type="submit" name="insert" value="Login" class="btn btn-danger" />  
          <?php  
            echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
          ?>  
        </div>  
      </form>  
    </div>
    <div class="col-sm-4 hidden-xs"></div>
  </div>
</div>