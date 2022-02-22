<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
  <style>
    body{
        font-size: 16px;
        font-family: Arial,Helvetica,sans-serif;
    }
.user table{
    width: calc(100% - 16px);
    margin: 10px;
}
.user table,.user th,.user td{
border: 1px solid #333;
border-collapse: collapse;
}
.user th,.user td{
    padding: 12px 0px;
    text-align: center;
}
.user thead{
    background-color: #45a049;
    color: white;
}
.add-user{
  border: 1px solid grey;
  background-color: #45a049;
  text-decoration: none;
  color: white;
  padding: 8px 60px;
  margin-bottom: 20px;
  margin-left: 8px;
}
  .text-success{
      display: block;
      color: green;
    }
</style>
<div class="user">
<h1>User</h1>
   <span id="text-message" class="text-success"></span>
<a class="add-user" href="<?php echo base_url(); ?>index.php/user/add">add</a>
<table border="1">
   <thead> 
    <tr>
    <th>#</th>
    <th>User name</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
         <?php foreach ($list as $key => $user) {?>
        <tr>
            <td><?php echo $key ?></td>
            <td><?php echo $user->name ?></td>
             <td><a href="<?php echo base_url(); ?>index.php/UserController/editUser/<?php echo $user->id ?>" class="edit">Edit</a>/ <a href="" class="delete" data-id="<?php echo $user->id?>">Delete </a></td>
        </tr>
      <?php }?>
    </tbody>
</table>
</div>
<script type="text/javascript">
   let a_list = document.getElementsByClassName("delete");
    for (let i = 0; i < a_list.length; i++){
    a_list[i].onclick = function(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('text-message').innerHTML="Delete success";
     }
    };
    xhttp.open("POST", "<?php echo base_url(); ?>index.php/UserController/deleteUser", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${a_list[i].getAttribute("data-id")}`);
            }
   } 
</script>
</body>
</html>