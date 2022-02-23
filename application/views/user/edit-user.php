<!DOCTYPE html>
<html>
<head>
<title>web</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/user/edit.css">
</head>
<body>
  <div class="login">
   <h2>Edit user</h2>
   <form>
   <input type="hidden" id="id" value="<?php echo $user[0]["id"] ?>">
   <input type="text" id="name" name="name" value="<?php echo $user[0]["name"] ?>" placeholder="username" required>
   <span id="aler-name" class="text-danger"></span>

   <input type="password" id="password" value="" name="password" placeholder="Password" required  />
   <span id="aler-password" class="text-danger"></span>


   <input type="text" id="firstName" value="<?php echo $user[0]["firstName"] ?>" name="firstName" placeholder="First Name" required  /> 
   <span id="aler-firstname" class=" text-danger"></span>

   <input type="text" id="lastName" value="<?php echo $user[0]["lastName"] ?>" name="lastName" placeholder="Last Name" required  /> 
   <span id="aler-lastname" class=" text-danger"></span>

   <button id="addUser">Update user</button>
   <span id="text-message" class="text-success"></span>
</form>
</div>
<script language="javascript" src="<?php echo base_url(); ?>/public/js/user/add.js"></script> 
</body>
</html>