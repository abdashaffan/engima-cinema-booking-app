<?php require "Connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="UserReviewDesign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="topbar">
            <nav>
                <h1 class="engi-font">Engi</h1>
                <form action="/search.php"> 
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>          
                </form>
                <a class="history" href="TransactionHistoryPage.php" >Transactions</a>
                <a class ="logout" href="#" >Logout<a>      
            </nav>
        </div>
    <div class="back-container">
            <a href="#" class="previous round">&#8249;</a>
            <?php
                $title="Avenger : EndGame";
                echo "<h1 class='movieTitle'>".$title."</h1>";
            ?>
    </div>
    <section>
        <div class ="container">

                <!-- <a href="#" class="previous round">&#8249;</a>
                <h1 class="movieTitle">Movie Title</h1> -->
                <form action ="#.php">
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Add Rating</label>
                        </div>
                        <div class="col-75">
                            <div class="rate">
                                <input type="radio" id="star10" name="rate" value="10" />
                                <label for="star10" title="text">10 stars</label>
                                <input type="radio" id="star9" name="rate" value="9" />
                                <label for="star9" title="text">9 stars</label>
                                <input type="radio" id="star8" name="rate" value="8" />
                                <label for="star8" title="text">8 stars</label>
                                <input type="radio" id="star7" name="rate" value="7" />
                                <label for="star7" title="text">7 stars</label>
                                <input type="radio" id="star6" name="rate" value="6" />
                                <label for="star6" title="text">6 star</label>
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Add Review</label>
                        </div>
                        <div class="col-75">
                            <form action ="#.php">
                                <textarea id="subject" name="subject" placeholder="Add review.." style="height:200px"></textarea>
                                <div class="row">
                                    <form action ="#.php" >
                                        <input type="submit" value="Submit"> 
                                    </form>
                                    <form action ="DetailPage.php" >
                                        <input type="cancel" value="Cancel">
                                    </form>
                                </div>
                 
                            </form>
                        </div>
                    </div>
        
        
                </form>
            </div>
    </section>

        
 


</body>
</html>
