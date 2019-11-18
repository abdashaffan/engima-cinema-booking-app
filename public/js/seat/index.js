const seats = document.getElementsByClassName("seat");

function toggleClickedSeat(el) {
  el.classList.toggle("selected");
}

function resetSelectedSeat(el) {
  el.classList.remove("selected");
}

function getSeatDetail(seat_number) {
  for (let i = 0, len = seats.length; i < len; i++) {
    resetSelectedSeat(seats[i]);
  }
  let clickedSeat = document.getElementById(`seat-${seat_number}`);
  toggleClickedSeat(clickedSeat);
  let curr = document.getElementById("seat-current-number");
  let not_selected = document.getElementById("not-selected");
  let selected = document.getElementById("selected");
  curr.innerHTML = `<span id="the-seat-number"></span>`;
  curr.prepend("Seat #");
  let seat = document.getElementById("the-seat-number");
  seat.innerText = seat_number;

  if (clickedSeat.classList.contains("not-occupied")) {
    selected.style.display = "block";
    not_selected.style.display = "none";
  }
}

function buy(schedule_id) {
  let seat_number = document.getElementById("the-seat-number").innerText;
  let xmlhttp2 = new XMLHttpRequest();
  console.log(typeof seat_number);
  xmlhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      let res = JSON.parse(this.responseText);
      if (res.response == 1) {
        let seat = document.getElementById(`seat-${res.seat_number}`);
        seat.classList.remove("not-occupied");
        seat.classList.add("occupied");
        let overlay = document.getElementById("overlay");
        overlay.style.display = "block";
      } else {
        console.log("Not OK");
      }
    }
  };

  url = BASE_URL + "/seat/buy";
  xmlhttp2.open("POST", url, true);
  xmlhttp2.setRequestHeader("Content-Type", "application/json");
  xmlhttp2.send(JSON.stringify({ schedule_id, seat_number }));
}
