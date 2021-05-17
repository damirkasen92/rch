@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="back" href="{{ url('/') }}">&larr;</a>

        <h1 class="section-title">Вход</h1>

        @include('parts.alerts')

        <div class="page-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input class="field email required"
                        type="email"
                        name="email"
                        placeholder="Ваш email"
                        required
                    >
                </div>
                <div class="form-group">
                    <input class="field password required"
                        type="password"
                        name="password"
                        placeholder="Введите Ваш пароль"
                        required
                    >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn form-btn">Вход</button>
                </div>
            </form>
        </div>
        <a class="forgot-password" href="{{ route('password.request') }}">Забыли пароль?</a>
    </div>
@endsection
