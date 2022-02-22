<!DOCTYPE html>
<html>
<head>
<title>web</title>
</head>
<body>
   <style type="text/css">
 .login{
        width:400px;
        height:460px;
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
     .text-danger {
    display: block;
    color: red;
    }  
</style>

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
<script type="text/javascript">
   let addUser = document.getElementById('addUser');
   let name = document.getElementById('name');
   let password = document.getElementById('password');
   let firstName = document.getElementById('firstName');
   let lastName = document.getElementById('lastName');
   addUser.onclick = function(e){
   let alerMessage = document.getElementsByClassName("text-danger");
   for (let i = 0; i < alerMessage.length; i++) {
    alerMessage[i].innerHTML="";
    }
      e.preventDefault();
     
      if(!checkForm()) return;
       let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(data) {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      document.getElementById('text-message').innerHTML="Add success";
      }
    };
    xmlhttp.open("post", `<?php echo base_url(); ?>index.php/UserController/saveUser?name=${name.value}&password=${password.value}&firstName=${firstName.value}&lastName=${lastName.value}`, true);
    xmlhttp.send();
    };

    function checkForm(){
      let checkForm=true;
      let alerName = document.getElementById('aler-name');
      let alerPassword = document.getElementById('aler-password');
      let alerFirstName = document.getElementById('aler-firstname');
      let alerLastname= document.getElementById('aler-lastname');
      if(name.value.trim()=="")
      {
        checkForm=false;
        alerName.innerHTML="User name invalid"
      }
      if(password.value.trim()=="")
      {checkForm=false;
        alerPassword.innerHTML="Password invalid"
      }
      if(firstName.value.trim()=="")
      {checkForm=false;
        alerFirstName.innerHTML="First Name invalid"
      }
      if(lastName.value.trim()=="")
      {checkForm=false;
        alerLastname.innerHTML="Last Name invalid"
      }
      return checkForm;
    }
</script>
 
</body>
</html>