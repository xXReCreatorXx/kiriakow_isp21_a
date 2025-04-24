<div class="container-profile_menu">
    <div class="container-profile_menu-block">
        <a id="profile" class="container-profile_menu-link" href="/profile">Об аккаунте</a>

        <a id="myannoun" class="container-profile_menu-link" href="/myannoun">Мои объявления</a>

        <a id="favorite" class="container-profile_menu-link" href="/favorite">Избранное</a>

        @if(Auth::user()->role === 0)
        <a id="admin" class="container-profile_menu-link" href="/admin_consid">Панель администратора</a>
        @endif
    </div>

    <div class="container-profile_menu-line"></div>
</div>

<script src="js/profileMenu.js"></script>