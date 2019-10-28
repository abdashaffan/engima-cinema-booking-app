<?php require "Connection.php";
 $tableName="Schedule" ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="TransactionHistoryPageDesign.css">
        <title>Transaction History</title>
    </head>

    <body>
        <div class="topbar">
            <nav>
                <h1 class="engi-font">Engi</h1>
                <div class ="search-container">
                    <form action="/search.php"> 
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
             
                    </form>
                </div>
                <a class = "transaction" href="TransactionHistoryPage.php">Transactions</a>
                <a class ="logout" href="#">Logout<a>

               
            </nav>
        </div>
        <main>
        <section>
            <div class="section-inner">
                <h1 class="transaction-font">Transaction History</h1>
            </div>
            <div class="section-inner">
                <?php
                    foreach ($movies as $movie)
                    {
                        $picture ="";
                        $title =$movie("name");
                        $date =$movie("date");
                        $time =$movie("time");
                        $time_type ="PM";
                        $linkref="\userreview";
                        $review_id="0";
                    }
                        $picture ='https://cdn.flickeringmyth.com/wp-content/uploads/2019/03/Endgame-international-posters-1-600x889.jpg';

                        $button_class_delete='hide';
                        $button_text_delete="Delete Review";
                        
                        for ($x = 1; $x <= 3; $x++) {
                            echo "<div class = 'flex-container'>";
                                echo "<div class ='pic'>";
                                    echo "<img src=".$picture." class='poster-img'/>";
                                echo "</div>";
                                echo "<div class ='history'>";
                                    echo "<p id = 'title'>".$title."</p>";
                                    echo "<p id ='date'>".$date."</p>";
                                    echo "<p id ='time'> - ".$time." ".$time_type."</p>";
                                echo "</div>";
                                if ( $review_id == 0)
                                {
                                    $button_class = 'button-add';
                                    $button_text ="Add Review";
                                } elseif ($review_id == 1)
                                {
                                    $button_class ='button-edit';
                                    $button_text="Edit Review";
                                    $button_class_delete='button-delete';
                                    $button_text_delete="Delete Review";
                                    echo "<a href=".$linkref."class=".$button_class_delete.">".$button_text_delete."</a>";
                                }
                                $review_id="1";
                                
                                echo "<a href=".$linkref."class=".$button_class.">".$button_text."</a>";
                                
                            echo "</div>";
                        } 
                      
                ?>
            </div>
            
            
        </section>
        </main>
    </body>
</html>