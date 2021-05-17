@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="payment-wrap">
            <h1 class="payment-title">Оплата заказа под номером {{ $order->id }} прошла успешно.</h1>
            <a class="payment-link" href="{{ url('/') }}">На главную страницу</a>
        </div>
    </div>
@endsection
