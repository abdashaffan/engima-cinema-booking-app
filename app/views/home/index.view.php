<div class="home">
    <h1>
        Hello, <b class="blue-color"><?php echo $user_name;?></b>!
    </h1>
    <h2>Now Playing</h2>
    <div class="list-film">
        <?php foreach ($films as $key => $film): ?>
            <div>
                <?php echo "<a href='". BASE_URL ."/film/".$film['film_id']."'>" ?>
                    <?php echo "<img src='". BASE_URL ."/assets/img/film/".$film['thumbnail']."'>" ?>
                    <div>        
                        <h3><?php echo $film['title'] ?></h3>
                        <div class='rating'>
                            <h3>
                                <i class='fa fa-star'></i>
                                <?php echo $film['rating'] ?>
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>