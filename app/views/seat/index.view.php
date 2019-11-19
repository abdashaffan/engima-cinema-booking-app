<div id="overlay">
    <div class="modal-overlay"> </div>
    <div class="modal-content-wrapper">
        <div class="modal-content">
            <h3 class="blue-color">Payment Request Created</h3>
            <span class="payment-details">
                <hr>
                <span style="display:none;color:red;" class="payment-details payment-details__error"
                    id="payment-modal-error"></span>
                <span class="payment-details-item payment-details__trans-id">Transaction ID: <br><span
                        id="trans-id"></span></span>
                <span class="payment-details-item payment-details__trans-virtual-acc">Virtual Account: <br><span
                        id="virtual-account"></span></span>
                <hr>
            </span>
            <?php echo '<a href="' . BASE_URL . '/transHistory">' ?>
            <div class="modal-bottom">Go to transaction history</div>
            </a>
        </div>
    </div>
</div>
<div class="seat">
    <div class="seat-detail">
        <?php echo '
            <a href="' . BASE_URL . '/film/' . $film['film_id'] . '">
                <img class="svg-superbig" src="' . BASE_URL . '/assets/icon/chevron-left-solid.svg">
            </a>'
        ?>
        <div>
            <h3><?php echo $film['title'] ?></h3>
            <h4>
                <?php
                $dateTime = date_create_from_format('Y-m-d H:i:s', $schedule['showtime']);
                echo $dateTime->Format('F d, Y') . " - ";
                $time = $dateTime->Format('H:i');
                $boundary = date('H:i', strtotime("12:00:00"));
                if ($time < $boundary) {
                    echo $time . ' AM';
                } else {
                    $interval = strtotime($time) - strtotime($boundary);
                    echo date("H:i", $interval) . ' PM';
                };
                ?>
            </h4>
        </div>
    </div>
    <div class="seat-desc">
        <div class="seat-number-wrapper">
            <div class="seat-number">
                <?php for ($i = 1; $i <= 30; $i++) : ?>
                <?php
                        if (isset($seats[$i])) {
                            if ($seats[$i]['seat_number'] == $i) {
                                echo '<div id="seat-' . $i . '" class="seat occupied" id="' . $i . '" >';
                            } else {
                                echo '<div id="seat-' . $i . '" class="seat not-occupied" id="' . $i . '" onclick="getSeatDetail('  . $i . ')">';
                            }
                        } else {
                            echo '<div id="seat-' . $i . '" class="seat not-occupied" id="' . $i . '" onclick="getSeatDetail('  . $i . ')">';
                        }
                        echo $i . '</div>';
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
                <div id="not-selected">
                    You haven't selected any seat yet. Please click on one of the seat provided.
                </div>
                <div id="selected">
                    <h4><?php echo $film['title'] ?></h4>
                    <p>
                        <?php
                        $dateTime = date_create_from_format('Y-m-d H:i:s', $schedule['showtime']);
                        echo $dateTime->Format('F d, Y') . ", ";
                        $time = $dateTime->Format('H:i');
                        $boundary = date('H:i', strtotime("12:00:00"));
                        if ($time < $boundary) {
                            echo $time . ' AM';
                        } else {
                            $interval = strtotime($time) - strtotime($boundary);
                            echo date("H:i", $interval) . ' PM';
                        };
                        ?>
                    </p>
                    <div class="seat-price">
                        <h4 id="seat-current-number"></h4>
                        <h4><?php echo 'Rp' . $film['price'] ?></h4>
                    </div>
                    <input type="hidden" id="seat-number-buy" value="">
                    <?php echo '<div class="seat-buy" onclick="buy(' . $schedule['schedule_id'] . ')">Buy Ticket</div>' ?>
                </div>
                <div>
                </div>
            </div>
        </div>