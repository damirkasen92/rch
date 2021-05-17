@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="back" href="{{ url('/') }}">&larr;</a>

        <h1 class="section-title">Создайте свой новый пароль</h1>

        @include('parts.alerts')

        <div class="page-form">
            <form method="POST" action="{{ url('reset-password') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->token }}">
                <div class="form-group">
                    <input class="field email required @error('email') warning @enderror" type="email" name="email" placeholder="Ваш email"
                        value="{{ $request->email }}" required>
                </div>
                <div class="form-group">
                    <input class="field password required @error('password') warning @enderror" type="password" name="password" placeholder="Введите Ваш пароль"
                        required>
                </div>
                <div class="form-group">
                    <input class="field password_confirmation required @error('password_confirmation') warning @enderror" type="password" name="password_confirmation"
                        placeholder="Введите Ваш пароль" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn form-btn">Подтвердить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
