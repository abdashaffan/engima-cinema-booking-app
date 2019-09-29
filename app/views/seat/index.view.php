<div id="overlay">
    <div class="modal-overlay"> </div>
    <div class="modal-content-wrapper">
        <div class="modal-content">
            <h3 class="blue-color">Payment Success!</h3>
            <p>
                Thank you for purchasing! You can view your purchase now.
            </p>
            <!-- TODO: go to transaction -->
            <a href="/transaction">
                <div class="modal-bottom">Go to transaction history</div>
            </a>
        </div>
    </div>
</div>
<div class="seat">
    <div class="seat-detail">
        <img class="svg-superbig" src="/public/assets/icon/chevron-left-solid.svg">
        <div>
            <h3><?php echo $film['title'] ?></h3>
            <h4>
                <?php
                    $dateTime = date_create_from_format('Y-m-d H:i:s', $schedule['showtime']);
                    echo $dateTime->Format('F d, Y') . " - ";
                    $time = $dateTime->Format('H:i');
                    $boundary = date('H:i', strtotime("12:00:00"));
                    if ($time < $boundary) {
                        echo $time.' AM';
                    } else {
                        $interval = strtotime($time) - strtotime($boundary);
                        echo date("H:i", $interval).' PM';
                    };
                ?>
            </h4>
        </div>
    </div>
    <div class="seat-desc">
        <div class="seat-number-wrapper">
            <div class="seat-number">
                <?php for ($i = 0; $i<30; $i++ ): ?>
                    <?php
                        if ($seats[$i] != NULL and $seats[$i]['occupied']!=0){
                            echo '<div class="occupied">';
                        } else {
                            echo '<div class="not-occupied" onclick="getSeatDetail()">';
                        }
                        echo $i+1 . '</div>';
                    ?>
                <?php endfor ?>
            </div>
            <div class="seat-screen">
                Screen
            </div>
        </div>
        <div class="seat-summary"> 
            <h3>Booking Summary</h3>
            <div id="seat-summary-content" class="seat-sumary-content">
                <!-- TODO: create AJAX here -->
                <!-- <div class="not-selected"> 
                    You haven't selected any seat yet. Please click on one of the seat provided. 
                </div> -->
                <h4>Avengers: Endgame</h4>
                <p>
                    September 4, 2019, 09.40 PM
                </p>
                <div class="seat-price">
                    <h4>Seat #18</h4>
                    <h4>Rp 45.000</h4>
                </div>
                <div class="seat-buy" onclick="showBuyModal()">Buy Ticket</div>
            <div>
        </div>
    </div>
</div>