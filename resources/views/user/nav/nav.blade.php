@include('parts.nav')

<h1 class="user-title">Личный кабинет {{ auth()->user()->name }}</h1>

<nav class="nav">
    <ul class="nav-items flex flex-justify-center">
        <li class="nav-item {{ \Str::contains(url()->current(), 'history') ? "active" : null }}">
            <a href="{{ url('/user/history') }}">История заказов</a>
        </li>
        <li class="nav-item {{ \Str::contains(url()->current(), 'contacts') ? "active" : null }}">
            <a href="{{ url('/user/contacts') }}">Контактные данные</a>
        </li>
        <li class="nav-item">
            <a href="#" onclick="event.preventDefault(); $('#logout').submit(); return false;">Выход</a>
            <form id="logout" style="display: none;" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </li>
    </ul>
</nav>
