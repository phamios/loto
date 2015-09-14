<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
         <?php echo $this->lang->line('register');?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('src/login');?>/style.css" />
</head>
<body>

 <?php echo form_open_multipart('admincp/register'); ?>
  <h1><?php echo $this->lang->line('login_head');?></h1>
  <div class="inset">
  <p>
    <label for="email"><?php echo $this->lang->line('user_reg');?></label>
    <input type="text" name="email" id="email">
  </p>
  <p>
    <label for="password"><?php echo $this->lang->line('password');?></label>
    <input type="password" name="password" id="password">
  </p>
  <p>
    <label for="password"><?php echo $this->lang->line('repeat_pass');?></label>
    <input type="password" name="password_rep" id="password">
  </p>
   
  </div>
  <p class="p-container">
    <input type="submit" name="go" id="go" value="<?php echo $this->lang->line('register');?>">
    &nbsp; <input type="submit" name="go_login" style="float:left;"  value="<?php echo $this->lang->line('go_login');?>">
  </p> 
   
<?php echo form_close(); ?>

</body>
</html>
