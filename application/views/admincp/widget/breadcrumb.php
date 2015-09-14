<div class="header">
    <?php $this->load->view('admincp/widget/button'); ?> 
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url('admincp/index'); ?>">
            <?php echo $this->lang->line('home');?>
            </a> </li>

        <?php if ($this->router->class == 'moduledmos'): ?>
            <li ><a href="<?php echo site_url('admin/'.$this->router->class); ?>"><?php echo ucfirst($this->router->class); ?></a></li>
        <?php else: ?>
            <li ><a href="<?php echo site_url($this->router->class); ?>"><?php echo ucfirst($this->router->class); ?></a></li>
        <?php endif; ?> 
            
        <li class="active"><?php echo ucfirst(str_replace("_", " ", $this->router->method)); ?></li>
    </ul> 
</div>