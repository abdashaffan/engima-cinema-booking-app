<div class="card">
    <span class="form-header">Welcome to <b>Engi</b>ma!</span>

    <form action="/register" method="post" enctype="multipart/form-data">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="joe.johndoe" class="input" id="username"
            autocomplete="off" required onkeyup="validate(this.value, this.id)">
        <span class="invalid-message invalid-username-message"></span>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required class="input" onkeyup="validate(this.value, this.id)"
            placeholder="john@doe.com" required>
        <span class="invalid-message invalid-username-message"></span>

        <label for="phone-number">Phone Number</label>
        <input type="text" name="phone-number" id="phone_num" onkeyup="validate(this.value, this.id)" class=" input"
            placeholder="+62813xxxxxxxx" required>
        <span class="invalid-message invalid-username-message"></span>

        <label for="password">Password</label>
        <input type="password" name="password" required class="input" id="password"
            placeholder="Make as strong as possible">

        <label for="password-confirmation">Confirm Password</label>
        <input type="password" name="password-confirmation" id="password_confirmation" required class=" input"
            placeholder="Same as above" onkeyup="validatePassword()" autocomplete="off">
        <span class="invalid-message invalid-username-message"></span>

        <label for="image-upload" class="custom-file-upload">Profile Picture</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="9999999999" />
        <input type="file" id="image-upload" name="profile" class="input" accept="image/x-png,image/gif,image/jpeg" />

        <button type="submit" name="submit" id="submit" class="btn form-btn">Register</button>
    </form>
    <span class="form-card-footer">
        Don't have an account ? <a href="<?= BASE_URL; ?>/login" class="link">Login here</a>
    </span>
</div>