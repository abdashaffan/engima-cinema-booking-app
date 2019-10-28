<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/navbar.css" type="text/css">
        <link rel="stylesheet" href="assets/css/homepage.css" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Engima Homepage</title>
    </head>
    
    <body>
        
        <div class="topnav">
            <strong><span style="color:#00c2ed">Engi</span>ma</strong>
            <div class="search-container">
                <form action="/search" method="get">
                    <input type="text" placeholder="Search movie" name="search">
                    <button type="submit"><i class="material-icons">search</i></button>
                </form>
            </div>
            <div class="topnav-right">
                <a href="/transaction">Transactions</a>
                <a href ="/logout">Logout</a>
            </div>
        </div>

        <section>
            <h1>Hello, User!</h1>
            <h4>Now Playing</h4>
        </section>

        <section class="container">
                <div class="movies" id="sec2">
                <?php

                foreach ($movies as $movie) {
                    $movie_id = $movie["id"];
                    $movie_name = $movie["name"];
                    $movie_rating = $movie["rating"];
                    echo "<script type='text/javascript' src='assets/js/homepage.js'></script>";
                    echo "<script language='javascript'>createImage('$movie_id','$movie_name','$movie_rating');</script>";
                }
                ?>
                </div>
        </section>
        

        
    </body>
</html>