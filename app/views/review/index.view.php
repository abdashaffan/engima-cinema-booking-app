<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<header>

</header>

<body>
  <form id="review" action="<?= BASE_URL; ?>/review/add" method="post">
    <div class="flex">
      <button type="button" class="iconbtn"><</button>
      <?php
        echo "<h1>".$film_name[0]['title']."</h1>";
        ?>
    </div>
    <div class="flexmid">
      <div><h3>Add Rating</h3></div>
      <div class="starrating"><fieldset class="star">
        <input type="radio" id="star10" name="rating" value="10" /><label class = "full" for="star10" title="Awesome - 10 stars"></label>
        <input type="radio" id="star9half" name="rating" value="9.5" /><label class="half" for="star9half" title="9.5 stars"></label>
        <input type="radio" id="star9" name="rating" value="9" /><label class = "full" for="star9" title="9 stars"></label>
        <input type="radio" id="star8half" name="rating" value="8.5" /><label class="half" for="star8half" title="8.5 stars"></label>
        <input type="radio" id="star8" name="rating" value="8" /><label class = "full" for="star8" title="8 stars"></label>
        <input type="radio" id="star7half" name="rating" value="7.5" /><label class="half" for="star7half" title="7.5 stars"></label>
        <input type="radio" id="star7" name="rating" value="7" /><label class = "full" for="star7" title="7 stars"></label>
        <input type="radio" id="star6half" name="rating" value="6.5" /><label class="half" for="star6half" title="6.5 stars"></label>
        <input type="radio" id="star6" name="rating" value="6" /><label class = "full" for="star6" title="6 star"></label>
        <input type="radio" id="star5half" name="rating" value="5.5" /><label class="half" for="star5half" title="5.5 stars"></label>
        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="5 stars"></label>
        <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="4.5 stars"></label>
        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="4 stars"></label>
        <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="3.5 stars"></label>
        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="3 stars"></label>
        <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="2.5 stars"></label>
        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="2 stars"></label>
        <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="1 star"></label>
        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="0.5 stars"></label>
      </fieldset>
      </div>
    </div>
    <div class="flexmid2">
      <div><h3>Add Review</h3></div>
      <textarea rows="7" class="comment" name="comment" form="review"></textarea>
    </div>
    <div class = "cancelsubmitbuttons">
        <button type="button" onclick="window.location.href='transhistory';" class="cancelbutton"> Cancel </button>
        <button type="submit" name="submit" class="savebutton"> Submit </button>
    </div>
    <input type="hidden" name="transaction_id" value = "<?php echo $trans_id; ?>" >
    <input type="hidden" name="film_id" value= "<?php echo $film_id; ?>">
  </form>
</body>

