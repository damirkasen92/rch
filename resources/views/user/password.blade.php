@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="section-title">Изменение пароля</h1>

        @include('parts.alerts')

        <div class="page-form">
            <form method="POST" action="{{ route('user-password.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input class="field current_password required @error('current_password') warning @enderror" type="password"
                        name="current_password" placeholder="Введите Ваш текущий пароль" required>
                </div>
                <div class="form-group">
                    <input class="field password required @error('password') warning @enderror" type="password"
                        name="password" placeholder="Введите Ваш новый пароль" required>
                </div>
                <div class="form-group">
                    <input class="field password_confirmation required @error('password_confirmation') warning @enderror"
                        type="password" name="password_confirmation" placeholder="Повторите новый пароль" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn form-btn">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
