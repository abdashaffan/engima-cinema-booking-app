<div class="navbar white-background">
    <div class="left-navbar">
        <div>
            <b class="blue-color">Engi</b>ma
        </div>
        <div class="input-box">
            <input type="text" placeholder="Search movie" name="keyword" onkeyup="getSearchResult(this.value)">
            <img class="svg-big" src="/public/assets/icon/search-solid.svg" autocomplete=off>
        </div>
    </div>
    <div class="right-navbar">
        <a href="/transaction">Transactions</a>
        <a href="<?= BASE_URL; ?>/login/logout">Logout</a>
    </div>
</div>