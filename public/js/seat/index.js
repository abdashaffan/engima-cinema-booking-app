function getSeatDetail(film_id, seat_number) {
    console.log("tes");
    console.log("tes3");
    var xmlhttp = new XMLHttpRequest();
    console.log(xmlhttp);
    // TODO: change this to base url
    base_url = "http://localhost/tugas-besar-1-2019/public";
    url = base_url + '/seat/detail/?film_id=' + film_id + '&?seat_number=' + seat_number;
    console.log(url);
    xmlhttp.open('GET', url, true);
    xmlhttp.onreadystatechange = printSeatDetail(seat_number, xmlhttp);
    xmlhttp.send();
}

function printSeatDetail(seat_number, xmlhttp){
    // console.log('msk');
    // console.log(xmlhttp);
    if (xmlhttp.status == 200) {
        console.log("msk");
        reponse = xmlhttp.responseText;

        var content = document.getElementById('not-selected');
        
        // TODO change this from response
        var title = "Avengers: Endgame";
        var date = "September 4, 2019 - 09.40 PM";
        var seat_number = 18;
        var price = 20000;
        content.innerHTML = ```
            <div class="not-selected"> 
                You haven't selected any seat yet. Please click on one of the seat provided. 
            </div>
        ```;
        var seat_current_number = document.getElementById('seat-current-number');
        seat_current_number.innerHTML = "Seat #" + seat_number;
    }
}

function showBuyModal() {
    // TODO: create AJAX here
    var overlay = document.getElementById('overlay');
    overlay.style.display = "block";

}