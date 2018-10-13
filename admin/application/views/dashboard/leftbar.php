	<div class="side-menu">
    
    <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <div class="brand-wrapper">
            <!-- Hamburger -->
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Brand -->
            <div class="brand-name-wrapper">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url(); ?>asset/images/logo.png" width="200px" style="height: 30px; width: auto;">
                </a>
            </div>
        </div>

    </div>

    <!-- Main Menu -->
    <div class="side-menu-container">
        <ul class="nav navbar-nav">

            <li class="active"><a href="<?php echo base_url() ?>"><span class="fa fa-dashboard" style="font-size: 22px; letter-spacing: 4px;"></span> Dashboard</a></li>
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl1">
                    <span class="fa fa-tags" style="font-size: 22px; letter-spacing: 4px;"></span> Catalog <span class="caret"></span>
                </a>
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url().'items' ?>"> » Items</a></li>
                            <li><a href="<?php echo base_url().'users' ?>"> » Users</a></li>                         
                        </ul>
                    </div>
                </div>
            </li>
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl2">
                    <span class="fa fa-bar-chart" style="font-size: 22px; letter-spacing: 4px;"></span> Report <span class="caret"></span>
                </a>
                <div id="dropdown-lvl2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url().'request' ?>"> » Request List</a></li>
                            <li><a href="<?php echo base_url().'approved' ?>"> » On Hold List</a></li>
                            <li><a href="<?php echo base_url().'expired' ?>"> » Expired List</a></li>                         
                        </ul>
                    </div>
                </div>
            </li>
            <li><a href="<?php echo base_url().'welcome/logout'?>"><span class="fa fa-lock" style="font-size: 22px; letter-spacing: 4px;"></span> Log Out</a></li>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
    
    </div>