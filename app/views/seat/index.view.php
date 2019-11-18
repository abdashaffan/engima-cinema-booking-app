<div id="overlay">
    <div class="modal-overlay"> </div>
    <div class="modal-content-wrapper">
        <div class="modal-content">
            <h3 class="blue-color">Payment Success!</h3>
            <p>
                Thank you for purchasing! You can view your purchase now.
            </p>
            <!-- TODO: go to transaction -->
            <?php echo '<a href="' . BASE_URL . '/transHistory">' ?>
            <!-- <a href="/transHistory"> -->
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
                            if ($seats[$i]['occupied'] == 1) {
                                echo '<div id="seat-' . $i . '" class="seat occupied" id="' . $i . '" >';
                            } else {
                                echo '<div id="seat-' . $i . '" class="seat not-occupied" id="' . $i . '" onclick="getSeatDetail(' . $schedule['schedule_id'] . ',' . $i . ')">';
                            }
                        } else {
                            echo '<div id="seat-' . $i . '" class="seat not-occupied" id="' . $i . '" onclick="getSeatDetail(' . $schedule['schedule_id'] . ',' . $i . ')">';
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
                    <?php echo '<div class="seat-buy" onclick="showBuyModal(' . $schedule['schedule_id'] . ')">Buy Ticket</div>' ?>
                </div>
                <div>
                </div>
            </div>
        </div>