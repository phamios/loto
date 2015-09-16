 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Quản lý hệ thống</a>
            </div>
            <!-- Top Menu Items -->
       
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php $this->load->library('session');?>
                    <?php if ($this->session->userdata('admin_id') != null) : ?>
                    <?php if ($this->session->userdata('admin_type') ==1) : ?>
                            <li class="active">
                                <a href="#"><i class="fa fa-fw fa-dashboard"></i> Tổng quan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Báo cáo </a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-table"></i> Danh sách thu chi</a>
                            </li>

                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-wrench"></i> Quản lý thành viên <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo" class="collapse">
                                    <li>
                                        <a href="<?php echo base_url()."admin/user"?>">Danh sách thành viên</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url()."admin/user/add"?>">Thêm mới thành viên</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?php echo base_url()."admincp/logout"?>"><i class="fa fa-fw fa-dashboard"></i> Thoát </a>
                            </li>
                            
                       <?php endif?>
                            <?php if ($this->session->userdata('admin_type') !=1) : ?>
                            <li class="active">
                                <a href="#"><i class="fa fa-fw fa-dashboard"></i> Tổng quan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Báo cáo </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()."member"?>"><i class="fa fa-fw fa-table"></i> User profile</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()."member/history"?>"><i class="fa fa-fw fa-table"></i> History</a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url()."admincp/logout"?>"><i class="fa fa-fw fa-dashboard"></i> Thoát </a>
                            </li>
                            
                       <?php endif?>
                     <?php endif?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>