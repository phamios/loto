<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/login');?>/css/style.css">
</head>

<body>

<div class="wrapper">
    <div class="container">
        <h1>Đăng nhập hệ thống</h1>
        <?php echo form_open_multipart('admincp/login'); ?>
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập" />
            <input type="password" id="password" name="password" placeholder="Mật khẩu" />
            <input type="submit" name="loginsubmit" id="login-button" value="Đăng nhập" />
        <?php echo form_close(); ?>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="<?php echo base_url('assets/login');?>/js/index.js"></script>

</body>
</html>
