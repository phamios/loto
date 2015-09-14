<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        <?php echo $this->lang->line('login');?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/login');?>/style.css" />
</head>
<body>

 <?php echo form_open_multipart('admincp/login'); ?>
  <h1><?php echo $this->lang->line('login_head');?></h1>
  <div class="inset">
  <p>
    <label for="email"><?php echo $this->lang->line('email');?></label>
    <input type="text" name="email" id="email">
  </p>
  <p>
    <label for="password"><?php echo $this->lang->line('password');?></label>
    <input type="password" name="password" id="password">
  </p>
  <p>
    <input type="checkbox" name="remember" id="remember">
    <label for="remember"><?php echo $this->lang->line('rememberuser');?></label>
  </p>
  </div>
  <p class="p-container">
      <span><?php echo $this->lang->line('forgotpass');?></span>
    <input type="submit" name="go" id="go" value="<?php echo $this->lang->line('login');?>">
  </p>
  <p class="p-container">

      <a href="<?php echo site_url('admincp/register');?>"><?php echo $this->lang->line("or_register");?></a>
  </p>
<?php echo form_close(); ?>

</body>
</html>
