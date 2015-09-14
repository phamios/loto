<div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="<?php echo site_url('admincp'); ?>"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> <?php echo $this->lang->line('site_head'); ?></span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>
                    <?php echo $this->session->userdata('admin_name') ?> | ID: <?php echo $this->session->userdata('admin_id') ?>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="./">My Account</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Admin Panel</li>
                <li><a href="<?php echo site_url('admincp/updatepass');?>">Users</a></li>
<!--                <li><a href="./">Security</a></li>
                <li><a tabindex="-1" href="<?php echo site_url('admincp/payment')?>">Payments</a></li>-->
                <li class="divider"></li>
                <li><a tabindex="-1" href="<?php echo site_url('admincp/logout'); ?>"><?php echo $this->lang->line('sign_out'); ?></a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>