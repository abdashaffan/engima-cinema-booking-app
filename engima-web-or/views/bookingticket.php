<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/css/bookingticketdesign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/changes.js"></script>
    <title>Booking Ticket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <section>
    <div class ="section-inner">
        <div class="topnav">
            <nav>
                <h1 class="engi-font">Engi</h1>
                <form action="/search"> 
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <a class="history" href="/transaction">Transactions</a>
                <a class ="logout" href="/logout" >Logout</a>
            </nav>
        </div>
            <?php



                $title = $movie["name"];
                $date = $schedule["date"];
                $time = $schedule["time"];
                $price = $schedule["price"];
                $text = "You haven't selected any seat yet. Please click on one of the seat provided.";

                echo "<div class='flex-container'>
                    <a href='#' class='previous round'>&#8249</a>
                    <h1 class='movieTitle'>".$title."</h1>";
                echo "</div>";
                    echo "<h2 class='schedule'>".$date." - </h2>";
                    echo "<h2 class ='time'>" . $time . "</h2>";
                
                
            
                echo "<div class = 'seatblock-container'>";
                    echo "<div class ='seats'>";
                        for($x =1; $x<=30;$x++)
                        {
                            if (!in_array($x,$seats_taken))
                            {
                                echo "<button type='button' onclick='bookTicket(" . $x . ")' class = 'seatrow-container-available'>";
                                echo $x;
                                echo "</button>";
                            } else 
                            {
                                echo "<div class = 'seatrow-container-notavailable'>";
                                echo $x;
                                echo "</div>";
                            }

                        } 
                    
                    echo "<div class ='screen'>Screen</div>";
                echo "</div>";
                

                    echo "<div id  ='summary'>";
                        echo "<h1>Booking Summary</h1>";
                        echo "<h2>".$text."</h2>";
                        echo "<p id ='movie'>".$title."</p>";
                        echo "<p id ='time'>".$date." - " .$time . "</p>";
                        echo "<p id ='noSeat'>Seat #".$seat."</p>";
                        echo "<p id ='price'>Rp ".$price."</p>";
                        echo "<button type='button' onclick='buySeat(" . $user["id"] . ",". $schedule["id"]. ")' class = 'buyTicket'>Buy Ticket</button>";
                            echo "<div id ='popup'>";
                                echo "<h2>Payment Success !</h2>";
                                echo"<br>";
                                echo "<div class ='content'>Thank you for your purchasing ! You can view your purchase now";
                                echo"<br>";
                                
                                echo "<a class ='button-transaction' href ='/transaction'>Go to transaction history</a></div>";
                            echo "</div>";
                        
                    echo "</div>";
                    
                    
                    echo "</div>";
                echo "</div>";
            ?>
        </div>
    </section>
</body>
</html>
