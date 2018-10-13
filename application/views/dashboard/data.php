<div class="container">

      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li class="active">
              <a href="#tab_default_1" data-toggle="tab">
              Request</a>
            </li>
            <li>
              <a href="#tab_default_2" data-toggle="tab">
              Approved </a>
            </li>
            <li>
              <a href="#tab_default_3" data-toggle="tab">
              Expired</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_default_1">
              <?php $this->load->view('dashboard/request');?>
            </div>
            <div class="tab-pane" id="tab_default_2">
              <?php $this->load->view('dashboard/approved');?>
            </div>
            <div class="tab-pane" id="tab_default_3">
              <?php $this->load->view('dashboard/expired');?>
            </div>
          </div>
        </div>
      </div>
</div>