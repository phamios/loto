<!doctype html>
<html lang="en">
    <?php $this->load->view('admincp/widget/head'); ?>
    <body class=" theme-blue">

        <?php $this->load->view('admincp/widget/addition'); ?>

        <?php $this->load->view('admincp/widget/navbar'); ?>

        <div class="sidebar-nav">
            <?php $this->load->view('admincp/widget/menu'); ?>
        </div>

        <div class="content">
            <?php $this->load->view('admincp/widget/breadcrumb'); ?>
            <div class="main-content">  
                <?php $this->load->view('admincp/_main');?>
            </div>
        </div>


        <script src="<?php echo base_url('src/admin') ?>/lib/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript">
            $("[rel=tooltip]").tooltip();
            $(function () {
                $('.demo-cancel-click').click(function () {
                    return false;
                });
            });
        </script>


    </body></html>
