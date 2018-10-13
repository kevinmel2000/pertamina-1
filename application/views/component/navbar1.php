<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fa fa-home" style="font-size:28px"></i></a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#borrow">BORROW</a></li>
          <li><a href="#data">LIST DATA</a></li>
          <li><a href="#profile">PROFIL</a></li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo strtoupper($user) ; ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url().'dashboard/logout' ?>">Log Out</a></li>
          </ul>
        </li>

        </ul>
      </div>
    </div>
  </div>
</nav>    