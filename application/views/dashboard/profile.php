 	<div class="row">
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
        <?php echo $this->session->flashdata('error_msg'); ?>
      </div>
    <?php } ?>
  </div>
</div>	        


             <h2 class="text-center">My Profil </h2>   
 		        <br>   

 		               <div class="container"> 
 		               <div class="row">
 		               	<div class="col-sm-1"> </div>
 		               	<div class="col-sm-4">
 		               		<div class="profile-header-container">   
    		<div class="profile-header-img">
                <img class="img-circle" src="<?php echo base_url(); ?>asset/images/usericon.png" />
                <!-- badge -->
                <div class="rank-label-container">
                    <span class="label label-default rank-label"><?php echo $profil->username;?></span>
                </div>
            </div>
        </div> 
 		               	 </div>
 		               	<div class="col-sm-6">
 		               		            <form method="post" action="<?php echo base_url().'dashboard/update' ?>">
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name</label> 
                                <div class="col-8">
                                  <input id="username" name="username" class="form-control here" value="<?php echo $profil->username;?>" type="text" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input id="name" name="first" value="<?php echo $profil->first;?>" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input id="lastname" name="last" value="<?php echo $profil->last;?>" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                  <input id="website" name="email" value="<?php echo $profil->email;?>" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">Nomor HP</label> 
                                <div class="col-8">
                                  <input id="website" name="hp" value="<?php echo $profil->hp;?>" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">New Password</label> 
                                <div class="col-8">
                                  <input id="newpass" name="newpass" value="<?php echo $profil->password;?>" class="form-control here" type="password">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
 		               	 </div>
 		               	<div class="col-sm-1"> </div>
 		                </div> 

		                </div>


