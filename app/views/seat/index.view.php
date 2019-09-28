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
                            echo '<div class="not-occupied">';
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
            <h4>Booking Summary</h4>
            <p>
                You haven't selected any seat yet. Please click on one of the seat provided.
            </p>
        </div>
    </div>
</div>