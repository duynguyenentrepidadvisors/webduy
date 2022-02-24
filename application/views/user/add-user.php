<!DOCTYPE html>
<html>
<head>
<title>web</title>
<link rel="stylesheet" href="public/css/user/add.css">
</head>
<body>
<form action="" method="post">
  <div class="login">
   <h2>Create user</h2>
   <input type="text" id="name" name="name" placeholder="User Name" required  /> 
   <span id="aler-name" class=" text-danger"></span>
   <input type="password" id="password" name="password" placeholder="Password" required  />
   <span id="aler-password" class="text-danger"></span>

   <input type="text" id="firstName" name="firstname" placeholder="First Name" required  /> 
   <span id="aler-firstname" class=" text-danger"></span>

   <input type="text" id="lastName" name="lastname" placeholder="Last Name" required  /> 
   <span id="aler-lastname" class=" text-danger"></span>

   <span id="text-message" class="text-success"></span>
   <button id="addUser">Add user</button>
</div>
</form>
</body>
<script language="javascript" src="public/js/user/add.js"></script>
</html>