@extends('layouts.app')

@section('content')
    <div class="user container">
        @include('user.nav.nav')
        @include('parts.alerts')

        <div class="page-form">
            <form method="POST" action="{{ route('user-profile-information.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input class="field name required @error('name') warning @enderror" type="text" name="name" placeholder="Ваше имя"
                        value="{{ auth()->user()->name }}" required>
                </div>
                <div class="form-group">
                    <input class="field email required @error('email') warning @enderror" type="email" name="email" placeholder="Ваш email"
                        value="{{ auth()->user()->email }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn form-btn">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </div>
@endsection
