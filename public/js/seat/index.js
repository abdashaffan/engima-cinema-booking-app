const seats = document.getElementsByClassName("seat");

function toggleClickedSeat(seatId) {
  const seat = document.getElementById(seatId);
  seat.classList.toggle("selected");
}

function resetSelectedSeat(el) {
  el.classList.remove("selected");
}

function getSeatDetail(schedule_id, seat_number) {
  for (let i = 0, len = seats.length; i < len; i++) {
    resetSelectedSeat(seats[i]);
  }
  const clickedSeatId = `seat-${seat_number}`;
  toggleClickedSeat(clickedSeatId);
  let xmlhttp = new XMLHttpRequest();
  let curr = document.getElementById("seat-current-number");
  curr.innerText = "Seat #" + seat_number;
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      response = JSON.parse(this.responseText);
      let not_selected = document.getElementById("not-selected");
      let selected = document.getElementById("selected");
      if (response.occupied == 0) {
        selected.style.display = "block";
        not_selected.style.display = "none";

        document.getElementById("seat-number-buy").value = seat_number;
      } else {
        // TODO: change this to change element
        let current_element = document.getElementById(seat_number);
        current_element.className = "occupied";
        not_selected.style.display = "block";
        selected.style.display = "none";
      }
    }
  };

  url =
    BASE_URL +
    "/seat/detail?schedule_id=" +
    schedule_id +
    "&seat_number=" +
    seat_number;
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}

function showBuyModal(schedule_id) {
  let xmlhttp2 = new XMLHttpRequest();
  let seat_number = document.getElementById("seat-number-buy").value;
  xmlhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      response2 = JSON.parse(this.responseText);
      if (response2.response == 1) {
        let overlay = document.getElementById("overlay");
        overlay.style.display = "block";
      } else {
        console.log("Not OK");
      }
    }
  };

  url = BASE_URL + "/seat/buy";
  xmlhttp2.open("POST", url, true);
  console.log(url);
  xmlhttp2.setRequestHeader("Content-Type", "application/json");
  xmlhttp2.send(JSON.stringify({ schedule_id, seat_number }));
}
