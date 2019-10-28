<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/transaction.css">
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
                <a class = "transaction" href="/transaction">Transactions</a>
                <a class ="logout" href="/logout">Logout<a>

               
            </nav>
        </div>
        <main>
        <section>
            <div class="section-inner">
                <h1 class="transaction-font">Transaction History</h1>
            </div>
            <div class="section-inner">
                <?php
                    foreach($movies as $movie)
                    {
                        $picture ='/Movie%20Pict/' . $movie["movie_id"] . ".jpg";
                        $title = $movie["name"];
                        $date =$movie["date"];
                        $time = $movie["time"];
                        $linkref="/review?movieid=" . $movie["movie_id"]  ;
                        $button_class_delete='hide';
                        $button_text_delete="Delete Review";
                        
                        echo "<div class = 'flex-container'>";
                            echo "<div class ='pic'>";
                                echo "<img src=".$picture." class='poster-img'/>";
                            echo "</div>";
                            echo "<div class ='history'>";
                                echo "<p id = 'title'>".$title."</p>";
                                echo "<p id ='date'>".$date."</p>";
                                echo "<p id ='time'> - ".$time." ".$time_type."</p>";
                            echo "</div>";

                            $currentDate = new DateTime('2019-11-08 00:00:00');
                            $movieDate = new DateTime($movie["date"] . " " . $movie["time"]);

                            if($currentDate < $movieDate){

                                $button_class = "display-none";
                            }
                            else {

                                if ($movie["reviewed_movie_id"] == NULL)
                                {
                                    $button_class = 'button-add';
                                    $button_text ="Add Review";
                                } else {
                                    $button_class ='button-edit';
                                    $button_text="Edit Review";
                                    $button_class_delete='button-delete';
                                    $button_text_delete="Delete Review";
                                    echo "<a href='/deleteReview?movieid=" . $movie["reviewed_movie_id"] . "' class=".$button_class_delete.">".$button_text_delete."</a>";
                                }

                            }

                            echo "<a href='".$linkref."' class=".$button_class.">".$button_text."</a>";                            
                        echo "</div>";
                    }  
                    // echo "<button type='button' onclick='alert('CLicked')' class = 'seatrow-container-available'>";
                    // echo $x;
                    // echo "</button>";
                ?>
            </div>
            
            
        </section>
        </main>
    </body>
</html>