function checkUniqueUsername(){

    var username = document.getElementsByName("username")[0].value;
    var url = window.location.hostname;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
       if(this.readyState==4 && this.status==200){
        var jsonObject = JSON.parse(xhttp.responseText);
        if(jsonObject.unique){
            var usernamefield = document.getElementsByName("username")[0];
            usernamefield.style.borderColor = "green";

            var message = document.getElementById("usernameMessage");
            message.innerHTML="";
            
        } else {

            var usernamefield = document.getElementsByName("username")[0];
            usernamefield.style.borderColor = "red";
            var message = document.getElementById("usernameMessage");
            message.innerHTML= "username exists";
        }
    }
}

   var url = "/api";
   xhttp.open("POST",url);
   xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


   xhttp.send(JSON.stringify({"username" : username,"function" : "checkIfUsernameUnique"}));


}

function checkPassword(){


    if(document.getElementsByName("password")[0].value===
    document.getElementsByName("confirm-password")[0].value){

        document.getElementsByName('password')[0].style.borderColor="green";
        document.getElementsByName('confirm-password')[0].style.borderColor="green";

    } else {

        document.getElementsByName('password')[0].style.borderColor="red";
        document.getElementsByName('confirm-password')[0].style.borderColor="red";


    }


}

function checkUniqueEmail(){

    var email = document.getElementsByName("email")[0].value;
    var url = window.location.hostname;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            var jsonObject = JSON.parse(xhttp.responseText);
            if(jsonObject.unique){
                var emailfield = document.getElementsByName("email")[0];
                emailfield.style.borderColor = "green";

                var message = document.getElementById("emailMessage");
                message.innerHTML="";
            
            } else {

                var emailfield = document.getElementsByName("email")[0];
                emailfield.style.borderColor = "red";
                var message = document.getElementById("emailMessage");
                message.innerHTML= "email exists";
            }
        }
    }

   var url = "/api";
   xhttp.open("POST",url);
   xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


   xhttp.send(JSON.stringify({"email" : email,"function" : "checkIfEmailUnique"}));


}

function checkUniquePhone(){

    var phone = document.getElementsByName("phoneNumber")[0].value;
    var url = window.location.hostname;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            var jsonObject = JSON.parse(xhttp.responseText);
            if(jsonObject.unique&&
                /^\d+$/.test(phone)&&
                phone.length >=8 &&
                phone.length <= 12
                ){

                var phonefield = document.getElementsByName("phoneNumber")[0];
                phonefield.style.borderColor = "green";

                var message = document.getElementById("phoneNumberMessage");
                message.innerHTML="";
            
            } else {

                var phonefield = document.getElementsByName("phoneNumber")[0];
                phonefield.style.borderColor = "red";
                var message = document.getElementById("phoneNumberMessage");
                message.innerHTML= "phone number not unique or wrong (must be numbers, 8-12 in length";
            }
        }
    }

   var url = "/api";
   xhttp.open("POST",url);
   xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");


   xhttp.send(JSON.stringify({"phoneNumber" : phone,"function" : "checkIfPhoneUnique"}));

}


// Check submission
function checkSubmission(){

    var username = document.getElementsByName("username")[0].value;
    var phone = document.getElementsByName("phoneNumber")[0].value;


    var url = window.location.hostname;
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
       if(this.readyState==4 && this.status==200){
        var jsonObject = JSON.parse(xhttp.responseText);
        if(jsonObject.unique&&
            document.getElementsByName("password")[0].value===
            document.getElementsByName("confirm-password")[0].value&&
            /^\d+$/.test(phone)&&
            phone.length >=8 &&
            phone.length <= 12
            ){
            
            /**
             * Do nothing
            */

            return true;
            
        } else {

            return false;
        }
        }   
}

   var url = "/api";
   user_request.open("POST",url);
   user_request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
   xhttp.send(JSON.stringify({
       "username" : username,
       "phoneNumber" : phone,
       "email" : email,
       "function" : "checkSubmission"}));
}
