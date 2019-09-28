<div class="black-background home">
    <div class="white-background home-wrapper">
        <h1>
            Hello, <b class="blue-color"><?php echo $user_name;?></b>!
        </h1>
        <h2>Now Playing</h2>
        <div class="list-film">
            <?php foreach ($films as $key => $film): ?>
                <div>
                    <?php echo "<img src='/public/assets/img/".$film['thumbnail']."'>" ?>
                    <div>
                        <h3><?php echo $film['title'] ?></h3>
                        <div class='rating'>
                            <h3>
                                <i class='fa fa-star'></i>
                                <?php echo $film['rating'] ?>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <div>
                <img src="/public/assets/img/1.jpeg">
                <div>
                    <h3>Avengers: Endgame</h3>
                    <div class="rating">
                        <h3>
                            <i class="fa fa-star"></i>
                            8.75
                        </h3>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
