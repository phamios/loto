<div class="stats">
<!--    <p class="stat">
        <span class="label label-info">5</span> Tickets
    </p>
    
    <p class="stat">
        <span class="label label-success">27</span> 
    </p>-->
    <?php
    $link_add = null;
    if ($this->router->class == 'moduledmos' || $this->router->class == 'users') {
        $link_add = site_url('admin/' . $this->router->class . '/create_new');
    } else {
        $link_add = site_url($this->router->class . '/create_new');
    }
    ?>
    <?php if ($this->router->class <> 'admincp'): ?>
        <p class="stat"> 
            <a href="<?php echo $link_add; ?>">
                <span class="label label-danger"><?php echo $this->lang->line('addition'); ?></span> 
            </a>
        </p> 
    <?php endif; ?>


</div>