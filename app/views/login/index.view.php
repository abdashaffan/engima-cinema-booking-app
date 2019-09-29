<div class="card">
    <span class="form-header">Welcome to <b>Engi</b>ma!</span>
    <form action="<?= BASE_URL; ?>/login/validate" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" required class="input" placeholder="john@doe.com">
        <label for="password">Password</label>
        <input type="password" name="password" required class="input" placeholder="Insert password">
        <button type="submit" name="submit" class="btn form-btn">Login</button>
    </form>
    <span class="form-card-footer">
        Don't have an account ? <a href="<?= BASE_URL; ?>/register" class="link">Register here</a>
    </span>
</div>