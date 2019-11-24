<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <header>

    </header>

    <body>
        <div class="flex">
            <div>
                <h1>Transaction History</h1>
            </div>
        </div>
        <div class="list-transaksi">
            <?php 
                $user_id = intval($user_ID['user_id']);
                foreach ($transactions as $transaction) : 
                $film_id = $transaction["schedule"]["film_id"];
                ?>
            <div>
                <?php echo "<img src='http://image.tmdb.org/t/p/w200/".  $films[$film_id]["poster_path"] . "'>" ?>
                <div class="info">
                    <h2><?php echo $films[$film_id]['title'] ?></h2>
                    <h3>Schedule:
                        <?php
              $date = new DateTime($transaction['schedule']['showtime']);
              if ($date) {
                $string = $date->format('F d Y - h:i A');
                echo $string;
              } else {
                echo "salah";
              }
              ?>
                    </h3>
                    <form id="passV" method="get" action="<?= BASE_URL; ?>/transhistory/toreview">

                        <?php
              date_default_timezone_set('Asia/Jakarta');
              $currdate = new DateTime();
              if($transaction['status_transaksi']=='CANCELLED'){
                    echo "<button type=\"button\" class=\"AddBtn\">Cancelled</button>";
              } else if ($transaction['status_transaksi']=='PENDING'){
                    echo "<button type=\"button\" class=\"AddBtn\">Pending</button>";
              }else if ($transaction['status_transaksi']=='SUCCESS'){
				if ($currdate > $date) {
					if ($transaction['status_review'] == 0) {
					  echo "<input type=\"hidden\" name=\"user_id\" value = " . $user_id . ">
                            <input type=\"hidden\" name=\"film_id\" value=" . $film_id . ">
                            <input type=\"hidden\" name=\"status\" value=" . $transaction["status_review"] . ">
							<button type=\"submit\" class=\"AddBtn\">Add Review</button>";
					} else {
					  echo "
							<div class=\"Btn2\"><div>
							<input type=\"hidden\" name=\"user_id\" value = " . $user_id . ">
                            <input type=\"hidden\" name=\"film_id\" value=" . $film_id . ">
                            <input type=\"hidden\" name=\"status\" value=" . $transaction["status_review"] . ">
							<button onclick=\"deleteReview()\" type=\"submit\" class=\"DelBtn\">Delete Review</button></div>
							<button onclick=\"editReview()\" type=\"submit\" class=\"EdtBtn\">Edit Review</button>
							</div>";
					}
				} else {
					echo "<h4>Belum Tayang</h4>";
				}
			  }

              ?>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </body>