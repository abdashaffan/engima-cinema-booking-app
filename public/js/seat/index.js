function getSeatDetail(seat_id) {
    // if(!xmlhttp) {
    //     return;
    // }
    // var xmlhttp = new XMLHttpRequest();
    // // TODO: change this to base url
    // base_url = 'http://localhost:8000/public/seat/detail/'
    // url = base_url + 'seat_id';
    // xmlhttp.open('GET', seat_id, true);
    // xmlhttp.onreadystatechange = printSeatDetail;
    // xmlhttp.send()

    printSeatDetail()
}

function printSeatDetail(){
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    }
    var content = document.getElementById('seat-summary-content');
    // content.innerHTML = xmlhttp.responseText;
    // TODO change this from response
    var title = "Avengers: Endgame";
    var date = "September 4, 2019 - 09.40 PM";
    var seat_number = 18;
    var price = 20000;
    content.innerHTML = ```
        <b>
    ```
}