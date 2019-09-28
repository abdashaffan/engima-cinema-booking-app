<div class="home">
    <h1>
        Hello, <b class="blue-color"><?php echo $user_name; ?></b>!
    </h1>
    <h2>Now Playing</h2>
    <div class="list-film">
        <?php foreach ($films as $key => $film) : ?>
            <div>
                <?php echo "<img src='/public/assets/img/film/" . $film['thumbnail'] . "'>" ?>
                <div>
                    <div>
                        <h3><?php echo $film['title'] ?></h3>
                        <div class='rating'>
                            <h3>
                                <img class="svg-big" src="/public/assets/icon/star-solid.svg">
                                <?php echo $film['rating'] ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>