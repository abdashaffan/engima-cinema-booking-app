function getSeatDetail(film_id, seat_number) {
    var xmlhttp = new XMLHttpRequest();
    var curr = document.getElementById('seat-current-number');
    curr.innerText = "Seat #"+seat_number;
    xmlhttp.onreadystatechange = function (seat_number) {
        if (this.readyState == 4 && this.status == 200) {
            reponse = this.responseText;
            console.log(reponse);
            var not_selected = document.getElementById('not-selected');
            var selected = document.getElementById('selected');
            if (reponse == 0) {
                selected.style.display = 'none';
            } else {
                not_selected.style.display = 'none';
                selected.style.display = 'block';
            }
        }
    }
    // TODO: change this to base url
    base_url = "http://localhost/tugas-besar-1-2019/public";
    url = base_url + '/seat/detail/?film_id=' + film_id + '&?seat_number=' + seat_number;
    console.log(url);
    xmlhttp.open('GET', url, true);
    xmlhttp.send();
}

function showBuyModal() {
    // TODO: create AJAX here
    var overlay = document.getElementById('overlay');
    overlay.style.display = "block";

}