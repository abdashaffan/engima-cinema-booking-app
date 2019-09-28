


const validateUsername = (str) => {

    
    let xhttp = new XMLHttpRequest();
    
    if (str.length > 0){
        console.log(str);
        xhttp.open("GET", `/active/public/register/${str}`);
        xhttp.send();
    }


}