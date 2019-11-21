/** Variabel buat Request ke WS-Bank dan WS-Transaksi */
const serviceUriSoap = "http://localhost:8080/services/bankpro";
const BaseServiceUriRest = "http://localhost:3000";
const parser = new DOMParser();

/************************************************************ */
const seats_el = document.getElementsByClassName("seat");
const engima_user = getCookie("engima_user");
const trans_id_el = document.getElementById("trans-id");
const virtual_account_el = document.getElementById("virtual-account");
const modal_error_el = document.getElementById("payment-modal-error");

function toggleClickedSeat(el) {
  el.classList.toggle("selected");
}

function resetSelectedSeat(el) {
  el.classList.remove("selected");
}

function getSeatDetail(seat_number) {
  for (let i = 0, len = seats_el.length; i < len; i++) {
    resetSelectedSeat(seats_el[i]);
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

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    if (c.includes(name)) {
      c = c.replace(name, "");
      return c;
    }
  }
  return "";
}

async function makeRequest(method, url, data, contentTypeHeader) {
  return new Promise(function(resolve, reject) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.onload = function() {
      if (this.status >= 200 && this.status < 300) {
        resolve(xhr.response);
      } else {
        reject({
          status: this.status,
          statusText: xhr.statusText
        });
      }
    };
    xhr.onerror = function() {
      reject({
        status: this.status,
        statusText: xhr.statusText
      });
    };
    xhr.setRequestHeader("Content-Type", contentTypeHeader);
    xhr.overrideMimeType("text/plain; charset=x-user-defined"); //supaya jalan di firefox
    xhr.send(data);
  });
}

async function getAccountNumberSOAP(username) {
  if (username !== "") {
    const xml = `
    <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:k03="http://K03G04Tubes2.org/">
      <soapenv:Header/>
      <soapenv:Body>
        <k03:getNasabahRealAccountByName>
            <username>${username}</username>
        </k03:getNasabahRealAccountByName>
      </soapenv:Body>
    </soapenv:Envelope>`;

    const res = await makeRequest("POST", serviceUriSoap, xml, "text/xml");
    const xmlDoc = parser.parseFromString(res, "text/xml");
    const acc = xmlDoc.getElementsByTagName("return");
    return parseInt(acc[0].innerHTML);
  } else {
    console.log("username value is empty, something went wrong.");
    return -999;
  }
}

async function createVirtualAccountNumberSOAP(account_num) {
  if (account_num !== "") {
    const xml = `
    <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:k03="http://K03G04Tubes2.org/">
      <soapenv:Header/>
      <soapenv:Body>
        <k03:createNasabahVirtualAccount>
            <account_num>${account_num}</account_num>
        </k03:createNasabahVirtualAccount>
      </soapenv:Body>
    </soapenv:Envelope>
    `;
    const res = await makeRequest("POST", serviceUriSoap, xml, "text/xml");
    const xmlDoc = parser.parseFromString(res, "text/xml");
    const acc = xmlDoc.getElementsByTagName("return");
    return parseInt(acc[0].innerHTML);
  } else {
    console.log("Account number not found");
    return -999;
  }
}

async function createNewTransactionREST(
  account_num,
  virtual_account_num,
  schedule_id,
  film_id,
  price,
  seat_num
) {
  //prekondisi: virtual_account tidak kosong dan valid
  //TODO: Liat komen" nya'
  const requestBody = JSON.stringify({
    id_pengguna: account_num,
    va_tujuan: virtual_account_num,
    id_film: film_id.toString(), // nanti ganti jadi number
    id_jadwal: schedule_id,
    kursi_pesanan: seat_num,
    harga: price
  });
  const Uri = BaseServiceUriRest + "/api/transaksi";
  const res = await makeRequest("POST", Uri, requestBody, "application/json");
  const resJSON = JSON.parse(res);
  if (resJSON.response) {
    return resJSON.response.insertId;
  }
  return -999; //no response, insert transaction failed
}

function isPaymentRequestValid(trans_id, virtual_account) {
  return (
    trans_id !== -999 &&
    virtual_account !== -999 &&
    virtual_account !== -1 &&
    trans_id &&
    -1
  );
}

async function createPaymentRequest(schedule_id, film_id, price) {
  const user_account_num = await getAccountNumberSOAP(engima_user);
  const engima_account_num = await getAccountNumberSOAP("engima");
  const va = await createVirtualAccountNumberSOAP(engima_account_num);
  const seat_number = parseInt(
    document.getElementById("the-seat-number").innerText,
    10
  );
  const newTrasactionId = await createNewTransactionREST(
    user_account_num,
    va,
    schedule_id,
    film_id,
    price,
    seat_number
  );
  if (isPaymentRequestValid(newTrasactionId, va)) {
    let xmlhttp2 = new XMLHttpRequest();
    xmlhttp2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let res = JSON.parse(this.responseText);
        if (res.response == 1) {
          //seat booking success
          trans_id_el.innerText = newTrasactionId;
          virtual_account_el.innerText = va;
        } else {
          //Bikin Virtual account sukses, transaksi Id sukses, tapi booking seat gagal
          //TODO (kalo sempet) : Hapus virtual akun sama transaksi yang sebelumnya dibuat
          // ^ mesti bikin endpoint baru di ws-transaksi dan ws-bank
          console.log("Not OK");
          modal_error_el.style.display = "inline-block";
          modal_error_el.innerText = "Internal server error";
        }
      }
    };
    //
    url = BASE_URL + "/seat/buy";
    xmlhttp2.open("POST", url, true);
    xmlhttp2.setRequestHeader("Content-Type", "application/json");
    xmlhttp2.send(JSON.stringify({ schedule_id, seat_number }));
  } else {
  }
  let overlay = document.getElementById("overlay");
  overlay.style.display = "block";
}
