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
                  <button type="button" class="AddBtn">Add Review</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

