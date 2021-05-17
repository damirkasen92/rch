@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="back" href="{{ url('/') }}">&larr;</a>

        <h1 class="section-title">Запрос ссылки на сброс пароля</h1>

        @include('parts.alerts')

        <div class="page-form">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <input class="field email required @error('email') warning @enderror" type="email" name="email"
                        placeholder="Ваш email" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn form-btn">Сбросить пароль</button>
                </div>
            </form>
        </div>
    </div>
@endsection
