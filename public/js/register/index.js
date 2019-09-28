


const validateUsername = (str) => {


    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = () => {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("testaja").innerHTML = str;
        }
    };

    xhttp.open("GET", `/active/public/register/validateUsername?username=${str}`);
    console.log('testaja');
    xhttp.send();


}