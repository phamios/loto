<ul>
    <li> 
        <a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse">
            <i class="fa fa-fw fa-dashboard"></i> 
            <?php echo $this->lang->line('dashboard'); ?>
<!--            <i class="fa fa-collapse"></i>-->
            <span class="label label-info">+8</span>
        </a>
    </li>
    <li>
        <ul class="dashboard-menu nav nav-list collapse in">
            <li>
                <a href="<?php echo site_url('admincp/index'); ?>"><span class="fa fa-caret-right"></span> 
                    <?php echo $this->lang->line('dashboard'); ?></a>
            </li>
            <li>
                <a href="<?php echo site_url('admincp/configslide'); ?>"><span class="fa fa-caret-right"></span> 
                    <?php echo $this->lang->line('configslide'); ?></a>
            </li>
            <li>
                <a href="<?php echo site_url('admincp/giftcard'); ?>"><span class="fa fa-caret-right"></span> 
                   Quản lý đơn hàng</a>
            </li>

            
            <?php if ($list_menu <> null): ?>
                <?php foreach ($list_menu as $menu): ?>
                    <li>
                        <a href="<?php echo site_url($menu->mod_name); ?>">
                            <span class="fa fa-caret-right"></span> 
                            <?php echo ucfirst($menu->mod_slug); ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>

            <li>
                <a href="<?php echo site_url('admincp/catenews'); ?>"><span class="fa fa-caret-right"></span> 
                   Q/L Danh mục tin tức</a>
            </li>
        </ul>
    </li>





    <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse">
            <i class="fa fa-fw fa-briefcase"></i> 
            Plugin 
            <span class="label label-info">+4</span></a>
    </li>
    <li><ul class="accounts-menu nav nav-list collapse">
            <li ><a href="<?php echo site_url('admin/users'); ?>"><span class="fa fa-caret-right"></span><?php echo $this->lang->line('menu_userlist'); ?></a></li>
            <li ><a href="<?php echo site_url('admin/moduledmos'); ?>"><span class="fa fa-caret-right"></span><?php echo $this->lang->line('menu_modules'); ?></a></li>
<!--            <li ><a href="<?php echo site_url('admincp/media'); ?>"><span class="fa fa-caret-right"></span> <?php echo $this->lang->line('menu_media'); ?></a></li>-->

            <li>
                <a href="<?php echo site_url('admincp/configsite'); ?>"><span class="fa fa-caret-right"></span> 
                    <?php echo $this->lang->line('configsite'); ?></a>
            </li>
            <li>
                <a href="<?php echo site_url('admincp/logout'); ?>"><span class="fa fa-caret-right"></span> 
                    Logout</a>
            </li>
        </ul>
        
    </li>

<!--    <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Legal<i class="fa fa-collapse"></i></a></li>
    <li>
        <ul class="legal-menu nav nav-list collapse">
            <li ><a href="privacy-policy.html"><span class="fa fa-caret-right"></span> Privacy Policy</a></li>
            <li ><a href="terms-and-conditions.html"><span class="fa fa-caret-right"></span> Terms and Conditions</a></li>
        </ul>
    </li>

    <li><a href="help.html" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Help</a></li>
    <li><a href="faq.html" class="nav-header"><i class="fa fa-fw fa-comment"></i> Faq</a></li>
    <li>
        <a href="http://portnine.com/bootstrap-themes/aircraft" class="nav-header" target="blank">
            <i class="fa fa-fw fa-heart"></i> Get Premium</a>
    </li>-->
</ul>