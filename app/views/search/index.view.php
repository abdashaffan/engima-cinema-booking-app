 <div class="search-container">

     <h1>Showing search result from keyword "<?= $keyword; ?>"</h1>
     <h2 class="result-number"><?= $resultNumber; ?> result available</h2><br>
     <?php foreach ($result as $film) : ?>


     <div class="film-wrapper">

         <div class="main-content">

             <img src="<?= BASE_URL; ?>/assets/img/film/<?= $film['thumbnail']; ?>" alt="<?= $film['title']; ?>"
                 class="film-thumbnail">

             <div class="film-detail-wrapper">
                 <span class="title"> <?= $film['title']; ?></span><br>
                 <span class="rating">
                     <img src="<?= BASE_URL; ?>/assets/icon/star-solid.svg" alt="rating-star" class="svg-big">
                     <?= $film['rating']; ?>
                 </span><br>
                 <span class="sinopis">
                     <?= substr($film['sinopsis'], 0, 150); ?>...
                 </span><br>
             </div>
         </div>


         <span class="film-details-link">
             <a class="link detail-button" href="<?= BASE_URL; ?>/film/<?= $film['film_id']; ?>">view details
                 <img src="<?= BASE_URL; ?>/assets/icon/right-arrow.svg" alt="view-details" class="svg-med">
             </a>
         </span>
     </div>
     <hr>
     <?php endforeach; ?>
 </div>