function bookTicket(seat)
{

    var clas ='summary';

    if (document.getElementById(clas)== null) {

    } else {

        document.getElementById('summary').id="book";

    }




    document.getElementById('noSeat').innerHTML="Seat # "+seat;
   
   
//    var button_class = document.getElementsByClassName('seatrow-container-available').className;
}



function buySeat(userId, scheduleId){

    var seat = document.getElementById('noSeat').innerHTML;
    seat = parseInt(seat.replace(/^\D+/g, ''));


    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(this.readyState==4 && this.status==200){

            var pop = document.getElementById("popup");
            pop.style.visibility="visible";
            pop.style.opacity=1;

            
            document.getElementsById('section-inner').id ="overlay";



        }

    }

    request.open("POST","api");
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    request.send(JSON.stringify({
        "user_id" : userId,
        "seat" : seat,
        "schedule_id" : scheduleId,
        "function" : "bookSeats"
    }))


}