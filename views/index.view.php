<?php require('partials/head.php'); ?>

<h1>Homepage</h1>



<form action="/names" method="POST">
    <label for="name">Name:</label>
    <input name="name" type="text">
    <button type="submit">Submit</button>
</form>


<?php require('partials/footer.php'); ?>