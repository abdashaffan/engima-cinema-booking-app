<div class="home">
    <h1>
        Hello, <b class="blue-color"><?php echo $user_name; ?></b>!
    </h1>
    <h2>Now Playing</h2>
    <div class="list-film">
        <?php foreach ($films['results'] as $film) : ?>
        <div>
            <?php echo "<a  href='" . BASE_URL . "/film/" . $film['id'] . "'>" ?>
            <?php echo "<img src='http://image.tmdb.org/t/p/w500/" . $film['poster_path'] . "'" . BASE_URL . "/assets/img/film/' class='film-thumbnail'>" ?>
            <div>
                <h3><?php echo $film['title'] ?></h3>
                <div class='rating'>
                    <h3>
                        <i class='fa fa-star'></i>
                        <?php echo $film['vote_average'] . "/10"; ?>
                    </h3>
                </div>
            </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>