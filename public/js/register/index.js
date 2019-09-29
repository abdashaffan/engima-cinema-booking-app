const UNAME_VALID_CODE=  1;
const UNAME_EXIST_CODE=  0;
const UNAME_INVALID_CODE =-1;
const UNAME_INVALID_MSG = "Hanya boleh kombinasi angka, huruf atau underscore";
const UNAME_EXIST_MSG = "Username sudah digunakan";

const validate = (input) => {
    
    if (input == "") {
        clearTextbox('#username');
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let usernameValid = JSON.parse(this.responseText).validStatus;
            console.log(usernameValid);
            switch (usernameValid) {
                case 1:
                    setValidTextbox('#username');
                    break;
                case 0:
                    setInvalidTextbox('#username', UNAME_EXIST_MSG);
                    break;
                case -1:
                    setInvalidTextbox('#username', UNAME_INVALID_MSG);
                    break;
                default:
                    break;
            }
        }
    };

    if (input !== "") {                                                    
        xmlhttp.open("POST", BASE_URL + "/register/validate", true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
        xmlhttp.send(JSON.stringify({"username": input}));
        
    }   

}



const clearTextbox = (identifier) => {
    let input = document.querySelector(identifier);
    input.classList.remove('invalid-input', 'valid-input');
    input.nextElementSibling.innerHTML = "";
}


const setValidTextbox = (identifier) => {
    document.querySelector(identifier).classList.remove('invalid-input');
    document.querySelector(identifier).classList.add('valid-input');
}


const setInvalidTextbox = (identifier, invalidMessage) => {
    let input = document.querySelector(identifier);
    input.classList.remove('valid-input');
    input.classList.add('invalid-input');
    input.nextElementSibling.innerHTML = invalidMessage;
}