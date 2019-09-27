<content class="mahasiswa">

    <?php if (isset($success)) : ?>
    <?php if ($success) : ?>
    <h1>Success add data</h1>
    <?php endif; ?>
    <?php endif; ?>

    <h2>Tambah mahasiswa baru:</h2>
    <div class="form-wrapper">
        <form action="<?= BASE_URL; ?>/mahasiswa/add" method="POST">

            <span class="form-group">
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required><br>
            </span>
            <span class="form-group">
                <label for="nim">NIM: </label>
                <input type="text" name="nim" id="nim" required><br>
            </span>
            <span class="form-group">
                <button type="submit" name="submit">Submit bet!</button>
            </span>
        </form>
    </div>
    <h1>Daftar mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
        <?php foreach ($mhs as $key => $value) : ?>

        <li><?= $key; ?>: <?= $value; ?></li>
        <?php endforeach; ?>
        <a href="<?= BASE_URL; ?>/mahasiswa/detail/<?= $mhs["id"]; ?>">detail</a>
        <a href="<?= BASE_URL; ?>/mahasiswa/delete/<?= $mhs["id"]; ?>" style="color:red;">delete</a>

        <br><br>
        <?php endforeach; ?>

    </ul>
</content>