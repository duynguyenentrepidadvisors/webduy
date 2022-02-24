document.addEventListener("DOMContentLoaded", function(event) { 
    deleteUser();
})
function deleteUser(){
    let userDelete = document.getElementsByClassName("delete");
    for (let i = 0; i < userDelete.length; i++){    
        let userDl=userDelete[i];
    userDl.onclick =  function() {clickButtonDelete(userDl);}
   } 
}
function clickButtonDelete(userDl){
    if(confirm("You want to delete this user") == true){
    let xhttp = new XMLHttpRequest();
   
    xhttp.open("post", "delete-user", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${userDl.getAttribute("data-id")}`);
    xhttp.onreadystatechange = function() {loadAjax(this,userDl);};}
}
function loadAjax(thisAjax,userDl){
     if (thisAjax.readyState == 4 && thisAjax.status == 200) {
      userDl.parentNode.parentNode.remove();
      let countUser = document.getElementById("count-user");
      countUser.innerHTML=Number(countUser.innerHTML)-1;
      alert("Delete success");
     }
}