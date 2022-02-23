document.addEventListener("DOMContentLoaded", function(event) { 
  addUser(); 
})
function addUser(){
   let id = document.getElementById('id');
   let addUser = document.getElementById('addUser');
   let name = document.getElementById('name');
   let password = document.getElementById('password');
   let firstName = document.getElementById('firstName');
   let lastName = document.getElementById('lastName');
   addUser.onclick = function(e){
   let alerMessage = document.getElementsByClassName("text-danger");
   for (let i = 0; i < alerMessage.length; i++) {
    alerMessage[i].innerHTML="";}
      e.preventDefault();
      if(!checkForm()) return;
       let xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function(data) {
      if (this.readyState == 4 && this.status == 200) {
        let respons=xmlhttp.responseText[0];
        let messageTex;
        let message=document.getElementById('text-message');
        if(respons=="1"){
          messageTex="User Name already exist";
          message.classList.add("text-danger");
          message.classList.remove("text-success");
        }
        else{
          messageTex="Save user success";
          message.classList.remove("text-danger");
          message.classList.add("text-success");
        }
       message.innerHTML=messageTex;
      }
    };
      if(id!=null){
        xmlhttp.open("post", `update-user`, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(`name=${name.value}&password=${password.value}&firstName=${firstName.value}&lastName=${lastName.value}&id=${id.value}`);
    }
    else{
        xmlhttp.open("post", `add-user`, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(`name=${name.value}&password=${password.value}&firstName=${firstName.value}&lastName=${lastName.value}`);
    }};
      function checkForm(){
      let checkForm=true;
      let alerName = document.getElementById('aler-name');
      let alerPassword = document.getElementById('aler-password');
      let alerFirstName = document.getElementById('aler-firstname');
      let alerLastname= document.getElementById('aler-lastname');
      if(name.value.trim()==""){
        checkForm=false;
        alerName.innerHTML="User name invalid";
      }
      if(password.value.trim()==""&&id==null){
        checkForm=false;
        alerPassword.innerHTML="Password invalid";
      }
      if(firstName.value.trim()==""){
        checkForm=false;
        alerFirstName.innerHTML="First Name invalid";
      }
      if(lastName.value.trim()==""){
        checkForm=false;
        alerLastname.innerHTML="Last Name invalid";
      }
      return checkForm;
    }}

   