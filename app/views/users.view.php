<?php require('partials/head.php'); ?>

<h1>All users</h1>


<ul>
    <?php foreach ($users as $user) : ?>
    <li><?= $user->name; ?></li>
    <?php endforeach; ?>
</ul>

<!-- 
<form action="/users" method="POST">
    <label for="name">Name:</label>
    <input name="name" type="text">
    <button type="submit">Submit</button>
</form> -->


<?php require('partials/footer.php'); ?>