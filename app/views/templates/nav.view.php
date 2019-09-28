<div class="navbar white-background">
    <div class="left-navbar">
        <div>
            <b class="blue-color">Engi</b>ma
        </div>
        <div class="input-box">
            <form action="<?= BASE_URL; ?>/search" method="GET">
                <input type="text" placeholder="Search movie" name="keyword">
                <img class="svg-big" src="/public/assets/icon/search-solid.svg">
                <button type="submit" hidden />
            </form>

        </div>
    </div>
    <div class="right-navbar">
        <a href="/transaction">Transactions</a>
        <a href="<?= BASE_URL; ?>/login/logout">Logout</a>
    </div>
</div>