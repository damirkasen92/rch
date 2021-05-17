<nav class="nav">
    <div class="container flex flex-align-center flex-wrap">
        <div class="nav-logo">
            <a href="{{ url('/') }}">
                <img class="logo" src="/images/logo/logo.png" alt="Rich Nature Логотип">
            </a>
        </div>
        <div class="nav-menu">
            <ul class="nav-menu-list flex">
                <li class="nav-menu-item"><a href="{{ \Str::contains(url()->current(), 'user') ? url('/#product') : '#product' }}">О продукции</a></li>
                <li class="nav-menu-item"><a href="{{ \Str::contains(url()->current(), 'user') ? url('/#order') : '#order' }}">Ассортимент</a></li>
                <li class="nav-menu-item"><a href="{{ \Str::contains(url()->current(), 'user') ? url('/#contacts') : '#contacts' }}">Контакты</a></li>
            </ul>
        </div>
        <div class="nav-lang">
            <a class="nav-lang-link" href="/kz">Kz</a>
        </div>
        <div class="nav-cart">
            <a href="{{ url('/cart') }}">
                <span class="nav-cart-count">0</span>
                <img class="nav-cart-img" src="/images/cart/cart.png" alt="Корзина">
            </a>
        </div>
        <div class="nav-buttons flex">
            @auth
                <a href="{{ url('/user/history') }}">Личный кабинет</a>
                <a href="#" onclick="event.preventDefault(); $('#logout').submit(); return false;">Выйти</a>

                <form id="logout" style="display: none;" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    </div>
</nav>
