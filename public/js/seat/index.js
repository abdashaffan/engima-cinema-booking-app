function getSeatDetail(schedule_id, seat_number) {
    var xmlhttp = new XMLHttpRequest();
    var curr = document.getElementById('seat-current-number');
    curr.innerText = "Seat #"+seat_number;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            var not_selected = document.getElementById('not-selected');
            var selected = document.getElementById('selected');
            if (response.occupied == 0) {
                console.log(response.occupied)
                selected.style.display = 'block';
                not_selected.style.display = 'none';
                
                document.getElementById("seat-number-buy").value = seat_number;
            } else {
                console.log(response.occupied)
                console.log(seat_number)
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
    console.log(schedule_id)
    var xmlhttp = new XMLHttpRequest();
    var seat_number = document.getElementById("seat-number-buy").value
    console.log(seat_number)
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // var seat_number = document.getElementById("seat-number-buy").value
            // response = JSON.parse(this.responseText);
            response = this.responseText
            console.log(response);
            // var not_selected = document.getElementById('not-selected');
            // var selected = document.getElementById('selected');
            // if (response.occupied == 0) {
            //     console.log(response.occupied)
            //     selected.style.display = 'block';
            //     not_selected.style.display = 'none';
                
            // } else {
            //     console.log(response.occupied)
            //     console.log(seat_number)
            //     // TODO: change this to change element
            //     var current_element = document.getElementById(seat_number);
            //     current_element.className = "occupied";
            //     not_selected.style.display = 'block';
            //     selected.style.display = 'none';
                
            // }
        }
    }

    url = BASE_URL + '/seat/buy';
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/json');
    xmlhttp.send(JSON.stringify({schedule_id,seat_number}));
    // xmlhttp.send()

    var overlay = document.getElementById('overlay');
    overlay.style.display = "block";
}