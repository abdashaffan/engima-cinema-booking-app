function getSeatDetail(schedule_id, seat_number) {
    var xmlhttp = new XMLHttpRequest();
    console.log("wakgeng2")
    var curr = document.getElementById('seat-current-number');
    curr.innerText = "Seat #"+seat_number;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            var not_selected = document.getElementById('not-selected');
            var selected = document.getElementById('selected');
            if (response.occupied == 0) {
                selected.style.display = 'block';
                not_selected.style.display = 'none';
                
                document.getElementById("seat-number-buy").value = seat_number;
            } else {
                // TODO: change this to change element
                var current_element = document.getElementById(seat_number);
                current_element.className = "occupied";
                not_selected.style.display = 'block';
                selected.style.display = 'none';
                
            }
        }
    }

    url = BASE_URL + '/seat/detail?schedule_id=' + schedule_id + '&seat_number=' + seat_number;
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
}

function showBuyModal(schedule_id) {
    console.log("wakgeng")
    var xmlhttp2 = new XMLHttpRequest();
    var seat_number = document.getElementById("seat-number-buy").value
    xmlhttp2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response2 = JSON.parse(this.responseText);
            if (response2.response == 1) {
                var overlay = document.getElementById('overlay');
                overlay.style.display = "block";
            } else {
                console.log("Not OK");
            }
        }
    }

    url = BASE_URL + '/seat/buy';
    xmlhttp2.open('POST', url, true);
    console.log(url);
    xmlhttp2.setRequestHeader('Content-Type', 'application/json');
    xmlhttp2.send(JSON.stringify({schedule_id,seat_number}));
}