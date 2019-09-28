<content class="mahasiswa-detail">
    <h1>Daftar mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $key => $value) : ?>
        <li><?= $key; ?>: <?= $value; ?></li>
        <?php endforeach; ?>
    </ul>
</content>