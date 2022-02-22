<!DOCTYPE html>
<html>
<head>
<title>web</title>
</head>
<body>
   <style type="text/css">
 .login{
        width:400px;
        height:300px;
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
    .text-success{
        display: block;
       color: green;
    }
</style>

<form action="" method="post">
  <div class="login">
   <h2>Member login</h2>
   <input type="text" id="name" name="name" placeholder="User Name" required  /> 
   <input type="password" id="password" name="password" placeholder="Password" required  />
   <span id="text-message" class="text-success"></span>
   <button id="addUser">Add user</button>
</div>
</form>
<script type="text/javascript">
   let addUser = document.getElementById('addUser');
   let name = document.getElementById('name');
   let password = document.getElementById('password');
    addUser.onclick = function(e){
      e.preventDefault();
       let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(data) {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      document.getElementById('text-message').innerHTML="Add success";
      }
    };
    xmlhttp.open("post", `<?php echo base_url(); ?>index.php/UserController/saveUser?name=${name.value}&password=${password.value}`, true);
    xmlhttp.send();
    };
</script>
 
</body>
</html>