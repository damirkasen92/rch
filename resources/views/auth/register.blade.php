@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="back" href="{{ url('/') }}">&larr;</a>

        <h1 class="section-title">Регистрация</h1>

        @include('parts.alerts')

        <div class="page-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input class="field name required @error('name') warning @enderror" type="text" name="name"
                        placeholder="Ваше имя" required>
                </div>
                <div class="form-group">
                    <input class="field email required @error('email') warning @enderror" type="email" name="email"
                        placeholder="Ваш email" required>
                </div>
                <div class="form-group">
                    <input class="field password required @error('password') warning @enderror" type="password"
                        name="password" placeholder="Введите Ваш пароль" required>
                </div>
                <div class="form-group">
                    <input class="field password_confirmation required @error('password_confirmation') warning @enderror"
                        type="password" name="password_confirmation" placeholder="Повторите пароль" required>
                </div>
                <div class="hiddens">
                    <input type="hidden" name="u" value="1" />
                    <input type="hidden" name="f" value="1" />
                    <input type="hidden" name="s" />
                    <input type="hidden" name="c" value="0" />
                    <input type="hidden" name="m" value="0" />
                    <input type="hidden" name="act" value="sub" />
                    <input type="hidden" name="v" value="2" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn form-btn">Регистрация</button>
                </div>
            </form>
        </div>
    </div>
@endsection
