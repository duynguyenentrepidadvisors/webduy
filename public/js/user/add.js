document.addEventListener("DOMContentLoaded", function(event) { 
  addUser(); 
})
function addUser(){
  let userData=[]
   userData['id'] = document.getElementById('id');
   userData['name'] = document.getElementById('name');
   userData['password'] = document.getElementById('password');
   userData['firstName'] = document.getElementById('firstName');
   userData['lastName'] = document.getElementById('lastName');
   addUser = document.getElementById('addUser');
   addUser.onclick = function (e,userData){
      e.preventDefault()
      clickButton(userData);
}}
function clickButton(userData){
   let alerMessage = document.getElementsByClassName("text-danger");
   for (let i = 0; i < alerMessage.length; i++) {
    alerMessage[i].innerHTML="";}
      if(checkFormData(userData)){
      let xmlhttp = new XMLHttpRequest();
      if(userData['id']!=null){
        xmlhttp.open("post", `update-user`, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(`name=${userData['name'].value}&password=${userData['password'].value}&firstName=${userData['firstName'].value}&lastName=${userData['lastName'].value}&id=${userData['id'].value}`);
      }
      else{
        xmlhttp.open("post", `add-user`, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(`name=${userData['name'].value}&password=${userData['password'].value}&firstName=${userData['firstName'].value}&lastName=${userData['lastName'].value}`);
      }
      xmlhttp.onreadystatechange =function (xmlhttp){
      loadAjax(this,xmlhttp);}
    }
  }
function checkFormData(userData){
      let checkForm=true;
      let alerName = document.getElementById('aler-name');
      let alerPassword = document.getElementById('aler-password');
      let alerFirstName = document.getElementById('aler-firstname');
      let alerLastname= document.getElementById('aler-lastname');
      if(userData['name'].value.trim()==""||!/^[a-zA-Z0-9]+$/.test(userData['name'].value)|| userData['name'].value.length>25 ){
        checkForm=false;
        alerName.innerHTML="User name invalid";
      }
      if(userData['password'].value.trim()==""&&userData['id']==null){
        checkForm=false;
        alerPassword.innerHTML="Password invalid";
      }
      if(userData['firstName'].value.trim()==""){
        checkForm=false;
        alerFirstName.innerHTML="First Name invalid";
      }
      if(userData['lastName'].value.trim()==""){
        checkForm=false;
        alerLastname.innerHTML="Last Name invalid";
      }
      return checkForm;
}
function loadAjax(thisAjax,xmlhttp){
      if (thisAjax.readyState == 4 && thisAjax.status == 200) {
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
  };
}