<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/detailpagedesign.css">

    </head>
    <body>
        <div class="topnav">
            <nav>
                <h1 class="engi-font">Engi</h1>
                <div class="search-container">
                    <form action="/search">
                        <input type="text" placeholder="Search movie" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <a class="transaction" href="/transaction" >Transactions</a>
                <a class ="logout" href="/logout" >Logout</a>
                
            </nav>
            
        </div>
        <main>
        <section>
            <div class="section-inner">
                <?php
                foreach($movie as $mov){}
                    $imgLink = "Movie Pict\\".$mov["id"].".jpg";
                    $movieTitle = $mov["name"];
                    $genres = $mov["genre"];
                    $rating =$mov["rating"];
                    $times = $mov["duration"];
                    $data = $mov["release_date"];

                    foreach($rating_data as $mov_rating){
                        $rating = $mov_rating["rate"];
                    }
                    $description= $mov["synopsis"];
                    echo "<img src='".$imgLink."' class='poster-img'/>";
                    echo "<p class='title-font'>".$movieTitle."</p>";
                    echo "<p class='genre-font'>".$genres."</p>";
                    echo "<p class='times-font'>".$times." mins</p>";
                    echo "<p class='release-font'>".$data."</p>";
                    echo "<span class='fa fa-star checked'><p class='rating-font'>".$rating."</p></span>";
                   
                    echo "<p class='description-font'>" .$description."</p>"
                ?>
                    <!-- Bagian Jadwal -->
                        <?php
                            if (count($schedules)>0)
                            {
                                echo "
                                    <table class ='schedule'>
                                        <tr>
                                            <th id ='top' colspan ='4'>Schedule</th>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Available Seats</th>
                                            <th></th>
                                        </tr>";
                                foreach($schedules as $schedule)
                                {   
                                    $header1 = $schedule['date'];
                                    $header2 = $schedule["time"];
                                    $header3 = $schedule["num_seats"];
                               
                                    if ($header3 <= 0 ){
                                        
                                        $avai = "Not Available";
                                        $class ='notavailable';
                                        $link ='none';
                                        $header3 =0;

                                    } else 
                                    {
                                        $avai = "Book";
                                        $class ='available';
                                        $link ='/booking?scheduleid=' . $schedule["id"];
                                    }
                                    echo "<tr><td>" .$header1. 
                                        "</td><td>" .$header2. 
                                        "</td><td>" .$header3. 
                                        "</td><td><a href=".$link." class= ".$class.">" .$avai. "</a></td></tr>";
                                }

                                    echo "</table>";
                            } else 
                            {
                                echo "
                                    <table class ='schedule'>
                                        <tr>
                                            <th id ='top' colspan ='4'>Schedule</th>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Available Seats</th>
                                            <th></th>
                                        </tr> </table>";
                            }

                            // Bagian Review
                            if (count($rating_data)>0)
                            {
                                foreach($movie as $mov){
                                    $headertitle = $mov["name"];
                                    $piclink = $mov["id"];
                                }
                                
                                $headerrating="rate";
                                $headerreview="review";
                                echo "<table class ='review'>
                                        <tr>
                                            <th>Reviews></th>
                                        </tr>";
                                foreach ($rating_data as $row)
                                {
                                    echo "<tr>
                                            <td><img src='Movie Pict\\".$piclink.".jpg' class='poster-img-reviews'/></td>
                                            <td>" .$headertitle."<br>".$row[$headerrating]."/10<br>".$row[$headerreview]."</td>
                                          </tr>";
                                        
                                        
                                }

                                    echo "</table>";
                            } else 
                            {
                                echo "
                                    <table class ='review'>
                                        <tr>
                                            <th id ='top' colspan ='4'>Reviews</th>
                                        </tr>
                                        <tr><td><br></td></tr>
                                        <tr><td><br></td></tr>
                                        <tr><td><br></td></tr>
                                    </table>";
                            }
                                

                        

                        ?>
                    
 
            </div> 
        </section>

        </main>

    </body>
</html>