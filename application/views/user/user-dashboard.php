<!DOCTYPE html>
<html>
<head>
<title>Web</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
      <link rel="stylesheet" href="public/css/user/dashboard.css">
</head>
<body>
<div class="user">
<h1>User (<span id="count-user"><?php echo count($list);?></span>)</h1>
<a class="add-user" href="add-user">Add</a>
<table border="1">
   <thead> 
    <tr>
    <th>User name</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
         <?php foreach ($list as $key => $user) {?>
        <tr>
            <td><?php echo $user->name ?></td>
            <td><?php echo $user->firstName ?></td>
            <td><?php echo $user->lastName ?></td>
            <td><a href="edit/<?php echo $user->id ?>" class="edit"><i class="fas fa-pen"></i></a>
                <a class="delete" data-id="<?php echo $user->id?>"><i class="fas fa-trash"></i> </a>
            </td>
        </tr>
      <?php }?>
    </tbody>
</table>
</div>
</body>
<script language="javascript" src="public/js/user/dashboard.js"></script>
</html>