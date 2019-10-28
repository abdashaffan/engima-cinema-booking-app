<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/css/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type='text/javascript' src='assets/js/review.js'></script>"
</head>
<body>
    <div class="topbar">
            <nav>
                <h1 class="engi-font">Engi</h1>
                <form action="/search"> 
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>          
                </form>
                <a class="history" href="/transaction" >Transactions</a>
                <a class ="logout" href="/logout" >Logout<a>      
            </nav>
        </div>
    <div class="back-container">
            <a href="#" class="previous round">&#8249;</a>
            <?php
                echo "<h1 class='movieTitle'>".$movie["name"]."</h1>";
            ?>
    </div>
    <section>
        <div class ="container">

                <!-- <a href="#" class="previous round">&#8249;</a>
                <h1 class="movieTitle">Movie Title</h1> -->
                <form action ="/review" method="post">
                <input type="hidden" value=<?php echo("'" . $movie['id']. "'")?> name="movieid">
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Add Rating</label>
                        </div>
                        <div class="col-75">
                            <div class="rate">
                                <?php if($review["rating"]==10){
                                    echo('<input type="radio" id="star10" name="rate" value="10" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star10" name="rate" value="10" />');

                                }?>
                                <label for="star10" title="text">10 stars</label>
                                <?php if($review["rating"]==9){
                                    echo('<input type="radio" id="star9" name="rate" value="9" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star9" name="rate" value="9" />');

                                }?>
                                <label for="star9" title="text">9 stars</label>
                                <?php if($review["rating"]==8){
                                    echo('<input type="radio" id="star8" name="rate" value="8" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star8" name="rate" value="8" />');

                                }?>
                                <label for="star8" title="text">8 stars</label>
                                <?php if($review["rating"]==7){
                                    echo('<input type="radio" id="star7" name="rate" value="7" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star7" name="rate" value="7" />');

                                }?>
                                <label for="star7" title="text">7 stars</label>
                                <?php if($review["rating"]==6){
                                    echo('<input type="radio" id="star6" name="rate" value="6" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star6" name="rate" value="6" />');

                                }?>
                                <label for="star6" title="text">6 stars</label>
                                <?php if($review["rating"]==5){
                                    echo('<input type="radio" id="star5" name="rate" value="5" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star5" name="rate" value="5" />');

                                }?>
                                <label for="star5" title="text">5 stars</label>
                                <?php if($review["rating"]==4){
                                    echo('<input type="radio" id="star4" name="rate" value="4" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star4" name="rate" value="4" />');

                                }?>
                                <label for="star4" title="text">4 stars</label>
                                <?php if($review["rating"]==3){
                                    echo('<input type="radio" id="star3" name="rate" value="3" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star3" name="rate" value="3" />');

                                }?>
                                <label for="star3" title="text">3 stars</label>
                                <?php if($review["rating"]==2){
                                    echo('<input type="radio" id="star2" name="rate" value="2" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star2" name="rate" value="2" />');

                                }?>
                                <label for="star2" title="text">2 stars</label>
                                <?php if($review["rating"]==1){
                                    echo('<input type="radio" id="star1" name="rate" value="1" checked="checked" />');
                                } else {
                                    echo('<input type="radio" id="star1" name="rate" value="1" />');

                                }?>
                                <label for="star1" title="text">1 stars</label>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Add Review</label>
                        </div>
                        <div class="col-75">
                            <form action ="#.php">
                                <textarea id="subject" name="subject" placeholder="Add review.." style="height:200px"><?php if ($review!=NULL) echo($review["review"])?></textarea>
                                <div class="row">
                                    <form action ="/review" method="post" >
                                        <input type="submit" value="Submit"> 
                                    </form>
                                    <form action ="DetailPage.php" >
                                        <input type="cancel" value="Cancel" onclick="deleteText()">
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
