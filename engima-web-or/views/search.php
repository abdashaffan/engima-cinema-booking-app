<!DOCTYPE HTML>
<html>

    <head>
        <link rel="stylesheet" href="assets/css/navbar.css" type="text/css">
        <link rel="stylesheet" href="assets/css/search.css" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Engima Homepage</title>
    </head>
    
    <body>
        
        <div class="topnav">
            <strong><span stylie="color:#00c2ed">Engi</span>ma</strong>
            <div class="search-container">
                <form action="/search" method="get">
                    <input type="text" placeholder="Search movie" name="search">
                    <button type="submit"><i class="material-icons">Search</i></button>
                </form>
            </div>
            <div class="topnav-right">
                <a href ="/transaction">Transactions</a>
                <a href ="/logout">Logout</a>
            </div>
        </div>

        <section id="img_container">
            
            <div id=text>

            </div>
        
        </section>

        <?php
            
            $count = count($movies);
            echo "<script type='text/javascript' src='assets/js/search.js'></script>";
            echo "<script language='javascript'>counter('$search_query', '$count');</script>";
                          
            foreach ($movies as $movie){
            $movie_id = strval($movie["id"]);
            $movie_name = $movie["name"];
            $movie_synopsis = $movie["synopsis"];
            $movie_rating = 8;
            echo "<script language='javascript'>searchResult('$movie_id','$movie_name','$movie_synopsis', '$movie_rating');</script>";
            }

        ?>
    </body>
</html>