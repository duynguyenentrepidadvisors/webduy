<!DOCTYPE html>
<html>
<head>
<title>login</title>
</head>
<body>
  <style type="text/css">
 .login{
        width:400px;
        height:440px;
        border:1px solid grey;
        border-radius:10px;
        text-align: center;
        margin: auto;
        margin-top: 100px;
    }
    h2{
        color:#868787;
        font-size: 18px;
        font-family: sans-serif;
        font-size: 24px;
    } 
    input{
        width: 300px;
        height: 40px;
        margin-bottom: 10px;
        border-radius: 5px ;
        border:1px solid grey;
        padding-left: 20px;
        margin: 10px 0;
        color: black;
        font-size: 15px;
    }
    button{
        width: 320px;
        height: 40px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: none;
        background-color: #45a049;
        color: white;
        margin: 10px 0;

    }
    button:hover{
        font-size: 15px;
        background-color:rgb(69,160,73,0.8);
        cursor: pointer;
    }
    .text-danger {
    display: block;
    color: red;
    }    
</style>
<form action="<?php echo base_url(); ?>index.php/Auth/LoginController/login" method="post">
  <div class="login">
   <h2>Member login</h2>
   <input type="text" name="name"  value="<?php echo set_value('name')?>" placeholder="User Name" >
   <span class="text-danger"><?php echo form_error('name')?></span>
   <input type="password" value="<?php echo set_value('password')?>"  name="password" placeholder="Password">
   <span class="text-danger"><?php echo form_error('password')?></span>
   <button name="login"> Login</button>
      <span class="text-danger"><?php echo $this->session->flashdata('message')?></span>
   <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</div>
  </div>

  
</form>
</body>
</html>