<div class="card">
    <span class="form-header">Welcome to <b>Engi</b>ma!</span>

    <form action="<?= BASE_URL; ?>/register/add" method="post" enctype="multipart/form-data">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="joe.johndoe" class="input" autocomplete="off"
            required onkeyup="validate(this.value)">
        <!-- <?php if (isset($usernameExistMsg)) : ?>
        <p><?= $usernameExistMsg; ?></p>
        <?php endif; ?> -->

        <label for="email">Email</label>
        <input type="email" name="email" required class="input" placeholder="john@doe.com" required>

        <label for="phone-number">Phone Number</label>
        <input type="text" name="phone-number" id="phone-number" class="input" placeholder="+62813xxxxxxxx" required>

        <label for="password">Password</label>
        <input type="password" name="password" required class="input" placeholder="Make as strong as possible">

        <label for="password-confirmation">Confirm Password</label>
        <input type="password-confirmation" name="password-confirmation" required class="input"
            placeholder="Same as above">

        <label for="image-upload" class="custom-file-upload">Profile Picture</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="9999999999" />
        <input type="file" id="image-upload" name="profile" class="input" accept="image/x-png,image/gif,image/jpeg" />

        <button type="submit" name="submit" class="btn form-btn">Register</button>
    </form>
    <span class="form-card-footer">
        Don't have an account ? <a href="<?= BASE_URL; ?>/login" class="link">Login here</a>
    </span>
</div>