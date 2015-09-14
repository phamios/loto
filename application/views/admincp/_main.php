<?php if ($this->router->class == 'admincp'): ?>
    <?php if ($this->router->fetch_method() == 'index'): ?>
        <?php $this->load->view('admincp/main/index'); ?> 
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'menu'): ?>
        <?php $this->load->view('admincp/navigator/index'); ?> 
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'configsite'): ?> 
        <?php $this->load->view('admincp/config/index'); ?> 
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'configslide'): ?> 
        <?php $this->load->view('admincp/slide/index'); ?> 
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'giftcard'): ?> 
        <?php $this->load->view('admincp/giftcard/index'); ?> 
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'catenews'): ?> 
        <?php $this->load->view('admincp/catenews/list'); ?> 
    <?php endif; ?> 

 <?php if ($this->router->fetch_method() == 'orderdetails'): ?> 
        <?php $this->load->view('admincp/giftcard/details'); ?> 
    <?php endif; ?> 

<?php if ($this->router->fetch_method() == 'updatepass'): ?> 
        <?php $this->load->view('admincp/admin/updatepass'); ?> 
    <?php endif; ?> 
<?php endif; ?>

<?php if ($this->router->class == 'moduledmos'): ?>
    <?php if ($this->router->fetch_method() == 'index'): ?>
        <?php $this->load->view('admincp/modules/list'); ?> 
    <?php endif; ?> 
    <?php if ($this->router->fetch_method() == 'create_new'): ?>
        <?php $this->load->view('admincp/modules/create'); ?> 
    <?php endif; ?> 
<?php endif; ?>

<?php if ($this->router->class == 'users'): ?>
    <?php if ($this->router->fetch_method() == 'index'): ?>
        <?php $this->load->view('admincp/users/list'); ?> 
    <?php endif; ?>  
<?php endif; ?>



<?php if ($this->session->userdata('admin_id') <> null): ?>
    <?php foreach ($list_menu as $menu): ?>
        <?php if ($this->router->class == trim($menu->mod_name)): ?>
            <?php

            $xml = simplexml_load_file('./application/modules/' . trim($menu->mod_name) . '/note.xml');
            foreach ($xml->functions as $key => $value) {
                if ($this->router->fetch_method() == $value->name) {
                    $this->load->view($value->view);
                }
            }
            ?> 
        <?php endif; ?>
    <?php endforeach; ?> 
<?php endif; ?>