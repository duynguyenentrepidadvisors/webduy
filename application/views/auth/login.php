<!DOCTYPE html>
<html>
<head>
<title>web</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/auth/login.css">
</head>
<body>
<form action="<?php echo base_url(); ?>index.php/Auth/LoginController/login" method="post">
  <div class="login">
   <h2>Member login</h2>
   <input type="text" name="name"  value="<?php echo set_value('name')?>" placeholder="User Name" >
   <span class="text-danger"><?php echo form_error('name')?></span>
   <input type="password" value="<?php echo set_value('password')?>"  name="password" placeholder="Password">
   <span class="text-danger"><?php echo form_error('password')?></span>
   <button name="login"> Login</button>
      <span class="text-danger"><?php echo $this->session->flashdata('message')?></span>
   <div class="container">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</div>
</form>
</body>
</html>