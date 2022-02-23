document.addEventListener("DOMContentLoaded", function(event) { 
    deleteUser();
})
function deleteUser(){
    let userDelete = document.getElementsByClassName("delete");
    let countUser = document.getElementById("count-user");
    for (let i = 0; i < userDelete.length; i++){
        let userDl=userDelete[i];
    userDl.onclick = function(){
    if(confirm("You want to delete this user") == true){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      userDl.parentNode.parentNode.remove();
      countUser.innerHTML=Number(countUser.innerHTML)-1;
      alert("Delete success");
     }
    };
    xhttp.open("post", "delete-user", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${userDl.getAttribute("data-id")}`);
    }
    }
   } 
}