<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<header>

</header>

<body>
    <div class="flex">
      <div><h1>Transaction History</h1></div>
    </div>
    <div class="list-transaksi">
        <?php foreach ($transactions as $key => $transaction): ?>
            <div>
                <?php echo "<img src='/public/assets/img/".$transaction['thumbnail']."'>" ?>
                <div class="info">
                  <h2><?php echo $transaction['title'] ?></h2>
                  <h3>Schedule: 
                    <?php 
                      $date = DateTime::createFromFormat('Y-m-d H:i:s', $transaction['showtime']);
                      if($date){
                        $string = $date->format('F d Y - h:i A');
                        echo $string;
                      }
                      else{
                        echo "salah";
                      }
                    ?>
                  </h3>
                  <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $currdatestr = date('Y-m-d H:i:s', time());
                    $currdate = DateTime::createFromFormat('Y-m-d H:i:s', $currdatestr);
                    if($currdate>$date){
                      
                      if($transaction['status']==0){
                        echo "<button type=\"button\" class=\"AddBtn\">Add Review</button>" ;
                      }
                      else{
                        echo "
                        <div class=\"Btn2\"><div>
                        <button type=\"button\" class=\"DelBtn\">Delete Review</button></div>
                        <button type=\"button\" class=\"EdtBtn\">Edit Review</button>
                        </div>";
                      }
                    } 
                    else{
                      echo "<h4>Belum Tayang</h4>" ;
                    }
                  ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

