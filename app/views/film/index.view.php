<div class="film">
    <div class="film-detail">
        <?php echo "<img class='film-image-big' src='/public/assets/img/film/".$film['thumbnail']."'>"; ?>
        <div class="film-detail-desc">
            
            <h2><?php echo $film['title']; ?></h2>
            <b>
                <p class="blue-color"><?php echo $film['genre']; ?> | <?php echo $film['length']; ?> mins</p>
                <p>Released date: <?php echo $film['release_date']; ?></p>
            </b>
            <div class='rating'>
                <h3>
                    <img class="svg-big" src="/public/assets/icon/star-solid.svg">
                    <?php echo $film['rating']; ?>
                    <span>/10</span>
                </h3>
            </div>
            <p>
                <?php echo $film['sinopsis']; ?>
            </p>
        </div>  
    </div>
    <div class="film-desc">
        <div class="film-schedule">
            <div class="wrapper">
                <h3>Schedules</h3>
                <table>
                    <tr>
                        <th>
                            Date
                        </th>
                        <th>
                            Time
                        </th>
                        <th>
                            Available Seats
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                    <?php foreach ($schedules as $key => $schedule) : ?>
                        <tr>
                            <td>
                                <!-- TODO: trim zero in front of date -->
                                <?php
                                    $dateTime = date_create_from_format('Y-m-d H:i:s', $schedule['showtime']);
                                    echo $dateTime->Format('F d, Y');
                                ?>
                            </td>
                            <td>
                                <?php
                                    $time = date_create_from_format('Y-m-d H:i:s', $schedule['showtime'])->Format('H:i');
                                    $boundary = date('H:i', strtotime("12:00:00"));
                                    if ($time < $boundary) {
                                        echo $time.' AM';
                                    } else {
                                        $interval = strtotime($time) - strtotime($boundary);
                                        echo date("H:i", $interval).' PM';
                                    }
                                ?>
                            </td>
                            <td class="table-seat">
                                <?php 
                                    if ($schedule['count'] == NULL) {
                                        $schedule['count'] = 0;
                                    } 
                                    echo $schedule['count']; 
                                ?> 
                                seats
                            </td>
                            <?php 
                                if ($schedule['count'] == 30) {
                                    echo '
                                        <td class="table-state not-available">
                                            Not Available 
                                            <img class="svg-med" src="/public/assets/icon/times-circle-solid.svg">
                                        </td>';
                                } else {
                                    echo '
                                        <td class="table-state available">
                                            Book Now 
                                            <img class="svg-med" src="/public/assets/icon/right-arrow.svg">
                                        </td>';
                                } 
                            ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="film-review">
            <div class="wrapper">
                <h3>Reviews</h3>
                <div class="review-detail">
                    <div>
                        <img class="review-user" class="review-user" src="/public/assets/img/user/5.jpg">
                        <div>
                            <b><p>antonius.wahyu</p></b>
                            <div class='rating'>
                                <h3>
                                    <img class="svg-small" src="/public/assets/icon/star-solid.svg">
                                    8.75
                                    <span>/10</span>
                                </h3>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consectetur doloribus sed alias iste reiciendis perferendis hic voluptates! Officia, quaerat eos. Ut deserunt et, blanditiis perferendis dolor voluptates quos nisi?
                            </p>
                        </div>
                    </div>
                    <div>
                        <img class="review-user" src="/public/assets/img/user/5.jpg">
                        <div>
                            <b><p>antonius.wahyu</p></b>
                            <div class='rating'>
                                <h3>
                                    <img class="svg-small" src="/public/assets/icon/star-solid.svg">
                                    8.75
                                    <span>/10</span>
                                </h3>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consectetur doloribus sed alias iste reiciendis perferendis hic voluptates! Officia, quaerat eos. Ut deserunt et, blanditiis perferendis dolor voluptates quos nisi?
                            </p>
                        </div>
                    </div>
                    <div class="review-last">
                        <img class="review-user" src="/public/assets/img/user/5.jpg">
                        <div>
                            <b><p>antonius.wahyu</p></b>
                            <div class='rating'>
                                <h3>
                                    <img class="svg-small" src="/public/assets/icon/star-solid.svg">
                                    8.75
                                    <span>/10</span>
                                </h3>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consectetur doloribus sed alias iste reiciendis perferendis hic voluptates! Officia, quaerat eos. Ut deserunt et, blanditiis perferendis dolor voluptates quos nisi?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>