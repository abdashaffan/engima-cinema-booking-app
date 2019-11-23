<div class="film">
    <div class="film-detail">
        <?php echo "<img class='film-thumbnail' src='http://image.tmdb.org/t/p/w200/" . $film['poster_path'] . "'" . BASE_URL . "/assets/img/film/'>"; ?>
        <div class="film-detail-desc">

            <h2><?php echo $film['title']; ?></h2>
            <b>
                <p class="blue-color">
                    <?php
                    $i = 0;
                    $len = count($film['genres']);
                    foreach ($film['genres'] as $genre) : ?>
                    <?php
                            if ($i == 0) {
                                echo $genre['name'];
                            } ?>

                    <?php
                            if ($i != 0) {
                                echo ", ";
                                echo $genre['name'];
                            } ?>

                    <?php $i++ ?>

                    <?php endforeach; ?>
                    | <?php echo $film['runtime']; ?> mins</p>
                <p>Released date: <?php echo $film['release_date']; ?></p>
            </b>
            <div class='rating'>
                <h3>
                    <?php echo '<img class="svg-big" src="' . BASE_URL . '/assets/icon/star-solid.svg">' ?>
                    <?php echo $film['vote_average']; ?>
                    <span>/10 (TheMovieDB)</span>
                </h3>
            </div>
            <div class='rating'>
                <h3>
                    <?php echo '<img class="svg-big" src="' . BASE_URL . '/assets/icon/star-solid.svg">' ?>
                    <?php echo $rating_from_users; ?>
                    <span>/10 (Engima)</span>
                </h3>
            </div>
            <p>
                <?php echo $film['overview']; ?>
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
                    <?php 
                    $i=-1;
                    foreach ($schedules as $schedule) :
                        $i = $i+1;
                    ?>
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
                                        echo $time . ' AM';
                                    } else {
                                        $interval = strtotime($time) - strtotime($boundary);
                                        echo date("H:i", $interval) . ' PM';
                                    }
                                    ?>
                        </td>
                        <td class="table-seat">
                            <?php
                                    if ($schedule['count'] == NULL) {
                                        $schedule['count'] = 0;
                                    }
                                    echo 30 - $schedule['count'];
                                    ?>
                            seats
                        </td>
                        <?php if ($schedule['count'] == 30) : ?>
                        <td class="table-state not-available">
                            Not Available
                            <img src="<?php echo BASE_URL; ?>/assets/icon/times-circle-solid.svg" alt=""
                                class="svg-med">
                        </td>
                        <?php else : ?>
                        <td class="table-state available">
                            <form class="book_form" action="<?= BASE_URL; ?>/seat" method="GET" id='<?php echo "form" . $i;?>'>
                                <?php $id = $schedule["schedule_id"];?>
                                <input type="hidden" name="film_id" value="<?php echo $film_id; ?>">
                                <input type="hidden" name="schedule_id" value="<?php echo $id ?>">
                                <?php
                                    # Check if passed already
                                    # If passed or fully booked then cannot book
                                    $film_time = new DateTime($schedule["showtime"]);
                                    $current_time = new DateTime();
                                    if($film_time<$current_time){
                                        echo '<span style="color:red;cursor:pointer;" class="book-played-btn">Played</span>';
                                    } else {
                                        echo '<span style="color:blue;cursor:pointer;" onClick="submit(' . $i.  ')">Book</span>';
                                    }
                                ?>
                            </form>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="film-review">
            <div class="wrapper">
                <h3>Reviews</h3>
                <div class="review-detail">
                    <?php for ($i = 0; $i < count($reviews) - 1; $i++) : ?>
                    <div>
                        <?php echo "<img class='review-user' src='data:" . $reviews[$i]['mime'] . ";base64," . base64_encode($reviews[$i]['profile_picture']) . "'>" ?>
                        <div>
                            <b>
                                <p><?php echo $reviews[$i]['username'] ?></p>
                            </b>
                            <div class='rating'>
                                <h3>
                                    <?php echo '<img class="svg-small" src="' . BASE_URL . '/assets/icon/star-solid.svg">' ?>
                                    <?php echo $reviews[$i]['rating'] ?>
                                    <span>/10</span>
                                </h3>
                            </div>
                            <p>
                                <?php echo $reviews[$i]['comment'] ?>
                            </p>
                        </div>
                    </div>
                    <?php endfor; ?>

                    <?php
                    $n = count($reviews);
                    if ($n == 0) {
                        echo "<p>Tidak Ada Review </p>";
                    } else {
                        // TODO!!! ubah
                        echo "
                                <div class='review-last'>
                                    <img class='review-user' src='data:" . $reviews[$n - 1]['mime'] . ";base64," . base64_encode($reviews[$n - 1]['profile_picture']) . "'>
                                    <div>
                                        <b><p>" . $reviews[$n - 1]['username'] . "</p></b>
                                        <div class='rating'>
                                            <h3>
                                                <img class='svg-small' src='" . BASE_URL . "/assets/icon/star-solid.svg'>"
                            . $reviews[$n - 1]['rating'] .
                            "<span>/10</span>
                                            </h3>
                                        </div>
                                        <p>" . $reviews[$n - 1]['comment'] . "</p>
                                    </div>
                                </div> ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>